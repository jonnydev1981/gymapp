@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h5>Create a WOD</h5>
    
    </div>
    <div class="row justify-content-center">

        @if (!isset($wod))

            <form method="post" action="{{ route('wod.store') }}">

                <div class="form-group">
                    <label for="description">WOD Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <script>
                    function formatTime(timeInput) {

                        intValidNum = timeInput.value;

                        if (intValidNum < 24 && intValidNum.length == 2) {
                            timeInput.value = timeInput.value + ":";
                            return false;
                        }
                        if (intValidNum == 24 && intValidNum.length == 2) {
                            timeInput.value = timeInput.value.length - 2 + "0:";
                            return false;
                        }
                        if (intValidNum > 24 && intValidNum.length == 2) {
                            timeInput.value = "";
                            return false;
                        }
                        if (intValidNum.length == 5 && intValidNum.slice(-2) < 60) {
                            timeInput.value = timeInput.value + ":";
                            return false;
                        }
                        if (intValidNum.length == 5 && intValidNum.slice(-2) > 60) {
                            timeInput.value = timeInput.value.slice(0, 2) + ":";
                            return false;
                        }
                        if (intValidNum.length == 5 && intValidNum.slice(-2) == 60) {
                            timeInput.value = timeInput.value.slice(0, 2) + ":00:";
                            return false;
                        }
                        if (intValidNum.length == 8 && intValidNum.slice(-2) > 60) {
                            timeInput.value = timeInput.value.slice(0, 5) + ":";
                            return false;
                        }
                        if (intValidNum.length == 8 && intValidNum.slice(-2) == 60) {
                            timeInput.value = timeInput.value.slice(0, 5) + ":00";
                            return false;
                        }

                        } //end function
                </script>

                <div class="form-group">
                    <div class="well">
                        <div class="input-append">
                            <label for="rx_time">RX Time (Mins)</label>
                            <input id="rx_time" name="rx_time" type="text" placeholder="HH:MM:SS" onkeypress="formatTime(this)" MaxLength="8" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="style_id">WOD Style</label>
                    <select id="style_id" name="style_id" class="custom-select">
                        <option selected>Workout style select</option>
                        @foreach ($styles as $style)
                            <option value="{{ $style->id }}">{{ $style->style }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="hidden" id="box_id" name="box_id" value="{{ Auth::user()->box->id }}">
                    <input type="hidden" id="wod_create" name="wod_create" value="true">
                </div>

                @csrf
                <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
            </form>

        @else

            <div class="table-responsive">
                <form method="post" id="dynamic_form">
                    @csrf
                <span id="result"></span>
                <table class="table table-bordered table-striped" id="wodlines_table">
                    <thead>
                    <tr>
                        <th>Set #</th>
                        <th>RX Reps</th>
                        <th>RX Weight (M)</th>
                        <th>RX Weight (F)</th>
                        <th>Exercise</th>
                        <th>Metric</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" align="right">&nbsp;</td>
                            <td>
                                @csrf
                                <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                            </td>
                        </tr>
                    </tfoot>
                </table>
                </form>
                <script type="text/javascript">
                    $(document).ready(function(){

                        var count = 1;

                        dynamic_field(count);

                        function dynamic_field(number)
                        {
                        html = '<tr>';
                            html += '<td><input type="text" name="order[]" class="form-control" /></td>';
                            html += '<td><input type="text" name="rx_reps[]" class="form-control" /></td>';
                            html += '<td><input type="text" name="rx_weight_m[]" class="form-control" /></td>';
                            html += '<td><input type="text" name="rx_weight_f[]" class="form-control" /></td>';
                            html += '<td><select name="exercise_id[]" class="custom-select"><option selected>Exercise select</option>@foreach ($exercises as $exercise)<option value="{{ $exercise->id }}">{{ $exercise->name }}</option>@endforeach</select></td>';
                            html += '<td><select name="metric_id[]" class="custom-select"><option selected>Metric select</option>@foreach ($metrics as $metric)<option value="{{ $metric->id }}">{{ $metric->name }}</option>@endforeach</select></td>';
                            html += '<input type="hidden" name="wod_id[]" class="form-control" value="{{ $wod->id }}" />'
                            if(number > 1)
                            {
                                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                                $('tbody').append(html);
                            }
                            else
                            {
                                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                                $('tbody').html(html);
                            }
                        }

                        $(document).on('click', '#add', function(){
                        count++;
                        dynamic_field(count);
                        });

                        $(document).on('click', '.remove', function(){
                        count--;
                        $(this).closest("tr").remove();
                        });

                        $('#dynamic_form').on('submit', function(event){
                            event.preventDefault();
                            $.ajax({
                                method:'post',
                                url:'{{ route('wodline.store') }}',
                                data:$(this).serialize(),
                                dataType:'json',
                                beforeSend:function(){
                                    $('#save').attr('disabled','disabled');
                                },
                                success:function(data)
                                {
                                    if(data.error)
                                    {
                                        var error_html = '';
                                        for(var count = 0; count < data.error.length; count++)
                                        {
                                            error_html += '<p>'+data.error[count]+'</p>';
                                        }
                                        $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                                    }
                                    else
                                    {
                                        dynamic_field(1);
                                        $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                                    }
                                    $('#save').attr('disabled', false);
                                }
                            })
                        });

                    })();
                </script>

            </div>
        @endif
    </div>
</div>
@endsection


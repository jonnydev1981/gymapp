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

      <h5>Choose an existing WOD or manually log a workout.</h5>

    </div>

    <div class="row justify-content-center">
      
    @if (!isset($workout))
        <form method="POST" action="{{ route('workout.store') }}">
            @csrf

            <div class="form-group">
                <label class="form-check-label" for="performed_on">
                    Select date workout performed
                </label>
                <input class="date form-control" type="text" name="performed_on" id="performed_on">
            </div>

            <div class="form-group">
                <div class="well">
                    <div class="input-append">
                        <label for="time_taken">Time taken</label>
                        <input id="time_taken" name="time_taken" type="text" placeholder="HH:MM:SS" onkeypress="formatTime(this)" MaxLength="8" />
                    </div>
                </div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="workoutradio" id="choice-wod" checked>
                <label class="form-check-label" for="choice-wod">
                    Search for an existing WOD
                </label>

                <div class="reveal-if-active">
                    <div class="form-group">
                        <select class="itemName form-control" style="width:500px;" id="itemName" name="itemName"></select>
                    </div>
                </div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="workoutradio" id="choice-manual">
                <label class="form-check-label" for="choice-manual">
                Manual Entry
                </label>
            </div>

            <input type="submit" name="continue" id="continue" class="btn btn-primary" value="Continue" />

        </form>
        </div>
      </div>
  </div>

  <script>
  var FormStuff = {

      init: function() {
        this.applyConditionalRequired();
        this.bindUIActions();
      },

      bindUIActions: function() {
        $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
      },

      applyConditionalRequired: function() {

        $(".require-if-active").each(function() {
          var el = $(this);
          if ($(el.data("require-pair")).is(":checked")) {
            el.prop("required", true);
          } else {
            el.prop("required", false);
          }
        });

      }

    };

    FormStuff.init();
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script type="text/javascript">

      $('#itemName').select2({
        placeholder: 'Select an item',
        ajax: {
          url: '/wod-ajax',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.description,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      });


  </script>

  <script type="text/javascript">

      $('.date').datepicker({

        format: 'dd-mm-yyyy'

      });

  </script>

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

@else

    <div class="table-responsive">
        <form method="post" id="dynamic_form">
            @csrf
        <span id="result"></span>
        <table class="table table-bordered table-striped" id="workoutlines_table">
            <thead>
                <tr>
                    <th scope="col">Set #</th>
                    <th scope="col">RX Reps</th>
                    <th scope="col">Reps</th>
                    <th scope="col">RX Weight (Male)</th>
                    <th scope="col">RX Weight (Female)</th>
                    <th scope="col">Weight (KG)</th>
                    <th scope="col">Exercise</th>
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
                    html += '<input type="hidden" name="wod_id[]" class="form-control" value="{{ $wod_id }}" />'
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
                        url:'{{ route('workoutline.store') }}',
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

@endsection

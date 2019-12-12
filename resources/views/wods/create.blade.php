@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
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

                    <p>Create a WOD.</p>

                    @if (!isset($wod))

                        {{--
                            create a wod header first, then use if to show the lines underneath
                            wods table - header
                            fields:
                            description
                            rx_time
                            style_id
                            box_id
                        --}}

                        <form method="post" action="{{ route('wod.store') }}">

                            <div class="form-group">
                                <label for="description">WOD Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="well">
                                    <div class="input-append">
                                        <label for="rx_time">RX Time (Mins)</label>
                                        <input id="rx_time" name="rx_time" type="text"></input>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
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

                        {{--
                        wod_lines table - lines
                        fields:
                        order
                        rx_sets
                        rx_reps
                        rx_weight_m
                        rx_weight_f
                        wod_id
                        exercise_id
                    --}}

                    <div class="table-responsive">
                            <form method="post" id="{{ route('wodline.create') }}">
                            <span id="result"></span>
                            <table class="table table-bordered table-striped" id="user_table">
                                <thead>
                                <tr>
                                    <th width="35%">First Name</th>
                                    <th width="35%">Last Name</th>
                                    <th width="30%">Action</th>
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
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

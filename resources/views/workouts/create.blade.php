@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Log a Workout</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Choose an existing WOD or manually log a workout.</p>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="workoutradio" id="choice-wod" checked>
                        <label class="form-check-label" for="choice-wod">
                          Search for an existing WOD
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="workoutradio" id="choice-manual">
                        <label class="form-check-label" for="choice-manual">
                          Manual Entry
                        </label>
                    </div>

                    <div class="form-group reveal-if-active">
                        <input class="form-control" type="text" name="wodsearch" id="wodsearch" placeholder="WOD Description">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

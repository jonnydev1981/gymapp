@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <p>Workout Log</p>

                <p>
                    WOD Details
                </p>

                <ul class="list-group">
                    <li class="list-group-item">Description: {{ $workout->description }}</li>
                    <li class="list-group-item">RX Time: {{ $workout->wod->rx_time }}</li>
                    <li class="list-group-item">Style: {{ $workout->wod->style->style }}</li>
                </ul>

                <form method="POST" action="{{ route('workoutline.store') }}" >
                    @csrf

                    <input type="hidden" id="workout_id" name="workout_id" value="{{ $workout->id }}">

                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">RX Sets</th>
                            <th scope="col">RX Reps</th>
                            <th scope="col">Sets Performed</th>
                            <th scope="col">Reps Performed</th>
                            <th scope="col">RX Weight (Male)</th>
                            <th scope="col">RX Weight (Female)</th>
                            <th scope="col">Weight Performed</th>
                            <th scope="col">Exercise</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($workout->wod->wodlines as $wodline)
                                <tr>
                                    <th scope="row"><input type="hidden" name="order" id="order" value="{{$wodline->order }}">{{ $wodline->order }}</th>
                                    <td>{{ $wodline->rx_sets }}</td>
                                    <td>{{ $wodline->rx_reps }}</td>
                                    <td><input type="number" name="sets" id="sets"></td>
                                    <td><input type="number" name="reps" id="reps"></td>
                                    <td>{{ $wodline->rx_weight_m }}</td>
                                    <td>{{ $wodline->rx_weight_f }}</td>
                                    <td><input type="number" name="weight" id="weight"></td>
                                    <td><input type="hidden" name="exercise_id" id="exercise_id" value="{{ $wodline->exercise->id }}">{{ $wodline->exercise->name }}</td>
                                </tr>
                            @endforeach

                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="8" align="right">&nbsp;</td>
                                <td>
                                    <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

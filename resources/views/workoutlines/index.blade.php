@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <p>Workout View</p>

                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">Order</th>
                        <th scope="col">Sets</th>
                        <th scope="col">Reps</th>
                        <th scope="col">Exercise</th>
                        <th scope="col">Weight (KG)</th>
                        <th scope="col">Scaled</th>
                        <th scope="col">Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($workoutlines as $workoutline)
                        <tr>
                            <th scope="row">{{ $workoutline->order }}</th>
                            <td>{{ $workoutline->sets }}</td>
                            <td>{{ $workoutline->reps }}</td>
                            <td><a href="{{ route('exercise.show', $workoutline->exercise->id) }}">{{ $workoutline->exercise->name }}</a></td>
                            <td>{{ $workoutline->weight }}</td>
                            <td>
                                @if ($workoutline->scaled === '1')
                                    <span class="badge badge-danger">Yes</span>
                                @else
                                    <span class="badge badge-success">No</span>
                                @endif
                            </td>
                            <td>
                            @if ($workoutline->completed === '1')
                                <span class="badge badge-success">Yes</span>
                            @else
                                <span class="badge badge-danger">No</span>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>

            </div>
        </div>
    </div>
</div>
@endsection

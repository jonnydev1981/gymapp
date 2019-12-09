@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                            <th scope="col">Weight</th>
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
                                <td>{{ $workoutline->weight }}</td>
                                <td>{{ $workoutline->scaled }}</td>
                                <td>{{ $workoutline->completed }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

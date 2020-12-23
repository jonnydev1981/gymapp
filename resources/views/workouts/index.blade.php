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

            <h5>List of Logged Workouts</h5>
        </div>

        <div class="row">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                    <th scope="col">Performed On</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($workouts as $workout)
                    <tr>
                        <th scope="row">{{ $workout->id }}</th>
                        <td>{{ $workout->description }}</td>
                        <td>{{ $workout->performed_on }}</td>
                        <td><a class="btn-sm btn-primary" href="{{ route('workoutline.show', $workout->id) }}">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @isset($workouts->links)
                {{ $workouts->links() }}
            @endisset
        </div>
    </div>
</div>
@endsection
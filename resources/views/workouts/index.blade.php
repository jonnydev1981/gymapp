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

                <p>List of recent workouts.</p>

                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Performed On</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($workouts as $workout)
                            <tr>
                                <th scope="row">{{ $workout->id }}</th>
                                <td>{{ $workout->name }}</td>
                                <td>{{ $workout->description }}</td>
                                <td>{{ $workout->performed_on }}</td>
                                <td><a class="btn-sm btn-primary" href="{{ route('workoutline.show', $workout->id) }}">View</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

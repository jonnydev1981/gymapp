@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">Exercise</th>
                <th scope="col">Description</th>
                <th scope="col">Demo URL</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($exercises as $exercise)
                <tr>
                    <th scope="row">{{ $exercise->name }}</th>
                    <td>{{ $exercise->description }}</td>
                    <td>{{ $exercise->url }}</td>
                    <td><a type="button" class="btn btn-primary" href="{{ route('exercise.edit', $exercise->id) }}">Edit</button></td>
                </tr>
            @endforeach
            </tbody>
            </table>

            {{ $exercises->links() }}
    </div>
</div>
@endsection

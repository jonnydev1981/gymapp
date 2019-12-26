@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('exercise.update', $exercise->id) }}" >
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" size="50" value="{{ $exercise->name }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ $exercise->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="url">YouTube Video ID</label>
                <input type="text" class="form-control" id="url" name="url" size="50" value="{{ $exercise->url }}">
            </div>

            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
</div>
@endsection

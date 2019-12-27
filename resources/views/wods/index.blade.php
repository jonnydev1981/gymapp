@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p>List of recent WODs.</p>

        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Date Performed</th>
                <th scope="col">Description</th>
                <th scope="col">Style</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                
            @foreach ($wods as $wod)
                <tr>
                    <th scope="row">{{ $wod->wod->id }}</th>
                    <td>{{ $wod->performed_on }}</td>
                    <td>{{ $wod->wod->description }}</td>
                    <td>{{ $wod->wod->style->style }}</td>
                    <td><a class="btn-sm btn-primary" href="{{ route('workoutline.show', $wod->id) }}">View</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $wods->links() }}
    </div>
</div>
@endsection

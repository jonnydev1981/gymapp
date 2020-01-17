@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h5>List of recently created WODs</h5>
    </div>

    <div class="row justify-content-center">

        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Created</th>
                <th scope="col">Description</th>
                <th scope="col">Style</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                
            @foreach ($wods as $wod)
                <tr>
                    <th scope="row">{{ $wod->id }}</th>
                    <td>{{ $wod->created_at }}</td>
                    <td>{{ $wod->description }}</td>
                    <td>{{ $wod->style->style }}</td>
                    <td><a class="btn-sm btn-primary" href="{{ route('wodline.show', $wod->id) }}">View</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @if (isset($wods->links))
            {{ $wods->links() }}    
        @endif
    </div>
</div>
@endsection

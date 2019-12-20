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

                <p>List of recent WODs.</p>

                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col">Style</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{ dd($wods) }}
                    @foreach ($wods as $wod)
                        <tr>
                            <th scope="row">{{ $wod->wods->id }}</th>
                            <td>{{ $wod->wods->description }}</td>
                            <td>{{ $wod->wods->style->style }}</td>
                            <td><a class="btn-sm btn-primary" href="{{ route('wodline.show', $wod->wods->id) }}">View</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection

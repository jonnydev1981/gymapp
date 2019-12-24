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
                <th scope="col">Sets</th>
                <th scope="col">Reps</th>
                <th scope="col">Exercise</th>
                <th scope="col">Weight (KG)</th>
                <th scope="col">Scaled</th>
                <th scope="col">Completed</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($exercises as $exercise)
                <tr>
                    <th scope="row">{{ $exercise->sets }}</th>
                    <td>{{ $exercise->reps }}</td>
                    <td>{{ $exercise->exercise->name }}</td>
                    <td>{{ $exercise->weight }}</td>
                    <td>
                        @if ($exercise->scaled === '1')
                            <span class="badge badge-danger">Yes</span>
                        @else
                            <span class="badge badge-success">No</span>
                        @endif
                    </td>
                    <td>
                    @if ($exercise->completed === '1')
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
@endsection

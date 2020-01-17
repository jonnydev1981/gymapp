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
                    <th scope="col">Set #</th>
                    <th scope="col">RX Reps</th>
                    <th scope="col">RX Weight Male (KG)</th>
                    <th scope="col">RX Weight Female (KG)</th>
                    <th scope="col">Metric</th>
                    <th scope="col">Exercise</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($wodlines as $wodline)
                <tr>
                    <th scope="row">{{ $wodline->order }}</th>
                    <td>{{ $wodline->rx_reps }}</td>
                    <td>{{ $wodline->rx_weight_m }}</td>
                    <td>{{ $wodline->rx_weight_f }}</td>
                    <td>{{ $wodline->metric }}</td>
                    <td><a href="{{ route('exercise.show', $wodline->exercise->id) }}">{{ $wodline->exercise->name }}</a></td>
                </tr>
            @endforeach
            </tbody>
            </table>
    </div>
</div>
@endsection

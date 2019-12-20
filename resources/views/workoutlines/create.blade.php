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

                    <p>Workout Log</p>

                    <p>
                        WOD Details
                    </p>

                    <ul class="list-group">
                        <li class="list-group-item">Description: {{ $workout->description }}</li>
                        <li class="list-group-item">RX Time: {{ $workout->wod->rx_time }}</li>
                        <li class="list-group-item">Style: {{ $workout->wod->styles->style }}</li>
                    </ul>

                    <form method="POST" action="{{ route('workoutline.store') }}" >
                        @csrf

                        <input type="hidden" id="workout_id" name="workout_id" value="{{ $workout->id }}">

                        @foreach ($workoutlines as $workoutline)
                            {{ dd($workoutline) }}
                        @endforeach

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

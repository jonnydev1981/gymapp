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

                    <form method="POST" action="{{ route('workoutline.store') }}" >
                        @csrf

                        <input type="hidden" id="workout_id" name="workout_id" value="{{ $workout_id }}"

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

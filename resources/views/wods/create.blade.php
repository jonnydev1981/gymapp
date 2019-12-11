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

                    <p>Create a WOD.</p>

                    {{--
                        wods table - header
                        fields:
                        description
                        rx_time
                        style_id
                        box_id
                    --}}

                    {{--
                        wod_lines table - lines
                        fields:
                        order
                        rx_sets
                        rx_reps
                        rx_weight_m
                        rx_weight_f
                        wod_id
                        exercise_id
                    --}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

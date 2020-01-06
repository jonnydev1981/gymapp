@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="row">
        <div class="card" style="width: 22rem;">
            <div class="card-body">
              <h5 class="card-title">WOD Details</h5>
              <p class="card-text">
                <ul class="list-group">
                    <li class="list-group-item">Description: {{ $workout->description }}</li>
                    <li class="list-group-item">RX Time: {{ $workout->wod->rx_time }}</li>
                    <li class="list-group-item">Style: {{ $workout->wod->style->style }}</li>
                </ul>
              </p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <form method="POST" action="{{ route('workoutline.store') }}" >
            @csrf

            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Set #</th>
                    <th scope="col">RX Reps</th>
                    <th scope="col">Reps</th>
                    <th scope="col">RX Weight (Male)</th>
                    <th scope="col">RX Weight (Female)</th>
                    <th scope="col">Weight (KG)</th>
                    <th scope="col">Exercise</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($workout->wod->wodlines as $wodline)
                        <tr>
                            <th scope="row">
                                <input type="hidden" name="workout_id[]" value="{{ $workout->id }}">
                                <input type="hidden" name="order[]" value="{{$wodline->order }}">{{ $wodline->order }}
                            </th>
                            <td>
                                <input type="hidden" name="rx_reps[]" value="{{$wodline->rx_reps }}">{{ $wodline->rx_reps }}
                            </td>
                            <td>
                                <input type="number" name="reps[]" maxlength="3" size="3">
                            </td>
                            <td>
                                <input type="hidden" name="rx_weight_m[]" value="{{$wodline->rx_weight_m }}">
                                {{ $wodline->rx_weight_m }}
                            </td>
                            <td>
                                <input type="hidden" name="rx_weight_f[]" value="{{$wodline->rx_weight_f }}">
                                {{ $wodline->rx_weight_f }}
                            </td>
                            <td>
                                <input type="number" name="weight[]" maxlength="6" size="6">
                            </td>
                            <td>
                                <input type="hidden" name="exercise_id[]" value="{{ $wodline->exercise->id }}">
                                {{ $wodline->exercise->name }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="8" align="right">&nbsp;</td>
                        <td>
                            <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                        </td>
                    </tr>
                </tfoot>
            </table>

        </form>
    </div>
</div>
@endsection

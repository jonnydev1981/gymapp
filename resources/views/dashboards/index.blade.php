@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h5>User Dashboard</h5>
    </div>

    <div class="row justify-content-center">
        @isset($distancestats)
        <div class="card" style="width: 22rem;">
            <div class="card-body">
              <h5 class="card-title">Distance</h5>
              <div class="card-text">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Exercise</th>
                        <th scope="col">Distance (KM)</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($distancestats as $distancestat)
                        <tr>
                            <th scope="row">{{ $distancestat->exercise->name }}</th>
                            <td>{{ $distancestat->distance }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
              </div>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        @endisset

        @isset($timestats)
        <div class="card" style="width: 22rem;">
            <div class="card-body">
                <h5 class="card-title">Time</h5>
                <div class="card-text">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Exercise</th>
                            <th scope="col">Time (Seconds)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($timestats as $timestat)
                            <tr>
                                <th scope="row">{{ $timestat->exercise->name }}</th>
                                <td>{{ $timestat->time }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        @endisset

        @isset($weightstats)
        <div class="card" style="width: 22rem;">
            <div class="card-body">
                <h5 class="card-title">Weight 1RM</h5>
                <div class="card-text">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Exercise</th>
                            <th scope="col">Weight (KG)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($weightstats as $weightstat)
                            <tr>
                                <th scope="row">{{ $weightstat->exercise->name }}</th>
                                <td>{{ $weightstat->weight }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        @endisset

    </div>
</div>
@endsection

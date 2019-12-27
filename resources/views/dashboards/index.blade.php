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

    </div>
</div>
@endsection

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

                <p>You are logged in!</p>

                <p>Stats will be shown here, recent workout logs, graphs (1RM etc).</p>
            </div>
        </div>
    </div>
</div>
@endsection

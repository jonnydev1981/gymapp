@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">Edit an Exercise</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <p>Edit an exercise.</p>
            </div>
        </div>
    </div>
</div>
@endsection

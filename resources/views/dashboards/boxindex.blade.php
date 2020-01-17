@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h5>Box Dashboard</h5>
    </div>

    <div class="row justify-content-center">
        <div class="card" style="width: 32rem;">
            <div class="card-body">
              <h5 class="card-title">Members</h5>
              <div class="card-text">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <th scope="row">{{ $member->name }}</th>
                            <td>{{ $member->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
              </div>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="card" style="width: 32rem;">
            <div class="card-body">
                <h5 class="card-title">WODs</h5>
                <div class="card-text">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Description</th>
                            <th scope="col">Style</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($wods as $wod)
                            <tr>
                                <th scope="row">{{ $wod->description }}</th>
                                <td>{{ $wod->style->style }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

    </div>
</div>
@endsection

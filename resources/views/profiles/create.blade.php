@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Create Profile</h1>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif

                <div class="col-sm-12">
                    @if(session()->get('success'))
                        <div class="alert alert-success">
                        {{ session()->get('success') }}
                        </div>
                    @endif
                </div>

                <form method="post" action="{{ route('profiles.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="gravatar">Gravatar</label>
                        <input type="file" class="form-control-file" name="gravatar" id="gravatar">
                        <input type="hidden" class="form-control" name="id" id="id" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea class="form-control" name="bio" id="bio" rows="3">

                        </textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection

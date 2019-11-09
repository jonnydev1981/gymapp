@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Profile</h1>
                
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">First Name</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="John">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Surname</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Doe">
                    </div>

                    <div class="form-group">
                        <label for="gravatar">Gravatar</label>
                        <input type="file" class="form-control-file" id="gravatar">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email Address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Bio</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    
                </form>
            </div>
        </div>
        
    </div>
@endsection
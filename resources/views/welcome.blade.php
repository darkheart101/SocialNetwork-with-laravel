@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
 <div class="container">
            
            <div class="row">
                <div class="col-md-6">
                    <h3>Sign Up</h3>
                    <form action="#" method="post">
                        <div class="form-group {{ $errors->has('email') ? 'has-error': ''}}">
                            <label for="email">Your E-Mail</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email')}}">
                        </div>                        
                        <div class="form-group">
                            <label for="first_name">Your First Name</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Your Password</label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
                <div class="col-md-6">
                    <h3>Sign In</h3>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="email">Your E-Mail</label>
                            <input class="form-control" type="text" name="email" id="email">
                        </div>                        

                        <div class="form-group">
                            <label for="passowrd">Your Password</label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </div>
@endsection
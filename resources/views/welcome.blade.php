@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
 <div class="container">
            <div class="row">
                <div class="col-md-12">
                <img src="{{ URL::asset("img/map.jpg") }}" class="img-responsive"/>
                </div>
            </div>
            @if (count($errors) > 0)
            <div class="row">
                <div class="col-md-12">            
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div> 
                </div>
            </div>     
            @endif   
            @if(Session::has('message'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <ul>    
                            <li>{{ Session::get('message') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <h3>Sign Up</h3>
                    <form action="signup" method="post">
                        <div class="form-group ">
                            <label for="email">Your E-Mail</label>
                            <input class="form-control" type="text" name="email" id="email" value="">
                        </div>                        
                        <div class="form-group">
                            <label for="first_name">Your First Name</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="">
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
                    <form action="signin" method="post">
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
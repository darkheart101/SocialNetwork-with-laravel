@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
 <div class="container">
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
                    <label for="last_name">Your Last Name</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Date of Birth">
                </div>
                <div class="form-group">
                    <label class="col-xs-3 control-label">Sex</label>
                    <div class="col-xs-9">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default">
                                <input type="radio" name="sex" value="male" /> Male
                            </label>
                            <label class="btn btn-default">
                                <input type="radio" name="sex" value="female" /> Female
                            </label>
                        </div>
                    </div>
                </div>      
                <br/>  <br/>                 
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h2>The Social Network</h2>    
            <img src="{{ URL::asset("img/map.jpg") }}" class="img-responsive"/>
        </div>
    </div>
</div>
@endsection
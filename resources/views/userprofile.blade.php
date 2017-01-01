@extends('layouts.master')

@section('title')
The Social Network
@endsection

@section('content')
<style>
body
{
    font-family: 'Open Sans', sans-serif;
}

.fb-profile img.fb-image-lg{
    z-index: 0;
    width: 100%;  
    margin-bottom: 10px;
}

.fb-image-profile
{
    margin: -270px 10px 0px 50px;
    z-index: 9;
    width: 20%; 
}


@media (max-width:768px)
{
    
.fb-profile-text>h1{
    font-weight: 700;
    font-size:16px;
}

.fb-image-profile
{
    margin: -45px 10px 0px 25px;
    z-index: 9;
    width: 20%; 
}
}
</style>

<div class="container">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/nightlife/5/" alt="Profile image example"/>

	    @if( $info['user']->profile_picture == "default.jpg")
	    	@if( $info['user']->sex == "Male")	            
	         	<img align="left" class="fb-image-profile thumbnail" src="{{ URL::asset("img/m/". $info['user']->profile_picture) }}" alt="Profile image example"/> 
	       	@endif
	       	@if($info['user']->sex == "Female")	           

	        	<img align="left" class="fb-image-profile thumbnail" src="{{ URL::asset("img/f/". $info['user']->profile_picture) }}" alt="Profile image example"/>
	       	@endif
	    	@else
				<img align="left" class="fb-image-profile thumbnail" src="{{ route('account.image', $info['user']->profile_picture) }}" alt="Profile image example"/>
	    	@endif         
        
        <div class="fb-profile-text">
            <h1>{{ $info['user']->first_name }} {{ $info['user']->last_name }}</h1>

        </div>
    </div>
    <div class = "row">
    	
    	<div class = "col-md-4">
    		<h4>Profile</h2>
	    	<b>Sex:</b> {{ $info['user']->sex }} <br/>
	    	<b>Birthday:</b> {{ $info['user']->birthday }} <br/>
	    	<b>Email:</b> {{ $info['user']->email }} <br/>
    	</div>
    	<div class = "col-md-2">
    		
    	</div>

    </div>
</div> <!-- /container -->  
@endsection
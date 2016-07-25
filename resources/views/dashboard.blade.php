	@extends('layouts.master')

	@section('title')
	Logged In
	@endsection

	@section('content')
 	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
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
                    	<div class="alert alert-success">
                        	<ul>    
                            	<li>{{ Session::get('message') }}</li>
                        	</ul>
                    	</div>
                	</div>
            	</div>
            	@endif 			
				<form method="post" action="poststatus">
					<fieldset class="form-group">
						<label for="status">What's on your mind...</label>
						<textarea class="form-control" name="status" id="status" rows="3"></textarea>
					</fieldset>
					<button type="submit" class="btn btn-primary">Post</button>
					<input type="hidden" name="_token" value="{{ Session::token() }}">
				</form>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<hr>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			@foreach($posts as $post)
				<p>{{ $post->body }}</p>
				<small><b>Posted by</b> {{ $post->user->first_name }} on <i>{{ $post->created_at->format('Y-m-d') }}</i></small>
				<p><a data-toggle="modal" data-target="#myModal" href="#">Like</a> 
				@if(Auth::user() == $post->user)	
					| <a data-toggle="modal" id="edit" data-target="#myModal" href="#">Edit </a> | <a href="{{ 
					url('deletestatus/'.$post->id)
					}}">Delete</a></p>
				@endif

			@endforeach
			</div>
		</div>
	</div>
	<script>
		//TODO: get the edit body value
		
	</script>
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
	    <!-- Modal content-->
	    	<div class="modal-content">
	    		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Edit your status</h4>
	      		</div>
	      		<div class="modal-body">
	        		<p>{{ $post->body }}</p>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
	 	</div>
	</div>

	@endsection
	@extends('layouts.master')

	@section('title')
	Logged In
	@endsection

	@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
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
			@endforeach
			</div>
		</div>
	</div>



	@endsection
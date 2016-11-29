@extends('layouts.master')

@section('title')
The Social Network
@endsection

@section('content')
  
  {{ $user->first_name }} <br/>
  {{ $user->last_name }} <br/>
  {{ $user->email }} <br/>
  {{ $user->birthday }} <br/>
@endsection
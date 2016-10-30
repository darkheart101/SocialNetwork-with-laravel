@extends('layouts.master')

@section('title')
The Social Network
@endsection

@section('content')
<style>
.user-row {
  margin-bottom: 14px;
}

.user-row:last-child {
  margin-bottom: 0;
}

.dropdown-user {
  margin: 13px 0;
  padding: 5px;
  height: 100%;
}

.dropdown-user:hover {
  cursor: pointer;
}

.table-user-information > tbody > tr {
  border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
  border-top: 0;
}


.table-user-information > tbody > tr > td {
  border-top: 0;
}
.toppad
{margin-top:20px;
}

</style>
<script>
$(document).ready(function() {
  var panels = $('.user-infos');
  var panelsButton = $('.dropdown-user');
  panels.hide();

  //Click dropdown
  panelsButton.click(function() {
      //get data-for attribute
      var dataFor = $(this).attr('data-for');
      var idFor = $(dataFor);

      //current button
      var currentButton = $(this);
      idFor.slideToggle(400, function() {
          //Completed slidetoggle
          if(idFor.is(':visible'))
          {
            currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
          }
          else
          {
            currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
          }
        })
    });


  $('[data-toggle="tooltip"]').tooltip();


});
</script>
<div class="container">
<div class="row">

 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Edit Profile</h3>
    </div>
    <div class="panel-body">
      <div class="row">
            @if(Auth::user()->sex == "Male")
            
          <div class="col-md-3 col-lg-3 " align="center"> 
          <img alt="User Pic" src="{{ URL::asset("img/m/". Auth::user()->profile_picture) }}" class="img-circle img-responsive"> 
          <!--<img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> -->
          </div>
     @endif
     @if(Auth::user()->sex == "Female")
          
          <div class="col-md-3 col-lg-3 " align="center"> 
          <img alt="User Pic" src="{{ URL::asset("img/f/". Auth::user()->profile_picture) }}" class="img-circle img-responsive"> 
          <!--<img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> -->
          </div>
     @endif
        
              <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                <dl>
                  <dt>DEPARTMENT:</dt>
                  <dd>Administrator</dd>
                  <dt>HIRE DATE</dt>
                  <dd>11/12/2013</dd>
                  <dt>DATE OF BIRTH</dt>
                     <dd>11/12/2013</dd>
                  <dt>GENDER</dt>
                  <dd>Male</dd>
                </dl>
              </div>-->
              <div class=" col-md-9 col-lg-9 "> 
              <form method="post" action="edityourprofile">
<div class="form-group">
  <label for="first_name">Name:</label>
  <input  class="form-control" type="text" name="first_name" id="first_name" placeholder="{{ Auth::user()->first_name }}">
  <label for="last_name">Last Name:</label>
  <input class="form-control" type="text" name="last_name" id="last_name" placeholder="{{ Auth::user()->last_name }}">

</div>
<div class="form-group">
  <div class="btn-group" data-toggle="buttons">
                            @if(Auth::user()->sex == "Male")
                              <label class="btn btn-default active">
                            @else
                              <label class="btn btn-default">
                            @endif
                                <input type="radio" name="sex" value="male" /> Male
                            </label>
                            @if(Auth::user()->sex == "Female")
                              <label class="btn btn-default active">
                            @else
                              <label class="btn btn-default">
                            @endif
                                <input type="radio" name="sex" value="female" /> Female
                            </label>
</div>
</div>
<!--
<div class="form-group">
  <label for="exampleInputPassword1">Password</label>
  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>


<div class="form-group">
  <label for="exampleInputFile">File input</label>
  <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
  <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
</div> -->

<button type="submit" class="btn btn-primary">Submit</button>
<input type="hidden" name="_token" value="{{ Session::token() }}">
<input type="hidden" name="userid" value="{{ Auth::user()->id }}">
</form>

            </div>
          </div>
        </div>
        <div class="panel-footer">

        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
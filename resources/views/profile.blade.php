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

    $('button').click(function(e) {
      e.preventDefault();
      alert("This is a demo.\n :-)");
    });
  });
</script>
<div class="container">
  <div class="row">
    <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
     <A href="edit.html" >Edit Profile</A>

     <A href="edit.html" >Logout</A>
     <br>
     <p class=" text-info">May 05,2014,03:00 pm </p>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
     
     
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Profile</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
          
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
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td>{{ Auth::user()->first_name }}  </td>
                      </tr>
                      <tr>
                        <td>Last Name:</td>
                        <td>{{ Auth::user()->last_name }}</td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>{{ Auth::user()->birthday }}</td>
                      </tr>
                      
                      <tr>
                       <tr>
                        <td>Gender</td>
                        <td>{{ Auth::user()->sex }}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></td>
                      </tr>
                      
                      
                    </tbody>
                  </table>
                  <!--
                  <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>
                -->
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
            <span class="pull-right">
              <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
              <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            </span>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  @endsection
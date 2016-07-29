<header>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{ URL::asset("img/tsn.jpg") }}"/></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right"   >
            @if (Auth::user())
              <li><a href="profile">{{ Auth::user()->first_name }}</a></li>
              <li><a href="dashboard">Home</a></li>
              <li><a href="logout">Logout</a></li>
            @else
              <li>
                <form class="form-inline" action="signin" method="post">
                  <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email">
                  </div>                        

                  <div class="form-group">
                    <label for="passowrd">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                  </div>
                  <button type="submit" class="btn btn-primary">Log In</button>
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
              </li>  
            @endif  
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>
  </div>
</div>

</header>
@extends('layouts.main')
@section('content')	

<h2>Help</h2>

@unless (Auth::check())
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Registration
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
       <p>If you are using our site for the first time, you have to create a new account.</p>
	   <p>For creating a new account, click the sign up button on the home page, then enter all required information.</p>
	   <p>Then you can use your email and password to login.</p>
	   <p><td><a href="users/register">Go to 'Sign up' Page</a></td></p>
	  </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Login
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <p>Use the login field to login. You have to enter proper username and password</p>
        <p><td><a href="users/login">Go to 'Login' Page</a></td></p>
      </div>
    </div>
  </div>
@endunless

@if (Auth::check())
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
         	View Progress
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <p></p>
      </div>
    </div>
  </div>
</div>
@endif
@stop
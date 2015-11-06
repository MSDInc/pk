@extends('layout.basic-minimal') @section('content')

<div class="row">
  <div class="col-lg-6 col-md-7 col-sm-6 col-lg-offset-3 col-md-offset-3
    col-sm-offset-3">
    <h1>Pustakalaya <i class="glyphicon glyphicon-book"></i></h1>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
    <h2>Log in</h2>
  </div>
</div>

<div class="contact-form">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">

      <form class="form-horizontal" action="{{URL::to('/login')}}" method="POST">
        <fieldset>

          <div class="form-group">
            <!--<label for="inputEmail" class="control-label">Email</label> -->
            <div class="col-lg-10">
              <input class="form-control" id="inputEmail" placeholder="Email" type="text" name="email" autofocus="autofocus" required>
            </div>
          </div>

          <div class="form-group">
            <!-- <label for="inputPassword" class="control-label">Password</label> -->
            <div class="col-lg-10">
              <input class="form-control" id="inputPassword" placeholder="Password" type="password" name="password" required>

              <div class="col-lg-6">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Remember me </label>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="help-block pull-right">
                  <a href="{{{ URL::to('/resetpassword') }}}">Forgot Password?</a>
                </div>
              </div>
            </div>

          </div>
    <div class="col-lg-10">
      @include('layout.alertbox')
    </div>

          <div class="form-group">
            <div class="col-lg-10">
              <button type="submit" class="btn btn-primary pull-right">
                Log In
              </button>
            </div>
          </div>

        </fieldset>
      </form>

    </div>
  </div>
</div>

@stop

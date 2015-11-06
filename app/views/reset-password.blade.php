@extends('layout.basic')
@section('content')

<div class="row">
  <div class="col-lg-6 col-md-7 col-sm-6">
    <h2>Reset your password</h2>
  </div>
</div>

<hr>

<div class="contact-form">
  <div class="row">
    <div class="col-lg-8">
      <form class="form-horizontal">
        <fieldset>

          <div class="form-group">
            <label for="inputUsername" class="col-lg-4 control-label">Username</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputUsername" placeholder="Username" type="text">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail" class="col-lg-4 control-label">Email</label>
            <div class="col-lg-8">
              <input class="form-control" id="inputEmail" placeholder="Email" type="text">
            </div>
          </div>

          @include ('layout.submitbtn')

        </fieldset>
      </form>
    </div>

    @include('layout.alertbox')

  </div>
</div>

@stop

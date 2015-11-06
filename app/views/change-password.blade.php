@extends('layout.basic')
@section('content')

<div class="row">
  <div class="col-lg-6">
    <h2>Change your password</h2>
  </div>
</div>

<hr>

<div class="contact-form">
  <div class="row">
    <div class="col-lg-8">
      <form class="form-horizontal">
        <fieldset>
          <div class="form-group">
            <label for="inputPasswordNew" class="col-lg-4 control-label"> New Password </label>
            <div class="col-lg-8">
              <input class="form-control" id="inputPasswordNew" placeholder="New Password" type="password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPasswordConfirm" class="col-lg-4 control-label"> Confirm Password </label>
            <div class="col-lg-8">
              <input class="form-control" id="inputPasswordConfirm" placeholder="New Password" type="password">
            </div>
          </div>

          @include ('layout.submitbtn')

        </fieldset>
      </form>
    </div>

    <div class="col-lg-4">
    @include('layout.alertbox')
    </div>

  </div>
</div>

@stop

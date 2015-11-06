@extends('layout.basic')

@section('content')

<div class="row">
  <div class="col-lg-8 col-md-7 col-sm-6">
    <h2>Contact Us</h2>
    <p class="lead">Send us your queries here.</p>
  </div>
</div>

<div class="contact-form">
  <div class="row">
    <div class="col-lg-8">
      <form class="form-horizontal">
        <fieldset>
          <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Comment</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="3" id="inputComments" placeholder="Your comment"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-10">
              <input class="form-control" id="inputName" placeholder="Name" type="text">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
              <input class="form-control" id="inputEmail" placeholder="Email" type="email">
            </div>
          </div>

            @include ('layout.submitbtn')

        </fieldset>
      </form>
    </div>

    <div class="col-lg-4">
    @include ('layout.alertbox')
    </div

  </div>
</div>

@stop

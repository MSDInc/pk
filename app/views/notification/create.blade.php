@extends('layout.basic')

@section('content')

<div class="row">
  <div class="col-lg-8 col-md-7 col-sm-6">

    <h2>Notification</h2>
    @if ($forupdate)
    <p class="lead">Edit a notification</p>
    @else
    <p class="lead">Create a new notification</p>
    @endif
  </div>
</div>

<div class="contact-form">
  <div class="row">
    <div class="col-lg-8">
      <form class="form-horizontal" method="POST"
        @if ($forupdate)
        action="/notification/{{$notification->id}}"
        @else
        action="/notification"
        @endif
        >
        @if ($forupdate)
        <input type="hidden" name="_method" value="put">
        @endif
        <fieldset>
          <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Content</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="3" id="inputContent"
                placeholder="Your notification" name="content">{{$notification->content}}</textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputStartdate" class="col-lg-2 control-label">Start Date</label>
            <div class="col-lg-10">
              <input class="form-control" id="inputStartdate"
                placeholder="Start date (Y-m-d)" type="date" name="start"
                value="{{$notification->start}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputExpirydate" class="col-lg-2 control-label">Expiry Date</label>
            <div class="col-lg-10">
              <input class="form-control" id="inputExpirydate"
                placeholder="Expiry date (Y-m-d)" type="date" name="end"
                value="{{$notification->end}}">
            </div>
          </div>

          @include ('layout.submitbtn')

        </fieldset>
      </form>

    </div>

    <div class="col-lg-4">
    @include ('layout.alertbox')
    </div>

  </div>
</div>

@stop

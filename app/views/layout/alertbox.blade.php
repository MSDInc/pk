<?php
if (Request::is('/')) {
  $messages = array_merge(Session::get('messages',array()),
    NotificationController::getCurrentAsMessages());
} else {
  $messages = Session::get('messages',array());
}
?>
@if (isset($messages))

<div class="row">
<div class="col-lg-12">
  @foreach ($messages as $msg)
  @if ($msg[0]=='notice')
  <div class="alert alert-dismissable alert-success">
  @elseif ($msg[0]=='error')
  <div class="alert alert-dismissable alert-danger">
  @elseif ($msg[0]=='warning')
  <div class="alert alert-dismissable alert-warning">
  @endif
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{$msg[1]}}
  </div>
  @endforeach
</div>
</div>
@endif

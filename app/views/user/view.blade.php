@extends('layout.basic')

<!-- position:fixed;
    margin-left:170px;
    margin-top:-30px;
    display:block;
    background-color:red;
    color:white; -->



@section('content')
<div class="row">
  <div class="col-lg-4" >
    <h2>
    @if ($user->isStudent())
        {{"0".$stdinfo->batch."-".
        $stdinfo->department_sname."-".
        $stdinfo->rollnumber}}
    @elseif ($user->isAdmin())
        @if (Auth::user()->id==$user->id)
            Dashboard
        @else
            Admin
        @endif
    @elseif ($user->isLibrarian())
        Librarian
    @elseif ($user->isVerifier())
        Verifier
    @endif
    </h2>
  </div>

@if ( Request::is('/')  && Auth::user()->isAdmin())
  <div class="col-lg-8">
    <h4>
      <ul class="nav nav-pills" role="tablist">
      <li><a href="{{URL::to('/book')}}"><small><span class="glyphicon glyphicon-book" aria-hidden="true"></span></small> Book </a></li>
      <li><a href="{{URL::to('/user')}}"><small><span class="glyphicon glyphicon-user" aria-hidden="true"></span></small> User</a></li>
      <li><a href="{{URL::to('/notification')}}"><small><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></small> Notification</a></li>
      <li><a href="{{URL::to('/query')}}"><small><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></small> <span class="badge">3</span>Query</a></li>
      <li><a href="{{URL::to('/request')}}"><small><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></small> <span class="badge">3</span>Request</a></li>
    </ul>
    </h4>
  </div>
@endif


</div>

<div class="row">
  <div class="col-lg-4">
    @include ('user.info')

    @if (Auth::user()->isLibrarian())
      @include ('user.librarianform')
    @elseif (Auth::user()->isVerifier())
      @include ('user.verifierform')
    @endif

      @include ('user.history')

  </div>

  <div class="col-lg-8">
  @include ('layout.alertbox')

  @if ($user->isStudent())
    @include ('user.student.content')
  @elseif ($user->isAdmin())
    @include ('user.admin.content')
  @endif

  @if ( Request::is('/') )
    @include ('user.recommendation')
  @endif

  </div>
</div>
@stop

@section('scriptcontent')
@if ( Auth::user()->isLibrarian())
function submitIssue() {
  document.actionform.action = "/action/issue";
  return document.actionform.submit();
}

function submitRenew() {
  document.actionform.action = "/action/renew";
  return document.actionform.submit();
}

function submitReturn() {
  document.actionform.action = "/action/return";
  return document.actionform.submit();
}
@elseif ( Auth::user()->isVerifier())
function submitVerify() {
  document.actionform.action = "/action/issue";
  return document.actionform.submit();
}
@endif
@stop

@section ('scripts')
@if ( Request::is('/') && Auth::user()->isAdmin())
{{ HTML::script('js/plugins/morris/morris-data.js') }}
{{ HTML::script('js/plugins/morris/morris.min.js') }}
{{ HTML::script('js/plugins/morris/morris.js') }}
{{ HTML::script('js/plugins/morris/raphael.min.js') }}
@endif
@stop

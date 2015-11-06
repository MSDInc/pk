@extends('layout.basic')
@section('content')
<div id="banner" class="page-header">
</div>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 text-center">
    <h2 >404</h2>
    <p class="lead">Page not found!</p>
    <p>I would like to go back <a href="{{ URL::to('/') }}"> home.</a></p>
  </div>
</div>
@stop

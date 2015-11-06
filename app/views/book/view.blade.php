@extends('layout.basic') @section('content')

<div class="row">
  <div class="col-lg-4">
    <h2>
    {{ $book->isbn}}
       </h2>
  </div>
</div>

<div class="row">
  <div class="col-lg-4">


    <div class="panel panel-default">
      <div class="panel-heading">Basic information
      @if (Auth::user()->isAdmin())
        <div class="bs-component pull-right">
          <a href="{{URL::to('book/'.$book->isbn.'/edit') }}" class="" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit">
            <span class="glyphicon glyphicon-edit"> </span>
          </a>
          <a href="#" class="" data-toggle="tooltip"
            data-placement="bottom" title=""
            data-original-title="Delete" onclick="document.df.submit()">
            <span class="glyphicon glyphicon-trash"> </span>
          </a>
          <form action="/book/{{$book->isbn}}" method="POST" name="df">
            <input type="hidden" name="_method" value="delete">
          </form>
        </div>
        @endif
      </div>

      <ul class="list-group">
        <li class="list-group-item lead">
          {{{ $book->name }}}

        </li>
        <li class="list-group-item">
          {{{ $book->author }}}
        </li>
        <li class="list-group-item">
          {{{ $book->publisher }}}
        </li>
        <li class="list-group-item">
          {{ $book->type_name }}
        </li>
      </ul>
    </div>
    @include ('user.history')
  </div>
  <div class="col-lg-8">
    @include ('layout.alertbox') @include ('book.content') @include ('book.similar')
  </div>
</div>
@stop

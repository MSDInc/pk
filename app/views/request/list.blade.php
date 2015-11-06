@extends('layout.basic') @section('content')

<?php

class Test
{
    public $id=2;
    public $name="book2";
    public $author="hari";
    public $count=1;
}
$user1 = new Test;
$user2 = new Test;
$user2->id = "1";
$user2->name = "book1";
$user2->author = "Harishin";
$user2->count = 5;
$requests = array($user1,$user2);
?>

<div class="row">
  <div class="col-lg-6 col-md-7 col-sm-6">
    <h2>List</h2>
  </div>
</div>

<div class="list-table ">

  @include ('layout.alertbox')

  <div class="row">
    <div class="col-lg-12">

      <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-share-alt"></span> Requests </div>

        @if (count($requests)==0)
        <div class="panel-body text-center">
            None
        </div>
        @else
        <table class="table table table-hover ">
          <thead>
            <tr>
              <th>Id</th>
              <th>Book</th>
              <th>Author</th>
              <th>Count</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($requests as $request)
            <tr>
              <td class="">{{{$request->id}}}</td>
              <td class="">{{{$request->name}}}</td>
              <td class="">{{{$request->author}}}</td>
              <td class="">
                {{{$request->count}}}
              </td>
            <td class="">
        <div class="bs-component pull-right">
          <a href="" class="" data-toggle="tooltip"
            data-placement="bottom" title="" data-original-title="Delete">
            <span class="glyphicon glyphicon-trash"> </span>
          </a>
        </div>

           </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </div>


  <div id="pagination-block">
    <div class="row">
      <div class="col-lg-12">{{--$requests->links()--}}</div>
    </div>
  </div>

</div>

@stop

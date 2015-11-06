@extends('layout.basic') @section('content')

<?php

class Test
{
    public $id=10;
    public $name="hari";
    public $email="mail@mail.com";
    public $content="I want pie";
    public $read=false;
}
$user1 = new Test;
$user2 = new Test;
$user2->id = "1";
$user2->name = "shaym";
$user2->email = "hari@shyam.com";
$user2->content = "I want new books.For performance reasons, all icons require a base class and individual icon class.";
$user2->read = true;
$queries = array($user1,$user2);
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
        <div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Queries </div>

        @if (count($queries)==0)
        <div class="panel-body text-center">
            None
        </div>
        @else
        <table class="table table table-hover ">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Content</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($queries as $query)
            <tr 
                @if ($query->read)
                    class="info"
                @endif
                >
              <td class="">{{{$query->id}}}</td>
              <td class="">{{{$query->name}}}</td>
              <td class="">{{{$query->email}}}</td>
              <td class="">
                {{{$query->content}}}
              </td>
            <td class="">
        <div class="bs-component pull-right">
          @if ($query->read)
          <a href="" class="" data-toggle="tooltip"
            data-placement="bottom" title="" data-original-title="Mark read">
            <span class="glyphicon glyphicon-unchecked"> </span>
          @else
          <a href="" class="" data-toggle="tooltip"
            data-placement="bottom" title="" data-original-title="Mark unread">
            <span class="glyphicon glyphicon-check"> </span>
          @endif
          </a>
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
      <div class="col-lg-12">{{--$queries->links()--}}</div>
    </div>
  </div>

</div>

@stop

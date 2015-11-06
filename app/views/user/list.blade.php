@extends('layout.basic') @section('content')

<!--
    <span class="btn btn-default btn-file">
    Browse <input type="file">
    </span>
-->

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
        <div class="panel-heading">
        <span class="glyphicon glyphicon-user"></span>
         Users

        @if (Auth::user()->isAdmin())

    <div class="btn-group pull-right">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <span class="glyphicon glyphicon-plus"> </span>
      </a>
      <ul class="dropdown-menu">
        <li><a href="{{URL::to('user/create?type=student')}}">Student</a>
        </li>
        <li><a href="{{URL::to('user/create?type=admin')}}">Admin</a>
        </li>
        <li><a href="{{URL::to('user/create?type=librarian')}}">Librarian</a>
        </li>
        <li><a href="{{URL::to('user/create?type=verifier')}}">Verifier</a>
        </li>
      </ul>
    </div>




        @endif

        </div>

        @if (count($users)==0)
        <div class="panel-body text-center">
          None
        </div>
        @else
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Role</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $usr)
            <tr>
              <td>{{$usr->id}}</td>
              <td>
                <a href="{{URL::to('user').'/'.$usr->id}}">
                {{$usr->name}}
                </a>
              </td>
              <td>{{$usr->role_name}}</td>
              <td>{{$usr->email}}</td>
              <td>{{$usr->phone}}</td>
              <td>{{$usr->address}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>

    <div class="col-lg-12">
      <div id="pagination-block">
        <div class="col-lg-12">
          {{$users->links()}}
        </div>
      </div>
    </div>

  </div>
</div>
@stop

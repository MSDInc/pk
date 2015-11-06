@extends('layout.basic') @section('content')

<div class="row">
  <div class="col-lg-6">
    <!-- Send message to identify that new bookitems have been added -->
    <h2>List</h2>
  </div>
</div>

<div class="list-table ">

    @include ('layout.alertbox')

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-book"></span> Book items </div>

        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th>ID</th>
              <th>ISBN</th>
              <th>Name</th>
              <th>Author</th>
              <th>Type</th>
              <th>Edition</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bookitems as $bookitem)
            <tr>
              <td>{{$bookitem->id}}</td>
              <td>{{{$bookitem->book_isbn}}}</td>
              <td>{{{$bookitem->book->name}}}</td>
              <td>{{{$bookitem->book->author}}}</td>
              <td>{{{$bookitem->book->type_name}}}</td>
              <td>{{{$bookitem->edition}}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @include('layout.alertbox')
</div>
@stop

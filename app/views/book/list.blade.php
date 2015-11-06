@extends('layout.basic') @section('content')

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
            <span class="glyphicon glyphicon-book"></span>
            Books

      @if (Auth::user()->isAdmin())
        <div class="bs-component pull-right">
          <a href="{{URL::to('book/create')}}" class="" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add a book">
            <span class="glyphicon glyphicon-plus"> </span>
          </a>
        </div>
        @endif

        </div>

        @if (count($books)==0)
        <div class="panel-body text-center">
            None
        </div>
        @else
        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th>ISBN</th>
              <th>Title</th>
              <th>Author</th>
              <th>Publisher</th>
              <th>Type</th>
              <th>Available</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($books as $book)
            <tr>
              <td>{{{$book->isbn}}}</td>
              <td>
                <a href="{{URL::to('book').'/'.$book->isbn}}">
                {{{$book->name}}}
                </a>
              </td>
              <td>{{{$book->author}}}</td>
              <td>{{{$book->publisher}}}</td>
              <td>{{{$book->type_name}}}</td>
              <!-- Maybe get total books and books available here -->
              <td>{{$book->bookitems->count()}}</td>
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
      <div class="col-lg-12">{{$books->links()}}</div>
    </div>
  </div>

</div>

@stop

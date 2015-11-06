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
        <span class="glyphicon glyphicon-bell"></span>
        Notifications
        @if (Auth::user()->isAdmin())
        <div class="bs-component pull-right">
          <a href="{{URL::to('notification/create')}}" class="" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add a notification">
            <span class="glyphicon glyphicon-plus"> </span>
          </a>
        </div>
        @endif
        </div>



        @if (count($notifications)==0)
        <div class="panel-body text-center">
            None
        </div>
        @else
        <table class="table table table-hover ">
          <thead>
            <tr>
              <th>Id</th>
              <th>Authored by</th>
              <th>Content</th>
              <th>Start date</th>
              <th>Expiry date</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($notifications as $notification)
            <tr 
                @if ($notification->active)
                    class="warning"
                @endif
                >
              <td class="">{{{$notification->id}}}</td>
              <td class="">{{{$notification->author->name}}}</td>
              <td class="">{{{$notification->content}}}</td>
              <td class="">{{{$notification->start}}}</td>
              <td class="">{{{$notification->end}}}</td>
            <td class="">
        <div class="bs-component pull-right">
          <form action="/notification/{{$notification->id}}"
                method="POST" name="delete{{$notification->id}}">
                <input type="hidden" name="_method" value="delete">
          </form>

        <a href="{{'/notification/'.$notification->id.'/edit'}}" class="" data-toggle="tooltip"
            data-placement="bottom" title=""
            data-original-title="Edit"
            >
            <span class="glyphicon glyphicon-edit"> </span>
          </a>


          <a href="#" class="" data-toggle="tooltip"
            data-placement="bottom" title=""
            data-original-title="Delete"
            onClick="document.delete{{$notification->id}}.submit()">
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
      <div class="col-lg-12">{{--$notifications->links()--}}</div>
    </div>
  </div>

</div>

@stop

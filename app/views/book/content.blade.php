<div class="books-table">
  <div class="panel panel-default">
    <div class="panel-heading"> Books 

      @if (Auth::user()->isAdmin())
            <div class="bs-component pull-right">
          <a href="{{URL::to('bookitem/create?isbn='.$book->isbn) }}"  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add">
            <span class="glyphicon glyphicon-plus"> </span>
          </a>
            </div>
    @endif

</div>

        @if (count($book->bookitems)==0)
        <div class="panel-body text-center">
            None
        </div>
        @else

    <table class="table table-hover ">
      <thead>
        <tr>
          <th>Id</th>
          <th>Edition</th>
          <th>Assigned To</th>
          <th>Issue Date</th>
          <th>Expiry Date</th>
            @if (Auth::user()->isAdmin())
          <th></th>
            @endif
        </tr>
      </thead>
      <tbody>

        @foreach ($book->bookitems as $bookitem)
          <?php
            if (isset($bookitem->assigned_to)){
            $assigned = strtotime( $bookitem->assigned_date );
            $expired = strtotime( $bookitem->assigned_date . " + {$bookitem->book->booktype->expiry} days");
            $today = strtotime( date("Y-m-d H:i:s")."+ 100 days");
            $days = floor(($today - $expired)/(60*60*24));
            $fine = $days>0 ? $days : 0;
            }
          ?>
          <tr @if (isset($bookitem->assigned_to) && $fine) class="warning" @endif >
          <td>{{$bookitem->id}}</td>
          <td>{{$bookitem->edition}}</td>
            @if (isset($bookitem->assigned_to))
          <td>
              <a href="{{URL::to('user/'.$bookitem->user['id'])}}">
              {{$bookitem->user['name']}}
              </a>
          </td>
          <td>{{ date("Y.m.d",$assigned) }}</td>
          <td>{{ date("Y.m.d",$expired) }}</td>
            @else
            <td>-</td>
            <td>-</td>
            <td>-</td>
            @endif

            @if (Auth::user()->isAdmin())
          <td>
            <div class="bs-component">
              <a href="" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete">
                <span class="glyphicon glyphicon-trash"></span>
              </a>
            </div>
          </td>
            @endif

        </tr>
        @endforeach
      </tbody>
    </table>
        @endif
  </div>
</div>

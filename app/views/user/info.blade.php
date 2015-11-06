  <div class="panel panel-default">
    <div class="panel-heading">Basic information
      @if (Auth::user()->isAdmin() && Auth::user()->id!=$user->id)
      <div class="bs-component pull-right">
        <a href="{{URL::to('/user/'.$user->id.'/edit') }}" class="" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit">
          <span class="glyphicon glyphicon-edit"> </span>
        </a>
        <a href="#" class="" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete" onclick="document.df.submit()">
          <span class="glyphicon glyphicon-trash"> </span>
        </a>
      </div>
      <form action="/user/{{$user->id}}" method="POST" name="df">
        <input type="hidden" name="_method" value="delete">
      </form>
      @endif

    </div>
    <ul class="list-group">
      <li class="list-group-item lead">
        {{{$user->name}}}
        @if ($user->isStudent() && $stdinfo->fineacc - $stdinfo->finepaid > 0)
          <span class="badge">
            @if ( !Auth::user()->isStudent() )
              <a href="#" class="badge"> Clear <b> रु {{$stdinfo->fineacc - $stdinfo->finepaid}} </b> </a>
            @else
              <b> रु {{$stdinfo->fineacc - $stdinfo->finepaid}} </b>
            @endif
          </span>
        @endif
        </li>
        <li class="list-group-item">
          {{{$user->email}}}
        </li>
        <li class="list-group-item">
          {{{$user->address}}}
        </li>
    </ul>
  </div>

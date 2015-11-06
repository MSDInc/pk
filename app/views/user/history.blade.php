<?php
  $itemtype = Request::segment(1);
  $itemid = Request::segment(2);
  if ($itemtype=='book') {
    $events = LogEvent::where('book_isbn','=',$itemid)->orderBy('id', 'desc')->get();
  } elseif ($itemtype=='user') {
    $events = LogEvent::where('user_id','=',$itemid)->orWhere(
      'actor_id','=',$itemid)->orderBy('id', 'desc')->get();
  } else {
    $itemid = Auth::user()->id;
    $events = LogEvent::where('user_id','=',$itemid)->orWhere(
      'actor_id','=',$itemid)->orderBy('id', 'desc')->get();
  }
?>

<div class="panel panel-default">
  <div class="panel-heading">History</div>
   @if (!isset($events) || $events->count()==0)
    <div class="panel-body text-center">
        None
    </div>
    @else
    <ul class="list-group">
        @foreach ($events as $event)
        <li class="list-group-item">
          {{ $event->pretty() }}
        </li>
        @endforeach
      </ul>
    @endif
</div>

<?php

// Model for the table logs
class LogEvent extends Eloquent {

  // Explicitly specify the table
  protected $table='events';

  // We don't need the default timestamps, we have our own
  public $timestamps=false;

  // Get the 'user' for this log event
  public function user() {
    return $this->belongsTo('User','user_id','id');
  }

  // Get the 'book' for this log event
  public function book() {
    return $this->belongsTo('Book','book_isbn','isbn');
  }

  // Get the 'actor' for this log event
  public function actor() {
    return $this->belongsTo('User','actor_id','id');
  }

  public function pretty() {
    $eventtype = explode('.',$this->type)[0];
    if ($eventtype=='user')
      return $this->prettyUser();
    elseif ($eventtype=='book')
      return $this->prettyBook();
    elseif ($eventtype=='bookitem')
      return $this->prettyBookitem();
  }

  public function pastTense($var){
    switch($var){
        case 'create' : return 'created';
        case 'delete' : return 'deleted';
        case 'edit' : return 'edited';
        case 'renew' : return 'renewed';
        case 'issue' : return 'issued';
        case 'return' : return 'returned';
        default: return $var;
    }
  }

  public function checkActionAdmin($var){
        return $var=='create' || $var=='delete' || $var=='edit';
  }
  public function checkActionLibrarian($var){
        return $var=='renew' || $var=='issue' || $var=='return';
  }

  public function prettyUser() {
    $what = implode('.',array_slice(explode('.',$this->type),1));
    $user = User::withTrashed()->find($this->user_id);
    $actor = User::withTrashed()->find($this->actor_id);

    if ($this->checkActionAdmin($what)) {
      return "<a href='/user/$actor->id'>$actor->name</a> "
      . $this->pastTense($what) ." user <a href='/user/$user->id'>$user->name</a>.";
    }
    return 'Some user methods are missing';
  }

  public function prettyBook() {
    $what = implode('.',array_slice(explode('.',$this->type),1));
    $book = Book::withTrashed()->find($this->book_isbn);
    $user = User::withTrashed()->find($this->user_id);

    /*
    if ($what=='create') {
      return "Book <a href='/book/$book->isbn'>$book->name</a> was
        created by <a href='/user/$user->id'>$user->name</a>";
    } elseif ($what=='delete') {
      return "Book <a href='/book/$book->isbn'>$book->name</a> was
        deleted by <a href='/user/$user->id'>$user->name</a>";
    } elseif ($what=='edit') {
      return "Book <a href='/book/$book->isbn'>$book->name</a> was
        updated by <a href='/user/$user->id'>$user->name</a>";
    } else
        return 'Some book methods are missing';
     */

    if ($this->checkActionAdmin($what)) {
      return "<a href='/user/$user->id'>$user->name</a> "
      . $this->pastTense($what) ." book <a href='/book/$book->isbn'>$book->name</a>.";
    }
    return 'Some user methods are missing';

  }

  public function prettyBookitem() {
    $what = implode('.',array_slice(explode('.',$this->type),1));
    $book = Book::find($this->book_isbn);
    $user = User::find($this->user_id);
    $actor = User::find($this->actor_id);
    if ($this->checkActionLibrarian($what)) {
      return "<a href='/user/$actor->id'>$actor->name</a> "
          .$this->pastTense($what)." <a href='/book/{$book->isbn}'>$book->name</a> for 
          <a href='/user/$user->id'>$user->name.</a>";
    }
    return "Some bookitem methods are missing";
  }

  // Event handler for all events
  public static function handle($userid, $bookid, $actorid) {
    $event = Event::firing();
    $event_str = implode('.',(array_slice(explode(".",$event),1)));
    $logevent = new LogEvent;
    $logevent->time = new DateTime;
    $logevent->type = $event_str;
    $logevent->user_id = $userid;
    $logevent->book_isbn = $bookid;
    $logevent->actor_id = $actorid;
    $logevent->save();
  }
}

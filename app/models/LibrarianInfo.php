<?php

// Model for the table librarianinfo
class LibrarianInfo extends Eloquent {

  // Explicitly specify the table
  protected $table='librarianinfo';

  // We don't need the default timestamps
  public $timestamps=false;

  // return the user associated with this LibrarianInfo
  public function user() {
    return $this->belongsTo('User','user_id','id');
  }
}

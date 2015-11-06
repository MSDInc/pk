<?php

// Model for the table admininfo
class AdminInfo extends Eloquent {

  // Explicitly specify the table
  protected $table='admininfo';

  // We don't need the default timestamps
  public $timestamps=false;

  // return the user associated with this AdminInfo
  public function user() {
    return $this->belongsTo('User','user_id','id');
  }
}

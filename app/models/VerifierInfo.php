<?php

// Model for the table verifierinfo
class VerifierInfo extends Eloquent {

  // Explicitly specify the table
  protected $table='verifierinfo';

  // We don't need the default timestamps
  public $timestamps=false;

  // return the user associated with this VerifierInfo
  public function user() {
    return $this->belongsTo('User','user_id','id');
  }
}

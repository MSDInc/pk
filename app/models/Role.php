<?php

// Model for the table roles
class Role extends Eloquent {

  // Explicitly specify the table
  protected $table='roles';

  // We don't need the default timestamps
  public $timestamps=false;

  // Get the users for this role
  public function users() {
    return $this->hasMany('User','role_name','name');
  }
}

<?php

// Model for the table studentinfo
class StudentInfo extends Eloquent {

  // Explicitly specify the table
  protected $table='studentinfo';

  // We don't need the default timestamps
  public $timestamps=false;

  // Get the department for this student
  public function department() {
    return $this->belongsTo('Department','department_sname',
      'shortname');
  }

  // return the user associated with this studentInfo
  public function user() {
    return $this->belongsTo('User','user_id','id');
  }
}

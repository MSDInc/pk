<?php

// Model for the table departments
class Department extends Eloquent {

  // Explicitly specify the table
  protected $table='departments';

  // We don't need the default timestamps
  public $timestamps=false;

  // Get the students of this department
  public function studentInfos() {
    return $this->hasMany('StudentInfo','department_sname',
      'shortname');
  }
}

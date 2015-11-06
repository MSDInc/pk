<?php

class DepartmentsTableSeeder extends Seeder {

  // Run the Departments table seeds
  public function run() {
    DB::table('departments')->delete();
    Department::create(array('shortname'=>'bct','name'=>'Department of
      Computer Engineering'));
    Department::create(array('shortname'=>'bex','name'=>'Department of
      Electronics Engineering'));
    Department::create(array('shortname'=>'bae','name'=>'Department of
      Architecture'));
    Department::create(array('shortname'=>'bme','name'=>'Department of
      Mechanical Engineering'));
    Department::create(array('shortname'=>'bel','name'=>'Department of
      Electrical Engineering'));
    Department::create(array('shortname'=>'bce','name'=>'Department of
      Civil Engineering'));
  }
}

<?php

class RolesTableSeeder extends Seeder {

  // Run the roles table seeds
  public function run() {
    DB::table('roles')->delete();
    Role::create(array('name'=>'Student'));
    Role::create(array('name'=>'Admin'));
    Role::create(array('name'=>'Librarian'));
    Role::create(array('name'=>'Verifier'));
  }
}

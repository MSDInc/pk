<?php

class UsersTableSeeder extends Seeder {

  // Run the users table seeds
  public function run() {
    DB::table('users')->delete();

    User::create(array('role_name'=>'Student','name'=>'Overall',
      'password'=>Hash::make('bhattarai'),'email'=>
      'thepusparaj@hotmail.com'));
    User::create(array('role_name'=>'Student','name'=>'Raggu',
      'password'=>Hash::make('ligal'),'email'=>
      'weathermist@gmail.com'));
    User::create(array('role_name'=>'Librarian','name'=>'Disa',
      'password'=>Hash::make('paudel'),'email'=>
      'dipak93@gmail.com'));
    User::create(array('role_name'=>'Verifier','name'=>'Napoleon',
      'password'=>Hash::make('moreequal'),'email'=>
      'animalfarm@4legs.org'));
    User::create(array('role_name'=>'Admin','name'=>'Chhaggu',
      'password'=>Hash::make('adhikari'),'email'=>
      'adh.neeraj@gmail.com'));
 }
}

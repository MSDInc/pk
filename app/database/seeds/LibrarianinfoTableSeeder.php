<?php

class LibrarianinfoTableSeeder extends Seeder {

  // Run the librarianinfo table seeds
  public function run() {
    DB::table('librarianinfo')->delete();

    LibrarianInfo::create(array(
      'user_id'=>User::where('name','=','Disa')->firstOrFail()->id));
   }
}

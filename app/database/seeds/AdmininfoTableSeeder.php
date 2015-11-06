<?php

class AdmininfoTableSeeder extends Seeder {

  // Run the admininfo table seeds
  public function run() {
    DB::table('admininfo')->delete();

    AdminInfo::create(array(
      'user_id'=>User::where('name','=','Chhaggu')->firstOrFail()->id));
   }
}

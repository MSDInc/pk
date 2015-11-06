<?php

class VerifierinfoTableSeeder extends Seeder {

  // Run the verifierinfo table seeds
  public function run() {
    DB::table('verifierinfo')->delete();

    VerifierInfo::create(array('user_id'=>
      User::where('name','=','Napoleon')->firstOrFail()->id));
   }
}

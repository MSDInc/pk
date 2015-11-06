<?php

class StudentinfoTableSeeder extends Seeder {

  // Run the studentinfo table seeds
  public function run() {
    DB::table('studentinfo')->delete();

    StudentInfo::create(array('rollnumber'=>'532','batch'=>'069',
      'user_id'=>User::where('name','=','Overall')->firstOrFail()->id,
      'department_sname'=>'bct','fineacc'=>0,'finepaid'=>0));
    StudentInfo::create(array('rollnumber'=>'534','batch'=>'069',
      'user_id'=>User::where('name','=','Raggu')->firstOrFail()->id,
      'department_sname'=>'bct','fineacc'=>0,'finepaid'=>0));
   }
}

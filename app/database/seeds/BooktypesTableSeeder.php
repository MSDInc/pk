<?php

class BooktypesTableSeeder extends Seeder {

  // Run the booktypes table seeds
  public function run() {
    DB::table('booktypes')->delete();
    BookType::create(array('name'=>'Lendable','expiry'=>90));
    BookType::create(array('name'=>'Reference','expiry'=>1));
    BookType::create(array('name'=>'NonLendable','expiry'=>0));
  }
}

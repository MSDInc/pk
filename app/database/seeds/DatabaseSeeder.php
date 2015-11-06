<?php

class DatabaseSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Eloquent::unguard();

    // Run the database seeds
    $this->call('DepartmentsTableSeeder');
    $this->call('RolesTableSeeder');
    $this->call('BooktypesTableSeeder');
    $this->call('BooksTableSeeder');
    $this->call('BookItemsTableSeeder');
    $this->call('UsersTableSeeder');
    $this->call('StudentinfoTableSeeder');
    $this->call('LibrarianinfoTableSeeder');
    $this->call('VerifierinfoTableSeeder');
    $this->call('AdmininfoTableSeeder');
  }

}

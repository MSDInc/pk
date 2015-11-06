<?php

class BookItemsTableSeeder extends Seeder {

  // Run the bookitems table seeds
  public function run() {
    DB::table('bookitems')->delete();

    BookItem::create(array('book_isbn'=>'978-81-317-0070-9',
      'edition'=>'Third', 'assigned_to'=>NULL, 'assigned_date'=>NULL));
    BookItem::create(array('book_isbn'=>'978-81-317-0070-9',
      'edition'=>'First', 'assigned_to'=>NULL, 'assigned_date'=>NULL));
    BookItem::create(array('book_isbn'=>'978-81-7808-794-4',
      'edition'=>'First', 'assigned_to'=>NULL, 'assigned_date'=>NULL));
    BookItem::create(array('book_isbn'=>'978-81-7808-794-4',
      'edition'=>'Third', 'assigned_to'=>NULL, 'assigned_date'=>NULL));
    BookItem::create(array('book_isbn'=>'978-0-099-49409-4',
      'edition'=>'First', 'assigned_to'=>NULL, 'assigned_date'=>NULL));
    BookItem::create(array('book_isbn'=>'978-0-099-49409-4',
      'edition'=>'Third', 'assigned_to'=>NULL, 'assigned_date'=>NULL));
    BookItem::create(array('book_isbn'=>'978-0-19-567168-6',
      'edition'=>'Third', 'assigned_to'=>NULL, 'assigned_date'=>NULL));
    BookItem::create(array('book_isbn'=>'978-0-19-567168-6',
      'edition'=>'First', 'assigned_to'=>NULL, 'assigned_date'=>NULL));
  }
}

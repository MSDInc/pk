<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

// Model for the table bookinfo
class Book extends Eloquent {

  use SoftDeletingTrait;

  protected $dates = ['deleted_at'];

  // Explicitly specify the table
  protected $table='books';

  // Our primary key is the isbn, not id
  protected $primaryKey = 'isbn';

  // We don't need the default timestamps
  public $timestamps=false;

  // Get all the Books for this BookInfo
  public function bookitems() {
    return $this->hasMany('BookItem','book_isbn','isbn');
  }

  // Get the BookType for this BookInfo
  public function bookType() {
    return $this->belongsTo('BookType','type_name','name');
  }

  // Load model from input data
  public function populateFromInput() {

    $this->isbn = Input::get('isbn','');
    $this->name = Input::get('name','');
    $this->author = Input::get('author','');
    $this->publisher = Input::get('publisher','');
    $this->type_name = Input::get('type_name','');
  }

}

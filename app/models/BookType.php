<?php

// Model for the table booktypes
class BookType extends Eloquent {

  // Explicitly specify the table
  protected $table='booktypes';

  // We don't need the default timestamps
  public $timestamps=false;

  // Get all the BookInfos for this booktype
  public function bookInfos() {
    return $this->hasMany('BookInfo','type_name','name');
  }

  public function books() {
    // hasManyThrough doesn't work due to a bug in laravel core
    // Returns an empty list
    return $this->hasManyThrough('Book','BookInfo','type_name',
    'info_isbn');
  }
}

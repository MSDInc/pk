<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

// Model for the table bookitems
class BookItem extends Eloquent {

  use SoftDeletingTrait;

  protected $dates = ['deleted_at'];

  // Explicitly specify the table
  protected $table='bookitems';

  // We don't need the default timestamps
  public $timestamps=false;

  // book_isbn and edition should be mass assignable because
  // we do so during bookitem creation
  protected $fillable = array('book_isbn','edition');

  // Get the bookInfo of the book
  public function book() {
    return $this->belongsTo('Book','book_isbn','isbn');
  }

  // Get the user of this book
  public function user() {
    return $this->belongsTo('User','assigned_to','id');
  }
}

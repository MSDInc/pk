
<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

// Model for the table notifications
class Notification extends Eloquent {

  use SoftDeletingTrait;

  protected $dates = ['deleted_at'];

  // Explicitly specify the table
  protected $table='notifications';

  // We don't need the default timestamps
  public $timestamps=false;

  // Get the author of this notification
  public function author() {
    return $this->belongsTo('User','author_id','id');
  }
}

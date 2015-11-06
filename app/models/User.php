<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent
  implements UserInterface, RemindableInterface {

  use UserTrait, RemindableTrait, SoftDeletingTrait;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'users';

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = array('password', 'remember_token');

  // We don't need the default timestamps
  public $timestamps = false;

  // We need deleted_at for softdeleting
  protected $dates = ['deleted_at'];

  // Get the role of this user
  public function role() {
    return $this->belongsTo('Role','role_name','name');
  }

  // Get the books of this user
  public function books() {
    return $this->hasMany('BookItem','assigned_to','id');
  }

  // Get the *Info object associated to this User
  // The schemas need extensive modification to implement this
  // in terms of ORM Relations.
  public function info() {
    if ($this->role_name=='Student') {
      return StudentInfo::where('user_id','=',$this->id)
        ->firstOrFail();
    } else if ($this->role_name=='Librarian') {
      return LibrarianInfo::where('user_id','=',$this->id)
        ->firstOrFail();
    } else if ($this->role_name=='Admin') {
      return AdminInfo::where('user_id','=',$this->id)
        ->firstOrFail();
    } else {
      return VerifierInfo::where('user_id','=',$this->id)
        ->firstOrFail();
    }
  }

  public function isStudent() {
    return ($this->role->name=="Student");
  }

  public function isAdmin() {
    return ($this->role->name=="Admin");
  }

  public function isLibrarian() {
    return ($this->role->name=="Librarian");
  }

  public function isVerifier() {
    return ($this->role->name=="Verifier");
  }

  // Populate the User model from input data
  public function populateFromInput() {
    if (Input::has('role_name'))
      $this->role_name = Input::get('role_name');

    if (Input::has('name'))
      $this->name = Input::get('name');

    if (Input::has('password'))
      $this->password = Input::get('password');

    if (Input::has('email'))
      $this->email = Input::get('email');

    if (Input::has('phone'))
      $this->phone = Input::get('phone');

    if (Input::has('address'))
      $this->address = Input::get('address');
  }

}

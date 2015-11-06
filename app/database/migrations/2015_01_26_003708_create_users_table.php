<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    if (!Schema::hasTable('users')) {
      Schema::create('users', function(Blueprint $table) {
        // User id
        $table->increments('id');
        // Role Id, selects user role
        $table->string('role_name',16);
        // Full name
        $table->string('name',64);
        // Laravel requires the field for storing the password to be
        // at least 60 characters wide.
        $table->string('password',64);
        // Remember-token, needed by the authentication driver.
        $table->string('remember_token',100)->nullable();
        // Email Address
        $table->string('email',64);
        // Phone number. Stored as a string because leading zeros may
        // be significant.
        $table->string('phone',16)->nullable();
        // Address (IRL) of the user
        $table->string('address',128)->nullable();
        // A timestamp for softdeleting
        $table->softDeletes();

        // Key constraints for the fields
        $table->unique('email');
        $table->foreign('role_name')->references('name')->on('roles');
      });
    }
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }

}

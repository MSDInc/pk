<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    if (!Schema::hasTable('roles')) {
      Schema::create('roles', function(Blueprint $table) {
        // Name of the role. One of Student, Verifier, Librarian or
        // Admin
        $table->string('name',16);
        // The name is the primary key
        $table->primary('name');
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
    Schema::dropIfExists('roles');
  }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooktypesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    if (!Schema::hasTable('booktypes')) {
      Schema::create('booktypes', function(Blueprint $table) {
        // Name of the type, for example Reference
        $table->string('name',32);
        // Number of days in which the book loan will expire
        $table->smallInteger('expiry')->unsigned();
        // Set the primary key to the name
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
    Schema::dropIfExists('booktypes');
  }

}

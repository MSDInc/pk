<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLogs extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    if (!Schema::hasTable('events')) {
      Schema::create('events', function(Blueprint $table) {
        // primary key
        $table->increments('id');
        // timestamp
        $table->timestamp('time');
        // What the event was
        $table->string('type',32);
        // Id of the user involved
        $table->integer('user_id')->unsigned();
        // Id of the book involved
        $table->string('book_isbn',32)->nullable();
        // Id of the actor (another user who's making the event happen)
        $table->integer('actor_id')->unsigned()->nullable();

        // Set foreign key constraints
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('actor_id')->references('id')->on('users');
        $table->foreign('book_isbn')->references('isbn')->on('books');
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
    Schema::dropIfExists('events');
  }

}

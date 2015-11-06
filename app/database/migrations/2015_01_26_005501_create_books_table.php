<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    if (!Schema::hasTable('bookitems')) {
      Schema::create('bookitems', function(Blueprint $table) {
        $table->increments('id');
        // Selector for bookinfo
        $table->string('book_isbn',32);
        // Edition of the book
        $table->string('edition',16);
        // The user the book has been lent to and the lend date
        $table->integer('assigned_to')->unsigned()->nullable();
        $table->timestamp('assigned_date')->nullable();
        // A timestamp for softdeleting
        $table->softDeletes();

        // Key constraints
        $table->foreign('book_isbn')->references('isbn')->
          on('books');
        $table->foreign('assigned_to')->references('id')->on('users');
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
    Schema::dropIfExists('bookitems');
  }

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    if (!Schema::hasTable('notifications')) {
      Schema::create('notifications', function(Blueprint $table) {
        // Id
        $table->increments('id');
        // Id of the author
        $table->integer('author_id')->unsigned();
        // Content
        $table->string('content',256);
        // Start datetime
        $table->date('start');
        // End datetime
        $table->date('end');
        // A timestamp for softdeleting
        $table->softDeletes();
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
    Schema::dropIfExists('notifications');
  }
}

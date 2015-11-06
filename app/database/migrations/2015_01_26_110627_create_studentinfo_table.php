<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentinfoTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    if (!Schema::hasTable('studentinfo')) {
      Schema::create('studentinfo', function(Blueprint $table) {
        $table->integer('user_id')->unsigned();
        // The full rollnumber of a student is composed of 3 parts:
        // Batch number, department shortname and the rollnumber
        $table->tinyInteger('batch')->unsigned();
        $table->string('department_sname',3);
        $table->smallInteger('rollnumber')->unsigned();
        // The accumulated (outstanding) fine to be paid
        $table->decimal('fineacc',7,2)->unsigned();
        // Total fine that has been paid since the beginning
        $table->decimal('finepaid',7,2)->unsigned();
        // Key constraints
        $table->primary(array('batch','department_sname',
          'rollnumber'));
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('department_sname')->references('shortname')->
          on('departments');
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
    Schema::dropIfExists('studentinfo');
  }

}

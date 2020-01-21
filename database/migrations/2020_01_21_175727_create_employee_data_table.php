<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('emp_id');
            $table->string('name_prefix');
            $table->string('first_name');
            $table->string('middle_initial');
            $table->string('last_name');
            $table->string('gender', 1);
            $table->string('email');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('mother_maiden');
            $table->string('date_of_birth');
            $table->string('date_of_joining');
            $table->integer('salary');
            $table->text('ssn');
            $table->string('phone_no');
            $table->string('city');
            $table->string('state', 2);
            $table->integer('zip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_data');
    }
}

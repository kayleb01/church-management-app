<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeoplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peoples', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->integer('ministry')->unsigned();
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('gender');
            $table->string('mobile_number')->nullable();
            $table->integer('group_id')->nullable();
            $table->string('job_title')->nullable();
            $table->string('employer')->nullable();
            $table->string('talent')->nullable();
            $table->string('school')->nullable();
            $table->string('grade')->nullable();
            $table->string('marital_status');
            $table->string('join_date');
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
        Schema::dropIfExists('peoples');
    }
}

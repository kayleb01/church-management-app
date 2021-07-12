<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('person_id');
            $table->integer('ministry')->unsigned();
            $table->string('type');
            $table->integer('user_id')->unsigned();
            $table->date('date');
            $table->time('from');
            $table->time('to');
            $table->integer('action_id')->unsigned();
            $table->smallInteger('status');
            $table->text('note');
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
        Schema::dropIfExists('followups');
    }
}

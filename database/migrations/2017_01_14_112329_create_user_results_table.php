<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_results', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('version');
            $table->integer('question_order');
            $table->unsignedInteger('user_id');
            $table->integer('attempt');
            $table->integer('user_answer');
            $table->integer('correct_answer');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_results');
    }
}

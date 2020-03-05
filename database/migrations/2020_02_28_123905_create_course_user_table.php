<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->foreign("course_id")->references("id")->on("course");
            $table->bigInteger('course_id')->unsigned();
            // $table->foreign("user_id")->references("id")->on("user");
            $table->bigInteger('user_id')->unsigned();
            $table->string("user_type");
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
        Schema::dropIfExists('course_user');
    }
}

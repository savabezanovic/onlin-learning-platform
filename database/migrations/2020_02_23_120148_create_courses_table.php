<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->bigInteger('category_id')->unsigned();
            //$table->string("image_url");
            // $table->foreign('cat_id')->references('id')->on("category");
            $table->string('goals');
            $table->string('video_url');
            $table->bigInteger("user_id")->unsigned();
            $table->timestamps();
            $table->softDeletes()->nullable();
            $table->boolean("active")->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

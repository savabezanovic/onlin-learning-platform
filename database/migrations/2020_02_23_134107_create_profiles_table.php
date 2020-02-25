<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('age');
            $table->string('linkedin_url')->nullable();
            $table->string('education')->nullable();
            $table->string('image_url')->nullable();
            $table->string('title')->nullable();
            $table->text('bio')->nullable();
            // $table->foreign('user_id')->references('id')->on("user");
            $table->bigInteger('user_id')->unsigned();
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
        Schema::dropIfExists('profiles');
    }
}

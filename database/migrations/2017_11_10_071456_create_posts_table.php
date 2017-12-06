<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('major_id')->index()->unsigned();
            $table->integer('material_type_id')->index()->unsigned();
            $table->tinyInteger('share_or_ask')->default(0); // 0 for share, 1 for ask
            $table->tinyInteger('free_or_paid')->default(0); // 0 for free, 1 for paid
            $table->string('content');
            $table->string('file_id')->nullable();
            $table->tinyInteger('is_shown')->dufault(1); // 1 for shown
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
        Schema::dropIfExists('posts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('feed_category_id');
            $table->string('title');
            $table->text('content');
            $table->string('sample_picture');
            $table->integer('recommendations')->default(0);
            $table->integer('disparagements')->default(0);
            $table->integer('user_id');
            $table->string('language')->default('English');
            $table->softDeletes();
            $table->timestamps();

            //$table->foreign('user_id')->references('users')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feeds');
    }
}

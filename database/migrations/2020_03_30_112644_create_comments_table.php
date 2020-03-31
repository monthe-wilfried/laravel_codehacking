<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->index()->unsigned();
            $table->integer('is_active')->default(0);
            $table->string('author');
            $table->string('email');
            $table->text('body');
            $table->timestamps();

            //
//            The columns where you have your constraints all have to be identical
//            for example in this case we have ->index()->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

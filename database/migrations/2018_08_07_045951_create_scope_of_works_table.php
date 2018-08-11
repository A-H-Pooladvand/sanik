<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScopeOfWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scope_of_works', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('user_id');
            $table->string('title', 191)->index();
            $table->string('summary', 400);
            $table->string('image', 200);
            $table->text('body');
            $table->string('link', 250);
            $table->unsignedTinyInteger('priority')->default(1);
            $table->enum('status', ['publish', 'draft'])->default('publish')->comment('منتشر شده یا پیشنویس');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scope_of_works');
    }
}

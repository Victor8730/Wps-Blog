<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function(Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('slug', 50)
                ->unique();
            $table->text('description')
                ->nullable();
            $table->timestamps();
        });

        Schema::create('post_category', function(Blueprint $table) {
            $table->integer('post_id')
                ->unsigned()
                ->index();
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
            $table->integer('category_id')
                ->unsigned()
                ->index();
            $table->foreign('category_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

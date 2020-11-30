<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesLocalizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_localizations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('categories_id')
                ->unsigned();
            $table->foreign('categories_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->bigInteger('meta_id')
                ->unsigned();
            $table->foreign('meta_id')
                ->references('id')
                ->on('meta')
                ->onDelete('cascade');
            $table->string('name', 100);
            $table->text('description')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_localizations');
    }
}

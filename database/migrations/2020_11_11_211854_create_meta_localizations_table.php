<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaLocalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_localizations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('meta_id')
                ->unsigned()
                ->index();
            $table->foreign('meta_id')
                ->references('id')
                ->on('metas')
                ->onDelete('cascade');
            $table->string('lang', 2);
            $table->string('description');
            $table->string('keywords');
            $table->string('title');
            $table->string('h1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta_localizations');
    }
}

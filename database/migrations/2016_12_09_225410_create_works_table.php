<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('cliente')->nullable();
            $table->string('img_featured')->nullable();
            $table->string('img_concept')->nullable();
            $table->string('img_wip')->nullable();
            $table->string('img_beauty')->nullable();
            $table->string('img_square')->nullable();
            $table->string('img_wide')->nullable();
            $table->string('link_youtube');
            $table->string('link')->nullable();
            $table->text('descripcion');
            $table->text('año')->nullable();
            $table->integer('tipo');
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
        Schema::dropIfExists('works');
    }
}

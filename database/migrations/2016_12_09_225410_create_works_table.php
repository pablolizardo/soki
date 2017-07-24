<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration {

    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('cliente')->nullable();
            $table->string('img_square')->nullable();
            $table->string('img_vertical')->nullable();
            $table->string('img_horizontal')->nullable();
            $table->string('img_desktop')->nullable();
            $table->string('img_concept')->nullable();

            $table->string('attachment')->nullable(); // incorporar un freebie
            $table->string('gif')->nullable(); // incorporar un gif / screencast o terminal anim

            //$table->string('img_featured')->nullable();
            
            $table->integer('estado')->nullable();

            $table->string('color')->nullable();
            $table->string('link_youtube');
            $table->string('link')->nullable();
            $table->string('github')->nullable();

            $table->text('descripcion');
            $table->text('año')->nullable();
            $table->integer('tipo')->defalut(0);
            $table->integer('device')->default(0); // 0 laptop, 1 desktop, 2 tablet, 3 tv, 4 cellphone
            $table->integer('stores')->default(0); // mostrar las tiendas o no
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('works');
    }
}

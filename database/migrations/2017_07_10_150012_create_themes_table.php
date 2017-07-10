<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('color_primary')->nullable();
            $table->string('color_secondary')->nullable();
            $table->string('apps_bg')->nullable();
            $table->string('posts_bg')->nullable();
            $table->string('anim_bg')->nullable();
            $table->string('dis_bg')->nullable();
            $table->string('logo')->nullable()->default('logo.png');
            $table->string('frase')->nullable();
            $table->integer('activo')->nullable()->default(0);
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
        Schema::dropIfExists('themes');
    }
}

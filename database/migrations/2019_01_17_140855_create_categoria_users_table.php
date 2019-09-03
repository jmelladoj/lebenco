<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('nivel');
            $table->integer('gasto_inicio');
            $table->integer('gasto_fin');
            $table->string('color');
            $table->integer('bonificacion')->default(0);
            $table->integer('descuento')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('categoria_users');
    }
}

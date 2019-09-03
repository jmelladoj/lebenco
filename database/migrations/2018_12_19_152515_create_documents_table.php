<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('codigo')->nullable()->default('');
            $table->string('codigo_interno')->nullable()->default('');
            $table->string('url');
            $table->integer('valor')->default(0);
            $table->integer('clasificacion')->default(0);
            $table->integer('cantidad_descargas')->default(0);
            $table->string('extension');
            $table->integer('version')->default('1');

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
    
            $table->integer('estado')->default(0);

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('documents');
    }
}

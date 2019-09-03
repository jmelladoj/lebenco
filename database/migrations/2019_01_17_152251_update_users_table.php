<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('profession_id')->nullable()->default(NULL);
            $table->foreign('profession_id')->references('id')->on('professions');

            $table->unsignedInteger('province_id')->nullable()->default(NULL);
            $table->foreign('province_id')->references('id')->on('provinces');

            $table->unsignedInteger('commune_id')->nullable()->default(NULL);
            $table->foreign('commune_id')->references('id')->on('communes');

            $table->unsignedInteger('categoria_id')->nullable()->default(NULL);
            $table->foreign('categoria_id')->references('id')->on('categoria_users');

            $table->string('profesion')->nullable()->default(NULL);
            $table->timestamp('email_verified_at')->nullable()->default(NULL);
            $table->string('password');
            $table->integer('tipo_usuario')->default(3);
            $table->integer('tipo_persona')->default(1);
            $table->integer('mailing')->default(0);
            $table->integer('saldo')->default(1000);
            $table->text('descripcion')->nullable()->default(null);
            $table->string('foto_perfil_url')->default('public/users/perfil/1.jpg');
            $table->rememberToken();
            $table->timestamp('last_login')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        //
    }
}

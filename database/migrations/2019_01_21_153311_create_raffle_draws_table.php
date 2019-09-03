<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaffleDrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raffle_draws', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('raffle_id')->nullable()->default(NULL);
            $table->foreign('raffle_id')->references('id')->on('raffles');

            $table->unsignedInteger('user_id')->nullable()->default(NULL);
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamp('fecha_participacion')->default(DB::raw('CURRENT_TIMESTAMP'));

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
        Schema::dropIfExists('raffle_draws');
    }
}

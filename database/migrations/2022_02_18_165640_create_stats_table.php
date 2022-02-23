<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('categories_id')->nullable();
            $table->integer('transfer_per_day')->nullable();
            $table->integer('call_per_day')->nullable();
            $table->integer('rea_sign_up')->nullable();
            $table->integer('tbd_assigned')->nullable();
            $table->integer('no_of_matches')->nullable();
            $table->integer('leads')->nullable();
            $table->integer('conversations')->nullable();
            $table->integer('inbound')->nullable();
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
        Schema::dropIfExists('reports');
    }
}

<?php

use App\Models\Dawry;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Dawry::class)->constrained();
            $table->string('name');
            $table->string('avater');
            $table->string('country');
            // $table->string('order_on_dawry');
            $table->string('playing')->nullable();
            $table->string('have_won')->nullable();
            $table->string('draw')->nullable();
            $table->string('game_over')->nullable();
            $table->string('on_him')->nullable();
            $table->string('difference')->nullable();
            $table->string('points')->nullable();
            // $table->string('last_five');
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
        Schema::dropIfExists('clubs');
    }
}

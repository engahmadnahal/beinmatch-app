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
            $table->string('order_on_dawry');
            $table->string('playing');
            $table->string('have_won');
            $table->string('draw');
            $table->string('on_him');
            $table->string('difference');
            $table->string('points');
            $table->string('last_five');
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

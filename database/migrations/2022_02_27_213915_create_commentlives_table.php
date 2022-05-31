<?php

use App\Models\User;
use App\Models\Match;
use App\Models\Mobara;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentlivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentlives', function (Blueprint $table) {
            $table->id();
            // $table->integer('user_id');
            // $table->integer('match_id');
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Mobara::class)->constrained();
            $table->string('comment');
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
        Schema::dropIfExists('commentlives');
    }
}

<?php

use App\Models\Dawry;
use App\Models\Employee;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // $table->integer('employee_id');
            $table->foreignIdFor(Employee::class)->constrained();
            $table->foreignIdFor(Dawry::class)->constrained();
            $table->string('title');
            $table->string('thumnail')->nullable();
            $table->longText('content');
            $table->timestamp('publish_at')->nullable();
            $table->timestamp('send_notfi')->nullable();
            $table->enum('status',['done', 'wite', 'cancel'])->default('wite');
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
        Schema::dropIfExists('posts');
    }
}

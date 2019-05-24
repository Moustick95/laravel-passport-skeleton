<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table -> bigIncrements('id');
            $table -> unsignedBigInteger('owner');
            $table -> unsignedBigInteger('ticket');
            $table -> text('content');
            $table -> timestamps();
            $table -> timestamp('deleted_at') -> nullable();
            $table -> foreign('owner')
                   -> references('id')
                   -> on('users')
                   -> onDelete('cascade');
            $table -> foreign('ticket')
                    -> references('id')
                    -> on('tickets')
                    -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

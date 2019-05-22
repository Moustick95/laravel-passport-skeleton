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
        Schema::table('comments', function (Blueprint $table) {
            $table -> bigIncrements('id');
            $table -> foreign('owner')
                   -> references('id')
                   -> on('users')
                   -> onDelete('cascade');
            $table -> foreign('ticket')
                    -> references('id')
                    -> on('tickets')
                    -> onDelete('cascade');
            $table -> bigIncrements('content');
            $table -> timestamps();
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

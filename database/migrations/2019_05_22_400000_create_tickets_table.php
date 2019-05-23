<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table -> bigIncrements('id');
            $table -> string('title');
            $table -> string('description');
            $table -> unsignedBigInteger('owner');
            $table -> unsignedBigInteger('assigned') -> nullable();
            $table -> timestamp('first_assigned') -> nullable();
            $table -> timestamp('last_assigned') -> nullable();
            $table -> unsignedBigInteger('priority');
            $table -> unsignedBigInteger('state');
            $table -> timestamps();
            $table -> timestamp('deleted_at') -> nullable();
            $table -> foreign('assigned')
                   -> references('id')
                   -> on('users')
                   -> nullable();
            $table -> foreign('owner')
                   -> references('id')
                   -> on('users')
                   -> onDelete('cascade');
            $table -> foreign('priority')
                   -> references('id')
                   -> on('priorities');
            $table -> foreign('state')
                   -> references('id')
                   -> on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}

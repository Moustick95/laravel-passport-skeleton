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
        Schema::table('tickets', function (Blueprint $table) {
            $table -> bigIncrements('id');
            $table -> string('title');
            $table -> string('description');
            $table -> foreign('owner')
                   -> references('id')
                   -> on('users')
                   -> onDelete('cascade');
            $table -> foreign('assigned')
                   -> references('id')
                   -> on('users')
                   -> nullable();
            $table -> timestamp('first_assigned') -> nullable();
            $table -> timestamp('last_assigned') -> nullable();
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
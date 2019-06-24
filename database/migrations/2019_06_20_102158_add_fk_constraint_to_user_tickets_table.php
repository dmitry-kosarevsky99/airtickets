<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkConstraintToUserTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_tickets', function (Blueprint $table) {
            $table->integer('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('ticket_id')->on('tickets');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_tickets', function (Blueprint $table) {
            $table->dropForeign('user_tickets_ticket_id_foreign');
            $table->dropColumn('ticket_id');
            $table->dropForeign('user_tickets_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkConstraintToFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->integer('flight_plane_id')->unsigned();
            $table->foreign('flight_plane_id')->references('plane_id')->on('planes');
            $table->integer('source_airport_id')->unsigned();
            $table->foreign('source_airport_id')->references('airport_id')->on('airports');
            $table->integer('destination_airport_id')->unsigned();
            $table->foreign('destination_airport_id')->references('airport_id')->on('airports');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropForeign('flights_flight_plane_id_foreign');
            $table->dropColumn('flight_plane_id');
            $table->dropForeign('airports_source_airport_id_foreign');
            $table->dropColumn('source_airport_id');
            $table->dropForeign('airports_destination_airport_id_foreign');
            $table->dropColumn('destination_airport_id');
            
        });
    }
}

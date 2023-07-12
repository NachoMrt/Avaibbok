<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->integer('user_id');
            $table->integer('accommodation_id');
            $table->string('accommodation_name');
            $table->string('accommodation_address');
            $table->string('accommodation_city');
            $table->integer('accommodation_postal_code');
            $table->string('accommodation_country');
            $table->string('accommodation_type');
            $table->string('distributionn');
            $table->string('max_guests');
            $table->string('last_update');
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
        Schema::dropIfExists('accommodations');
    }
}

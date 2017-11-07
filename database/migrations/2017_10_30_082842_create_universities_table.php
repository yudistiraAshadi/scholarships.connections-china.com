<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->increments('id');
            
            // Basic information
            $table->string('name')->unique();
            $table->string('logo');
            $table->text('introduction')->nullable();

            // Address
            $table->string('country');
            $table->string('governing_district'); // Province, State
            $table->string('major_municipality'); // Town, City
            $table->string('minor_municipality'); // District
            $table->string('detailed_address');

            // Other information
            $table->text('photos');
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
        Schema::dropIfExists('universities');
    }
}

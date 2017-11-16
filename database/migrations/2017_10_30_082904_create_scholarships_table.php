<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->increments('id');

            // Information
            $table->integer('university_id')->unsigned()->index();
            $table->text('benefits')->nullable();
            $table->text('requirements')->nullable();
            $table->text('other_information')->nullable();
            $table->text('program');
            $table->integer('program_language_id')->unsigned()->index();

            // Scopes
            $table->integer('number_of_seats')->nullable();
            $table->date('application_deadline');

            // Types
            $table->integer('scholarship_type_id')->unsigned()->index();
            $table->integer('degree_type_id')->unsigned()->index();
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
        Schema::dropIfExists('scholarships');
    }
}

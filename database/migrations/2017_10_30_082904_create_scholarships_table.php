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
            $table->text('benefits');
            $table->text('requirements');
            $table->text('other_information')->nullable();
            $table->text('courses');

            // Scopes
            $table->integer('number_of_seats');
            $table->date('application_deadline');

            // Types
            $table->enum('scholarship_type', ['full', 'partial']);
            $table->enum('student_type', ['undergraduate', 'graduate']);
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

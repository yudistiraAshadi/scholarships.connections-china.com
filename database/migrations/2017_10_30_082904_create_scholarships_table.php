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
            $table->integer('university_id')->unsigned()->index();
            $table->integer('number_of_seats');
            $table->json('courses');
            $table->enum('scholarship_type', ['full', 'partial']);
            $table->enum('student_type', ['undergraduate', 'graduate']);
            $table->date('application_deadline');
            $table->text('information');
            $table->text('requirements');
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

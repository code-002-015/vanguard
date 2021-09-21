<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareerApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('career_id');
            $table->string('name', 150);
            $table->string('email', 150);
            $table->string('contact', 150);
            $table->string('resume', 255);
            $table->text('about');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_applicants');
    }
}

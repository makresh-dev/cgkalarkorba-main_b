<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('image');
            $table->enum('gender', ['male', 'female']);
            $table->string('height');
            $table->string('weight');
            $table->string('zodiac');
            $table->enum('manglik', ['yes', 'no']);
            $table->string('tribe');
            $table->date('dob');
            $table->string('birth_place');
            $table->string('time');
            $table->string('day_or_night');
            $table->string('blood_group');
            $table->enum('other_siklin', ['yes', 'no']);
            $table->string('qualification');
            $table->string('occupation');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('married_brothers');
            $table->string('married_sisters');
            $table->string('unmarried_brothers');
            $table->string('unmarried_sisters');
            $table->string('current_address');
            $table->string('permenant_address');
            $table->string('telephone_no');
            $table->string('mobile_no')->unique();
            $table->text('password');
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
        Schema::dropIfExists('candidates');
    }
}

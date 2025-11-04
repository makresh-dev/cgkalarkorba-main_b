<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('register_no')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('zodiac')->nullable();
            $table->enum('manglik', ['yes', 'no'])->nullable();
            $table->string('tribe')->nullable();
            $table->date('dob')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('time')->nullable();
            $table->string('day_or_night')->nullable();
            $table->string('blood_group')->nullable();
            $table->enum('other_siklin', ['yes', 'no'])->nullable();
            $table->string('qualification')->nullable();
            $table->string('occupation')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('married_brothers')->nullable();
            $table->string('married_sisters')->nullable();
            $table->string('unmarried_brothers')->nullable();
            $table->string('unmarried_sisters')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permenant_address')->nullable();
            $table->string('telephone_no')->nullable();
            $table->string('mobile_no')->unique()->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

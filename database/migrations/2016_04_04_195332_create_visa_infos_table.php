<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisaInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('visa_number');
            $table->string('expiry_date');
            $table->string('issued_on');
            $table->string('place_of_issue');
            $table->string('issued_in_country');
            $table->string('for_dependents');
            $table->string('visa_country_id');
            $table->integer('dependent_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('visa_categories');
            $table->foreign('dependent_id')->references('id')->on('dependents_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visa_infos');
    }
}

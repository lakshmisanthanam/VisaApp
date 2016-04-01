<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependentsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependents_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('dependent_name');
            $table->integer('dependent_cat_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');
            $table->foreign('dependent_cat_id')
              ->references('id')->on('relationship')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dependents_info');
    }
}

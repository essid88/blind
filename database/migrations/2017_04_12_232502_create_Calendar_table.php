<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Calendar', function (Blueprint $table) {
        $table->increments('id');
        $table->datetime('start');
        $table->datetime('end')->nullable();
        $table->string('title')->nullable();
        $table->string('color')->nullable();
        $table->boolean('allj')->nullable();
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
       Schema::drop('calendar');
    }
}

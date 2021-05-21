<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('schedules');
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('time');
            $table->integer('room');
            $table->string('subject');
            $table->string('teacher');
            $table->integer('group');
            $table->timestamps();
            // $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_schedule_appointment', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status')->default('available');
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
        Schema::dropIfExists('_schedule_appointment');
    }
};

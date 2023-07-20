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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('heart_rate')->nullable();
            $table->string('respiration_rate')->nullable();
            $table->string('temperature')->nullable();
            $table->string('oxygen_saturation')->nullable();
            $table->string('weight_scale')->nullable();
            $table->string('blood_pressure')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
};

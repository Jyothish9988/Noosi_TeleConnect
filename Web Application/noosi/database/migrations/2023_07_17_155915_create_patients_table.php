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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood')->nullable();
            $table->string('address')->nullable();
            $table->string('pin')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('hid')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('resp_rate')->nullable();
            $table->string('temp_rate')->nullable();
            $table->string('oxygen_satu')->nullable();
            $table->string('weight')->nullable();
            $table->string('bp')->nullable();
            $table->string('reg_id')->nullable();
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
        Schema::dropIfExists('patients');
    }
};

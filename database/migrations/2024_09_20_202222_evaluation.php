<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('attendance1')->nullable();
            $table->string('attendance2')->nullable();
            $table->string('attendance3')->nullable();
            $table->string('punctuality1')->nullable();
            $table->string('punctuality2')->nullable();
            $table->string('punctuality3')->nullable();
            $table->string('initiative1')->nullable();
            $table->string('initiative2')->nullable();
            $table->string('initiative3')->nullable();
            $table->string('activities1')->nullable();
            $table->string('activities2')->nullable();
            $table->string('activities3')->nullable();
            $table->string('cooperation1')->nullable();
            $table->string('cooperation2')->nullable();
            $table->string('cooperation3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};

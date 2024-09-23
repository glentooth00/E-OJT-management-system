<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('evaluation_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_id')->constrained()->onDelete('cascade');
            $table->foreignId('criterion_id')->constrained('evaluation_criteria')->onDelete('cascade');
            $table->decimal('score', 3, 2);  // For example, scores like 0.8 or 0.95
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('evaluation_scores');
    }
    
};

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
        Schema::create('supervisor_student_evaluations', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('student_name'); // Student's name
            $table->unsignedBigInteger('student_id'); // Student's ID
            
            // Attendance questions and points
            $table->string('attendance_questions')->nullable(); // String to store attendance questions
            $table->string('attendance_points')->nullable(); // String to store attendance points
            
            // Punctuality questions and points
            $table->string('punctuality_questions')->nullable(); // String to store punctuality questions
            $table->string('punctuality_points')->nullable(); // String to store punctuality points
            
            // Initiative questions and points
            $table->string('initiative_questions')->nullable(); // String to store initiative questions
            $table->string('initiative_points')->nullable(); // String to store initiative points
            
            // Planning questions and points
            $table->string('planning_questions')->nullable(); // String to store planning questions
            $table->string('planning_points')->nullable(); // String to store planning points
            
            // Cooperation questions and points
            $table->string('cooperation_questions')->nullable(); // String to store cooperation questions
            $table->string('cooperation_points')->nullable(); // String to store cooperation points
            
            $table->timestamps(); // Created and updated timestamps
            
            // Optional: Add a foreign key constraint if needed
            // $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supervisor_student_evaluations');
    }
};

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
        Schema::table('supervisor_student_evaluations', function (Blueprint $table) {
            $table->text('interest_questions')->nullable();
            $table->text('interest_points')->nullable();
            $table->text('field_questions')->nullable();
            $table->text('field_points')->nullable();
            $table->text('appearance_questions')->nullable();
            $table->text('appearance_points')->nullable();
            $table->text('alert_questions')->nullable();
            $table->text('alert_points')->nullable();
            $table->text('self_questions')->nullable();
            $table->text('self_points')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supervisor_student_evaluations', function (Blueprint $table) {
            //
        });
    }
};

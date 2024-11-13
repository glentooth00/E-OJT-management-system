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
        Schema::create('endorsements', function (Blueprint $table) {
            $table->id(); // Primary key for the endorsement

            // Foreign key for the user who created the endorsement (optional if you want to associate this with a user)
            // $table->foreignId('user_id')->constrained()->onDelete('cascade'); 

            // Agency Information
            $table->string('agency_personnel');  // Name of Agency Personnel
            $table->string('agency_position');   // Position
            $table->string('agency_name');       // Name of Agency
            $table->string('agency_address');    // Address

            // Endorsement Letter Content (Text Area)
            $table->text('endorsement_letter');  // Content of the endorsement letter

            // Students Information (This will be stored as a JSON field for flexibility)
            $table->json('students_info')->nullable();  // Information for multiple students (name, year level, department)

            $table->timestamps();  // Created at and Updated at timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('endorsements');
    }
};

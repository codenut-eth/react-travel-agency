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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('nationality')->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('document_type', ['CPF', 'ID', 'Passport', 'Other'])->nullable();
            $table->string('document_number')->nullable();
            $table->string('dietary_restrictions')->nullable();
            $table->string('medical_conditions')->nullable();
            $table->string('allergies')->nullable();
            $table->enum('physical_activity', ['Sedentary', 'Light', 'Moderate', 'High'])->nullable();
            $table->text('accommodation')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengers');
    }
};

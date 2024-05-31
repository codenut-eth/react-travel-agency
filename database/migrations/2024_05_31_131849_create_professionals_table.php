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
        Schema::create('professionals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['Driver', 'Guide']);
            $table->enum('document_type', ['CPF', 'ID', 'Passport', 'Other']);
            $table->string('document_number');
            $table->string('certification')->nullable();
            $table->boolean('speaks_portuguese')->default(false);
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professionals');
    }
};

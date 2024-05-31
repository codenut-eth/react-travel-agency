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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('nationality')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->enum('document_type', ['CPF', 'ID', 'Passport', 'Other'])->nullable();
            $table->string('document_number')->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('customer_type', ['Individual', 'Corporate'])->nullable();
            $table->enum('account_type', ['Customer', 'Affiliate', 'Agency', 'Influencer'])->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

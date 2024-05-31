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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('currency_id');
            $table->string('name');
            $table->string('business_phone')->nullable();
            $table->string('support_phone')->nullable();
            $table->string('email')->unique();
            $table->string('website')->nullable();
            $table->text('bank_details')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->enum('document_type', ['CPF', 'ID', 'Passport', 'Other'])->nullable();
            $table->string('document_number')->nullable();
            $table->string('responsible_person')->nullable();
            $table->string('main_activity')->nullable();
            $table->string('destination')->nullable();
            $table->string('certification')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('currency_id')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};

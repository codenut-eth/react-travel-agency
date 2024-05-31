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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position_id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('cpf')->unique();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('address');
            $table->string('nationality')->nullable();
            $table->string('personal_email')->unique();
            $table->string('work_phone')->nullable();
            $table->string('personal_phone')->nullable();
            $table->string('work_email')->nullable();
            $table->string('bank_details')->nullable();
            $table->date('hire_date');
            $table->date('termination_date')->nullable();
            $table->decimal('salary', 10, 2);
            $table->string('photo_url')->nullable();
            $table->text('profile')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

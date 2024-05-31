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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('affiliate_id')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->string('name');
            $table->integer('number_of_people');
            $table->string('support_phone')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->date('validity');
            $table->enum('payment_method', ['Transfer', 'Card', 'Other']);
            $table->date('start_date');
            $table->date('end_date');
            $table->text('notes')->nullable();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('affiliate_id')->references('id')->on('afiliates');
//            $table->foreign('status_id')->references('id')->on('budget_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};

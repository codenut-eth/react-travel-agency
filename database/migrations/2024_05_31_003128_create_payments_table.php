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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('budget_unit_id');
            $table->unsignedBigInteger('unit_id');
            $table->enum('type', ['Payment', 'Refund']);
            $table->decimal('amount', 10, 2);
            $table->date('payment_date');
            $table->date('created_at');
            $table->string('created_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_by')->nullable();
            $table->text('receipt')->nullable();
            $table->text('notes')->nullable();

            $table->foreign('budget_unit_id')->references('id')->on('budget_units');
            $table->foreign('unit_id')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

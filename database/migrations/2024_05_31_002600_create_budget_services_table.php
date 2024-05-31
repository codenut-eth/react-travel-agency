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
        Schema::create('budget_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('budget_id');
            $table->unsignedBigInteger('service_id');
            $table->text('content')->nullable();
            $table->decimal('commercial_discount', 10, 2)->default(0);
            $table->decimal('down_payment', 10, 2)->default(0);
            $table->decimal('list_price', 10, 2);
            $table->decimal('cost_price', 10, 2);
            $table->decimal('remaining_amount', 10, 2);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('budget_id')->references('id')->on('budgets');
//            $table->foreign('service_id')->references('id')->on('services');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_services');
    }
};

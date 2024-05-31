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
        Schema::create('budget_tours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('budget_id');
            $table->unsignedBigInteger('tour_price_id');
            $table->integer('quantity');
            $table->decimal('commercial_discount', 10, 2)->default(0);
            $table->decimal('down_payment', 10, 2)->default(0);
            $table->decimal('ticket_discount', 10, 2)->default(0);
            $table->timestamps();

            $table->foreign('budget_id')->references('id')->on('budgets');
//            $table->foreign('tour_price_id')->references('id')->on('tour_prices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_tours');
    }
};

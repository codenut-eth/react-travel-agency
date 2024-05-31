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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('budget_passenger_id');
            $table->unsignedBigInteger('budget_tour_id');
            $table->unsignedBigInteger('operator_tour_id');
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('professional_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('status_id');
            $table->date('quote_date');
            $table->time('departure_time');
            $table->string('departure_location');
            $table->decimal('cost_refund', 10, 2)->default(0);
            $table->decimal('gross_profit_refund', 10, 2)->default(0);
            $table->decimal('ticket_refund', 10, 2)->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('budget_passenger_id')->references('id')->on('budget_passengers');
            $table->foreign('budget_tour_id')->references('id')->on('budget_tours');
            $table->foreign('operator_tour_id')->references('id')->on('operator_tours');
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('professional_id')->references('id')->on('professionals');
//            $table->foreign('vehicle_id')->references('id')->on('vehicles');
//            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};

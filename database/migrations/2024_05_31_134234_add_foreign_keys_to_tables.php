<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('statuses');
        });

        Schema::table('budget_tours', function (Blueprint $table) {
            $table->foreign('tour_price_id')->references('id')->on('tour_prices');
        });

        Schema::table('budget_services', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    public function down()
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
        });

        Schema::table('budget_tours', function (Blueprint $table) {
            $table->dropForeign(['tour_price_id']);
        });

        Schema::table('budget_services', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['vehicle_id']);
            $table->dropForeign(['status_id']);
        });
    }
};

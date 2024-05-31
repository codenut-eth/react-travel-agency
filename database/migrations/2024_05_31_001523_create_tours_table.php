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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('media_id')->nullable();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('type');
            $table->integer('min_quantity');
            $table->integer('max_quantity');
            $table->text('description')->nullable();
            $table->string('category');
            $table->string('destination');
            $table->text('distance')->nullable();
            $table->string('departure_location');
            $table->text('itinerary')->nullable();
            $table->time('departure_time');
            $table->time('arrival_time')->nullable();
            $table->string('duration_days')->nullable();
            $table->string('available_dates')->nullable();
            $table->text('cancellation_policy')->nullable();
            $table->text('no_show_policy')->nullable();
            $table->integer('minimum_age')->nullable();
            $table->integer('difficulty')->nullable();
            $table->integer('max_altitude')->nullable();
            $table->text('physical_requirements')->nullable();
            $table->text('included')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('media_id')->references('id')->on('media');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};

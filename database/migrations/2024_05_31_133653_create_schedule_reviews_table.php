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
        Schema::create('schedule_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('schedule_id');
            $table->date('review_date');
            $table->unsignedTinyInteger('overall_rating')->nullable();
            $table->unsignedTinyInteger('cleanliness')->nullable();
            $table->unsignedTinyInteger('comfort')->nullable();
            $table->unsignedTinyInteger('safety')->nullable();
            $table->unsignedTinyInteger('organization')->nullable();
            $table->unsignedTinyInteger('punctuality')->nullable();
            $table->unsignedTinyInteger('guide_rating')->nullable();
            $table->unsignedTinyInteger('driver_rating')->nullable();
            $table->unsignedTinyInteger('food_rating')->nullable();
            $table->unsignedTinyInteger('duration_rating')->nullable();
            $table->unsignedTinyInteger('value_for_money')->nullable();
            $table->boolean('would_recommend')->default(false);
            $table->text('comment')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('schedule_id')->references('id')->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_reviews');
    }
};

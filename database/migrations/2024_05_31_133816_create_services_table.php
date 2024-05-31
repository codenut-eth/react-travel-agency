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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('media_id')->nullable();
            $table->string('service_type');
            $table->string('contact_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('information_url')->nullable();
            $table->decimal('commission_rate', 5, 2)->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('media_id')->references('id')->on('media');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

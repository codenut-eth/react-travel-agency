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
        Schema::create('afiliates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('comission')->nullable();
            $table->string('document')->nullable();
            $table->text('bank_data')->nullable();
            $table->text('afiliated_observation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afiliates');
    }
};

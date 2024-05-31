<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('operator_id');
            $table->unsignedBigInteger('currency_id');
            $table->decimal('amount', 10, 2);
            $table->date('transfer_date');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->text('receipt')->nullable();
            $table->text('notes')->nullable();

            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('operator_id')->references('id')->on('operators');
            $table->foreign('currency_id')->references('id')->on('currencies');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transfers');
    }
};

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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('ref_number');
            $table->string('date');
            $table->integer('sales_letter_id');
            $table->string('revision',3);
            $table->enum('current_status',['open', 'approved', 'decline']);
            $table->integer('credit_terms_id')->nullable();
            $table->date('due_date')->nullable();
            $table->integer('created_by');
            $table->string('random_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};

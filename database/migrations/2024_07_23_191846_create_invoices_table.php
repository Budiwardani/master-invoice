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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('purchase_order_id');
            $table->integer('sales_leter_id');
            $table->string('delivery_order_id');
            $table->string('invoice_number')->nullable();
            $table->date('date');
            $table->date('due_date')->nullable();
            $table->integer('sub_total');
            $table->integer('discount');
            $table->integer('total');
            $table->integer('tax');
            $table->integer('grand_total');
            $table->enum('payment_status',['waiting', 'paid']);
            $table->string('random_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

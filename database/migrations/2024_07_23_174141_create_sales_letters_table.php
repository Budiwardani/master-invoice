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
        Schema::create('sales_letters', function (Blueprint $table) {
            $table->id();
            $table->string('ref_number');
            $table->integer('company_id');
            $table->integer('created_by');
            $table->date('due_date');
            $table->enum('current_status',['waiting', 'approved']);
            $table->string('random_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_letters');
    }
};

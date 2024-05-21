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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('card_number', 16);
            $table->string('expiration_month', 2);
            $table->string('expiration_year', 2);
            $table->string('cvc', 3);
            $table->string('cardholder_name');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3);
            $table->string('payment_method');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

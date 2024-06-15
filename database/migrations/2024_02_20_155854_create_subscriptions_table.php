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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('user_id');
            $table->tinyInteger('status')->default(0);
            $table->date('expiry_date')->nullable();
            $table->tinyInteger('product_type')->default(0);
            $table->boolean('payment_status')->default(0);
            $table->string('payment_method')->nullable();
            $table->decimal('payment_amount', 10, 2)->nullable();
            $table->foreign('student_id')->on('students')->references('student_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};

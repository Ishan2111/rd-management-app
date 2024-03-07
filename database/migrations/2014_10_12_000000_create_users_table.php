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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('acc_holder_name_1')->nullable();
            $table->string('acc_holder_cif_1')->nullable();
            $table->string('acc_holder_name_2')->nullable();
            $table->string('acc_holder_cif_2')->nullable();
            $table->string('account_number')->nullable();
            $table->string('amount')->nullable();
            $table->string('mobile', 20)->nullable();
            $table->date('open_date')->nullable();
            $table->string('years')->nullable();
            $table->date('matu_date')->nullable();
            $table->string('family_id')->nullable();
            $table->string('payment_reciver_name')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_date')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

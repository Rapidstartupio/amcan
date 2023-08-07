<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('loan_id')->nullable();
            $table->decimal('amount')->default(0)->nullable();
            $table->integer('frequency')->nullable();
            $table->string('status')->nullable();
            $table->decimal('total_paid')->default(0)->nullable();
            $table->decimal('remaining')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};

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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->decimal('loan_amount')->default(0)->nullable();
            $table->decimal('repayment_amount')->default(0)->nullable();
            $table->integer('repayment_frequency')->default(0)->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('expected_end_date')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('loans');
    }
};

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
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstName')->default("");
            $table->string('lastName')->default("");
            $table->string('middleName')->default("");
            $table->string('civicNumber')->default("");
            $table->string('streetName')->default("");
            $table->string('suite')->default("");
            $table->string('city')->default("");
            $table->string('province')->default("");
            $table->string('postalCode')->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstName');
            $table->dropColumn('lastName');
            $table->dropColumn('middleName');
            $table->dropColumn('civicNumber');
            $table->dropColumn('streetName');
            $table->dropColumn('suite');
            $table->dropColumn('city');
            $table->dropColumn('province');
            $table->dropColumn('postalCode');
        });
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('contact_number');
            $table->string('gender');
            $table->string('departure_city');
            $table->integer('quantity');
            $table->string('coupon')->nullable();
            $table->text('message');
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('clt_id');
            $table->foreign('clt_id')->references('id')->on('clients');
            $table->unsignedBigInteger('pkg_id');
            $table->foreign('pkg_id')->references('id')->on('packages');
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservs');
    }
};

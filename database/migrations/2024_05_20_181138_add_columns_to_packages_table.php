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
        Schema::table('packages', function (Blueprint $table) {
            $table->string('lieu_depart');
            $table->string('transport');
            $table->string('heure_depart');
            $table->string('services_inclus');
            $table->string('activite');
        });
    }


    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('lieu_depart');
            $table->dropColumn('transport');
            $table->dropColumn('heure_depart');
            $table->dropColumn('services_inclus');
            $table->dropColumn('activite');
        });
    }
};

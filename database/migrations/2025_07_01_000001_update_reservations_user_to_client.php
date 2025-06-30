<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Dodaj tymczasową kolumnę client_id (może być nullable na czas migracji)
            $table->foreignId('client_id')->nullable()->after('id');
        });

        // Jeśli chcesz przenieść dane z user_id do client_id, zrób to tutaj
        // UWAGA: Zakładam, że user_id == client_id (jeśli nie, trzeba napisać mapowanie)
        DB::statement('UPDATE reservations SET client_id = user_id');

        Schema::table('reservations', function (Blueprint $table) {
            // Usuń stary klucz obcy i kolumnę user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('reservations', function (Blueprint $table) {
            // Ustaw NOT NULL i klucz obcy na clients
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('client_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id');
        });

        DB::statement('UPDATE reservations SET user_id = client_id');

        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropColumn('client_id');
        });
    }
}; 
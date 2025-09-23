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
        Schema::table('izin', function (Blueprint $table) {
            $table->enum('hasil_validasi', [
                'kembali_sekolah',
                'pulang_rumah',
                'izin_lebih_dari_sehari'
            ])->nullable()->after('status_izin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('izin', function (Blueprint $table) {
            $table->dropColumn('hasil_validasi');
        });
    }
};

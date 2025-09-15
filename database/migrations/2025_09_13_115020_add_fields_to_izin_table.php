<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('izin', function (Blueprint $table) {
            $table->time('jam_kembali')->nullable()->after('jam_keluar');
            $table->string('qr_code')->nullable()->after('tanggal');
            $table->string('bukti_izin')->nullable()->after('qr_code');

            $table->enum('status_izin', [
                'baru',
                'menunggu_bukti',
                'menunggu_validasi',
                'disetujui',
                'ditolak'
            ])->default('baru')->change();
        });
    }

    public function down(): void
    {
        Schema::table('izin', function (Blueprint $table) {
            $table->dropColumn(['jam_kembali', 'qr_code', 'bukti_izin']);

            $table->enum('status_izin', ['menunggu', 'disetujui', 'ditolak'])
                ->default('menunggu')
                ->change();
        });
    }
};

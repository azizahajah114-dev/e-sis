<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TailLog extends Command
{
    /**
     * Nama dan signature command.
     */
    protected $signature = 'log:tail {lines=20}';

    /**
     * Deskripsi command.
     */
    protected $description = 'Menampilkan beberapa baris terakhir dari laravel.log';

    /**
     * Jalankan command.
     */
    public function handle()
    {
        $lines = (int) $this->argument('lines');
        $logFile = storage_path('logs/laravel.log');

        if (!file_exists($logFile)) {
            $this->error("File log tidak ditemukan: $logFile");
            return 1;
        }

        $content = file($logFile); // baca semua baris
        $total = count($content);

        $start = max($total - $lines, 0);
        $lastLines = array_slice($content, $start);

        $this->info("📜 Menampilkan {$lines} baris terakhir dari laravel.log:\n");
        foreach ($lastLines as $line) {
            $this->line(rtrim($line));
        }

        return 0;
    }
}

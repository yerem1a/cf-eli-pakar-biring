<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan semua seeder utama.
     */
    public function run(): void
    {
        $this->call([
            NilaiUserSeeder::class,
            GangguanSeeder::class,
            GejalaSeeder::class,
            RulesSeeder::class,
        ]);
    }
}

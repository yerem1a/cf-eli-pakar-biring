<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GangguanSeeder extends Seeder
{
    public function run()
    {
        DB::table('gangguans')->insert([
            ['nama_gangguan' => 'Dalam Bermain'],
            ['nama_gangguan' => 'Interaksi Sosial'],
            ['nama_gangguan' => 'Komunikasi'],
            ['nama_gangguan' => 'Perasaan Dan Emosi'],
            ['nama_gangguan' => 'Perilaku'],
        ]);
    }
}
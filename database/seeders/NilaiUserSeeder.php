<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('nilai_user')->insert([
            ['keterangan' => 'Tidak', 'nilai' => 0.0],
            ['keterangan' => 'Tidak Tahu', 'nilai' => 0.2],
            ['keterangan' => 'Sedikit Yakin', 'nilai' => 0.4],
            ['keterangan' => 'Cukup Yakin', 'nilai' => 0.6],
            ['keterangan' => 'Yakin', 'nilai' => 0.8],
            ['keterangan' => 'Sangat Yakin', 'nilai' => 1.0],
        ]);
    }
}
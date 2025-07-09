<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RulesSeeder extends Seeder
{
    public function run()
    {
        $rules = [
            ['gangguan_id' => 1, 'gejala_id' => 1, 'cf_pakar' => 0.5],
            ['gangguan_id' => 1, 'gejala_id' => 2, 'cf_pakar' => 0.1],
            ['gangguan_id' => 1, 'gejala_id' => 3, 'cf_pakar' => 0.1],
            ['gangguan_id' => 1, 'gejala_id' => 4, 'cf_pakar' => 0.4],
            ['gangguan_id' => 1, 'gejala_id' => 5, 'cf_pakar' => 0.3],
            ['gangguan_id' => 1, 'gejala_id' => 6, 'cf_pakar' => 0.6],
            ['gangguan_id' => 2, 'gejala_id' => 7, 'cf_pakar' => 0.8],
            ['gangguan_id' => 2, 'gejala_id' => 8, 'cf_pakar' => 0.6],
            ['gangguan_id' => 2, 'gejala_id' => 9, 'cf_pakar' => 0.4],
            ['gangguan_id' => 2, 'gejala_id' => 10, 'cf_pakar' => 0.3],
            ['gangguan_id' => 2, 'gejala_id' => 11, 'cf_pakar' => 0.6],
            ['gangguan_id' => 2, 'gejala_id' => 12, 'cf_pakar' => 0.3],
            ['gangguan_id' => 3, 'gejala_id' => 13, 'cf_pakar' => 0.2],
            ['gangguan_id' => 3, 'gejala_id' => 14, 'cf_pakar' => 0.6],
            ['gangguan_id' => 3, 'gejala_id' => 15, 'cf_pakar' => 0.5],
            ['gangguan_id' => 3, 'gejala_id' => 16, 'cf_pakar' => 0.7],
            ['gangguan_id' => 3, 'gejala_id' => 17, 'cf_pakar' => 0.1],
            ['gangguan_id' => 3, 'gejala_id' => 18, 'cf_pakar' => 0.4],
            ['gangguan_id' => 4, 'gejala_id' => 19, 'cf_pakar' => 0.4],
            ['gangguan_id' => 4, 'gejala_id' => 20, 'cf_pakar' => 0.8],
            ['gangguan_id' => 4, 'gejala_id' => 21, 'cf_pakar' => 0.3],
            ['gangguan_id' => 5, 'gejala_id' => 22, 'cf_pakar' => 0.3],
            ['gangguan_id' => 5, 'gejala_id' => 23, 'cf_pakar' => 0.6],
            ['gangguan_id' => 5, 'gejala_id' => 24, 'cf_pakar' => 0.1],
            ['gangguan_id' => 5, 'gejala_id' => 25, 'cf_pakar' => 0.5],
            ['gangguan_id' => 5, 'gejala_id' => 26, 'cf_pakar' => 0.3],
        ];
        DB::table('rules')->insert($rules);
    }
}
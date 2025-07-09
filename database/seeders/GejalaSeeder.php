<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    public function run()
    {
        $gejala = [
            // Dalam Bermain (gangguan_id = 1)
            ['gangguan_id' => 1, 'pertanyaan' => 'Bermain sangat monoton dan aneh', 'cf_pakar' => 0.5],
            ['gangguan_id' => 1, 'pertanyaan' => 'Ada kelekatan dengan benda tertentu', 'cf_pakar' => 0.1],
            ['gangguan_id' => 1, 'pertanyaan' => 'Jika senang satu mainan tidak mau mainan yang lainnya', 'cf_pakar' => 0.1],
            ['gangguan_id' => 1, 'pertanyaan' => 'Tidak menyukai boneka melainkan benda menarik seperti botol', 'cf_pakar' => 0.4],
            ['gangguan_id' => 1, 'pertanyaan' => 'Tidak dapat berimajinasi dalam bermain', 'cf_pakar' => 0.3],
            ['gangguan_id' => 1, 'pertanyaan' => 'Bila bepergian harus melalui rute yang sama', 'cf_pakar' => 0.6],

            // Interaksi Sosial (gangguan_id = 2)
            ['gangguan_id' => 1, 'pertanyaan' => 'Sering memperhatikan jari-jarinya sendiri atau kipas angin yang berputar', 'cf_pakar' => 0.8],
            ['gangguan_id' => 2, 'pertanyaan' => 'Menolak atau menghindar untuk bertatap muka', 'cf_pakar' => 0.6],
            ['gangguan_id' => 2, 'pertanyaan' => 'Tidak menoleh bila dipanggil', 'cf_pakar' => 0.4],
            ['gangguan_id' => 2, 'pertanyaan' => 'Menolak dipeluk', 'cf_pakar' => 0.3],
            ['gangguan_id' => 2, 'pertanyaan' => 'Bila menginginkan sesuatu berharap orang tersebut melakukan sesuatu untuknya', 'cf_pakar' => 0.6],
            ['gangguan_id' => 2, 'pertanyaan' => 'Tidak berbagi kesenangan dengan orang lain', 'cf_pakar' => 0.3],

            // Komunikasi (gangguan_id = 3)
            ['gangguan_id' => 2, 'pertanyaan' => 'Saat bermain, bila didekati malah menjauh', 'cf_pakar' => 0.2],
            ['gangguan_id' => 3, 'pertanyaan' => 'Perkembangan berbahasa mengalami keterlambatan', 'cf_pakar' => 0.6],
            ['gangguan_id' => 3, 'pertanyaan' => 'Kata-kata yang tidak dapat dimengerti orang lain', 'cf_pakar' => 0.5],
            ['gangguan_id' => 3, 'pertanyaan' => 'Menirukan kata, kalimat atau lagu tanpa tahu artinya', 'cf_pakar' => 0.7],
            ['gangguan_id' => 3, 'pertanyaan' => 'Bicaranya monoton seperti robot', 'cf_pakar' => 0.1],
            ['gangguan_id' => 3, 'pertanyaan' => 'Mimik datar', 'cf_pakar' => 0.4],

            // Perasaan dan Emosi (gangguan_id = 4)
            ['gangguan_id' => 3, 'pertanyaan' => 'Berkomunikasi dengan menggunakan bahasa tubuh', 'cf_pakar' => 0.4],
            ['gangguan_id' => 4, 'pertanyaan' => 'Tertawa-tawa sendiri, menangis atau marah tanpa sebab', 'cf_pakar' => 0.8],
            ['gangguan_id' => 4, 'pertanyaan' => 'Sering mengamuk tak terkendali', 'cf_pakar' => 0.3],

            // Perilaku (gangguan_id = 5)
            ['gangguan_id' => 4, 'pertanyaan' => 'Tidak dapat berbagi dengan perasaan orang lain', 'cf_pakar' => 0.3],
            ['gangguan_id' => 5, 'pertanyaan' => 'Sering dianggap anak yang senang kerapian', 'cf_pakar' => 0.6],
            ['gangguan_id' => 5, 'pertanyaan' => 'Mengulang suatu gerakan tertentu', 'cf_pakar' => 0.1],
            ['gangguan_id' => 5, 'pertanyaan' => 'Dapat menjadi sangat hiperaktif atau hipoaktif', 'cf_pakar' => 0.5],
            ['gangguan_id' => 5, 'pertanyaan' => 'Mengalami gangguan makan', 'cf_pakar' => 0.3],
        ];

        DB::table('gejalas')->insert($gejala);
    }
}

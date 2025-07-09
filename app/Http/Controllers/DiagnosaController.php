<?php
namespace App\Http\Controllers;

use App\Models\Gangguan;
use App\Models\Gejala;
use App\Models\NilaiUser;
use App\Models\HasilDiagnosa;
use App\Models\Rule;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
   

    public function index()
    {
        $gangguan = Gangguan::with('gejala')->get();
        $nilaiUser = NilaiUser::all();
        return view('diagnosa.index', compact('gangguan', 'nilaiUser'));
    }

    public function hasil(Request $request)
    {
        $input = $request->all();
        $hasil = [];

        foreach (Gangguan::all() as $gangguan) {
            $cf_kombinasi = 0;
            $rules = Rule::where('gangguan_id', $gangguan->id)->with('gejala')->get();

            foreach ($rules as $rule) {
                $cf_pasien = $input['gejala_' . $rule->gejala_id] ?? 0;
                $cf = $rule->cf_pakar * $cf_pasien;

                if ($cf_kombinasi == 0) {
                    $cf_kombinasi = $cf;
                } else {
                    $cf_kombinasi = $cf_kombinasi + $cf * (1 - $cf_kombinasi);
                }
            }

            $hasil[] = [
                'gangguan' => $gangguan->nama_gangguan,
                'cf_hasil' => $cf_kombinasi * 100,
            ];

            HasilDiagnosa::create([
                'gangguan_id' => $gangguan->id,
                'cf_hasil' => $cf_kombinasi * 100,
            ]);
        }

        return view('diagnosa.hasil', compact('hasil'));
    }
}
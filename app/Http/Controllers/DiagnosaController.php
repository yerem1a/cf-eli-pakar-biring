<?php

namespace App\Http\Controllers;

use App\Models\Gangguan;
use App\Models\Gejala;
use App\Models\NilaiUser;
use App\Models\HasilDiagnosa;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
    public function __construct()
    {
        // Semua method memerlukan login
        $this->middleware('auth');
    }

    public function index()
    {
        // Jika user belum login, redirect ke login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Sesi telah berakhir. Silakan login kembali.');
        }
        
        $gangguan = Gangguan::with('gejala')->get();
        $nilaiUser = NilaiUser::all();
        
        return view('diagnosa.index', compact('gangguan', 'nilaiUser'));
    }

    public function hasil(Request $request)
    {
        // Validasi: pastikan user masih login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Sesi telah berakhir. Silakan login kembali.');
        }
        
        // Validasi input
        $request->validate([
            'gejala_*' => 'sometimes|numeric|min:0|max:1'
        ]);
        
        $input = $request->all();
        $hasil = [];
        
        // User yang melakukan diagnosa
        $user_id = Auth::id();

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

            $cf_percentage = $cf_kombinasi * 100;
            
            $hasil[] = [
                'gangguan' => $gangguan->nama_gangguan,
                'cf_hasil' => $cf_percentage,
            ];

            // Simpan hasil diagnosa dengan user_id
            HasilDiagnosa::create([
                'user_id' => $user_id,
                'gangguan_id' => $gangguan->id,
                'cf_hasil' => $cf_percentage,
            ]);
        }

        // Urutkan hasil dari yang tertinggi
        usort($hasil, function($a, $b) {
            return $b['cf_hasil'] <=> $a['cf_hasil'];
        });

        return view('diagnosa.hasil', compact('hasil'));
    }
}
<?php
namespace App\Http\Controllers;

use App\Models\Gangguan;
use App\Models\Gejala;
use App\Models\Rule;
use Illuminate\Http\Request;

class GejalaController extends Controller
{

    public function index()
    {
        $gejala = Gejala::with('gangguan')->get();
        $gangguan = Gangguan::all();
        return view('gejala.index', compact('gejala', 'gangguan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gangguan_id' => 'required|exists:gangguan,id',
            'pertanyaan' => 'required|string',
            'cf_pakar' => 'required|numeric|between:0,1',
        ]);

        $gejala = Gejala::create($request->only(['gangguan_id', 'pertanyaan']));
        Rule::create([
            'gangguan_id' => $request->gangguan_id,
            'gejala_id' => $gejala->id,
            'cf_pakar' => $request->cf_pakar,
        ]);

        return redirect()->route('gejala.index')->with('success', 'Gejala dan rule berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $gejala = Gejala::findOrFail($id);
        $gangguan = Gangguan::all();
        $rule = Rule::where('gejala_id', $id)->first();
        return view('gejala.edit', compact('gejala', 'gangguan', 'rule'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gangguan_id' => 'required|exists:gangguan,id',
            'pertanyaan' => 'required|string',
            'cf_pakar' => 'required|numeric|between:0,1',
        ]);

        $gejala = Gejala::findOrFail($id);
        $gejala->update($request->only(['gangguan_id', 'pertanyaan']));
        Rule::updateOrCreate(
            ['gejala_id' => $gejala->id],
            ['gangguan_id' => $request->gangguan_id, 'cf_pakar' => $request->cf_pakar]
        );

        return redirect()->route('gejala.index')->with('success', 'Gejala dan rule berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);
        Rule::where('gejala_id', $gejala->id)->delete();
        $gejala->delete();
        return redirect()->route('gejala.index')->with('success', 'Gejala dan rule berhasil dihapus.');
    }
}
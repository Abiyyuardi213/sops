<?php

namespace App\Http\Controllers;

use App\Models\Dermaga;
use Illuminate\Http\Request;

class DermagaController extends Controller
{
    public function index()
    {
        $dermagas = Dermaga::orderBy('nama_dermaga', 'asc')->get();
        return view('dermaga.index', compact('dermagas'));
    }

    public function create()
    {
        $tipeOptions = Dermaga::getTipeOptions();
        $statusOptions = Dermaga::getStatusOptions();
        $fasilitasOptions = Dermaga::getFasilitasOptions();
        $suggestedCode = Dermaga::generateUniqueCode();
        return view('dermaga.create', compact('tipeOptions', 'statusOptions', 'fasilitasOptions', 'suggestedCode'));
    }

    public function show($id)
    {
        $dermaga = Dermaga::findOrFail($id);
        return view('dermaga.show', compact('dermaga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_dermaga' => 'required|string|unique:dermaga,kode_dermaga|max:50',
            'nama_dermaga' => 'required|string|max:255',
            'tipe_dermaga' => 'required|in:Beton,Floating,Kayu,Ponton',
            'panjang_m' => 'required|numeric|min:0',
            'lebar_m' => 'required|numeric|min:0',
            'kedalaman_min_lws' => 'required|numeric',
            'kedalaman_max_lws' => 'required|numeric',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
            'status' => 'required|in:Tersedia,Penuh,Perbaikan,Non-Aktif',
            'fasilitas' => 'nullable|array',
            'catatan_operasional' => 'nullable|string',
        ]);

        Dermaga::create($request->all());

        return redirect()->route('dermaga.index')->with('success', 'Data dermaga berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dermaga = Dermaga::findOrFail($id);
        $tipeOptions = Dermaga::getTipeOptions();
        $statusOptions = Dermaga::getStatusOptions();
        $fasilitasOptions = Dermaga::getFasilitasOptions();
        return view('dermaga.edit', compact('dermaga', 'tipeOptions', 'statusOptions', 'fasilitasOptions'));
    }

    public function update(Request $request, $id)
    {
        $dermaga = Dermaga::findOrFail($id);

        $request->validate([
            'kode_dermaga' => 'required|string|max:50|unique:dermaga,kode_dermaga,' . $id,
            'nama_dermaga' => 'required|string|max:255',
            'tipe_dermaga' => 'required|in:Beton,Floating,Kayu,Ponton',
            'panjang_m' => 'required|numeric|min:0',
            'lebar_m' => 'required|numeric|min:0',
            'kedalaman_min_lws' => 'required|numeric',
            'kedalaman_max_lws' => 'required|numeric',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
            'status' => 'required|in:Tersedia,Penuh,Perbaikan,Non-Aktif',
            'fasilitas' => 'nullable|array',
            'catatan_operasional' => 'nullable|string',
        ]);

        $dermaga->update($request->all());

        return redirect()->route('dermaga.index')->with('success', 'Data dermaga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dermaga = Dermaga::findOrFail($id);
        $dermaga->delete();

        return redirect()->route('dermaga.index')->with('success', 'Data dermaga berhasil dihapus.');
    }
}

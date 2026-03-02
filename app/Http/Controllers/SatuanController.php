<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuans = Satuan::orderBy('created_at', 'asc')->get();
        return view('satuan.index', compact('satuans'));
    }

    public function create()
    {
        return view('satuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_satuan' => 'required|string|unique:satuan,kode_satuan|max:50',
            'nama_satuan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Satuan::create($request->all());

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('satuan.edit', compact('satuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_satuan' => 'required|string|max:50|unique:satuan,kode_satuan,' . $id,
            'nama_satuan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $satuan = Satuan::findOrFail($id);
        $satuan->update($request->all());

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus.');
    }

    public function toggleStatus($id)
    {
        try {
            $satuan = Satuan::findOrFail($id);
            $satuan->toggleStatus();

            return response()->json([
                'success' => true,
                'message' => 'Status satuan berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui status.'
            ], 500);
        }
    }
}

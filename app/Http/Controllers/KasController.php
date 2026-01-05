<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kas = Kas::orderBy('tanggal', 'desc')->get();
        
        $totalPemasukan = Kas::pemasukan()->sum('jumlah');
        $totalPengeluaran = Kas::pengeluaran()->sum('jumlah');
        $saldo = $totalPemasukan - $totalPengeluaran;

        return view('kas.index', compact('kas', 'totalPemasukan', 'totalPengeluaran', 'saldo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric|min:0.01',
        ]);

        Kas::create($validated);

        return redirect()->route('kas.index')
                        ->with('success', 'Data kas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kas $ka)
    {
        return view('kas.show', compact('ka'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kas $ka)
    {
        return view('kas.edit', compact('ka'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kas $ka)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric|min:0.01',
        ]);

        $ka->update($validated);

        return redirect()->route('kas.index')
                        ->with('success', 'Data kas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kas $ka)
    {
        $ka->delete();

        return redirect()->route('kas.index')
                        ->with('success', 'Data kas berhasil dihapus');
    }
}

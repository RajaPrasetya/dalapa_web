<?php

namespace App\Http\Controllers;

use App\Models\TiketGangguan;
use Illuminate\Http\Request;

class TiketGangguanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiketGangguans = TiketGangguan::paginate(10);
        $totalTiketOpen = TiketGangguan::where('status', 'open')->count();
        $totalTiketInProgress = TiketGangguan::where('status', 'in_progress')->count();
        $totalTiketClosed = TiketGangguan::where('status', 'closed')->count();
        return view('tiket-gangguan.index', compact('tiketGangguans', 'totalTiketOpen', 'totalTiketInProgress', 'totalTiketClosed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiket-gangguan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'headline' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|string',
        ]);

        // Generate new id_tiket with "IN" prefix
        $last = TiketGangguan::withTrashed()->orderBy('id_tiket', 'desc')->first();
        if ($last && preg_match('/IN(\d+)/', $last->id_tiket, $matches)) {
            $number = intval($matches[1]) + 1;
        } else {
            $number = 1;
        }
        $newId = 'IN' . str_pad($number, 6, '0', STR_PAD_LEFT);

        // Create new TiketGangguan
        TiketGangguan::create([
            'id_tiket' => $newId,
            'headline' => $validated['headline'],
            'deskripsi' => $validated['deskripsi'],
            'status' => $validated['status'],
        ]);

        ActivityLogger::log('create', 'Tiket created with ID: ' . $newId);
        return redirect()->route('admin.tiket-gangguan.index')->with('success', 'Tiket berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TiketGangguan $tiketGangguan)
    {
        return view('tiket-gangguan.show', compact('tiketGangguan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TiketGangguan $tiketGangguan)
    {
        return view('tiket-gangguan.edit', compact('tiketGangguan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TiketGangguan $tiketGangguan)
    {
        // Validate input
        $validated = $request->validate([
            'headline' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|string',
        ]);

        // Update TiketGangguan
        $tiketGangguan->update($validated);
        ActivityLogger::log('update', 'Tiket updated with ID: ' . $tiketGangguan->id_tiket);
        return redirect()->route('admin.tiket-gangguan.index')->with('success', 'Tiket berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TiketGangguan $tiketGangguan)
    {
        // log activity
        ActivityLogger::log('delete', 'Tiket deleted with ID: ' . $tiketGangguan->id_tiket);
        
        // Delete the TiketGangguan
        $tiketGangguan->delete();

        return redirect()->route('admin.tiket-gangguan.index')->with('success', 'Tiket berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TiketGangguan;
use App\Models\User;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workorders = WorkOrder::paginate(10);
        $totalWorkorderOpen = WorkOrder::where('status', 'open')->count();
        $totalWorkorderInProgress = WorkOrder::where('status', 'in_progress')->count();
        $totalWorkorderClosed = WorkOrder::where('status', 'closed')->count();
        return view('workorder.index', compact('workorders', 'totalWorkorderOpen', 'totalWorkorderInProgress', 'totalWorkorderClosed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workorder.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|in:open,in_progress,closed',
            'deskripsi' => 'nullable|string',
            'segmen' => 'nullable|in:feeder,distribusi',
            'created_by' => 'required|exists:users,id',
            'assigned_to' => 'nullable|exists:users,id',
            'id_tiket' => 'nullable|string|max:16|exists:tiket_gangguan,id_tiket',
        ]);

        // Generate new id_workorder with "WO" prefix
        $last = WorkOrder::withTrashed()->orderBy('id_workorder', 'desc')->first();
        if ($last && preg_match('/WO(\d+)/', $last->id_workorder, $matches)) {
            $number = intval($matches[1]) + 1;
        } else {
            $number = 1;
        }
        $newId = 'WO' . str_pad($number, 6, '0', STR_PAD_LEFT);

        WorkOrder::create([
            'id_workorder' => $newId,
            'status' => $validated['status'],
            'deskripsi' => $validated['deskripsi'],
            'segmen' => $validated['segmen'],
            'created_by' => $validated['created_by'],
            'assigned_to' => $validated['assigned_to'],
            'id_tiket' => $validated['id_tiket'],
        ]);

        return redirect()->route('workorder.index')->with('success', 'Work Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkOrder $workorder)
    {
        // Load the related models
        $workorder->load('user', 'assignedUser', 'tiketGangguan');
        return view('workorder.show', compact('workorder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkOrder $workorder)
    {
        // Load the related models
        $workorder->load('user', 'assignedUser', 'tiketGangguan');
        // get list user with role teknisi
        $teknisis = User::where('role', 'teknisi')->get();
        // Load all list tiket gangguan
        $tiketGangguans = TiketGangguan::all();
        return view('workorder.edit', compact('workorder', 'teknisis', 'tiketGangguans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkOrder $workorder)
    {
        $request->validate([
            'status' => 'required|in:open,in_progress,closed',
            'deskripsi' => 'nullable|string',
            'segmen' => 'nullable|in:feeder,distribusi',
            'assigned_to' => 'nullable|exists:users,id',
            'id_tiket' => 'nullable|string|max:16|exists:tiket_gangguan,id_tiket',
        ]);

        // Only update the fields you want to allow
        $workorder->update([
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'segmen' => $request->segmen,
            'assigned_to' => $request->assigned_to,
            'id_tiket' => $request->id_tiket,
        ]);

        return redirect()->route('workorder.index')->with('success', 'Work Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkOrder $workOrder)
    {
        $workOrder->delete();

        return redirect()->route('workorder.index')->with('success', 'Work Order deleted successfully.');
    }
}

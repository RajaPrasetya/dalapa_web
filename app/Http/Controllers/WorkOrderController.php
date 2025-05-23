<?php

namespace App\Http\Controllers;

use App\Models\Material;
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
        $workorder->load('user', 'assignedUser', 'tiketGangguan', 'materials', 'photos');
        return view('workorder.show', compact('workorder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkOrder $workorder)
    {
        // Load the related models
        $workorder->load('user', 'assignedUser', 'tiketGangguan', 'materials');
        // get list user with role teknisi
        $teknisis = User::where('role', 'teknisi')->get();
        // Load all list tiket gangguan
        $tiketGangguans = TiketGangguan::all();
        // Load all list material
        $materials = Material::all();
        return view('workorder.edit', compact('workorder', 'teknisis', 'tiketGangguans', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkOrder $workorder)
    {
        $validated = $request->validate([
            'status' => 'required|in:open,in_progress,closed',
            'deskripsi' => 'nullable|string',
            'segmen' => 'nullable|in:feeder,distribusi',
            'assigned_to' => 'nullable|exists:users,id',
            'id_tiket' => 'nullable|string|max:16|exists:tiket_gangguan,id_tiket',
            'material_id' => 'nullable|array',
            'material_id.*' => 'nullable|exists:material,id_material',
            'material_quantity' => 'nullable|array',
            'material_quantity.*' => 'nullable|numeric|min:1',
        ]);

        $workorder->update([
            'status' => $validated['status'],
            'deskripsi' => $validated['deskripsi'],
            'segmen' => $validated['segmen'],
            'assigned_to' => $validated['assigned_to'],
            'id_tiket' => $validated['id_tiket'],
        ]);

        // Process material usage
        if ($request->has('material_id') && $request->has('material_quantity')) {
            $materialData = [];
            
            foreach ($request->material_id as $index => $materialId) {
                // Skip empty materials
                if (empty($materialId)) continue;
                
                $quantity = $request->material_quantity[$index] ?? 0;
                
                // Prepare data for sync
                $materialData[$materialId] = ['qty_used' => $quantity];
            }
            
            // Sync materials with pivot data
            $workorder->materials()->sync($materialData);
        } else {
            // Clear all materials if none provided
            $workorder->materials()->detach();
        }

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

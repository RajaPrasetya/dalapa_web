<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::paginate(10);
        return view('material.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('material.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
        ]);

        Material::create($request->all());
        $material = Material::create($request->all());
        ActivityLogger::log('create', 'Material created with ID: ' . $material->id_material);
        return redirect()->route('material.index')->with('success', 'Material created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        // pagination
        return view('material.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('material.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $material->update($request->all());
        ActivityLogger::log('update', 'Material updated with ID: ' . $material->id_material);

        return redirect()->route('material.index')->with('success', 'Material updated successfully.');
    }

    /**
     * Export materials to CSV.
     */
    public function export()
    {
        $materials = Material::all();
        
        $filename = 'materials_' . date('Y-m-d_His') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        
        // Log the export activity
        ActivityLogger::log('export', 'Materials exported to CSV: ' . $filename);
        
        // Create a callback function that will be used to stream the CSV
        $callback = function() use ($materials) {
            // Create a file pointer
            $handle = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($handle, ['ID', 'Name', 'Description', 'Quantity', 'Price', 'Created At', 'Updated At']);
            
            // Add data rows
            foreach ($materials as $material) {
                fputcsv($handle, [
                    $material->id_material,
                    $material->name,
                    $material->description,
                    $material->quantity,
                    $material->price,
                    $material->created_at,
                    $material->updated_at,
                ]);
            }
            
            // Close the file
            fclose($handle);
        };
        
        // Return a streaming response
        return response()->stream($callback, 200, $headers);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        // Log the delete activity
        ActivityLogger::log('delete', 'Material deleted with ID: ' . $material->id_material);
        // Detach any related work orders
        $material->delete();

        return redirect()->route('material.index')->with('success', 'Material deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\KpiCategory;
use Illuminate\Http\Request;

class KpiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = KpiCategory::paginate(10);
        return view('kpi-categories.index', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kpi-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'categories' => 'required|string|unique:kpi_categories,name',
            'description'=> 'required|string',
        ]);

        KpiCategory::create([
            'name' => $validatedData['categories'],
            'description' => $validatedData['description'],
        ]);

        // // Redirect to the categories list with a success message
        return redirect()->route('kpi-categories.create')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KpiCategory $kpiCategory)
    {
        // Menampilkan detail data karyawan
        return view('kpi-categories.show', ['category'=>$kpiCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KpiCategory $kpiCategory)
    {
        return view('kpi-categories.edit', ['category'=>$kpiCategory]);
        // return $kpiCategory;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KpiCategory $kpiCategory)
    {
        $validatedData = $request->validate([
            'categories' => 'required|string|unique:kpi_categories,name,' . $kpiCategory->id,
            'description' => 'required|string',
        ]);
        
        $kpiCategory->update([
            'name' => $validatedData['categories'],
            'description' => $validatedData['description'],
        ]);
        
        return redirect()->route('kpi-categories.index')->with('success', 'KPI Categories updated successfully.');
        
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KpiCategory $kpiCategory)
        {
            // Check if the category is associated with any indicators
            if ($kpiCategory->kpiIndicator()->exists()) {
                return redirect()->route('kpi-categories.index')
                    ->with('error', 'Category is still associated with indicators and cannot be deleted.');
            }

            // If no associations, proceed with deletion
            $kpiCategory->delete();

            return redirect()->route('kpi-categories.index')
                ->with('success', 'Category deleted successfully.');
        }
}

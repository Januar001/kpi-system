<?php

namespace App\Http\Controllers;

use App\Models\KpiCategory;
use App\Models\KpiIndicator;
use Illuminate\Http\Request;

class KpiIndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Indicators = KpiIndicator::with('KpiCategory')->paginate(10);
        // return $Indicator;
        return view('kpi-indicators.index', ['Indicators' => $Indicators]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = KpiCategory::get();
        return view('kpi-indicators.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'indicators'=> 'required|string',
            'weight'=>'required|numeric|max:100',
            'description'=> 'required|string',
        ]);

        KpiIndicator::create([
            'kpi_category_id' => $validatedData['category'],
            'name'=> $validatedData['indicators'],
            'weight'=> $validatedData['weight'],
            'description'=> $validatedData['description'],
        ]);
        return redirect()->route('kpi-indicators.create')->with('success', 'Indicators created successfully.');
        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(KpiIndicator $kpiIndicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KpiIndicator $kpiIndicator)
    {
        // Load the related category data for the indicator
        $kpiIndicator->load('kpiCategory');

        $category=KpiCategory::get();

        // Return the view with the specific indicator
        return view('kpi-indicators.edit', [
            'indicator' => $kpiIndicator,
            'category'=> $category
        ]);

        // return $kpiIndicator;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KpiIndicator $kpiIndicator)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'indicators'=> 'required|string',
            'weight'=>'required|numeric|max:100',
            'description'=> 'required|string',
        ]);

        $kpiIndicator->update([
            'kpi_category_id' => $validatedData['category'],
            'name'=> $validatedData['indicators'],
            'weight'=> $validatedData['weight'],
            'description'=> $validatedData['description'],
        ]);
        return redirect()->route('kpi-indicators.index')->with('success', 'KPI Indicators updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KpiIndicator $kpiIndicator)
    {
        $kpiIndicator->delete();

        // Redirect to the employees list with a success message
        return redirect()->route('kpi-indicators.index')->with('success', 'Indicator deleted successfully.');
    }
}

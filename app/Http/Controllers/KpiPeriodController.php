<?php

namespace App\Http\Controllers;

use App\Models\KpiPeriod;
use Illuminate\Http\Request;

class KpiPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $period = KpiPeriod::paginate(10);
        // return $period;
        return view('kpi-periods.index',['period'=>$period]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('kpi-periods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'periods' => 'required|string|unique:kpi_periods,name',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        
        KpiPeriod::create([
            'name' => $validatedData['periods'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
        ]);

        return redirect()->route('kpi-periods.index')->with('success', 'KPI Periods created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(KpiPeriod $kpiPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KpiPeriod $kpiPeriod)
    {
        return view('kpi-periods.edit',['periods'=>$kpiPeriod]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KpiPeriod $kpiPeriod)
    {
        $validatedData = $request->validate([
            'periods' => 'required|string|unique:kpi_periods,name,'. $kpiPeriod->id,
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
        
        $kpiPeriod->update([
            'name' => $validatedData['periods'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
        ]);

        return redirect()->route('kpi-periods.index')->with('success', 'KPI Periods updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KpiPeriod $kpiPeriod)
    {
        $kpiPeriod->delete();

            return redirect()->route('kpi-periods.index')
                ->with('success', 'Period deleted successfully.');
    }
}

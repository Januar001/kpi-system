<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KpiIndicator $kpiIndicator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KpiIndicator $kpiIndicator)
    {
        //
    }
}

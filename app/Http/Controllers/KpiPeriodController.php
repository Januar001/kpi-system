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
        return view('kpi-periods.index');
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
    public function show(KpiPeriod $kpiPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KpiPeriod $kpiPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KpiPeriod $kpiPeriod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KpiPeriod $kpiPeriod)
    {
        //
    }
}

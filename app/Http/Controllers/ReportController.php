<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\KpiCategory;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report = Employee::paginate('10');
        // return $report;
        return view('reports.index',['report'=>$report]);
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
    public function show($id)
    {
        $report = Employee::find($id);
        $category = KpiCategory::with('kpiIndicator')->get();
        return view ('reports.report-detail',['report'=>$report,'category'=>$category]);
        // return $category;
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Bonus $bonus)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Bonus $bonus)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Bonus $bonus)
    // {
    //     //
    // }
}

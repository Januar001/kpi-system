<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\KpiPeriod;
use App\Models\Evaluation;
use App\Models\KpiCategory;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluation = Evaluation::with('employee','kpiIndicator','kpiPeriod')->get();
        return view('evaluations.index',compact('evaluation'));
        // return $evaluation;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $period = KpiPeriod::get();
        $employee = Employee::get();
        $categories = KpiCategory::with('kpiIndicator')->get();
        return view('evaluations.create',compact('period','employee','categories'));
        // return $indicator;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // return $request;
            // Validasi awal
        $validatedData = $request->validate([
            'employee' => 'required|exists:employees,id', // Pastikan employee ID valid
            'period' => 'required|exists:kpi_periods,id', // Pastikan period ID valid
            'categories' => 'required|array', // Categories harus berupa array
            'categories.*.indicators' => 'required|array', // Indicators harus berupa array
            'categories.*.indicators.*' => 'required|numeric|min:0|max:100', // Validasi nilai indikator (0-100)
        ]);

        // Validasi tambahan untuk duplikasi
        foreach ($validatedData['categories'] as $category) {
            foreach ($category['indicators'] as $indicatorId => $value) {
                // Cek apakah kombinasi sudah ada di database
                $exists = Evaluation::where([
                    ['employee_id', '=', $validatedData['employee']],
                    ['kpi_indicator_id', '=', $indicatorId],
                    ['kpi_period_id', '=', $validatedData['period']],
                ])->exists();

                // Jika data sudah ada, tampilkan error
                if ($exists) {
                    return back()->withErrors([
                        'error' => "Data for the indicator with employee and period is already available."
                        // 'error' => "the data entered already exists"
                    ])->withInput();
                }
            }
        }

        // Penyimpanan data jika validasi lulus
        foreach ($validatedData['categories'] as $category) {
            foreach ($category['indicators'] as $indicatorId => $value) {
                Evaluation::create([
                    'employee_id' => $validatedData['employee'],
                    'kpi_indicator_id' => $indicatorId,
                    'value' => $value,
                    'kpi_period_id' => $validatedData['period'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Redirect dengan pesan sukses
        return redirect()->route('evaluations.index')->with('success', 'Evaluasi berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}

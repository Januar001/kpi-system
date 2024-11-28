<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\KpiPeriod;
use App\Models\Evaluation;
use App\Models\KpiCategory;
use Illuminate\Support\Facades\Validator;

class EvaluationCreate extends Component
{
    public $selectedEmployee;
    public $selectedPeriod;
    public $categories = [];
    public $employees = [];
    public $periods = [];
    public $indicatorValues = [];

    public function mount()
    {
        // Load data dari database
        $this->employees = Employee::all();
        $this->periods = KpiPeriod::all();
        $this->categories = KpiCategory::with('kpiIndicator')->get();
    }

    public function updatedIndicatorValues($value, $name)
    {
        // Menyimpan nilai indikator ke database
        \DB::table('employee_kpi_evaluations')->updateOrInsert(
            [
                'employee_id' => $this->selectedEmployee,
                'period_id' => $this->selectedPeriod,
                'indicator_id' => $this->getIndicatorIdFromName($name),
            ],
            [
                'value' => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }

    private function getIndicatorIdFromName($name)
    {
        // Ekstrak `indicator_id` dari nama input
        preg_match('/indicators\[(\d+)\]/', $name, $matches);
        return $matches[1] ?? null;
    }

    public function render()
    {
        return view('livewire.evaluation-create');
    }
}

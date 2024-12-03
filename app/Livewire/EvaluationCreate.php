<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\KpiPeriod;
use App\Models\Evaluation;
use App\Models\KpiCategory;
use App\Models\KpiIndicator;
use Illuminate\Support\Facades\Validator;

class EvaluationCreate extends Component
{
    public $selectedEmployee = "";
    public $employeeSelect;
    public $categories = [];
    public $employees = [];
    public $periods = [];
    public $indicatorValues = [];
    public $activePeriod;

    public function mount()
    {
        // Ambil activePeriod yang sudah dibagikan melalui AppServiceProvider
        $this->activePeriod = view()->shared('activePeriod');

        // Pastikan untuk mengisi data lainnya
        $this->employees = Employee::all();
        $this->periods = KpiPeriod::all();
        $this->categories = KpiCategory::with('kpiIndicator')->get();
    }

    public function render()
    {
        // Kelompokkan indikator berdasarkan kategori
        $indicator = KpiIndicator::with('kpiCategory')->get();
        $groupedIndicators = $indicator->groupBy(fn($item) => $item->kpiCategory->name);

        return view('livewire.evaluation-create', [
            'groupedIndicators' => $groupedIndicators,
        ]);
    }

    public function saveEvaluation()
    {
        // Simpan atau perbarui evaluasi untuk setiap indikator yang diubah
        foreach ($this->indicatorValues as $indicatorId => $value) {
            Evaluation::updateOrCreate(
                [
                    'employee_id' => $this->selectedEmployee,
                    'kpi_indicator_id' => $indicatorId,
                    'kpi_period_id' => $this->activePeriod->id, // Gunakan periode yang aktif
                ],
                ['value' => $value]
            );
        }

        session()->flash('message', 'Evaluation saved successfully!');
    }

    public function updatedSelectedEmployee($employeeId)
    {
        // Ambil data evaluasi berdasarkan karyawan yang dipilih
        $evaluations = Evaluation::where('employee_id', $employeeId)
            ->where('kpi_period_id', $this->activePeriod->id) // Gunakan periode yang aktif
            ->get();
    
        // Masukkan nilai evaluasi ke dalam indikatorValues
        $this->indicatorValues = $evaluations->pluck('value', 'kpi_indicator_id')->toArray();
    }
    
}

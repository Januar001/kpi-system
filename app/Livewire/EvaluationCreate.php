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
    public $selectedEmployee= "";
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

    public function render()
    {
        return view('livewire.evaluation-create');
    }
}

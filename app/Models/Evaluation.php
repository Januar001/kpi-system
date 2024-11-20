<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\KpiPeriod;
use App\Models\KpiIndicator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'kpi_indicator_id',
        'value',
        'kpi_period_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get the KPI indicator associated with the evaluation.
     */
    public function kpiIndicator()
    {
        return $this->belongsTo(KpiIndicator::class);
    }

    /**
     * Get the KPI period associated with the evaluation.
     */
    public function kpiPeriod()
    {
        return $this->belongsTo(KpiPeriod::class);
    }
}

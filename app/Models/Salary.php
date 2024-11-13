<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'base_salary',
        'bonus',
        'total_salary',
        'salary_month',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

<?php

namespace App\Models;

use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nip',
        'position',
        'department',
        'email',
        'salary',
        'hire_date',
    ];

    public function evaluation()
    {
        return $this->hasMany(Evaluation::class);
    }
}

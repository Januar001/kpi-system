<?php

namespace App\Models;

use App\Models\KpiIndicator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KpiCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function kpiIndicator()
    {
        return $this->hasMany(KpiIndicator::class);
    }
}

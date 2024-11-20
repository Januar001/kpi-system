<?php

namespace App\Models;

use App\Models\KpiCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KpiIndicator extends Model
{
    use HasFactory;

    protected $fillable = [
        'kpi_category_id',
        'name',
        'weight',
        'description',
    ];

    public function kpiCategory()
    {
        return $this->belongsTo(KpiCategory::class);
    }

    public function evaluation()
    {
        return $this->hasMany(Evaluation::class);
    }
}

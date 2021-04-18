<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'area',
        'area_id',
        'reference_date',
        'total_distinct_persons',
        'total_dose_1',
        'total_dose_2',
        'total_vaccinations',
    ];

    public function DailyVaccinations(): HasMany
    {
        return $this->hasMany(DailyVaccination::class, 'district_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailyVaccination extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
       'district_id',
       'daily_dose_1',
       'daily_dose_2',
       'day_difference',
       'day_total',
       'reference_date',
    ];

    public function DailyVaccinations(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}

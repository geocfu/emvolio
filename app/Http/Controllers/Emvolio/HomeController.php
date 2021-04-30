<?php

namespace App\Http\Controllers\Emvolio;

use App\Http\Controllers\Controller;
use App\Models\DailyVaccination;
use App\Models\District;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        // All the districts
        $districts = District::
            with(['dailyVaccinations'])
            ->get(['area', 'total_vaccinations', 'total_dose_1', 'total_dose_2']);
        // $districts = DailyVaccination::get();

        // The number of vaccinated citizens for the first and second dose
        $totalVaccinations = District::sum('total_vaccinations');

        // The number of vaccinated citizens for the first dose
        $totalDose1Vaccinations = District::sum('total_dose_1');

        // The number of vaccinated citizens for the second dose
        $totalDose2Vaccinations = District::sum('total_dose_2');

        // The date of the last update
        $lattestUpdateDatetime = District::orderBy('reference_date', 'desc')
            ->first(['reference_date']);
        
        // The number of vaccinated citizens for the lattest date available
        $lattestTotalDailyVaccinations = DailyVaccination::where('reference_date', '=', $lattestUpdateDatetime->reference_date)
            ->sum('day_total');

        // The number of vaccinated citizens for 1 day before the lattest date available
        $oneDayBeforeLattestTotalDailyVaccinations = DailyVaccination::
            where('reference_date', '=', date('Y-m-d', strtotime(substr($lattestUpdateDatetime->reference_date, 0, -9).'-1 days')))
            ->sum('day_total');

        // $districts1 = District::with(['dailyVaccinations'])->get()->toJson(JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        
        return Inertia::render('Home', [
            'districts' => $districts,
            'totalVaccinations' => $totalVaccinations,
            'totalDose1Vaccinations' => $totalDose1Vaccinations,
            'totalDose2Vaccinations' => $totalDose2Vaccinations,
            'lattestTotalDailyVaccinations' => $lattestTotalDailyVaccinations,
            'oneDayBeforeLattestTotalDailyVaccinations' => $oneDayBeforeLattestTotalDailyVaccinations,
            'lattestUpdateDatetime' => $lattestUpdateDatetime->reference_date,
        ]);
    }
}

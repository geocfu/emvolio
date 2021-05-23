<?php

namespace App\Http\Controllers\Emvolio;

use App\Http\Controllers\Controller;
use App\Models\DailyVaccination;
use App\Models\District;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index()
    {
        // All the districts
        $districts = District::with(['dailyVaccinations'])
            ->get(['area', 'total_vaccinations', 'total_dose_1', 'total_dose_2']);

        // The number of vaccinated citizens for the first and second dose
        $totalVaccinations = District::sum('total_vaccinations');

        // The number of vaccinated citizens for the first dose
        $totalDose1Vaccinations = District::sum('total_dose_1');

        // The number of vaccinated citizens for the second dose
        $totalDose2Vaccinations = District::sum('total_dose_2');

        // The date of the last update
        $lattestUpdateDatetime = District::orderByDesc('reference_date')
            ->first(['reference_date']);

        // The date of one update before the lattest
        $oneDayBeforelattestUpdateDatetime = date('Y-m-d', strtotime(substr($lattestUpdateDatetime->reference_date, 0, -9).'-1 days'));

        // The number of vaccinated citizens for the lattest date available
        $lattestTotalDailyVaccinations = DailyVaccination::
            whereReferenceDate($lattestUpdateDatetime->reference_date)
            ->sum('day_total');

        // The number of vaccinated citizens for 1 day before the lattest date available
        $oneDayBeforeLattestTotalDailyVaccinations = DailyVaccination::
            whereReferenceDate($oneDayBeforelattestUpdateDatetime)
            ->sum('day_total');

        // The number of vaccinated citizens for the first dose for the lattest date available
        $lattestTotalDose1DailyVaccinations = DailyVaccination::
            whereReferenceDate($lattestUpdateDatetime->reference_date)
            ->sum('daily_dose_1');

        // The number of vaccinated citizens for the first dose for 1 day before the lattest date available
        $oneDayBeforeLattestTotalDose1DailyVaccinations = DailyVaccination::
            whereReferenceDate($oneDayBeforelattestUpdateDatetime)
            ->sum('daily_dose_1');

        // The number of vaccinated citizens for the second dose for the lattest date available
        $lattestTotalDose2DailyVaccinations = DailyVaccination::
            whereReferenceDate($lattestUpdateDatetime->reference_date)
            ->sum('daily_dose_2');

        // The number of vaccinated citizens for the first dose for 1 day before the lattest date available
        $oneDayBeforeLattestTotalDose2DailyVaccinations = DailyVaccination::
            whereReferenceDate($oneDayBeforelattestUpdateDatetime)
            ->sum('daily_dose_2');

        // $districts1 = District::with(['dailyVaccinations'])->get()->toJson(JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

        return Inertia::render('Home', [
            'districts' => $districts,
            'totalVaccinations' => $totalVaccinations,
            'totalDose1Vaccinations' => $totalDose1Vaccinations,
            'totalDose2Vaccinations' => $totalDose2Vaccinations,
            'lattestTotalDailyVaccinations' => $lattestTotalDailyVaccinations,
            'oneDayBeforeLattestTotalDailyVaccinations' => $oneDayBeforeLattestTotalDailyVaccinations,
            'lattestTotalDose1DailyVaccinations' => $lattestTotalDose1DailyVaccinations,
            'oneDayBeforeLattestTotalDose1DailyVaccinations' => $oneDayBeforeLattestTotalDose1DailyVaccinations,
            'lattestTotalDose2DailyVaccinations' => $lattestTotalDose2DailyVaccinations,
            'oneDayBeforeLattestTotalDose2DailyVaccinations' => $oneDayBeforeLattestTotalDose2DailyVaccinations,
            'lattestUpdateDatetime' => $lattestUpdateDatetime->reference_date,
            'oneDayBeforelattestUpdateDatetime' => $oneDayBeforelattestUpdateDatetime,
        ]);
    }
}

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
        $districts = District::with(['dailyVaccinations'])->get(['area', 'total_vaccinations', 'total_dose_1', 'total_dose_2']);
        // $districts = DailyVaccination::get();
        // dd($districts);
        // The number of vaccinated citizens for the first and second dose
        $totalVaccinations = District::sum('total_vaccinations');

        // The number of vaccinated citizens for the first dose
        $totalDose1Vaccinations = District::sum('total_dose_1');

        // The number of vaccinated citizens for the second dose
        $totalDose2Vaccinations = District::sum('total_dose_2');

        // The date of the last update
        $lastUpdate = District::orderBy('updated_at', 'asc')->first(['updated_at']);
        // dd($lastUpdateDate);
        return Inertia::render('Home', [
            'districts' => $districts,
            'totalVaccinations' => $totalVaccinations,
            'totalDose1Vaccinations' => $totalDose1Vaccinations,
            'totalDose2Vaccinations' => $totalDose2Vaccinations,
            'lastUpdate' => $lastUpdate,
        ]);
    }
}

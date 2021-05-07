<?php

namespace App\Console\Commands;

use App\Models\DailyVaccination;
use App\Models\District;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetVaccineData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vaccine:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the covid-19 vaccination data from data.gov.gr\'s API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("started running");
        $url = env('DATA_GOV_GR_URL_VACCINE');
        $token= env('DATA_GOV_GR_TOKEN');
        
        $response = Http::withHeaders([
            'Authorization' => "Token $token"
        ])
        ->get($url)
        ->json();
        
        if (!Arr::accessible($response)) {
            info('Response is not configured correctly, aborting!');
            //TODO: dispatch an email to anounce that to the sysadmin
            return;
        }

        DB::transaction(function () use ($response) {
            foreach ($response as $districtFromApi) {
                $district = District::updateOrCreate(
                    [
                        'area' => $districtFromApi['area'],
                        'area_id' => $districtFromApi['areaid'],
                    ],
                    [
                        'reference_date' =>  $districtFromApi['referencedate'],
                        'total_distinct_persons' => $districtFromApi['totaldistinctpersons'],
                        'total_dose_1' => $districtFromApi['totaldose1'],
                        'total_dose_2' => $districtFromApi['totaldose2'],
                        'total_vaccinations' => $districtFromApi['totalvaccinations'],
                    ]
                );
            
                DailyVaccination::updateOrCreate(
                    [
                        'district_id' => $district->id,
                        'reference_date' => $districtFromApi['referencedate'],
                    ],
                    [
                        'daily_dose_1' =>  $districtFromApi['dailydose1'],
                        'daily_dose_2' => $districtFromApi['dailydose2'],
                        'day_difference' => $districtFromApi['daydiff'],
                        'day_total' => $districtFromApi['daytotal'],
                    ]
                );
            }
        });

        Log::info("stopped running");
    }
}

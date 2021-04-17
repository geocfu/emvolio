<?php

namespace App\Console\Commands;

use App\Models\District;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

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
        $url = env('DATA_GOV_GR_URL_VACCINE');
        $token= env('DATA_GOV_GR_TOKEN');

        $existingData = District::first();
        
        $dateFrom = date('Y/m/d', strtotime('-1 days'));
        if (!$existingData) {
            // The db is empty, so we must populate it with data from the beggining of recorded time
            $dateFrom = '2020-12-28';
        }
        var_dump($dateFrom);
        
        // $response = Http::withHeaders([
        //     'Authorization' => "Token $token"
        // ])
        // ->get($url, [
        //     'date_from' => "$date_from",
        //     'date_to' => date("Y/m/d"),
        // ])
        // ->json();
        $response = Http::withHeaders([
            'Authorization' => "Token $token"
        ])
        ->get(
            $url,
            [
                'date_from' => $dateFrom,
                'date_to' => date('Y/m/d'),
            ]
        )
        ->json();
        
        if (!is_array($response)) {
            info('Response is not configured correctly, aborting!');
            //TODO: dispatch an email to anounce that to the sysadmin
            return;
        }

        foreach ($response as $district) {
            foreach ($district as $key) {
                // $validated = $response->validate([
                //     'title' => 'required|unique:posts|max:255',
                //     'body' => 'required',
                // ]);
                // District::create([
                //     'area' => '',
                //     'areaid' => '',
                //     'dailydose1' => '',
                //     'dailydose2' => '',
                //     'daydiff' => '',
                //     'daytotal' => '',
                //     'referencedate' => '',
                //     'totaldistinctpersons' => '',
                //     'totaldose1' => '',
                //     'totaldose2' => '',
                //     'totalvaccinations' => '',
                // ]);
                
                
                echo $key .'\n\n';
            }
        }

        // District::()
    }
}

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | External API Configuration
    |--------------------------------------------------------------------------
    |
    | Those values define the api endpoint that we need to hit in order to get
    | the data and also, the token we must use in order to authenticate.
    |
    */

    'endpoint' => env('DATA_GOV_GR_VACCINE_ENDPOINT'),

    'token' => env('DATA_GOV_GR_AUTH_TOKEN')
];

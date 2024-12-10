<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Route Middleware Configuration
    |--------------------------------------------------------------------------
    |
    | An array of all middlewares to be applied to all of the generated routes.
    |
    */

    'middleware' => [],

    /*
    |--------------------------------------------------------------------------
    | Route Prefix
    |--------------------------------------------------------------------------
    |
    | Defines the route prefix.
    |
    */

    'prefix' => 'api',


    /*
    |--------------------------------------------------------------------------
    | Tableau default user
    |--------------------------------------------------------------------------
    |
    | Defines the Tableau user to use for the Direct Trust connection.
    |
    */

    'defaultUser' => env('TABLEAU_DEFAULT_USER'),

    /*
    |--------------------------------------------------------------------------
    | Tableau secret
    |--------------------------------------------------------------------------
    |
    | Defines the Tableau Direct Trust Secret.
    |
    */

    'secret' => env('TABLEAU_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Tableau secret ID
    |--------------------------------------------------------------------------
    |
    | Defines the Tableau Direct Trust Secret ID.
    |
    */

    'secretId' => env('TABLEAU_SECRET_ID'),

    /*
    |--------------------------------------------------------------------------
    | Tableau client ID
    |--------------------------------------------------------------------------
    |
    | Defines the Tableau Direct Trust client ID.
    |
    */

    'clientId' => env('TABLEAU_CLIENT_ID'),

];

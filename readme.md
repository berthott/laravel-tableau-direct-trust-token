# Laravel-Tableau-Direct-Trust-Token

Create an API Token for a Tableau Cloud Direct Trust integration.

## Requirements

For a Direct Trust connection to Tableau Cloud it is necessary to [configure Direct Trust within Tableau](https://help.tableau.com/current/online/en-us/connected_apps_direct.htm).

## Installation

```sh
$ composer require berthott/laravel-tableau-direct-trust-token
```

## Usage

This package registers a `tableau\token` POST route that can be used to obtain a token, that can be used to connect to Tableau Cloud via Direct Trust.
To generate the correct token you need to provide the [Config Information](#options) and an optional `user` body parameter to alter the desired username with witch you want to authenticate with Tableau.

## Options

To provide the config options use
```
$ php artisan vendor:publish --provider="berthott\Tableau\TableauDirectTrustTokenProvider" --tag="config"
```
* `defaultUser`: the default username with witch you want to authenticate with Tableau. Defaults to `env('TABLEAU_DEFAULT_USER')`
* `secret`: the Tableau secret. Defaults to `env('TABLEAU_SECRET')`
* `secretId`: the Tableau secretId. Defaults to `env('TABLEAU_SECRET_ID')`
* `clientId`: the Tableau clientId. Defaults to `env('TABLEAU_CLIENT_ID')`
* `prefix`: Defines the route prefix. Defaults to `api`.
* `middleware`: An array of all middlewares to be applied to all of the generated routes. Defaults to `[]`.

## Compatibility

Tested with Laravel 10.x.

## License

See [License File](license.md). Copyright © 2024 Jan Bladt.
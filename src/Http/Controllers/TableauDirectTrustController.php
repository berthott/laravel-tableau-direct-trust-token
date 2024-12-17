<?php

namespace berthott\Tableau\Http\Controllers;

use Carbon\Carbon;
use Facades\berthott\Tableau\Services\UuidService;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

/**
 * Tableau Direct Trust endpoint implementation.
 */
class TableauDirectTrustController
{
    /**
     * Build the requested token.
     * 
     * @api
     */
    public function token(Request $request): array
    {
        $defaultUser = config('tableau-direct-trust.defaultUser');
        $secret = config('tableau-direct-trust.secret');
        $secretId = config('tableau-direct-trust.secretId');
        $clientId = config('tableau-direct-trust.clientId');

        $user = $request->has('user') ? $request->get('user') : $defaultUser;

        if (empty($user) || empty($secret) || empty($secretId) || empty($clientId)) {
            throw new \Exception('Tableau Direct Trust configuration is missing.');
        }

        $tokenExpiryInMinutes = 1; // Max of 10 minutes.

        $scopes = [
          'tableau:views:embed',
          //'tableau:views:embed_authoring',
          //'tableau:insights:embed'
        ];

        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT',
            'kid' => $secretId,
            'iss' => $clientId,
        ];

        $now = Carbon::now();

        $data = [
            'jti' => UuidService::uuid4(),
            'aud' => 'tableau',
            'sub' => $user,
            'scp' => $scopes,
            'exp' => $now->timestamp + $tokenExpiryInMinutes * 60,
            'iat' => $now->timestamp,
        ];

        return [
            'token' => JWT::encode($data, $secret, 'HS256', null, $header),
        ];
    }
}

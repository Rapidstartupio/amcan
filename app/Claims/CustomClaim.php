<?php

namespace App\Claims;

use App\Models\User;
use CorBosman\Passport\AccessToken;
use Illuminate\Support\Facades\Http;

class CustomClaim
{
    public function handle(AccessToken $token, $next)
    {
        $user = User::find($token->getUserIdentifier());
        // if (!$user->equifax_report_id) {
        //     $response = Http::withBasicAuth(env('EQUIFAX_CLIENT_ID'), env('EQUIFAX_SECRET_ID'))->post('https://api.uat.equifax.ca/v2/oauth/token', [
        //         'grant_type' => 'client_credentials',
        //         'scope' => 'https://api.equifax.ca/v1/credithealth'
        //     ]);
        //     dd($response);
        // }
        $token->addClaim('report_id', $user->equifax_report_id);
        //$token->addClaim('openid', 'string');
        return $next($token);
    }
}

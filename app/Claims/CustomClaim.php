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
        // try {
        //     $response = Http::withBasicAuth(env('EQUIFAX_CLIENT_ID'), env('EQUIFAX_SECRET_ID'))->asForm()->post('https://api.uat.equifax.ca/v2/oauth/token', [
        //         'grant_type' => 'client_credentials',
        //         'scope' => 'https://api.equifax.ca/v1/credithealth'
        //     ]);
        //     $res = $response->object();
        //     if ($res->access_token) {
        //         $response = Http::withToken($res->access_token)
        //             ->post('https://api.uat.equifax.ca/v1/credithealth/reportId/retrieve', [
        //                 'customerInfo' => ['memberNumber' => '999FZ03391', "securityCode" => "99"],
        //                 'personalInfo' => [
        //                     'firstName' => 'Patric', "lastName" => "Mcafee", "idpKey" => "1", 'middleName' => '', 'dob' => '1984-10-12',
        //                     'address' => ["civicNumber" => "123", "streetName" => "Main street", "suite" => "", "city" => "Montréal", "province" => "QC", "postalCode" => "H2Y2V5"]
        //                 ]
        //             ]);
        //         $res = $response->object();
        //         if (isset($res->data->reportId)) {
        //             $user->equifax_report_id = $res->data->reportId;
        //             $user->save();
        //         }
        //     }
        //     //if (!$user->equifax_report_id) {}
        //     $token->addClaim('report_id', $user->equifax_report_id);
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }

        //$token->addClaim('openid', 'string');
        return $next($token);
    }
}

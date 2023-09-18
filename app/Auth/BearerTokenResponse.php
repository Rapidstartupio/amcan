<?php

namespace App\Auth;

use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BearerTokenResponse extends \League\OAuth2\Server\ResponseTypes\BearerTokenResponse
{
    /**
     * Add custom fields to your Bearer Token response here, then override
     * AuthorizationServer::getResponseType() to pull in your version of
     * this class rather than the default.
     *
     * @param AccessTokenEntityInterface $accessToken
     *
     * @return array
     */
    protected function getExtraParams(AccessTokenEntityInterface $accessToken): array
    {
        $uid = $this->accessToken->getUserIdentifier();
        $user = User::find($uid);
        $reportId = "";
        $id_token = null;
        if (!env('EQUIFAX_CLIENT_ID') or !env('EQUIFAX_SECRET_ID')) {
            $id_token = JWTAuth::claims(['report_id' => $user->equifax_report_id])->fromUser($user);
            return [
                'id_token' => $id_token
            ];
        }
        try {
            $response = Http::withBasicAuth(env('EQUIFAX_CLIENT_ID'), env('EQUIFAX_SECRET_ID'))->asForm()->post('https://api.uat.equifax.ca/v2/oauth/token', [
                'grant_type' => 'client_credentials',
                'scope' => 'https://api.equifax.ca/v1/credithealth'
            ]);
            $res = $response->object();
            if ($res->access_token) {
                $response = Http::withToken($res->access_token)
                    ->post('https://api.uat.equifax.ca/v1/credithealth/reportId/retrieve', [
                        'customerInfo' => [
                            'memberNumber' => $user->memberNumber,
                            "securityCode" => $user->securityCode
                        ],
                        'personalInfo' => [
                            'firstName' => $user->firstName,
                            "lastName" => $user->lastName,
                            "idpKey" => $user->idpKey,
                            'middleName' => $user->middleName,
                            'dob' => $user->dob,
                            'address' => [
                                "civicNumber" => $user->civicNumber,
                                "streetName" => $user->streetName,
                                "suite" =>  $user->suite,
                                "city" => $user->city,
                                "province" =>  $user->province,
                                "postalCode" =>  $user->postalCode
                            ]
                        ]
                    ]);
                $res = $response->object();
                if (isset($res->data->reportId)) {
                    $reportId = $res->data->reportId;
                }
                $user->equifax_report_id = $reportId;
                $user->save();
            }
            $id_token = JWTAuth::claims(['report_id' => $user->equifax_report_id])->fromUser($user);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
        return [
            'id_token' => $id_token
        ];
    }
}

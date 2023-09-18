<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CreditHealthController extends Controller
{
    public function index()
    {
        return view('dashboard.credit-health.index');
    }
    public function retrieveReportid(Request $request)
    {
        $user = auth()->user();
        try {
            $data = [
                'personalInfo' => [
                    'firstName' => $request->firstName,
                    "lastName" =>  $request->lastName,
                    'middleName' =>  $request->middleName,
                    'dob' =>  $request->dob,
                    'address' => [
                        "civicNumber" =>  $request->civicNumber,
                        "streetName" =>  $request->streetName,
                        "suite" => $request->suite,
                        "city" =>  $request->city,
                        "province" =>  $request->province,
                        "postalCode" =>  $request->postalCode
                    ]
                ]
            ];
            $response = Http::withBasicAuth(env('EQUIFAX_CLIENT_ID'), env('EQUIFAX_SECRET_ID'))->asForm()->post('https://api.uat.equifax.ca/v2/oauth/token', [
                'grant_type' => 'client_credentials',
                'scope' => 'https://api.equifax.ca/v1/credithealth'
            ]);
            $res = $response->object();
            if (isset($res->access_token)) {
                $data = [
                    'personalInfo' => [
                        'firstName' => $request->firstName,
                        "lastName" =>  $request->lastName,
                        'middleName' =>  $request->middleName,
                        'dob' =>  $request->dob,
                        'address' => [
                            "civicNumber" =>  $request->civicNumber,
                            "streetName" =>  $request->streetName,
                            "suite" => $request->suite,
                            "city" =>  $request->city,
                            "province" =>  $request->province,
                            "postalCode" =>  $request->postalCode
                        ]
                    ]
                ];
                $response = Http::withToken($res->access_token)
                    ->post('https://api.uat.equifax.ca/v1/credithealth/reportId/retrieve', $data);
                $res = $response->object();
                dd($res);
            } else {
                //Access denied
                return response()->json(['error' => 'Access denied'], 403);
            }
        } catch (Exception $e) {
            //Access denied
            return response()->json(['error' => '500 Server Error'], 500);
            Log::info($e->getMessage());
        }

        return response()->json(['success' => true, 'results' => array()]);
    }
}

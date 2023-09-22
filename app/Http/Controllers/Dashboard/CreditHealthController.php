<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CreditHealthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = auth()->user();
        if($user->equifax_report_id){
            return redirect()->away('https://uat.credithealth.equifax.ca/credit-health/overview?mn=999FZ03391');
        }
        return view('dashboard.credit-health.index');
    }
    public function retrieveReportid(Request $request)
    {
        $user = auth()->user();
        try {

            $response = Http::withBasicAuth(env('EQUIFAX_CLIENT_ID'), env('EQUIFAX_SECRET_ID'))->asForm()->post('https://api.uat.equifax.ca/v2/oauth/token', [
                'grant_type' => 'client_credentials',
                'scope' => 'https://api.equifax.ca/v1/credithealth'
            ]);
            $res = $response->object();
            if (isset($res->access_token)) {
                $data = [
                    'customerInfo' => [
                        'memberNumber' => '999FZ03391',
                        'securityCode' => '99'
                    ],
                    'personalInfo' => [
                        'firstName' => $request->firstName,
                        "lastName" =>  $request->lastName,
                        'middleName' => ($request->middleName ?? ""),
                        'dob' =>  $request->dob,
                        'idpKey' => ($user->id ?? ""),
                        'address' => [
                            "civicNumber" => ($request->civicNumber ?? ""),
                            "streetName" => ($request->streetName ?? ""),
                            "suite" => ($request->suite ?? ""),
                            "city" => ($request->city ?? ""),
                            "province" => ($request->province ?? ""),
                            "postalCode" => ($request->postalCode ?? "")
                        ]
                    ]
                ];
                $response = Http::withToken($res->access_token)
                    ->post('https://api.uat.equifax.ca/v1/credithealth/reportId/retrieve', $data);
                $res = $response->object();
                if (isset($res->data->reportId)) {
                    $user->firstName = $request->firstName;
                    $user->lastName = $request->lastName;
                    $user->middleName = $request->middleName;
                    $user->dob = $request->dob;
                    $user->idpKey = $user->id;
                    $user->streetName = $request->streetName;
                    $user->suite = $request->suite;
                    $user->city = $request->city;
                    $user->province = $request->province;
                    $user->postalCode = $request->postalCode;
                    $user->equifax_report_id = $reportId;
                    $user->save();
                    return response()->json(['success' => true, 'data' => $res->data->reportId]);
                } else if (isset($res->error)) {
                    $return = ['success' => false, 'error' => $res->error];
                    if (isset($res->error->details)) {
                        $return['details'] = $res->error->details;
                    }
                    return response()->json($return);
                }
            } else {
                //Access denied
                return response()->json(['success' => false, 'error' => 'Access denied'], 403);
            }
        } catch (\Exception $e) {
            //500 Server Error
            return response()->json(['success' => false, 'error' => '500 Server Error'], 500);
            Log::info($e->getMessage());
        }

        return response()->json(['success' => true, 'results' => array()]);
    }
}

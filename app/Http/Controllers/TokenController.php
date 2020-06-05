<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
class TokenController extends Controller
{
    public function getToken(Request $request )
    {
        $http = new GuzzleClient;
        $this->validate($request,[
            'user_name'=>'required',
            'password'=>'required|min:6'

        ]);


$response = $http->post('http://dev.marriage/oauth/token', [
    'form_params' => [
        'grant_type' => 'password',
        'client_id' => '2',
        'client_secret' => 'qyfQRIYw7ntcBDfevhanE5D2Aa1JlPCREHRfBcG3',
        'username' => $request->input('user_name'),
        'password' =>  $request->input('password'),
        'scope' => '*',
    ],
]);

return json_decode((string) $response->getBody(), true);


    }
}

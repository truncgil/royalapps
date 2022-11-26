<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Token;

class Authentication extends Controller
{
    /**
     * Generate api url
     */
    private function getApiUrl($endpoint) {
        $url = env('SKELETON_URL');
        return $url . $endpoint;
    }

    private function httpPost($endpoint, $data) {
        return Http::acceptJson()
                    ->post($this->getApiUrl($endpoint), $data)->json();
    }

    /**
     * Issue an API access token
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function getToken(Request $request)
    {
        /*
            ahsoka.tano@q.agency
            Kryze4President
        */
        $data = [
            'email'     =>   $request->input('email'),
            'password'  =>   $request->input('password'),
        ];
        $response = $this->httpPost('api/v2/token', $data);
                        
        return $response;
    }

   
}

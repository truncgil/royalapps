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

        if(isset($response['token_key'])) {
            Token::updateOrCreate([
                'email' => $request->input('email'),
                'token' => $response['token_key']
            ],
            [
                'email' => $request->input('email'),
            ]);
            session([
                'email' => $request->input('email'),
                'token' => $response['token_key']
            ]);
            return redirect('/dashboard');
        } else {
            return redirect()->back()->withErrors(['error' => 'User not found']);;
        }
        
    }

   
}

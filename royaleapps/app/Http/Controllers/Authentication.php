<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use App\Http\Controllers\Skeleton;

class Authentication extends Controller
{
    

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

        $response = Skeleton::http('api/v2/token', $data);

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
                'token' => $response['token_key'],
                'data' => $response
            ]);
            return redirect('/dashboard');
        } else {
            return redirect()->back()->withErrors(['error' => 'User not found']);
        }
        
    }

   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Skeleton extends Controller
{
    /**
     * Generate api url
     */
    public function getApiUrl($endpoint) {
        $url = env('SKELETON_URL');
        return $url . $endpoint;
    }

    public function http($endpoint, $data, $type='post', $token=null) {
        $response = Http::acceptJson();
        $url = Skeleton::getApiUrl($endpoint);

        if(!is_null($token)) {
            $response = $response->withToken($token);
        }

        if($type=='post') {
            $response = $response->post($url, $data);
        }

        if($type=='get') {
            $response = $response->get($url, $data);
        }
        if($type=='delete') {
            $response = $response->delete($url, $data);
        }

        

        $response = $response->json();
        
        return $response;
    }

}

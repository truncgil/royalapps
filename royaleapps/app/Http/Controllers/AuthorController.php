<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Skeleton;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAuthors()
    {
        $list = Skeleton::http('api/v2/authors', null, 'get', session('token'));
        return view('authors', [
            'list' => $list
        ]);
    }

    
}

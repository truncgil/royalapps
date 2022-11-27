<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Skeleton;

class AuthorController extends Controller
{
    /**
     * Display a listing of the author resource.
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

    /**
     * Store a author
     *
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function storeAuthor(Request $request)
    {
        $data = [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'biography' => $request['biography'],
            'gender' => $request['gender'],
            'place_of_birth' => $request['place_of_birth'],
        ];

        $response = Skeleton::http('api/v2/authors', $data, 'post', session('token'));
        if(isset($response['message'])) {
            $message = $response['message'];
        } else {
            $message = "Author has been created success";
        }
        return redirect()
                    ->back()
                    ->with(
                        [
                            'message' => $message
                        ]
                    );
    }

    /**
     * Delete author
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAuthor($id)
    {
        $list = Skeleton::http('api/v2/authors/'.$id, null, 'delete', session('token'));

        return redirect()
        ->back()
        ->with(
            [
                'message' => "Author has been deleted success"
            ]
        );
    }

    
    

    
}

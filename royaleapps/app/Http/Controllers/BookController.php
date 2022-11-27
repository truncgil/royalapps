<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Skeleton;

class BookController extends Controller
{
   /**
     * Display a listing of the book resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listBooks()
    {
        $data = [
            'order_by' => 'id',
            'direction' => 'DESC'
        ];
        $list = Skeleton::http('api/v2/books', $data, 'get', session('token'));

        return view('books', [
            'list' => $list
        ]);
    }

   /**
     * Store a book
     *
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function storeBook(Request $request)
    {
        $data = [
            'author' => [
                'id' => $request->input('author')
            ],
            'title' => $request->input('author'),
            'release_date' => $request->input('release_date'),
            'description' => $request->input('description'),
            'isbn' => $request->input('isbn'),
            'format' => $request->input('format'),
            'number_of_pages' => (int) $request->input('number_of_pages'),
        ];

        $response = Skeleton::http('api/v2/books', $data, 'post', session('token'));
        if(isset($response['message'])) {
            $message = $response['message'];
        } else {
            $message = "Book has been created success";
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
     * Delete a book
     *
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function deleteBook($id)
    {
        

        $response = Skeleton::http('api/v2/books/'.$id, null, 'delete', session('token'));
       
        return redirect()
                    ->back()
                    ->with(
                        [
                            'message' => "Book has been deleted success"
                        ]
                    );
    }

    /**
     * Create a book
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function createBook()
    {
        $authors = Skeleton::http('api/v2/authors', null, 'get', session('token'));;

        return view('create-book', [
            'authors' => $authors
        ]);
    }


}

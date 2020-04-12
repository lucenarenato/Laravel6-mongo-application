<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
/*Extras*/
use App\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// Get the documents from books collection and return the view as well as
    	// compact version of the collection
    	//$books = Book::all();
        $books = DB::collection('books')->get();
        return view('bookindex', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view for adding books
        return view('bookadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create new book object and populate the fields with parameters from POST request
        // Save it in database and return the view as well as compact version of the collection
        $book = new book;
		$book->title =  $request->input('title');
		$book->isbn =  $request->input('isbn');
		$book->author =  $request->input('author');
		$book->category = $request->input('category') ;
		$book->save();
		$books = DB::collection('books')->get();
        return view('bookindex', compact('books'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get the document of given id and return compact version and the view corresponding to show
        $book = DB::collection('books')->where('_id', $id)->get();
		return view('bookview', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the document of given id and return the compact version and view corresponding to edit
         $book = DB::collection('books')->where('_id', $id)->get();
		 return view('bookedit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Update the document of given id with parameters from the PUT or PATCH request and return to index view
        DB::collection('books')->where('_id', $id)
				  ->update([
				  	'title' => $request->input('title'),
				  	'isbn' => $request->input('isbn'),
				  	'author' => $request->input('author'),
				  	'category' => $request->input('category')
				  	] );
		$books = DB::collection('books')->get();
        return view('bookindex', compact('books'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete the document of given id and return to the index view with a compact version of the collection
        DB::collection('books')->where('_id', $id)->delete();
		$books = DB::collection('books')->get();
        return view('bookindex', compact('books'));
    }
}
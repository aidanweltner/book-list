<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('all', [
            'books' => Book::all()->sortByDesc('completed'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'         => 'required|unique:books',
            'author'        => 'required',
            'description'   => 'required|max:280',
            'completed'     => 'required|date',
            'rating'        => 'required|numeric|max:5',
            'review'        => 'required',
            'purchase'      => 'nullable|url',
            'amazon'        => 'nullable|url',
        ]);

        $slug = Str::slug($attributes['title'], '-');

        Book::create([
            'slug'          => $slug,
            'title'         => $attributes['title'],
            'author'        => $attributes['author'],
            'description'   => $attributes['description'],
            'image'         => 'https://source.unsplash.com/featured/?sig='.strval(rand(100, 400)).'&book',
            'completed'     => $attributes['completed'],
            'rating'        => $attributes['rating'],
            'review'        => $attributes['review'],
            'purchase'      => $attributes['purchase'],
            'amazon'        => $attributes['amazon'],
        ]);

        return redirect()->route('all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BooksModel  $booksModel
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', [ 'book' => $book ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}

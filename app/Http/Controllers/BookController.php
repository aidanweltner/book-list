<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
            'image'             => 'required|image',
            'title'             => 'required|unique:books',
            'author'            => 'required',
            'description'       => 'required|max:280',
            'completed'         => 'required|date',
            'rating'            => 'required|numeric|max:5|min:0',
            'review'            => 'required',
            'purchase'          => 'nullable|url',
            'amazon'            => 'nullable|url',
        ]);

        $attributes['slug'] = Str::slug($attributes['title'], '-');

        $attributes['image'] = request('image')->store('book_featured_images');

        Book::create($attributes);

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
        return view('book.edit', [ 'book' => $book ]);
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
        $attributes = $request->validate([
            'image'             => ['nullable', 'image' ],
            'title'             => [
                'required',
                Rule::unique('books')->ignore($book),
            ],
            'author'            => ['required'],
            'description'       => ['required','max:280'],
            'completed'         => ['required','date'],
            'rating'            => ['required','numeric','max:5','min:0'],
            'review'            => ['required'],
            'purchase'          => ['nullable','url'],
            'amazon'            => ['nullable','url'],
        ]);

        if (request('image')) {
            $attributes['image'] = request('image')->store('book_featured_images');
        } else {
            $attributes['image'] = $book->image;
        }

        $book->update($attributes);

        return redirect($book->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('all');
    }
}

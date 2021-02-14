<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Profile;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::orderByDesc('completed')->paginate(4);

        $profile = Profile::where('is_home', 1)->get()[0];

        return view('home', [
            'books'     => $books,
            'profile'   => $profile,
        ]);
    }
}

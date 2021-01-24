<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::orderByDesc('completed')->paginate(4);

        $profile = null;

        /* dd([$books, $profile ]);
 */
        return view('home', [
            'books'     => $books,
            'profile'   => $profile,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Contracts\View\View;

class AuthorController extends Controller
{
    public function __invoke(): View
    {
        $authors = Author::with('images')->get();
        return view('authors.index', compact('authors'));
    }
}

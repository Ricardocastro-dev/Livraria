<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthorController; 
use Illuminate\Http\Request;
use App\Models\menu;
use Illuminate\Support\Facades\Redirect;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\User;
use App\Models\Sale;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:adm'); // Especifica que é para admins
    }
    
    public function inicio()
    {
        return view('menu.index', [
            'authors_count' => Author::count(),
            'publishers_count' => Publisher::count(),
            'books_count' => Book::count(),
            'users_count' => User::count(),
            'sales_count' => Sale::count(),
            'latest_books' => Book::latest()->take(5)->get()
        ]);
    }
}

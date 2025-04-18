<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class MenuClienteController extends Controller
{
    // Método para login

    public function index()
    {
        #$books = Book::orderByDesc('id')->get();
        ##['books' => $books];

        ##$books = Book::with(['publisher', 'author'])->get();
        ##, compact('books')

        #$books = Book::with(['publisher', 'author'])->get();
        #, compact('books')
        // Buscar todos os livros
        $books = Book::all(); // Ou use alguma filtragem específica se necessário

        // Retornar a view e passar os dados dos livros
        return view('menucliente.index', compact('books'));

    }
}
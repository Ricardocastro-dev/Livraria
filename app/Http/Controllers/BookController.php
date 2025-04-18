<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Models\Author;

class BookController
{
    public function index()
    {
        $books = Book::with(['publisher', 'author'])->get();
        return view('book.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id); // Recupere o livro pelo ID
        return view('book.show', compact('book'));
    }

    public function create()
    {
        $publishers = Publisher::orderByDesc('id')->get();
        $authors = Author::orderByDesc('id')->get();
        return view('book.create', ['publishers' => $publishers, 'authors' => $authors]);
    }
    public function store(Request $request)
    {
        // Validação dos dados
        #dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sale_price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'amount' => 'required|integer',
            'publishers_id' => 'required|exists:publishers,id',
            'authors_id' => 'required|exists:authors,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Salvar a imagem e exibir o caminho gerado
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books/images', 'public'); 
            #@dd($imagePath); // Depuração: Verificar o caminho salvo
        }
        if ($request->hasFile('image')) {
            // Garante que o diretório 'public/storage/books/images' esteja acessível
            $imagePath = $request->file('image')->store('books/images', 'public');
        }
    
        // Criação do livro
        $book = Book::create([
            'name' => $request->name,
            'sale_price' => $request->sale_price,
            'purchase_price' => $request->purchase_price,
            'amount' => $request->amount,
            'publisher_id' => $request->publishers_id,
            'author_id' => $request->authors_id,
            'image' => $imagePath, // Salva o caminho correto
        ]);
    
        return redirect()->route('book.index')->with('success', 'Livro criado com sucesso!');
    }
    
    

    public function edit(Book $book)
    {
        // Passa o livro atual para a view de edição
        $publishers = Publisher::all();  // Carregar todas as editoras
        $authors = Author::all();        // Carregar todos os autores
        return view('book.edit', compact('book', 'publishers', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        // Validação dos dados do formulário
        $request->validate([
            'publishers_id' => 'required|exists:publishers,id',
            'authors_id' => 'required|exists:authors,id',
            'name' => 'required|string|max:255',
            'sale_price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'amount' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validação para a imagem
        ]);

        // Se houver nova imagem no request
        if ($request->hasFile('image')) {
            // Apagar a imagem anterior se existir
            if ($book->image && file_exists(public_path('storage/' . $book->image))) {
                unlink(public_path('storage/' . $book->image));
            }

            // Salvar a nova imagem
            $imagePath = $request->file('image')->store('books/images', 'public');
            $book->image = $imagePath;  // Atualiza o caminho da imagem no banco
        }

        // Atualiza os dados do livro
        $book->update([
            'name' => $request->name,
            'sale_price' => $request->sale_price,
            'purchase_price' => $request->purchase_price,
            'amount' => $request->amount,
            'publisher_id' => $request->publishers_id,
            'author_id' => $request->authors_id,
        ]);

        return redirect()->route('book.index')->with('success', 'Livro editado com sucesso!');
    }

    public function destroy(Book $book)
    {
        if ($book->sale()->count() > 0) {
            return redirect()->route('book.index')->with('error', 'Este livro não pode ser excluído pois possui vendas associadas.');
        }
        // Apagar a imagem se existir
        if ($book->image && file_exists(public_path('storage/' . $book->image))) {
            unlink(public_path('storage/' . $book->image));
        }

        $book->delete();
        return redirect()->route('book.index')->with('success', 'Livro deletado com sucesso!');
    }
}

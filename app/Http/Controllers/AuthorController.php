<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;


class AuthorController
{

    
    public function index()
    {
        $authors = Author::orderByDesc('id')->get();
        ['authors' => $authors];
        return view('author.index',['authors' => $authors]);
    }



    public function show(Author $author)
    {
        return view('author.show', ['author' => $author]);
    }




    public function create()
    {
        return view('author.create');
    }


    public function store(Request $request)
    {
        #$request->validated();
        
        Author::create([
            'name' => $request->name,
        ]);
        return redirect()->route('author.index')->with('success', 'Autor criado com sucesso!');
    }



    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $request->validated();
        $author->update([
            'name' => $request->name,
        ]);

        return redirect()->route('author.index', ['author' => $author->id])->with('success', 'Autor editado com sucesso!');
    }




    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index')->with('success', 'Autor deletado com sucesso!');
    }


}

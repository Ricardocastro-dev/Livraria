<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Publisher;
use App\Http\Requests\PublisherRequest;



class PublisherController
{
    public function index()
    {
        $publishers = Publisher::orderByDesc('id')->get();
        ['publishers' => $publishers];
        
        return view('publisher.index',['publishers' => $publishers]);
    }



    public function show(Publisher $publisher)
    {
        return view('publisher.show', ['publisher' => $publisher]);
    }




    public function create()
    {
        return view('publisher.create');
    }


    public function store(Request $request)
    {
        #$request->validated();
        
        Publisher::create([
            'name' => $request->name,
        ]);
        return redirect()->route('publisher.index')->with('success', 'Autor criado com sucesso!');
    }



    public function edit(Publisher $publisher)
    {
        return view('publisher.edit', ['publisher' => $publisher]);
    }

    public function update(PublisherRequest $request, Publisher $publisher)
    {
        $request->validated();
        $publisher->update([
            'name' => $request->name,
        ]);

        return redirect()->route('publisher.index', ['publisher' => $publisher->id])->with('success', 'Autor editado com sucesso!');
    }




    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('publisher.index')->with('success', 'Autor deletado com sucesso!');
    }




}

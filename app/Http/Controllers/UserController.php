<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;


class UserController
{
    public function index()
    {
        //recuperar o registro do banco de dados
        $users= User::orderByDesc('id')->get();

        return view('user.index',['users' => $users]);
    }

    public function show(User $user)
    {
        return view('user.show', ['user'=>$user]);
    }


    public function create()
    {
        return view('user.create');
    }     

    public function loginStore(UserRequest $request)
    {
        //cadastrar banco de dados no registro
        User::adm([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('MenuCliente.index')->with('success','usuario logado com sucesso');
    }

    public function store(UserRequest $request)
    {
        $request->validated();
        //cadastrar banco de dados no registro
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('user.login')->with('success','usuario cadastrado com sucesso');
      
    }
    public function edit(User $user)
    {
        return view('user.edit',['user'=>$user]);
        

    }
    public function update(UserRequest $request, User $user)
    {
        $request-> validated();
       
        //editar informações banco de dados
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);
        
        return redirect()-> route('user.show',['user' => $user->id])->with('success','usuario editado com sucesso!');


    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success','usuario deletado com sucesso');
    }
}

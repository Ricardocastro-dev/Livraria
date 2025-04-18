<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdmRequest;
use App\Models\Adm;
use Illuminate\Support\Facades\Hash;

class AdmController
{
    public function index()
    {
        // Recupera todos os registros de administradores
        $adms = Adm::orderByDesc('id')->get();

        return view('adm.index', ['adms' => $adms]);
    }

    public function show(Adm $adm)
    {
        return view('adm.show', ['adm' => $adm]);
    }

    public function create()
    {
        return view('adm.create');
    }     

    public function loginStore(AdmRequest $request)
    {
        // Criar um administrador no banco de dados
        Adm::create([
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash da senha
        ]);

        return redirect()->route('adm.index')->with('success', 'Usuário logado com sucesso');
    }

    public function store(AdmRequest $request)
    {
        $request->validated();

        // Criar um administrador no banco de dados
        Adm::create([
            'nome' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash da senha
        ]);

        return redirect()->route('adm.login')->with('success', 'Usuário cadastrado com sucesso');
    }

    public function edit(Adm $adm)
    {
        return view('adm.edit', ['adm' => $adm]);
    }

    public function update(AdmRequest $request, Adm $adm)
    {
        $request->validated();

        // Atualizar informações no banco de dados
        $adm->update([
            'nome' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash da senha
        ]);

        return redirect()->route('adm.show', ['adm' => $adm->id])->with('success', 'Usuário editado com sucesso!');
    }

    public function destroy(Adm $adm)
    {
        $adm->delete(); // Corrigido para deletar o administrador corretamente
        return redirect()->route('adm.index')->with('success', 'Usuário deletado com sucesso');
    }
}


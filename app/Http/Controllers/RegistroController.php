<?php

namespace App\Http\Controllers;

use App\Models\Auxestado;
use App\Models\Cadastro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $collection = Auxestado::all();
        
        return view('dashboard', ['collection'=> $collection]);
    }

    public function tabela()
    {

        $Allcadastros = Cadastro::paginate(10);

        return view('tabela', ['Allcadastros'=> $Allcadastros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collection = Auxestado::all();

        return view('dashboard', ['collection'=> $collection]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registro = new Cadastro();
        $registro->fill($request->all());
        $registro->save();

        return redirect()->route('index.tabela')->with('success', 'Cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cadastro $cadastros)
    {
        return view('show', ['cadastros'=> $cadastros]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cadastro $cadastros)
    {
        $cadastros->delete();
        
        return redirect()->route('index.tabela')->with('danger', 'Registro excluído com sucesso.');
    }
}

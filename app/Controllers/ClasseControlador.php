<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseControlador extends Controller
{
    /**
     *Retorna a view com todas as classes regitradas
     *
     * @return view com objeto classes
     */
    public function index()
    {
        $classes = Classe::all();
        return view('view_classes', compact('classes'));
    }

    /**
     * Retorna o formulário para cadastrar uma nova classe.
     *
     * @return view
     */
    public function create()
    {
        return view('nova_classe');
    }

    /**
     * Metodo para salvar os dados do formulário de criação de classe
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classe = new Classe();
        $classe->nome = $request->input('nome_classe');
        $classe->save();
        return redirect('/classes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Retorna o formulário de edição com os dados do registro que quer editar.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classe = Classe::find($id);
        if(isset($classe)) {
            return view('editar_classe', compact('classe'));
        }
        return redirect('/classes');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $classe = Classe::find($id);
        if(isset($classe)) {
            $classe->nome = $request->input('nome_classe');
            $classe->save();
        }
        return redirect('/classes');
    }

    /**
     * Exclui uma classe especifica selecionada pelo id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classe = Classe::find($id);
        if(isset($classe)){
            try{
                $classe->delete();
            } catch (\PDOException $e) {
                return back()->with('error', 'A classe não pode ser excluida pois esta atrelada a um herói');
            }
        }
        return redirect('/classes');
    }
}

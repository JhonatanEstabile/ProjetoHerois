<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidade;

class EspecialidadeControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Especialidade::all();
        return view('view_especialidades', compact('cats'));//retorna a view com os dados dos refistros dos herois
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nova_especialidade');//retorna a view do formulario de cadastro
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Especialidade();
        $cat->nome = $request->input('nome_espec');
        $cat->save();
        return redirect('/especialidades');//salva e redireciona para a tela de listagem de especialidades
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Especialidade::find($id);
        if(isset($cat)){//verifica se o registro existe
            return view('editar_especialidade', compact('cat'));//retorna o formulário para edição com os dados do registro
        }
        return redirect('/especialidades');//caso o registro não exita retorn a pagina especialidades 
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
        $cat = Especialidade::find($id);
        if(isset($cat)) {
            $cat->nome = $request->input('nome_espec');
            $cat->save();//atualiza os dados
        }
        return redirect('/especialidades');//redireciona para a view especialidades
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Especialidade::find($id);
        if(isset($cat)){
            try{
                $cat->delete();
            } catch (\PDOException $e) {
                //caso de erro ao excluir retorna uma mensagem de erro
                return back()->with('error', 'A especialidade não pode ser excluida pois esta atrelada a um herói');
            }
        }
        return redirect('/especialidades');//redireciona para a view expecialidades
    }
}

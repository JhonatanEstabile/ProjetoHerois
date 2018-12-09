<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classe;

class Controlador_api_classe extends Controller
{
    /**
     * Retorna todos as classes registradas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::all();//pega todos os registros
        return $classes->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Cadastra os dados recebidos por POST.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classe = new Classe();
        $classe->nome = $request->input('nome');//pega o dado do campo nome
        $classe->save();
        return json_encode($classe);
    }

    /**
     * Retorna um registro especifico selecionado pelo id obtido pelo metodo GET.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classe = Classe::find($id);//procura registro com o id recebido
        if (isset($classe)) {//caso exita retorna o registro
            return json_encode($classe);            
        }
        return response('Classe não encontrada', 404);//caso não exista retorna erro http 404
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Atualiza um registro especifico atavés do metodo PUT e com o id do item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $classe = Classe::find($id);//pega o registro que será modificado
        if (isset($classe)) {//verifica se existe registro com esse id
            $classe->nome = $request->input('nome');
            $classe->save();
            return json_encode($classe);//retorna o que foi alterado
        }
        return response('Classe não encontrada', 404);//caso não tenha um registro retorna codigo http 404
    }

    /**
     * Apaga um registro especificado pelo id e metodo delete.
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
                return response('A classe não pode ser excluída pois está atrelada a um herói', 403);
            }
        }
        return json_encode($classe);
    }
}
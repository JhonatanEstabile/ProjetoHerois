<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidade;

class Controlador_api_especialiade extends Controller
{
    /**
     * Retorna todos os registro da tabela Especialidade
     *
     * @return \Illuminate\Http\Response Json
     */
    public function index()
    {
        $especs = Especialidade::all();//pega todos os registros
        return $especs->toJson();
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
     * Registra no banco os dados enviados por post
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $espec = new Especialidade();
        $espec->nome = $request->input('nome');
        $espec->save();
        return json_encode($espec);//retorna o json com os dados salvos
    }

    /**
     * Retorna um registro especifico selecionado pelo id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $espec = Especialidade::find($id);//procura registro com o id recebido
        if (isset($espec)) {//caso exita retorna o registro
            return json_encode($espec);            
        }
        return response('Especialidade não encontrada', 404);//caso não exista retorna erro http 404
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
     * Atualiza um registro atavés do metodo put junto com o id do item que quer mudar
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $espec = Especialidade::find($id);//pega o registro que será modificado
        if (isset($espec)){//verifica se existe registro com esse id
            $espec->nome = $request->input('nome');
            $espec->save();
            return json_encode($espec);//retorna o que foi alterado
        }
        return response('Especialidade não encontrada', 404);//caso não tenha um registro retorna codigo http 404
    }

    /**
     * Apaga um registro pelo id recebido (metodo Delete)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $espec = Especialidade::find($id);
        if(isset($espec)){//verifica se a especialidade existe
            try{
                $espec->delete();//apaga o registro
            } catch (\PDOException $e) {
                return response('A especialidade não pode ser excluída pois está atrelada a um herói', 403);
            }
        }
        return json_encode($espec);//retorna os dados apagados
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Heroi;
use App\HeroiEspecialidade;
use App\Especialidade;

class Controlador_api_heroi extends Controller
{
    /**
     * retorna todos os registros da tabela herois
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $herois = Heroi::with(['classe', 'especialidade'])->get();//pega todos os registros
        return $herois->toJson();
    }

    /**
     * Retorna os dados dos heróis que possuem o id da classe passada como paramentro.
     *
     * @return \Illuminate\Http\Response
     */
    public function heroi_filtro_classe($id){

        $herois = Heroi::with(['classe', 'especialidade'])->where('classe_id', $id)->get();
        if(isset($herois)){//verifica se os registro existem
            return json_encode($herois);
        }else{
            return response('Classe não encontrada', 404);//retorna o erro caso não encontre registros
        }

    }

    /**
     * Retorna os dados dos heróis que possuem o id da especialidade passada como paramentro.
     *
     * @return \Illuminate\Http\Response
     */
    public function heroi_filtro_especialidade ($id){

        $cats = Especialidade::with(['heroi'])->find($id);
        if(isset($cats)){//verifica se os registro existem
            return json_encode($cats);
        }else{
            return response('Especialidade não encontrada', 404);//retorna o erro caso não encontre registros
        }

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
     * Registra no banco de dados os dados recebidos por post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('foto_heroi')->store('imagens', 'public');//pega o caminho da imagem enviada

        $heroi = new Heroi();
        $heroi->nome = $request->input('nome');
        $heroi->vida = $request->input('vida');
        $heroi->defesa = $request->input('defesa');
        $heroi->dano = $request->input('dano');
        $heroi->vel_atq = $request->input('vel_atq');
        $heroi->vel_mov = $request->input('vel_mov');
        $heroi->foto_heroi = $path;
        $heroi->classe_id = $request->input('classe');
        $heroi->save();
        $heroi_espec = $request->input('especialidade');
        foreach ($heroi_espec as $he) {//cria os relacionamentos entre o heroi e as especialidades
            $heroi->especialidade()->attach($he);
        }

        return json_encode($heroi);//retorna os dados que foram salvos
    }

    /**
     * Retorna os dados de um herói especifico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $heroi = Heroi::with(['classe', 'especialidade'])->find($id);//pega o registro do id enviado
        if(isset($heroi)){    
            return $heroi->toJson(); //retorna um json com os dados requisitados
        }else{
            return response("Registro não encontrado", 404);//caso não tenha registro retorna o erro
        }
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
     * Atualiza o registro pelo id com os dados recebidos por PUT 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

        $heroi = Heroi::find($id);
        if(isset($heroi)) {//caso o registro exista executa o update

            $heroi->nome = $request->input('nome');
            $heroi->vida = $request->input('vida');
            $heroi->defesa = $request->input('defesa');
            $heroi->dano = $request->input('dano');
            $heroi->vel_atq = $request->input('vel_atq');
            $heroi->vel_mov = $request->input('vel_mov');

            //pega o caminho da imagem enviada
            if($request->file('foto_heroi') != null){//verifica se uma imagem foi mandada
                $path = $request->file('foto_heroi')->store('imagens', 'public');
                $arquivo = $heroi->foto_heroi;
                Storage::disk('public')->delete($arquivo);//exclui a foto atual do heroi
                $heroi->foto_heroi = $path;//atribui a foto nova
            }

            $heroi->classe_id = $request->input('classe');

            $heroi->save();
            $heroi_espec = $request->input('especialidade');//pega o array com as especialidades

            //exclui os relacionamentos entre herois e especialidades
            $heroi->especialidade()->detach();

            //atualiza os relacionamentos das especialidades com os herois
            foreach ($heroi_espec as $he) {
                $heroi->especialidade()->attach($he);
            }
        }
        return json_encode($heroi);//retorna oque esta salvo no objeto
    }

    /**
     * Apaga o registro e retorna os dados que foram apagados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $heroi = Heroi::find($id);

        $heroi->especialidade()->detach();//exclui os relacionamentos entre herois e especialidades

        if(isset($heroi)){
            try{
                $arquivo = $heroi->foto_heroi;
                Storage::disk('public')->delete($arquivo);//exclui a foto do heroi
                $heroi->delete();//apaga o registro do heroi
            } catch (\PDOException $e) {
                //retorna o erro
                return response('O pedido não pôde ser entregue devido à sintaxe incorreta.', 400);//retorna um erro em caso de problema na operação.
            }
        }
        return json_encode($heroi);//retorna os dados excluidos
    }
}
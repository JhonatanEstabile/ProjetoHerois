<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Classe;
use App\Heroi;
use App\Especialidade;
use App\HeroiEspecialidade;

class HeroiControlador extends Controller
{
    /**
     * Retorna a view com os dados dos heróis.
     *
     * @return view view_herois e um array com todos os dados de todos os herois
     */
    public function index()
    {
        $cats = Heroi::with(['classe', 'especialidade'])->get();
        $cats_classe = Classe::all();
        $cats_espec = Especialidade::all();

        //retorna a view_herois com todos os dados de todos os herois registrados
        return view('view_herois', compact('cats', 'cats_classe', 'cats_espec'));
    }

    public function heroi_filtro_classe($id){
        if( $id == -1 ){
            return redirect("/herois");
        }else{
            $cats = Heroi::with(['classe', 'especialidade'])->where('classe_id', $id)->get();
            $cats_classe = Classe::all();
            $cats_espec = Especialidade::all();

            //retorna a view_herois com todos os dados de todos os herois registrados com a classe escolhida
            return view('view_herois', compact('cats', 'cats_classe', 'cats_espec', 'id'));
        }
    }

    public function heroi_filtro_especialidade ($id){
        if( $id == -1 ){
            return redirect("/herois");
        }else{
            $cats = Especialidade::with(['heroi'])->find($id);
            $cats_classe = Classe::all();
            $cats_espec = Especialidade::all();

            //retorna a view_herois com todos os dados de todos os herois registrados com a classe escolhida
            return view('view_herois_especialidade', compact('cats', 'cats_classe', 'cats_espec', 'id'));
        }
    }

    /**
     * Função que retorna a view do formulario de registro.
     *
     * @return view novo_heroi junto com os arrays de objetos das classes e especialidades
     */
    public function create()
    {
        $cats_classe = Classe::all();
        $cats_espec = Especialidade::all();
        //passa para a view novo_heroi os dados de todas as classes e especialidades
        return view('novo_heroi', compact('cats_classe', 'cats_espec'));
    }

    /**
     * Função para salvar o registro do herói.
     *
     * @param  \Illuminate\Http\Request  $request (dados do post)
     * @return redirect (redireciona para a rota principal do heroi)
     */
    public function store(Request $request)
    {
        $path = $request->file('arquivo')->store('imagens', 'public');//pega o caminho da imagem enviada

        $cat_heroi = new Heroi();
        $cat_heroi->nome = $request->input('nome');
        $cat_heroi->vida = $request->input('vida');
        $cat_heroi->defesa = $request->input('defesa');
        $cat_heroi->dano = $request->input('dano');
        $cat_heroi->vel_atq = $request->input('vel_atq');
        $cat_heroi->vel_mov = $request->input('vel_mov');
        $cat_heroi->foto_heroi = $path;
        $cat_heroi->classe_id = $request->input('classe');
        $cat_heroi->save();
        $heroi_espec = $request->input('especialidade');

        //faz o relacionamento de todas as especialidades escolhidas com o heroi cadastrado
        foreach ($heroi_espec as $he) {
            $cat_heroi->especialidade()->attach($he);
        }

        return redirect('/herois');//redireciona para a rota principal
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
     * Retorna o formulario para editar o registro do heroi.
     *
     * @param  int  $id
     * @return View (editar_heroi) ou redirect (redireciona para "/herois")
     */
    public function edit($id)
    {
        $cat = Heroi::with(['classe', 'especialidade'])->find($id);
        $especialidades_array = array();
        foreach ($cat->especialidade as $a) {//cria um array com as especialidades do heroi escolhidas
            $especialidades_array[] = $a->id;
        }
        $cats_classe = Classe::all();//pega todas as classes
        $cats_espec = Especialidade::all();//pega todas as especialidades
        if(isset($cat)) {//verifica se exite o registro do heroi
            return view('editar_heroi', compact('cat', 'cats_classe', 'cats_espec', 'especialidades_array'));
        }
        return redirect('/herois');
    }

    /**
     * Função que atualiza os dados cadastrados de um deteriminado registro.
     *
     * @param  \Illuminate\Http\Request  $request (put dos dados)
     * @param  int  $id
     * @return redirect redireciona para "/herois"
     */
    public function update(Request $request, $id)
    {   
        $cat_heroi = Heroi::find($id);
        if(isset($cat_heroi)) {//caso o registro exista executa o update
    
            $cat_heroi->nome = $request->input('nome');
            $cat_heroi->vida = $request->input('vida');
            $cat_heroi->defesa = $request->input('defesa');
            $cat_heroi->dano = $request->input('dano');
            $cat_heroi->vel_atq = $request->input('vel_atq');
            $cat_heroi->vel_mov = $request->input('vel_mov');

            //verifica se uma imagem foi mandada
            if($request->file('arquivo') != null){
                $path = $request->file('arquivo')->store('imagens', 'public');
                $arquivo = $cat_heroi->foto_heroi;
                Storage::disk('public')->delete($arquivo);//exclui a foto atual do heroi
                $cat_heroi->foto_heroi = $path;//atribui a foto nova
            }
            
            $cat_heroi->classe_id = $request->input('classe');

            $cat_heroi->save();
            $heroi_espec = $request->input('especialidades');//pega o array com as especialidades

            //exclui os relacionamentos entre herois e especialidades
            $cat_heroi->especialidade()->detach();

            //atualiza os relacionamentos entre as especialidades e os herois
            foreach ($heroi_espec as $he) {
                $cat_heroi->especialidade()->attach($he);
            }

        }
        return redirect("/herois"); //redireciona para a rota principal do heroi
    }

    /**
     * Função para excluir um registro através de seu ID.
     *
     * @param  int  $id
     * @return redirect para "/herois"
     */
    public function destroy($id)
    {
        $cat = Heroi::find($id);

        $cat->especialidade()->detach();//exclui os relacionamentos entre herois e especialidades

        if(isset($cat)){
            try{
                $arquivo = $cat->foto_heroi;
                Storage::disk('public')->delete($arquivo);//exclui a foto do heroi
                $cat->delete();//apaga o registro do heroi
            } catch (\PDOException $e) {
                //retorna a view herois com o erro
                return back()->with('error', 'Ocorreu um erro ao tentar apagar o registro');
            }
        }
        return redirect('/herois');//redireciona para a rota principal do heroi
    }
}

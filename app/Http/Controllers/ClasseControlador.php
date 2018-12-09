<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classe;

class ClasseControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Classe::all();
        return view('view_classes', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nova_classe');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Classe();
        $cat->nome = $request->input('nome_classe');
        $cat->save();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Classe::find($id);
        if(isset($cat)) {
            return view('editar_classe', compact('cat'));
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
        $cat = Classe::find($id);
        if(isset($cat)) {
            $cat->nome = $request->input('nome_classe');
            $cat->save();
        }
        return redirect('/classes');
    }

    /**
     * Remove the specified resource from storage.
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

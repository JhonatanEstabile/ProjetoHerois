<?php
use App\Heroi;
use App\Classe;
use App\Especialidade;

Route::get('/', function () {
    $heroi = Heroi::all();
    $classe = count(Classe::all());
    $especialidade = count(Heroi::all());
    return view('home', compact('heroi', 'classe', 'especialidade'));
});

Route::get('/manual', function(){
    return view('manual');
});

Route::resource('/classes', 'ClasseControlador');
Route::resource('/especialidades', 'EspecialidadeControlador');
Route::resource('/herois', 'HeroiControlador');

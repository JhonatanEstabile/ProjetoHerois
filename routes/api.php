<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource("/classes", "Controlador_api_classe");
Route::resource("/especialidades", "Controlador_api_especialiade");
Route::resource("/herois", "Controlador_api_heroi");

Route::get("/herois/classe/{id}", "Controlador_api_heroi@heroi_filtro_classe");
Route::get("/herois/especialidade/{id}", "Controlador_api_heroi@heroi_filtro_especialidade");
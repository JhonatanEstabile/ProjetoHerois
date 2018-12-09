<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heroi extends Model
{
    public function classe(){
    	return $this->belongsTo('App\Classe');
    }

    public function especialidade(){
    	return $this->belongsToMany('App\Especialidade', 'heroi_especialidades');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Heroi extends Model
{
    //Metodo ORM de relacionamento um para um entre heróis e classes
    public function classe(){
    	return $this->belongsTo('App\Classe');
    }

    //Metodo ORM de relacionamento vários para vários entre heróis e especialidades
    public function especialidade(){
    	return $this->belongsToMany('App\Especialidade', 'heroi_especialidades');
    }
}
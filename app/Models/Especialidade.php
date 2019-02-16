<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
        //Metodo ORM de relacionamento vários para vários entre heróis e especialidades
    public function heroi(){
    	return $this->belongsToMany('App\Heroi', 'heroi_especialidades');
    }
}

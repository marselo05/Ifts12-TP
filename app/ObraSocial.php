<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObraSocial extends Model
{
    //
    public function obraSocial(){
    	return $this->belongsToMany('\App\User','cobertura_usuarios')
	     			->withPivot('obra_social_id','status'); 
	 }
}

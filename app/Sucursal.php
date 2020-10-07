<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursals';
    //
    public function sucursales_dias()
    {
        return $this->hasMany('App\SucursalesDias', 'id_sucursal');
    }
    
}

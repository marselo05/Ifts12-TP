<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
    public function plan() {
        return $this->belongsToMany('\App\User','cobertura_usuarios')
                    ->withPivot('plan_id', 'status');
    }   
}

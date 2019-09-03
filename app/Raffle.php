<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Raffle extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getGanadorAttribute(){
        if($this->user_id){
            return $this->user->nombre;
        } else {
            return "Sin ganador";
        }
    }

}

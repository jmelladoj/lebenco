<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function userCategory($id){
        $categoria = CategoriaUser::findOrFail($id);
        return $categoria;
    }
}

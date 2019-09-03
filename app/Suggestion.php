<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggestion extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}

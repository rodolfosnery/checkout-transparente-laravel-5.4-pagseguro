<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'titulo',
        'slug'
    ];

    public function produtos()
    {
        return $this->hasMany('App\Produto')->where('status', '!=', 2)->where('depor', '=', '');
    }
}

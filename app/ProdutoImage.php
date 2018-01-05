<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoImage extends Model
{
    protected $fillable = [
        'produto_id',
        'file_name',
        'file_size',
        'dir'

    ];

    public function produto()
    {
        return $this->belongsTo('App\Produto')->where('status', '!=', 2);
    }
}

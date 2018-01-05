<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PecaImage extends Model
{
    protected $fillable = [
        'peca_id',
        'file_name',
        'file_size',
        'dir'

    ];

    public function peca()
    {
        return $this->belongsTo('App\Peca');
    }
}

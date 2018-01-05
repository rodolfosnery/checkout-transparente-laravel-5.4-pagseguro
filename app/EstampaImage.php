<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstampaImage extends Model
{
    protected $fillable = [
        'estampa_id',
        'file_name',
        'file_size',
        'dir'

    ];

    public function estampa()
    {
        return $this->belongsTo('App\Estampa');
    }
}

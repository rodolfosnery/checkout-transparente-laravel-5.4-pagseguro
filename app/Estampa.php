<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estampa extends Model
{
    protected $fillable = [
        'estampa',
        'slug',

    ];

    public function produtos()
    {
        return $this->belongsToMany('App\Produto', 'produto_estampas')->where('status', '!=', 2)->where('depor', '=', null);
    }

    public function pecas()
    {
        return $this->belongsToMany('App\Peca', 'produto_estampas')->where('status', '!=', 2)->where('depor', '=', null);
    }

    public function images()
    {
        return $this->hasMany('App\EstampaImage');
    }

    public static function addNeededEstampas(array $estampas)
    {
        if (count($estampas) === 0) {
            return;
        }

        $found = static::whereIn('estampa', $estampas)->pluck('estampa')->all();

        foreach (array_diff($estampas, $found) as $estampa) {
            static::create([
                'slug' => $estampa,
                'estampa' => $estampa,
            ]);
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'peca_id',
        'produto_id',
        'order_id',
        'preco',
        'qtd'

    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function peca()
    {
        return $this->belongsTo('App\Peca');
    }
    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }
}

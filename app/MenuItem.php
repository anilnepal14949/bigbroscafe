<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['menu_id', 'item_name', 'item_description', 'item_price', 'item_image', 'item_order', 'status'];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}

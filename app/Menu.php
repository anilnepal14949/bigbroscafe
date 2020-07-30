<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['menu_name', 'menu_description', 'menu_order', 'status'];

    public function items()
    {
        return $this->hasMany('App\MenuItem');
    }
}

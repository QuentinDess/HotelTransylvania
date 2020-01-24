<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'price','name','description','photo'
    ];
    public function baskets()
    {
        return $this->belongsToMany('App\Basket');
    }
}

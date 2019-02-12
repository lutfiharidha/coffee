<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'sub','status',
    ];
        public function products()
{
    return $this->belongsTo('App\Product','category', 'id');
}
}

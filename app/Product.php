<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'category','price','weight','stock','image','description','tokopedia','bukalapak','shopee','brand','status',
    ];
    public function cat() {
    return $this->belongsTo('App\Category', 'category', 'id');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = ['user','name','address','city','province','country','pcode','phone','product','stock','status','ket'];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function view($id)
    {
        $prod = Product::where('status','=',1)->where('stock','>=', 1)->find($id);
        $prodc = Product::inRandomOrder()->where('status','=',1)->where('stock','>=', 1)->take(5)->get();
        $asli = $prod->price;
         if(!$prod)
            abort(404);
        return view('product',compact('prod','prodc','asli'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use CountryState;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function step1(request $request, $id)
    {   
        $pro = Product::find($id);
        $validator = Validator::make($request->all(), [
            "stock"    => "min:1|max:$pro->stock|numeric",
            ]);
        if ($validator->fails())
           	{
            return redirect()->back()->withErrors($validator);
            }
        else{
        $stock = $request->stock;
        $countries = CountryState::getCountries();
    }
        return view('payments.step1', compact('pro','stock','countries'));
    }
    public function store(request $request, $id)
    {   
        $pro = Product::find($id);
        Order::create([
        	'id' => '',
        	'user' => Auth::user()->id,
        	'name' => $request->name,
        	'address' => $request->address,
        	'city' => $request->city,
        	'province' => $request->province,
        	'country' => $request->country,
        	'pcode' => $request->pcode,
        	'phone' => $request->phone,
        	'product' => $pro->id,
        	'stock' => $request->stock,
        	'ket' => $request->ket,
        ]);
        return view('payments.step1', compact('province','pro','asli','kuantitas'));
    }
}

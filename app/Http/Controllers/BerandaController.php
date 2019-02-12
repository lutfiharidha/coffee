<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Product;
use CountryState;
class BerandaController extends Controller
{
    public function index()
    {
    	$sliders= Slider::where('status','1')->latest()->take(3)->get();
        return view('welcome', compact('sliders'));
    }
    public function success()
    {
        return view('success');
    }
    public function categories( $id ) 
    {
    $prod = Product::select('products.*')->join('categories', 'categories.id', '=', 'products.category')->where('categories.id', $id)->where('products.status', 1)->where('stock','>=', 1)->get();
     $lain = Product::inRandomOrder()->where('status',1)->take(3)->get();
    return view('categories',compact('prod','prodc','lain'));
    }
    public function test(){
    	\EasyPost\EasyPost::setApiKey('EZTK985825b5a7744332bd13e4ca76e3a20fsIcFXh5rqkquIqcPRUtJCQ');

        $to_address = \EasyPost\Address::create(
            array(
                "name"    => "Lutfi Haridha",
                "street1" => "179 N Harbor Dr",
                "city"    => "Redondo Beach",
                "state"   => "CA",
                "zip"     => "90277",
                "phone"   => "310-808-5243"
            )
            );
            $from_address = \EasyPost\Address::create(
                array(
                    "name" => "Lutfi Haridha",
                    "street1" => "Jalan Panglateh Sumurbor No 24",
                    "city"    => "Lhokseumawe",
                    "state"   => "AC",
                    "zip"     => "24351",
                    "phone"   => "415-456-7890",
                    "country" => "US"
                )
            );
            $parcel = \EasyPost\Parcel::create(
                array(
                    "predefined_package" => "LargeFlatRateBox",
                    "weight" => 76.9
                )
            );
            $shipment = \EasyPost\Shipment::create(
                array(
                    "to_address"   => $to_address,
                    "from_address" => $from_address,
                    "parcel"       => $parcel
                )
            );

            dd($shipment->buy($shipment->lowest_rate()));

            $shipment->insure(array('amount' => 100));

                }
    public function state($countryId)
{
	$a =  CountryState::getStates("$countryId");
     return $a;
}
}

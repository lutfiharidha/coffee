<?php
namespace App\Http\Controllers;
use App\Product;
use App\Http\Requests;
use App\Services\Shipping;
use Illuminate\Http\Request;
use App\User;
class CheckoutController extends Controller
{
    public function index()
    {
        // Grabbed the logged in user.
        $client = new \Dhl\ApiClient([
    		'apiUser' => 'blokupie',
    		'apiKey' => '5OHTDANIpJkfRU0sGg17bhJqrMdCk2hG',
    		'accountId' => '168',
		]);

		$result = $client->capabilities([
			'senderType' => 'business',
    		'fromCountry' => 'ID',
    		'fromPostalCode' => '24351',
    		'toCountry' => 'NL',
    		'toPostalCode' => '3542 AB',
		]);

		dd($result);
    }

}
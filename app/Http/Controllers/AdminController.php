<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Slider;
use App\Category;
use App\Product;
class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.home');
    }
//SLIDER CONTROLLER
    public function slider()
    {
        $sliders = slider::latest()->paginate(5);
        return view('admin.slider',compact('sliders'));
    }


    public function createslider()
    {
        return view('admin.slidercreate');
    }


    public function storeslider(request $request)
    { 

        $destinationPath = public_path().'/img/sliders/';
        $validator = Validator::make($request->all(), [
            "image"    => "mimes:jpg,jpeg,png,gif|max:2048",
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
                $fileName = Input::file('image')->getClientOriginalName();
                $file = Input::file('image')->move($destinationPath, $fileName);
                 slider::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $fileName,
                    'status' => $request->status,
                    ]);
             }
    return redirect()->route('data.slider')->with('message','Your slider has been Added');
}

	public function editslider($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliderupdate',compact('slider'));
    }
    public function updateslider(Request $request, $id)
    {
        $slider = slider::find($id);
        if($request->file('image') == ""){
            $slider->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        }
        else{
        $destinationPath = public_path().'/img/sliders/';
        $validator = Validator::make($request->all(), [
            "image"    => "required|mimes:jpg,jpeg,png,gif|max:2048",
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
                $fileName = Input::file('image')->getClientOriginalName();
                $file = Input::file('image')->move($destinationPath, $fileName);     
                $slider->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $fileName,
                    'status' => $request->status,
                ]);
        }

    }
    return redirect()->route('data.slider')->with('message','Your slider Has Been Updated');

}


    public function sliderdestroy(slider $slider)
    {
        $slider -> delete();
        return redirect()->back()->with('message','Your slider Has Been Deleted');
    }
//END SLIDER

//CATEGORIES CONTROLLER
public function category()
    {
        $categories = category::latest()->paginate(5);
        return view('admin.category',compact('categories'));
    }


    public function createcategory()
    {
        return view('admin.categorycreate');
    }


    public function storecategory(request $request)
    { 
        category::create([
        	'name' => $request->name,
        	'sub' => $request->sub,
        	'status' => $request->status,
        ]);
    return redirect()->route('data.category')->with('message','Your category has been Added');
}

	public function editcategory($id)
    {
        $category = category::find($id);
        return view('admin.categoryupdate',compact('category'));
    }
    public function updatecategory(Request $request, $id)
    {
        $category = category::find($id);
        $category->update([
        	'name' => $request->name,
        	'sub' => $request->sub,
        	'status' => $request->status,
        ]);
    return redirect()->route('data.category')->with('message','Your category Has Been Updated');

}


    public function categorydestroy(category $category)
    {
        $category -> delete();
        return redirect()->back()->with('message','Your category Has Been Deleted');
    }
//END CATEGORIES

//PRODUCT CONTROLLER
    public function product()
    {
        $products = Product::latest()->paginate(5);
        return view('admin.product',compact('products'));
    }


    public function createproduct()
    {
    	$categories = category::where('status',1)->get();
        return view('admin.productcreate',compact('categories'));
    }


    public function storeproduct(request $request)
    { 

        $destinationPath = public_path().'/img/products/';
        $validator = Validator::make($request->all(), [
            "image.*"    => "required|mimes:jpg,jpeg,png,gif|max:2048",
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
                if($files=$request->file('image')){
                     foreach($files as $filess){
                $fileName = $filess->getClientOriginalName();
                $file = $filess->move($destinationPath, $fileName);
                $data[] = $fileName;
                }
            }
            $products = Product::create([
                    'name' => $request->name,
                    'category' => $request->category,
                    'price' => $request->price,
                    'weight' => $request->weight,
                    'stock' => $request->stock,
                    'image' => implode("|",$data),
                    'description' => $request->description,
                    'tokopedia' => $request->tokopedia,
                    'bukalapak' => $request->bukalapak,
                    'shopee' => $request->shopee,
                    'brand' => $request->brand,
                    'status' => $request->status,
                    ]);
        return redirect()->route('data.product')->with('message','Your products has been Added');
    }
}

	public function editproduct($id)
    {
        $products = Product::find($id);
        $categories = category::where('status',1)->get();
        return view('admin.productupdate',compact('products','categories'));
    }
    public function updateproduct(Request $request, $id)
    {
        $products = Product::find($id);
        if($request->file('image') == ""){
            $products->update([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'weight' => $request->weight,
            'stock' => $request->stock,
            'description' => $request->description,
            'tokopedia' => $request->tokopedia,
            'bukalapak' => $request->bukalapak,
            'shopee' => $request->shopee,
            'brand' => $request->brand,
            'status' => $request->status,
        ]);
        }
        else{
        $destinationPath = public_path().'/img/products/';
        $validator = Validator::make($request->all(), [
            "image.*"    => "required|mimes:jpg,jpeg,png,gif|max:2048",
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
                if($files=$request->file('image')){
                foreach($files as $filess){
                $fileName = $filess->getClientOriginalName();
                $file = $filess->move($destinationPath, $fileName);
                $data[] = $fileName;
                }
            }     
                $products->update([
                    'name' => $request->name,
                    'category' => $request->category,
                    'price' => $request->price,
                    'weight' => $request->weight,
                    'stock' => $request->stock,
                    'image' => implode("|",$data),
                    'description' => $request->description,
                    'tokopedia' => $request->tokopedia,
                    'bukalapak' => $request->bukalapak,
                    'shopee' => $request->shopee,
                    'brand' => $request->brand,
                    'status' => $request->status,
                ]);
        }

    }
    return redirect()->route('data.product')->with('message','Your products Has Been Updated');
}


    public function productdestroy(product $product)
    {
        $product -> delete();
        return redirect()->back()->with('message','Your slider Has Been Deleted');
    }
//END PRODUCT
}

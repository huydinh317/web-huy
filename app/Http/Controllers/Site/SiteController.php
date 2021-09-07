<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
class SiteController extends Controller
{
    
    public function index(){
        $product['featured']= Product::where('featured','=',1)->limit(4)->get();
        $product['lastest']=  Product::orderBy('id','desc')->limit(8)->get();
        return view('frontend/index',['products'=>$product]);
    }
    public function about(){
        return view('frontend/about/about');
    }
    public function contact(){
        return view('frontend/contact/contact');

    }
    public function checkout(){
        $data['cart'] = Cart::content();
        return view('/frontend/checkout',$data);
    }
    public function postCheckout(){
        dd('ok');
    }
}

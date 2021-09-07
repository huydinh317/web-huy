<?php

namespace App\Http\Controllers\Site\Carts;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index()
    {   
        $data['cart'] = Cart::content();
        return view('frontend/cart/cart',$data);
    }
    public function add($id)
    {
        $prd = Product::where('id', $id)->first();
        Cart::add($prd->id, $prd->name, 1, $prd->price,0,['image'=>$prd->image]);
        return redirect('gio-hang');
    }
    public function delete($id){
        Cart::remove($id);
        return redirect('gio-hang');

    }
    public function update($rowId,$quantity){
        Cart::update($rowId,$quantity);
        return redirect('gio-hang');
    }
}

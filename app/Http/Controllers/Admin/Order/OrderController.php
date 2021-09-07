<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use function PHPUnit\Framework\returnSelf;

class OrderController extends Controller
{
     public function index(){
         $order = Order::where('state',2)->orderby('id','desc')->paginate(3);
        return  view('/backend/orders/order',  ['order' => $order]);
     }
     public function processed()
     {
          $order = Order::where('state',1)->orderby('updated_at','desc')->paginate(3);
          return  view('/backend/orders/processed',  ['order' => $order]);
     }
     public function detail($order_id)
     {
          $order = Order::find($order_id);
          return  view('/backend/orders/detailorder',  ['order' => $order]);
     }
}

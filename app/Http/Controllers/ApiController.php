<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Orders;
use App\Order_items;

class ApiController extends Controller
{
    public function getProducts(){
        $products = Products::where('status','=',0)->get();
        return response()->json(['status'=>true,'products'=>$products],200);
    }

    public function saveOrder(Request $request){
        $order = new Orders();
        $order->first_name=$request->get('first_name');
        $order->user_id=$request->get('user_id');
        $order->last_name=$request->get('last_name');
        $order->address_1=$request->get('address_1');
        $order->address_2=$request->get('address_2');
        $order->city=$request->get('city');
        $order->postal_code=$request->get('postal_code');
        $order->mobile=$request->get('mobile');
        $order->payment=$request->get('payment');
        $order->status = 'created';
        if($order->save())
        {
            $items = $request->get('items');
            foreach($items as $sitem)
            {
                $item=new Order_items();
                $item->order_id= $order->id;
                $item->item_id = $sitem['id'];
                $item->qty = $sitem['qty'];
                $item->price = $sitem['price'];
                $item->save();
            }
            return response()->json(['status'=>true],200);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //
    public function allOrders(){
        $orders = Order::all();

        return $orders;
//        return OrderResource::collection($orders);
    }

    public function userOrders($id){
        $orders = Order::all()->where('user_id','=',$id);
//        $orders = User::find($id)->order;
        return $orders;
//        return OrderResource::collection($orders);
    }

    public function saveOrder(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' =>'required',
            'foodName' =>'required',
            'quantity'=>'required'
        ]);
        if ($validator->fails()){
            return array(
                'error'=>true,
                'message'=>$validator->errors()->all()
            );
        }

        $order = new Order();

        $order->user_id=$request->input('user_id');
        $order->foodName=$request->input('foodName');
        $order->quantity = $request->input('quantity');

        $order->save();

        return new OrderResource($order);
    }
}

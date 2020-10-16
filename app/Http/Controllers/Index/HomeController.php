<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Ordergoods;
use App\Model\GoodsModel;
class HomeController extends Controller
{
    public function myorder()
    {	
    	$user_id = session()->get('user_id');
    	$orders =Order::where('order_info.user_id',$user_id)
        		->get();
   		// dd($orders);

        $order_ids = [];
        foreach ($orders as $key => $value) {
        	$order_ids[$key] = $value->order_id;
        }
        
        $order_goods =Ordergoods::whereIn('order_id',$order_ids)->get();

       	foreach ($order_goods as $k => $v) {

       		$name_data = GoodsModel::where('goods_id',$v['goods_id'])->first();

       		$v['goods_thumb'] = $name_data['goods_thumb'];
			
       	}
       	// dd($order_goods);    
       	
       	foreach ($order_goods as $key => $value) {
       		$value['order_sn'] = Order::where('order_id',$value['order_id'])->value('order_sn');
       		$value['addtime'] = Order::where('order_id',$value['order_id'])->value('addtime');
       		$value['deal_price'] = Order::where('order_id',$value['order_id'])->value('deal_price');
       		$value['is_paid'] = Order::where('order_id',$value['order_id'])->value('is_paid');
       		$value['order_sn'] = Order::where('order_id',$value['order_id'])->value('order_sn');
       		$value['order_sn'] = Order::where('order_id',$value['order_id'])->value('order_sn');
       	}
       	

    	return view('Index.home.myorder',['order'=>$order_goods]);
    }
}

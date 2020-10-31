<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Ordergoods;
use App\Model\GoodsModel;
use App\Model\UserModel;
use App\Model\GoodsAttr;
use App\Model\Attribute;
class HomeController extends Controller
{
    public function myorder()
    {	
		$user_id = session()->get('user_id');
		if(!$user_id){
    		return redirect('login');die;
    	}
		$user_name = UserModel::select('user_name')->where('user_id',$user_id)->first();
		// dd($user_name);
		$user_name = $user_name->user_name;
    	$orders = Order::where('order_info.user_id',$user_id)
				->get()->toArray();
		$order_goods = [];
		foreach($orders as $v){
			$v['goods'] = Ordergoods::select('order_goods.*','ecs_goods.goods_thumb')->leftjoin('ecs_goods','order_goods.goods_id','=','ecs_goods.goods_id')->where('order_goods.order_id',$v['order_id'])->get()->toArray();
			foreach ($v['goods'] as $key => $value) {
				// dd($key);
				if($value['goods_attr_id'] != ""){
					$goods_attr_id = explode('|', $value['goods_attr_id']);
					$value['goods_attr'] = GoodsAttr::select('attr_value')->whereIn('goods_attr_id',$goods_attr_id)->get()->toArray();
					$v['goods'][$key] = $value;
				}
			}
			$order_goods[] = $v;
		}
		// dd($order_goods);
		return view('Index.home.myorder',['user_name'=>$user_name,'order_goods'=>$order_goods]);
    }
}

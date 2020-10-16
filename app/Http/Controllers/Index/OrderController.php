<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Address;
use App\Model\Order;
use App\Model\CartModel;
use App\Model\Ordergoods;
use DB;
class OrderController extends Controller
{
    public function addorder(Request $request){
    	$datas = $request->all();

    	$cart_id = $datas['cart_id']?explode(',',$datas['cart_id']):[];
  
    	$user_id = session()->get('user_id');

    	if(!$user_id){
    		return redirect('login');die;
    	}
    	if($datas['pay_type']==1){
    		$datas['pay_name'] = "微信支付";
    	}else if($datas['pay_type']==2){
    		$datas['pay_name'] = "银行卡支付";
    	}else if($datas['pay_type']==3){
    		$datas['pay_name'] = "支付宝支付";
    	}else if($datas['pay_type']==4){
    		$datas['pay_name'] = "货到付款";
    	}
    	// dd($datas);
    	DB::beginTransaction();
    	try {
	    		//生成订单号
	    	$order_sn = $this->getOrdersn($user_id);
	    	//获取订单的收货地址消息
	    	$addressdata = Address::where('address_id',$datas['address_id'])->first();
	    	//组合订单数据
	    	$data = [
		    		'order_sn' => $order_sn,
		    		'user_id' => $user_id,
		    		'email' => $addressdata->email,
		    		'country' => $addressdata->country,
		    		'province' => $addressdata->province,
		    		'city' => $addressdata->city,
		    		'district' => $addressdata->district,
		    		'address' => $addressdata->address,
		    		'zipcode' => $addressdata->zipcode,
		    		'tel' => $addressdata->tel,
		    		'mobile' => $addressdata->mobile,
		    		'sign_building' => $addressdata->sign_building,
		    		'best_time' => $addressdata->best_time,
		    		'pay_type' => $datas['pay_type'],
		    		'pay_name' => $datas['pay_name'],
		    		'total_price' => $datas['allprice'],
		    		'deal_price' => $datas['deal_price'],
		    		'addtime' => time(),
    			];
		   	//添加订单入库，返回ID
	    	$order_id = Order::insertGetId($data);

	    	//查询订单商品数据
	    	$cart = CartModel::select('ecs_cart.goods_id','ecs_cart.goods_sn','ecs_cart.product_id','ecs_cart.goods_name','ecs_cart.shop_price','ecs_cart.buy_number','ecs_cart.goods_attr_id')
	    			->whereIn('cart_id',$cart_id)
	    			->get();
	    			// dd($cart);
	    	$goodsData = [];
	    		//组合订单商品数据
		    	foreach ($cart as $k => $v) {
		    		$goodsData[$k]['order_id'] = $order_id;
		    		$goodsData[$k]['goods_id'] = $v->goods_id;
		    		$goodsData[$k]['goods_sn'] = $v->goods_sn;
		    		$goodsData[$k]['product_id'] = $v->product_id;
		    		$goodsData[$k]['goods_name'] = $v->goods_name;
		    		$goodsData[$k]['shop_price'] = $v->shop_price;
		    		$goodsData[$k]['buy_number'] = $v->buy_number;
		    		$goodsData[$k]['goods_attr_id'] = $v->goods_attr_id?$v->goods_attr_id:'';
		    		//订单商品入库
		    		$ret = Ordergoods::insert($goodsData);
		    	}

		    	DB::commit();
		    		
				return redirect('/pay/'.$order_id);
	    	
		    	} catch (Exception $e) {

	    		DB::rollBack();
	    		echo "<script>alert('生成订单失败');location.href='/'</script>";
		    	
	    		}
    	}


	    public function getOrdersn($user){
	    	$order_sn = time().rand(10000,99999).$user;
	    	return $order_sn;
	    }
}

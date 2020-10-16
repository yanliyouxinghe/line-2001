<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Ordergoods;
use App\Model\CartModel;
use Log;
class PayController extends Controller
{
    public function pay($id)
    {
	$config = config('alipay');
	require_once app_path('alipay/pagepay/service/AlipayTradeService.php');
	require_once app_path('alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php');

	 $order = Order::where('order_id',$id)->get()->toArray();
    //$goods_name = Ordergoods::where('order_id',$id)->pluck('goods_name')->toArray();
    // dd($goods_name);

    $goods_name = 'ECS_'.rand(10000,99999);

    //商户订单号，商户网站订单系统中唯一订单号，必填
    $out_trade_no = $order[0]['order_sn'];

    //订单名称，必填
    $subject = $goods_name;

    //付款金额，必填
    $total_amount = $order[0]['deal_price'];

    //商品描述，可空
    $body = '';

	//构造参数
	$payRequestBuilder = new \AlipayTradePagePayContentBuilder();
	$payRequestBuilder->setBody($body);
	$payRequestBuilder->setSubject($subject);
	$payRequestBuilder->setTotalAmount($total_amount);
	$payRequestBuilder->setOutTradeNo($out_trade_no);

	$aop = new \AlipayTradeService($config);

	/**
	 * pagePay 电脑网站支付请求
	 * @param $builder 业务参数，使用buildmodel中的对象生成。
	 * @param $return_url 同步跳转地址，公网可以访问
	 * @param $notify_url 异步通知地址，公网可以访问
	 * @return $response 支付宝返回的信息
 	*/
	$response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

	//输出表单
	var_dump($response);

    }


    public function return_url(){
		$user_id = session()->get('user_id');
    	$config = config('alipay');
		require_once app_path('alipay/pagepay/service/AlipayTradeService.php');

		$arr=$_GET;
		// dd($arr);
		$alipaySevice = new \AlipayTradeService($config); 
		// dd($alipaySevice);
		
		$result = $alipaySevice->check($arr);
		// dd($result);
		/* 实际验证过程建议商户添加以下校验。
		1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
		2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
		3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
		4、验证app_id是否为该商户本身。
		*/

		if($result) {//验证成功
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//请在这里加上商户的业务逻辑程序代码
			
			//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
		    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

			$order_sn = Order::where('order_sn',$arr['out_trade_no'])->first();
				// dd($order_sn);
				if(!$order_sn){
					return view('Index.index.payfei');
				}
				$order_price = Order::where('deal_price',$arr['total_amount'])->first();
				// dd($order_price);
				if(!$order_price){
					return view('Index.index.payfei');
				}
				// $data = config('seller_id');
				// dd(config('alipay.app_id'));
				if($arr['app_id'] != config('alipay.app_id')){
					return view('Index.index.payfei');
				}
				$order = new Order();
				$ret = $order->where('order_sn',$arr['out_trade_no'])->update(['is_paid'=>1]);
				if($ret){
					$order_del_id = $order->where('order_sn',$arr['out_trade_no'])->value('order_id');
					
					$Ordergoods = new Ordergoods();
					$goods_del_id = $Ordergoods::where(['order_id'=>$order_del_id])->get()->toArray();
					
					foreach($goods_del_id as $k=>$v){
						$goods_del_id[$k]['goods_attr_id'] = $goods_del_id['goods_attr_id']??[];
					CartModel::where(['user_id'=>$user_id,'goods_id'=>$v['goods_id'],'goods_attr_id'=>$v['goods_attr_id']])->delete(array_unique($v));
					}
				}
				return redirect('/paysuccess?order_sn='.$order_sn['order_sn'].'&'.'order_price='.$order_price['deal_price']);
		    	
			// 商户订单号
			// $out_trade_no = htmlspecialchars($_GET['out_trade_no']);

			// //支付宝交易号
			// $trade_no = htmlspecialchars($_GET['trade_no']);
				
			// echo "验证成功<br />支付宝交易号：".$trade_no;

			//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		}
		else {
		    //验证失败
		    echo "验证失败";
		}
		    }

		    public function paysuccess(Request $request){
		    	$post = request()->all();
		    	$pay_name = Order::where('order_sn',$post['order_sn'])->value('pay_name');
		    	// dd($pay_name);
		    	if($post){
		    		return view('Index.index.paysuccess',['order_sn'=>$post['order_sn'],'order_price'=>$post['order_price'],'pay_name'=>$pay_name]);
		    	}
		    }


		    //异步
		    public function notify_url(){
		    	
		    	   	$config = config('alipay');
					require_once app_path('alipay/pagepay/service/AlipayTradeService.php');
					
					$arr=$_POST;
					// Log::channel('alipay')->info($arr);
					$alipaySevice = new \AlipayTradeService($config); 
					$alipaySevice->writeLog(var_export($_POST,true));
					$result = $alipaySevice->check($arr);

					/* 实际验证过程建议商户添加以下校验。
					1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
					2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
					3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
					4、验证app_id是否为该商户本身。
					*/
					if($result) {//验证成功
						/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						//请在这里加上商户的业务逻辑程序代
						$order_sn = Order::where('order_sn',$arr['out_trade_no'])->first();
						if(!$order_sn){
							$error = $order_sn."此订单号出现异常，请联系管理人员";
						}
						$order_price = Order::where('deal_price',$arr['total_amount'])->first();
						// dd($order_price);
						if(!$order_price){
							$error = $order_price."此订单价格出现异常，请联系管理人员";
						}
						
						if($arr['app_id'] != config('alipay.app_id')){
							$error = "APPID异常";
						}
						if($error){
							Log::channel('alipay')->info($error);die;
						}
						
						//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
						
					    //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
						
						//商户订单号

						// $out_trade_no = $_POST['out_trade_no'];

						// //支付宝交易号

						// $trade_no = $_POST['trade_no'];

						// //交易状态
						// $trade_status = $_POST['trade_status'];


					    if($_POST['trade_status'] == 'TRADE_FINISHED') {

							//判断该笔订单是否在商户网站中已经做过处理
								//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
								//请务必判断请求时的total_amount与通知时获取的total_fee为一致的
								//如果有做过处理，不执行商户的业务程序
									
							//注意：
							//退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
					    }else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
							//判断该笔订单是否在商户网站中已经做过处理
								//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
								//请务必判断请求时的total_amount与通知时获取的total_fee为一致的
								//如果有做过处理，不执行商户的业务程序		

					    	
							//注意：
							//付款完成后，支付宝系统发送该交易状态通知
							$order = new Order();
							$ret = $order->where('order_sn',$arr['out_trade_no'])->update(['is_paid'=>1]);
                            
					    }
						//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
						echo "success";	//请不要修改或删除
					}else {
					    //验证失败
					    echo "fail";

					}
		    }
}

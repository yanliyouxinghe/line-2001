<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Seckill;
use Illuminate\Support\Facades\Redis;
class SeckillController extends Controller
{
    public function index(){
		$user_id = session()->get('user_id');
		// dd($_SERVER);
		  if(!$user_id){
			  return redirect('/login');
		  }
     	$seckill = Seckill::where('begin_time','<',date('Y-m-d H:i:s',time()))->where('finish_time','>',date('Y-m-d H:i:s',time()))->get();
    	return view('Index.index.seckill',['seckill'=>$seckill]);
    }

    public function seckill_tow($id){
    	$seckill = Seckill::select('seckill.*','ecs_goods.goods_desc','ecs_goods.goods_id')->leftjoin('ecs_goods','seckill.goods_id','=','ecs_goods.goods_id')->where('seckill_id',$id)->first();
		$finish_times = $seckill['finish_time'];
		$goods_id = $seckill['goods_id'];
		
    	return view('Index.index.seckill_tow',['seckill'=>$seckill,'end_time'=>$finish_times,'goods_id'=>$goods_id]);
	}
	
	public function seckill_order(){
		$user_id = session()->get('user_id');
		$goods_id = request()->goods_id;
		$seckill_id = request()->seckill_id;
		if(!$user_id || !$goods_id || !$seckill_id){
			return json_encode(['code'=>1,'mag'=>'参数丢失']);die;
		}
		$key = "goods_".$goods_id;
		$seckill_len = Redis::llen($key);
		if($seckill_len<=0){
			return json_encode(['code'=>2,'mag'=>'售熙']);die;
		}
		$endtime = Seckill::where('seckill_id',$seckill_id)->value('finish_time');
		$endtime = strtotime($endtime);
		if($endtime-time()<=0){
			return json_encode(['code'=>3,'mag'=>'活动结束']);die;
		}
		$key_user = "user_".$user_id;
		$is_gou = Redis::sismember($key_user,$goods_id);
		if($is_gou){
			return json_encode(['code'=>4,'mag'=>'只能购买一次']);die;
		}
		Redis::sadd($key_user,$goods_id);
		$seckill_len =Redis::rpop($key);
		$data = [
			'goods_id'=>$goods_id,
			'seckill_id'=>$seckill_id,
		];
		return json_encode(['code'=>0,'mag'=>'OK','data'=>$data]);


	}
}

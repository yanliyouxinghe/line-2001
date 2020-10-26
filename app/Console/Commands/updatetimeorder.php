<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\ProductModel;
use App\Model\GoodsModel;
use App\Model\Order;
use App\Model\Ordergoods;
use DB;
use Log;
class updatetimeorder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatetimeorder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '修改生成订单支付超时的订单';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $order =  \DB::select('select order_id from order_info where is_paid=0 and unix_timestamp(now())-addtime>=10');
      if($order){
            foreach($order as $v){
                $goods = Ordergoods::where('order_id',$v->order_id)->get();
                if(!$goods) continue;
                foreach($goods as $vv){
                    if($vv->goods_attr_id){
                        ProductModel::where('product_id',$vv->product_id)->increment('product_id',$vv->buy_number);
                    }
                    GoodsModel::where('goods_id',$vv->goods_id)->increment('goods_number',$vv->buy_number);
                }
                Order::where('order_id',$v->order_id)->update(['is_paid'=>2]);
                Log::channel('order')->info($v->order_id."此订单支付超时");
            }
      }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\GoodsModel;
use Illuminate\Support\Facades\Redis;
use Log;
class updatehis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatehis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '将商品点击量从redis添加进数据库';

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
            $hist = Redis::zrange('his',0,-1);
            if($hist){
                foreach($hist as $v){
                    $update = [
                        'hist'=> Redis::zscore('his',$v)
                    ];
                $histarr = explode('_',$v);
                $goods_id = $histarr[1];
                    $res = GoodsModel::where('goods_id',$goods_id)->update($update);
                    if($res){
                       Log::info('点击量入库成功');   
                    }
                }
            }
    }
}

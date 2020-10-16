<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    //指定表面
    protected $table = 'ecs_goods';
    protected $primaryKey = 'goods_id';
    public $timestamps = false;
    protected $guarded = [];

    
      //轮播图
      public function luobotu(){
        $goods = self::select('goods_id','goods_img')
        ->where('is_show',1)
        ->orderBy('goods_id','desc')
        ->take(3)
        ->get();
        return $goods;
        }


         //今日推荐
         public function Isnew(){
            $isnew = self::select('goods_id','goods_img')
                    ->where('is_new',1)
                    ->take('3')
                    ->get();
            return $isnew;
        }

        //猜你喜欢
        public function Islove(){
            $love = GoodsModel::orderBy('goods_id','desc')
                    ->take('6')
                    ->get();
            return $love;
        }

        //商品列表
        public function getgoodsdata($id,$wheres)
        {
               $data = self::where($wheres)->whereIn('cat_id',$id)->paginate(5);
               return $data;
        }


        //品牌
        public function getbrand($id)
        {
               $brand = self::whereIn('cat_id',$id)->pluck('brand_id');
               return $brand;
        }


        //价格区间
        public function getmaxprice($ids)
        {
                $shop_price = self::where('cat_id',$ids)->max('shop_price');
                return $shop_price;
        }

}

<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Model\CategoryModel;
use App\Model\CartModel;

use Illuminate\Support\Facades\Redis;
class IndexController extends Controller
{
        public function index(){
            $goodsModel = new GoodsModel;
            $cateModel = new CategoryModel;

            //轮播图
            $goods = $goodsModel->luobotu();
            //获取分类数据
            $catedata = $cateModel->putcate();
            //无限极分类
            $tree = $this->Treecate($catedata);
            //今日推荐
            $is_new = $goodsModel->Isnew();
            //猜你喜欢
            $islove = $goodsModel->Islove();
            return view('Index.index.index',['goods'=>$goods,'tree'=>$tree,'is_new'=>$is_new,'islove'=>$islove]);
        }

        //无限极分类
        public function Treecate($catedata,$parent_id=0,$level=0){
                $tree = [];
                foreach($catedata as $k=>$v){
                    if($v['parent_id'] == $parent_id){
                        $tree[$k] = $v;
                        $tree[$k]['son'] =  $this->Treecate($catedata,$v['cat_id'],$level+1);
                    }
                }
                return $tree;
        }

      

       
        
       public function cart_goods(){
        $user_id = session()->get('user_id');
        if(!$user_id){

        }
        $cart =  CartModel::where('user_id',$user_id)->get();
        $count = CartModel::where('user_id',$user_id)->count();
        

        return view('layout.head',['cart'=>$cart,'count'=>$count]);
       }
        
       
    
}

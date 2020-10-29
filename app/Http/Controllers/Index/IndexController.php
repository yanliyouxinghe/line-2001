<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Model\CategoryModel;
use App\Model\CartModel;
use App\Model\Bulllentin;

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
            //快报
            $bulletin = $this->bulletin();
            $bulletin_data = [];
            foreach($bulletin as $v){
                $bulletin_desc = $v['bulletin_desc'];
                $v['bulletin_desc'] = mb_substr($bulletin_desc,0,14)."...";
                $bulletin_data[] = $v;
            }
            return view('Index.index.index',['goods'=>$goods,'tree'=>$tree,'is_new'=>$is_new,'islove'=>$islove,'bulletin'=>$bulletin_data]);
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

      

       public function getheadcart(){
        $user_id = session()->get('user_id');
        if(!$user_id){
            return json_encode(['code'=>3,'msg'=>'未登录，请先登录']);die;
        }
        $count = CartModel::where('user_id',$user_id)->count();
        if($count==0){
            return json_encode(['code'=>3,'msg'=>'你的购物车还没有商品哦']);die;
        }else{
            return json_encode(['code'=>0,'msg'=>'OK','count'=>$count]);die;
        }


        //快报
        
       
       }
        
       public function bulletin(){
        $Bulllentin  = new Bulllentin();
        $bull = $Bulllentin->orderBy('bulletin_id','desc')->take(5)->get()->toArray();
        return $bull;
       }

    
}

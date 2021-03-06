<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>我的购物车</title>

    <link rel="stylesheet" type="text/css" href="/static/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/pages-cart.css" />
</head>

<body>
	<!--head-->
	@include('layout.top')
	<div class="cart py-container">
		<!--logoArea-->
		<div class="logoArea">
			<div class="fl logo"><span class="title">购物车</span></div>
			<div class="fr search">
				<form class="sui-form form-inline">
					<div class="input-append">
						<input type="text" type="text" class="input-error input-xxlarge" placeholder="品优购自营" />
						<button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
					</div>
				</form>
			</div>
		</div>
		<!--All goods-->
		<div class="allgoods">
			<h4>全部商品<span></span></h4>
			<div class="cart-main">
				<div class="yui3-g cart-th">
					<div class="yui3-u-1-4"><input type="checkbox" name="" class="check_bin" value="" /> 全部</div>
					<div class="yui3-u-1-4">商品</div>
					<div class="yui3-u-1-8">单价（元）</div>
					<div class="yui3-u-1-8">数量</div>
					<div class="yui3-u-1-8">小计（元）</div>
					<div class="yui3-u-1-8">操作</div>
				</div>
				<div class="cart-item-list">
					<div class="cart-body">

						@foreach($cartData as $v)
						<div class="cart-list">
							<ul class="goods-list yui3-g">
								<li class="yui3-u-1-24">
								
									<input type="checkbox" name="" class="click_bin" id="" cart_id="{{$v->cart_id}}" goods_id="{{$v->goods_id}}" value="{{$v->cart_id}}" />
									<input type="hidden"  class="goods_attr" @if(isset($v->goods_attr_id)) goods_attr_id="{{$v->goods_attr_id}}" @endif>
								</li>
								<li class="yui3-u-11-24">
									<div class="good-item">
										<div class="item-img"><img src="{{env('APP_URL').$v->goods_thumb}}" width="82px" height="82px" /></div>
										
										<div class="item-msg">{{$v->goods_name}}<br>
											@if(isset($v->goods_attr))
											
											@foreach($v->goods_attr as $vv)
											{{$vv['attr_name']}}：{{$vv['attr_value']}}
											@endforeach
											@endif
										</div>
									</div>
								</li>
							
								<li class="yui3-u-1-8"><span class="price danjia" value="{{$v->shop_price}}">{{$v->shop_price}}</span></li>
								<li class="yui3-u-1-8">
								
									<a href="javascript:void(0)" class="increment mins" >-</a>
									<input autocomplete="off" type="text" name="bun_num" value="{{$v->buy_number}}" minnum="1"  class="itxt itext" />
									<a href="javascript:void(0)" class="increment plus">+</a>
								</li>
								<li class="yui3-u-1-8"><span class="sum">{{$v->xiaoji}}</span></li>
								<li class="yui3-u-1-8">
									<a href="javascript:void(0)" class="del" cart_id ="{{$v->cart_id}}">删除</a>
									<!-- <a href="#none">移到我的关注</a> -->
								</li>
							</ul>
						</div>
						@endforeach

						
					</div>
				</div>

			</div>
			<div class="cart-tool">
				<div class="select-all">
					<input type="checkbox" name=""  value="" class="check_bin" />
					<span>全选</span>
				</div>
				<div class="option">
					<a href="javascript:void(0)" class="delall"> 删除选中的商品</a>
					<a href="#none">移到我的关注</a>
					<a href="#none">清除下柜商品</a>
				</div>
				<div class="toolbar">
					<div class="chosed">已选择<span>0</span>件商品</div>
					<div class="sumprice">
						<span><em>总价（不含运费） ：</em><i class="summoney">¥0.00</i></span><br>
						<span><em>已节省：</em><i>-¥20.00</i></span>
					</div>
					<div class="sumbtn">
						<a class="sum-btn" href="javascript:void(0)" >结算</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="deled">
				<!-- <span>已删除商品，您可以重新购买或加关注：</span>
				<div class="cart-list del">
					<ul class="goods-list yui3-g">
						<li class="yui3-u-1-2">
							<div class="good-item">
								<div class="item-msg">Apple Macbook Air 13.3英寸笔记本电脑 银色（Corei5）处理器/8GB内存</div>
							</div>
						</li>
						<li class="yui3-u-1-6"><span class="price">8848.00</span></li>
						<li class="yui3-u-1-6">
							<span class="number">1</span>
						</li>
						<li class="yui3-u-1-8">
							<a href="#none">重新购买</a>
							<a href="#none">移到我的关注</a>
						</li>
					</ul>
				</div> -->
			</div>
			<div class="liked">
				<ul class="sui-nav nav-tabs">
					<li class="active">
						<a href="#index" data-toggle="tab">猜你喜欢</a>
					</li>
					<li>
						<a href="#profile" data-toggle="tab">特惠换购</a>
					</li>
				</ul>
				<div class="clearfix"></div>
				<div class="tab-content">
					<div id="index" class="tab-pane active">
						<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<ul>
										@foreach($love as $v)
										<li>
										<a href="/particulars/{{$v['goods_id']}}"><img src="{{$v['goods_img']}}" width="174px" height="200px"/></a>
											<div class="intro">
												<i>{{$v['goods_name']}}</i>
											</div>
											<div class="money">
												<span>￥{{$v['shop_price']}}</span>
											</div>
											<div class="incar">
												<a href="/particulars/{{$v['goods_id']}}" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										@endforeach
									</ul>
								</div>
								<div class="item">
									<ul>
										<li>
											<img src="/static/img/like1.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/static/img/like2.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/static/img/like3.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/static/img/like4.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a>
							<a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
						</div>
					</div>
					<div id="profile" class="tab-pane">
						<p>特惠选购</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 底部栏位 -->
	<!--页面底部-->
	@include('layout.footer')
<!--页面底部END-->

<script type="text/javascript" src="/static/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/js/widget/nav.js"></script>
</body>

</html>
<script type="text/javascript">
	//加号
	$('.plus').click(function(){
		var cart = new Array();
		$('.click_bin:checked').each(function(){
			cart.push($(this).val());
		});
		getpricce(cart);
		var _this = $(this);
		var buy_nun  = _this.prev().val();
		var cart_id = _this.parents('ul').find('.click_bin').val();
		var number_s = parseInt(buy_nun);
		var number = number_s+1;
		_this.prev().val(number);
		getxiaoji(_this,cart_id,number);
	});

	//减号
	$(document).on('click','.mins',function(){
		var cart = new Array();
		$('.click_bin:checked').each(function(){
			cart.push($(this).val());
		});
		getpricce(cart);
		var _this = $(this);
		var buy_nun  = _this.next().val();
		var cart_id = _this.parents('ul').find('.click_bin').val();
		if(buy_nun<=1){
			_this.next().val('1');
			return;
		}
		var number = parseInt(buy_nun-1);
		_this.next().val(number);
		getxiaoji(_this,cart_id,number);
		
	});
		
		//计算小计
	 function getxiaoji(_this,cart_id,number){
		if(!cart_id){
			return false;
		}
		$.ajax({
			url : '/getxiaoji',
			dataType : 'json',
			type : 'post',
			data : {cart_id:cart_id,number,number},
			success:function(ret){
				if(ret.code==0){
					var endprice = ret.data;
					_this.parent().next().find('span').text(endprice);
				}else if(ret.code==5555){
					var goods_num = ret.data;
					_this.prev().val(goods_num);
					return;
				}else{
					return;
				}
			}
		});
	 }
	

	//购买数量失去焦点
	$('.itext').blur(function(){
		var buy_nun  = $(this).val();
		
	});


	//全选
	$('.check_bin').click(function(){
		// alert($(this).prop('checked'));
		var _this  = $(this);
		if(_this.prop('checked') == true){
			$('.click_bin').prop('checked',true);
			var cart = new Array();
			$('.click_bin:checked').each(function(){
				cart.push($(this).val());
			});
			getpricce(cart);
		}else{
			$('.click_bin').prop('checked',false);
			var cart = new Array();
			$('.click_bin:checked').each(function(){
				cart.push($(this).val());
			});
			getpricce(cart);
		}
	});

	//计算价格
	function getpricce(cart){
		$.get('/getendprice',{'cart_id':cart},function(res){
				if(res.code == '0'){
 					$('.summoney').text(res.data);
				}else{
					$('.summoney').text(res.data);
				}
				//
			},'json');
	}

	$('.click_bin').click(function(){
		var cart = new Array();
		$('.click_bin:checked').each(function(){
			cart.push($(this).val());
		});
		if(cart){
			getpricce(cart);
		}else{
			return false;
		}

	});

	$('.sum-btn').click(function(){
		if(!$('.click_bin:checked').length){
			alert('请选择要购买的商品');
			return false;
		}
		var cart_id = new Array();
		var goods_id  = new Array();
		var goods_attr_id = new Array();
		$('.click_bin:checked').each(function(){
			cart_id.push($(this).val());
		});
		$('.click_bin:checked').each(function(){
			goods_id.push($(this).attr('goods_id'));
		});
		 
		location.href="/address?cart_id="+cart_id+"&"+"goods_id="+goods_id;
	});

	$(document).on('click','.del',function(){
		var _this = $(this);
		var cart_id = _this.attr('cart_id');
		if(!cart_id){
			return;
		}
		if(confirm('确定要删除此条商品吗？')){
			$.ajax({
				url : '/delcart',
				dataType : 'json',
				type:'post',
				data:{cart_id:cart_id},
				success:function(ret){
					if(ret.code == 0){
						_this.parent().parent().remove();
					}else{
						alert(ret.msg);
					}
				}
			});
		}else{
			return false;
		}
	});

	$(document).on('click','.delall',function(){
		var _this = $(this);
		var cart_id = new Array();
		$('.click_bin:checked').each(function(){
			cart_id.push($(this).attr('cart_id'));
		});
		if(cart_id.length==0){
			return false;
		}
		if(confirm('确定要删除选中的商品吗？')){
			$.ajax({
				url : '/delcart',
				dataType : 'json',
				type:'post',
				data:{cart_id:cart_id},
				success:function(ret){
					if(ret.code == 0){
						location.reload();
					}else{
						alert(ret.msg);
					}
				}
			});
		}else{
			return false;
		}

	});
</script>
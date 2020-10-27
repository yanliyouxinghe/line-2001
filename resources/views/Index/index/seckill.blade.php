<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>品优购秒杀-正品秒杀！</title>
	<link rel="icon" href="/favicon.ico">


    <link rel="stylesheet" type="text/css" href="/static/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/widget-jquery.autocomplete.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/pages-seckill-index.css" />
</head>

<body>
	<!-- 头部栏位 -->
	<!--页面顶部-->
<div id="nav-bottom">
	<!--顶部-->
		<!-- 头部 -->
	@include('layout.top')

		<!--头部-->
		@include('layout.head')

	</div>
</div>

<script type="text/javascript" src="/static/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#service").hover(function(){
		$(".service").show();
	},function(){
		$(".service").hide();
	});
	$("#shopcar").hover(function(){
		$("#shopcarlist").show();
	},function(){
		$("#shopcarlist").hide();
	});

})
</script>
<script type="text/javascript" src="/static/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/js/widget/jquery.autocomplete.js"></script>
<script type="text/javascript" src="/static/js/widget/nav.js"></script>
<script type="text/javascript" src="/static/js/pages/seckill-index.js"></script>
<script>
	   $(function(){
		   $("#code").hover(function(){
			   $(".erweima").show();
		   },function(){
			   $(".erweima").hide();
		   });
	   })
	</script>
</body>

	<div class="py-container index">
		<!--banner-->
		<div class="banner">
			<img src="/static/img/_/banner.png" class="img-responsive" alt="">
		</div>
		<!--秒杀时间-->
		<div class="sectime">
			<div class="item-time active">
				<div class="time-clock">12:00</div>
				<div class="time-state-on">
					<span class="on-text">快抢中</span>
					<span class="on-over">距离结束：01:02:34</span>
				</div>
			</div>
			<div class="item-time">
				<div class="time-clock">14:00</div>
				<div class="time-state-will">
					<span>即将开始</span>
				</div>
			</div>
			<div class="item-time">
				<div class="time-clock">16:00</div>
				<div class="time-state-will">
					<span>即将开始</span>
				</div>
			</div>
			<div class="item-time">
				<div class="time-clock">18:00</div>
				<div class="time-state-will">
					<span>即将开始</span>
				</div>
			</div>
			<div class="item-time">
				<div class="time-clock">20:00</div>
				<div class="time-state-will">
					<span>即将开始</span>
				</div>
			</div>
		</div>
		<!--商品列表-->
		<div class="goods-list">
			<ul class="seckill" id="seckill">
				@foreach($seckill as $k=>$v)
				<input type="hidden" name="seckill_id" value="{{$v->seckill_id}}">
				<li class="seckill-item">
					<div class="pic">
						<img src="{{$v->goods_img}}" alt=''>
					</div>
					<div class="intro"><span>{{$v->seckill_title}}</span></div>
					<div class='price'><b class='sec-price'>￥{{$v->seckill_price}}</b><b class='ever-price'>￥{{$v->goods_price}}</b></div>
					<div class='num'>
						<div>已售87%</div>
						<div class='progress'>
							<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>
						</div>
						<div>剩余<b class='owned'>{{$v->number}}</b>件</div>
					</div>
					<a class='sui-btn btn-block btn-buy' href='/seckill_tow/{{$v->seckill_id}}'>立即抢购</a>
				</li>
				@endforeach


			</ul>
		</div>
		<div class="cd-top">
			<div class="top">
				<img src="/static/img/_/gotop.png" />
				<b>TOP</b>
			</div>
			<div class="code" id="code">
				<span><img src="/static/img/_/code.png"/></span>
			</div>
			<div class="erweima">
				<img src="/static/img/_/erweima.jpg" alt="">
				<s></s>
			</div>
		</div>
	</div>

	<!--回到顶部-->

	<!-- 底部栏位 -->
	<!--页面底部-->
	@include('layout.footer')
<!--页面底部END-->
undefined

</html>
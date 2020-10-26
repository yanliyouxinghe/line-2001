<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>结算页</title>

    <link rel="stylesheet" type="text/css" href="/static/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/pages-getOrderInfo.css" />
</head>

<body>
	<!--head-->
	@include('layout.top')
	<div class="cart py-container">
		<!--logoArea-->
		<div class="logoArea">
			<div class="fl logo"><span class="title">结算页</span></div>
			<div class="fr search">
				<form class="sui-form form-inline">
					<div class="input-append">
						<input type="text" type="text" class="input-error input-xxlarge" placeholder="品优购自营" />
						<button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
					</div>
				</form>
			</div>
		</div>
		<!--主内容-->
		<form action="/addorder" method="post">
				<input type="hidden" name="address_id" value="">
				<input type="hidden" name="pay_type" value="">
				<input type="hidden" name="allprice" value="">
				<input type="hidden" name="deal_price" value="">
				<input type="hidden" name="cart_id" value="{{$cart_id}}">
		<div class="checkout py-container">
			<div class="checkout-tit">
				<h4 class="tit-txt">填写并核对订单信息</h4>
			</div>
			<div class="checkout-steps">
				<!--收件人信息-->
				<div class="step-tit">
					<h5>收件人信息<span><a data-toggle="modal" data-target=".edit" data-keyboard="false" class="newadd">新增收货地址</a></span></h5>
				</div>
				<div class="step-cont">
					<div class="addressInfo">
						<ul class="addr-detail">
							<li class="addr-item">
								@foreach($addressData as $v)
							  <div>
							 	<div class="con name"><a href="javascript:;" address_id="{{$v->address_id}}">{{$v->address_name}}<span title="点击取消选择">&nbsp;</a></div>
								<div class="con address ">{{$v->address_name}} {{$v->province}} {{$v->city}} {{$v->district}} {{$v->address}} <span>{{$v->tel}}</span>
									<span class="edittext"><a data-toggle="modal" data-target=".edit" data-keyboard="false" >编辑</a>&nbsp;&nbsp;<a href="javascript:;">删除</a></span>
								</div>
								<div class="clearfix"></div>
							  </div>
								@endforeach
							</li>
							
							
						</ul>
						
						 <!--确认地址-->
					</div>
					<div class="hr"></div>
					
				</div>
				<div class="hr"></div>
				<!--支付和送货-->
				<div class="payshipInfo">
					<div class="step-tit">
						<h5>支付方式</h5>
					</div>
					<div class="step-cont">
						<ul class="payType">
							<li value="1">微信付款<span title="点击取消选择"></span></li>
							<li value="2">银行卡支付<span title="点击取消选择"></span></li>
							<li value="3">支付宝支付<span title="点击取消选择"></span></li>
							<li value="4">货到付款<span title="点击取消选择"></span></li>
						</ul>
					</div>
					<div class="hr"></div>
					<div class="step-tit">
						<h5>送货清单</h5>
					</div>
					<div class="step-cont">
						<ul class="send-detail">
							<li>
								
								<div class="sendGoods">
									
									<ul class="yui3-g">
										@foreach($cartData as $v)
										<li class="yui3-u-1-6">
											<span><img src="{{env('APP_URL').$v->goods_thumb}}"/ width="100px" height="100px"></span>
										</li>
										<li class="yui3-u-7-12">
											<div class="desc">{{$v->goods_name}}</div>
											<div class="seven">7天无理由退货</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="price">￥{{$v->shop_price}}</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="num">X{{$v->buy_number}}</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="exit">有货</div>
										</li>
										@endforeach
									</ul>

								</div>
								
							</li>
							<li></li>
							<li></li>
						</ul>
					</div>
					<div class="hr"></div>
				</div>
				<div class="linkInfo">
					<div class="step-tit">
						<h5>发票信息</h5>
					</div>
					<div class="step-cont">
						<span>普通发票（电子）</span>
						<span>个人</span>
						<span>明细</span>
					</div>
				</div>
				<div class="cardInfo">
					<div class="step-tit">
						<h5>使用优惠/抵用</h5>
					</div>
				</div>
			</div>
			<div class="submit">
			<button class="sui-btn btn-danger btn-xlarge">提交订单</button>
			</div>
		</div>
		</form>
		<!--添加地址-->
                          <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						      	 @if(count($address))
						        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
						        @endif
						        <h4 id="myModalLabel" class="modal-title">添加收货地址</h4>
						      </div>
						      <div class="modal-body">
						      	<form action="/add_ress" method="post" class="sui-form form-horizontal">
								 <div class="control-group">
									    <label class="control-label">收货人：</label>
									    <div class="controls">
									      <input type="text" title="收货人" name="address_name" class="input-medium address_name">
									    </div> <span id="address_name"></span>
									  </div>



									     	<div class="control-group">
                                            	<label class="control-label">所在地区：</label>
                                            		<div class="controls">
                                         			<tr>
                 								 		<td colspan="3" align="left" bgcolor="#ffffff">
								                  			<select name="country" id="selCountries_0" class="country">

								                      						<option value="0">请选择国家</option>
								                      						@foreach($region as $v)
								                                            <option value="{{$v->region_id}}">{{$v->region_name}}</option>
								                                            @endforeach
								                            </select>

								                    		<select name="province" id="selProvinces_0" class="province">
											                      <option value="0">请选择省</option>
					                                        </select>
								                    		<select name="city" id="selCities_0" class="city">
								                     				 <option value="0">请选择市</option>
								                      		</select>
									                    	<select name="district" id="selDistricts_0" class="district">
									                      				<option value="0">请选择区/县</option>	
                                         					</select>(必填) </td>
											        </tr>
                                            </div>									 
                                        </div>


									   <div class="control-group">
									    <label class="control-label">详细地址：</label>
									    <div class="controls">
									      <input type="text" title="详细地址" name="address" class="input-large address">
									    </div><span id="address"></span>
									  </div>
									   <div class="control-group">
									    <label class="control-label">联系电话：</label>
									    <div class="controls">
									      <input type="text" title="联系电话" name="tel" class="input-medium tel">
									    </div><span id="tel"></span>
									  </div>
									   <div class="control-group">
									    <label class="control-label">邮箱：</label>
									    <div class="controls">
									      <input type="email"  title="邮箱" name="email" class="input-medium email">
									    </div><span id="email"></span>
									  </div>
									   <div class="control-group">
									    <label class="control-label">地址别名：</label>
									    <div class="controls">
									      <input type="text" title="地址别名" name="alias" class="input-medium">
									    </div>
									    <div class="othername">
									    	建议填写常用地址：<a href="#" class="sui-btn btn-default">家里</a>　<a href="#" class="sui-btn btn-default">父母家</a>　<a href="#" class="sui-btn btn-default">公司</a>
									    </div>
									  </div>
									  
						      	</form>
						      	
						      	
						      </div>
						      <div class="modal-footer">
						        <button type="button" data-ok="modal"  class="sui-btn btn-primary btn-large">确定</button>
						        @if(count($address))
						        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
						        @endif
						      </div>
						    </div>
						  </div>
						</div>
		<div class="order-summary">
			<div class="static fr">
				<div class="list">
					<span><i class="number">{{$count}}</i>件商品，总商品金额</span>
					<em class="allprice">¥{{$price}}</em>
				</div>
				<div class="list">
					<span>返现：</span>
					<em class="money">0.00</em>
				</div>
				<div class="list">
					<span>运费：</span>
					<em class="transport">0.00</em>
				</div>
			</div>
		</div>
		<div class="clearfix trade">
			<div class="fc-price">应付金额:　<span class="deal_price">¥{{$price}}</span></div>
			<div class="fc-receiverInfo">寄送至:北京市海淀区三环内 中关村软件园9号楼 收货人：某某某 159****3201</div>
		</div>
		
	</div>
	<!-- 底部栏位 -->
	<!--页面底部-->
<div class="clearfix footer">
	<div class="py-container">
		<div class="footlink">
			<div class="Mod-service">
				<ul class="Mod-Service-list">
					<li class="grid-service-item intro  intro1">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item  intro intro2">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item intro  intro3">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item  intro intro4">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item intro intro5">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
				</ul>
			</div>
			<div class="clearfix Mod-list">
				<div class="yui3-g">
					<div class="yui3-u-1-6">
						<h4>购物指南</h4>
						<ul class="unstyled">
							<li>购物流程</li>
							<li>会员介绍</li>
							<li>生活旅行/团购</li>
							<li>常见问题</li>
							<li>购物指南</li>
						</ul>

					</div>
					<div class="yui3-u-1-6">
						<h4>配送方式</h4>
						<ul class="unstyled">
							<li>上门自提</li>
							<li>211限时达</li>
							<li>配送服务查询</li>
							<li>配送费收取标准</li>
							<li>海外配送</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>支付方式</h4>
						<ul class="unstyled">
							<li>货到付款</li>
							<li>在线支付</li>
							<li>分期付款</li>
							<li>邮局汇款</li>
							<li>公司转账</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>售后服务</h4>
						<ul class="unstyled">
							<li>售后政策</li>
							<li>价格保护</li>
							<li>退款说明</li>
							<li>返修/退换货</li>
							<li>取消订单</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>特色服务</h4>
						<ul class="unstyled">
							<li>夺宝岛</li>
							<li>DIY装机</li>
							<li>延保服务</li>
							<li>品优购E卡</li>
							<li>品优购通信</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>帮助中心</h4>
						<img src="/static/img/wx_cz.jpg">
					</div>
				</div>
			</div>
			<div class="Mod-copyright">
				<ul class="helpLink">
					<li>关于我们<span class="space"></span></li>
					<li>联系我们<span class="space"></span></li>
					<li>关于我们<span class="space"></span></li>
					<li>商家入驻<span class="space"></span></li>
					<li>营销中心<span class="space"></span></li>
					<li>友情链接<span class="space"></span></li>
					<li>关于我们<span class="space"></span></li>
					<li>营销中心<span class="space"></span></li>
					<li>友情链接<span class="space"></span></li>
					<li>关于我们</li>
				</ul>
				<p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
				<p>京ICP备08001421号京公网安备110108007702</p>
			</div>
		</div>
	</div>
</div>
<!--页面底部END-->
<div class="sui-modal-backdrop fade in" style="background:#000"></div>
<script type="text/javascript" src="/static/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/js/pages/getOrderInfo.js"></script>
</body>
<script type="text/javascript">
	@if(!count($address))
	$(function(){
		$('.sui-modal').addClass('in');
		$('.sui-modal').css('margin-top','-201px');
		$('sui-modal-backdrop').show();
		$('.sui-modal').show();
	});
	@else
	$('.sui-modal-backdrop').remove('div');
	@endif


	$('select').change(function(){
		var _this = $(this);
		var region_id = _this.val();
		if(region_id<1){
			_this.nextAll().find('option:gt(0)').remove();
		}
		$.get('/getsondata',{region_id:region_id},function(res){
			 if(res.code=='0'){
			 		 var address = res.data;
			 // alert(address);
			 		var str = '<option value="0">请选择</option>';
					 for (var i=0;i<address.length;i++) {
					 		str += '<option value="'+address[i].region_id+'">'+address[i].region_name+'</option>';
						 }
						 _this.next().html(str);
			 		}
			 return;
			
		},'json');
	});


		var flag1 = false;
		$('.address_name').blur(function(){
			var address_name = $(this).val();
			if(address_name == ''){
				$('#address_name').css('color','red').html('收货人不能为空');
				flag1 = false;
			}else{
				$('#address_name').css('color','red').html('');
				flag1 = true;
			}
		});

	
		var flag2 = false;
		$('.address').blur(function(){
			var address = $(this).val();
			if(address == ''){
				$('#address').css('color','red').html('请填写详细地址');
				flag2 = false;
			}else{
				$('#address').css('color','red').html('');
				flag2 = true;
			}
		});

	
		var flag3 = false;
		$('.email').blur(function(){
			var email = $(this).val();
			if(email == ''){
				$('#email').css('color','red').html('请填写邮箱');
				flag3 = false;
			}else{
				$('#email').css('color','red').html('');
				flag3 = true;
			}
		});

		var flag4 = false;
		$('.tel').blur(function(){
			var tel = $(this).val();

			if(tel == ''){
				$('#tel').css('color','red').html('请填写手机号码');
				flag4 = false;
			}else if(!(/^1(3|5|6|7|8|9)\d{9}$/.test(tel))){
				$('#tel').css('color','red').html('请填写正确的手机号');
				flag4 = false;
			}else{
				$('#tel').css('color','red').html('');
				flag4 = true;
			}
		});
        
        $('.btn-primary').click(function(){
        	var country = $('.country').val();
        	var province = $('.province').val();
        	var city = $('.city').val();
        	var district = $('.district').val();


        	if(flag1===false || flag2===false || flag3===false || flag4===false ){
        		alert('缺少参数');
        		return false;
        	}else if(country=='0' || province=='0' || city=='0' ||district=='0'){
        		alert('请选择收货位置');
        		return false;
        	}else{
        		$('form').submit();
        	}
		});
       $(function(){
		$('.name:eq(0)').addClass('selected');
		 var address_id = $(".name").find('a').attr('address_id');
    	$('input[name="address_id"]').val(address_id);

    	$('.payType li:eq(0)').addClass('selected');
		var pay_type = $('.payType li:eq(0)').val();
		 $('input[name="pay_type"]').val(pay_type);
		
		 var allprice = $('.allprice').html();
		 allprice = allprice.substr(1);
		 $('input[name="allprice"]').val(allprice);

		  var deal_price = $('.deal_price').html();
		 deal_price = deal_price.substr(1);
		 // alert(deal_price);
		 $('input[name="deal_price"]').val(deal_price);


       });
     	



</script>
</html>
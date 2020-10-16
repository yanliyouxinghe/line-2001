$(function(){
	$(".address").hover(function(){
		$(this).addClass("address-hover");	
	},function(){
		$(this).removeClass("address-hover");	
	});
})

$(function(){
	$(".name").click(function(){
		var _this = $(this);
        var address_id = _this.find('a').attr('address_id');
    	_this.addClass('selected');
    	_this.parent().siblings().find('.name').removeClass('selected');
    	$('input[name="address_id"]').val(address_id);
	});
	$(".payType li").click(function(){
		 $(this).addClass('selected');
		 $(this).siblings().removeClass('selected');
		 var pay_type = $(this).val();
		 $('input[name="pay_type"]').val(pay_type);
	});
})

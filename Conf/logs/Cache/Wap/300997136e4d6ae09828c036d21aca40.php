<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta name="format-detection" content="telephone=no"/>
<title><?php echo ($metaTitle); ?></title>
<script src="<?php echo $staticFilePath;?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/jquery.lazyload.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/notification.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/swiper.min.js" type="text/javascript"></script>
<script src="<?php echo $staticFilePath;?>/js/main.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="<?php echo $staticFilePath;?>/css/style_touch.css">
<link type="text/css" rel="stylesheet" href="/tpl/static/store/style/<?php echo ($productSet['headerid']); ?>.css">
</head>
<script>
$(document).ready(function(){
	$(".m-hd .cat").parent('div').click( function() {
	    var docH=$(document).height();
	  	$('.sub-menu-list').toggle();
	    $(".m-right-pop-bg2").addClass("on").css('min-height',docH);
	});
	$(".m-right-pop-bg2").click( function() {
	    $('.sub-menu-list').hide();
		$(".m-right-pop-bg2").removeClass("on").removeAttr("style");
	});
});
</script>
<body>
<div id="top"></div>
<div id="scnhtm5" class="m-body">
<div class="m-detail-mainout">



<div class="m-hd">
<div><a href="javascript:history.go(-1);" class="back">返回</a></div>
<div><a href="javascript:void(0);" class="cat">商品分类</a></div>
<div class="tit"><?php echo ($metaTitle); ?></div>
<div><a href="<?php echo U('Store/myinfo',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'cid' => $cid, 'twid' => $twid));?>" class="uc">用户中心</a></div>
<div><a href="<?php echo U('Store/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid));?>" class="cart">购物车<i class="cart_com"><?php if($totalProductCount != 0): echo ($totalProductCount); endif; ?></i></a></div>
</div>

<ul class="sub-menu-list">
<li><a href="<?php echo U('Store/select',array('token' => $_GET['token'], 'wecha_id' => $wecha_id, 'twid' => $twid));?>">浏览店铺</a></li>
<li><a href="<?php echo U('Store/cats',array('token' => $_GET['token'], 'catid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'cid' => $cid, 'twid' => $twid));?>">商城首页</a></li>
<?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hostlist): $mod = ($i % 2 );++$i; if($hostlist['isfinal'] == 1): ?><li><a href="<?php echo U('Store/products',array('token' => $_GET['token'], 'catid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'twid' => $twid));?>"><?php echo ($hostlist["name"]); ?></a></li>
<?php else: ?>
<li><a href="<?php echo U('Store/cats',array('token' => $_GET['token'], 'cid' => $hostlist['cid'], 'parentid' => $hostlist['id'], 'wecha_id' => $wecha_id, 'twid' => $twid));?>"><?php echo ($hostlist["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>

<form method="post" action="<?php echo U('Store/ordersave',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'], 'twid' => $twid));?>" id="FromID">
<div>
	<div class="m-ck-module">
	<h1>收货信息
		<?php if($addrSign != ''): ?><a id="editAddress" style="float:right;" href="javascript:getaddr();">使用微信收货地址</a><?php endif; ?>
	</h1>
	<ul>
		<li class="addr-info">
			<ul class="addr-addnew-form addr-edit-form" id="addr-edit-form" style="display: none1;">
				<li>
					<label>收货人姓名：</label>
					<span>
						<input name="orid" value="<?php echo ($orid); ?>" type="hidden" />
						<input name="truename" id="truename" value="<?php echo ($fans["truename"]); ?>" type="text" placeholder="输入收货人姓名" />
					</span>
					<label>手机：</label>
					<span>
						<input name="tel" id="tel" value="<?php echo ($fans["tel"]); ?>" type="text" placeholder="输入您的收货电话" />
					</span>
					<label>详细地址：</label>
					<span>
						<input name="address" id="address" value="<?php echo ($fans["address"]); ?>" type="text" placeholder="输入您的收货地址" />
					</span>
				</li>
			</ul>
			<label>联系方式保存到用户库</label>
			<ul class="rd">
				<li>
					<label><input type="checkbox" value="1" name="saveinfo" id="saveinfo" style="width: 16px;" checked="true"/></label>
				</li>    
			</ul>
		</li>
	</ul>
	</div>
	<div class="m-ck-module">
		<h1>付款方式</h1>
		<ul id="payment_mode" class="rd">
			<li>
				<label><input name="paymode" value="1" type="radio" checked>处理订单</label>
				<?php if($fans['balance'] > 0): ?><label><input name="paymode" value="4" type="radio">会员卡支付</label><?php endif; ?>
			</li>    
		</ul>
	</div>
	<!-- <div class="m-ck-module">
		<h1>送货方式</h1>
		<ul id="shipping" class="rd"><input id="delivery" type="hidden" name="delivery" value="">
		<li shipping="15"><label><input name="dt_id" value="535" type="radio">普通快递<b class="c_red">0元</b></label></li></ul>
	</div> -->
<div class="m-ck-module">
<h1>商品清单</h1>
<ul>
<ul class="m-cart-list">
<?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i; if(empty($p['detail']) != true): if(is_array($p['detail'])): $i = 0; $__LIST__ = $p['detail'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li>
				<span class="pic"><img src="<?php echo ($p["logourl"]); ?>" width="75" height="75"></span>
				<span class="con">
				<i class="t"><?php echo ($p["name"]); ?></i>
				<i class="d"><?php if(empty($p['formatTitle']) != true): echo ($p["formatTitle"]); ?>：<?php echo ($row["formatName"]); endif; ?> <?php if(empty($p['colorTitle']) != true): ?>，<?php echo ($p["colorTitle"]); ?>：<?php echo ($row["colorName"]); endif; ?></i>
				<p><label>数量：</label><?php echo ($row["count"]); ?>　<label>销售价：</label><span class="price">￥<?php echo ($row["price"]); ?></span></p>
				</span>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php else: ?>
		<li>
			<span class="pic"><img src="<?php echo ($p["logourl"]); ?>" width="75" height="75"></span>
			<span class="con">
			<i class="t"><?php echo ($p["name"]); ?></i>
			<p><label>数量：</label><?php echo ($p["count"]); ?>　<label>销售价：</label><span class="price">￥<?php echo ($p["price"]); ?></span></p>
			</span>
		</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>
</ul>
</div>
<div class="m-cart-toal m-checkout-toal">
<p id="price_total" class="check">商品总数：<b><?php echo ($totalCount); ?></b>　件<br>
商品原总价：<b><?php echo ($totalFee); ?></b>　元<br>
运费：<b><?php echo ($mailprice); ?></b>　元<br>
<!-- 优惠金额：0元<br> -->
您共需支付：<b id="totalmoney"><?php {echo ($totalFee + $mailprice);} ?></b>　元</p>
<?php if(($setting['score'] > 0) AND ($fans['total_score'] > 0)): ?><p class="check">您的可用积分：<b><?php echo ($fans['total_score']); ?></b>　分<br/>
使用积分兑换：<input type="text" name="score" style="border: 1px solid #cfcfcf;margin: 0 -1px;font-size: 16px;display: inline-block;text-align: center;height: 22px;width: 50px;border-radius: 0;background: -webkit-gradient(linear, 0 0, 0 100%, from(#e5e5e5),color-stop(0.3, #fff),to(#fff));-webkit-appearance: none;color: #999;" id="score"/>
<span>(整数)</span>
</p><?php endif; ?>
<div id="show_msg" class="tip_blue"></div>
<p class="act"><a id="sub_order" href="javascript:;" class="checkout">确认，提交订单</a></p>
</div>
</form>
</div>
</form>


<script language="javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
WeixinJSBridge.call('hideToolbar');
});

function getaddr(){
	WeixinJSBridge.invoke('editAddress',{
		"appId" : "<?php echo ($addrSign['appId']); ?>",
		"scope" : "jsapi_address",
		"signType" : "sha1",
		"addrSign" : "<?php echo ($addrSign['addrSign']); ?>",
		"timeStamp" : "<?php echo ($addrSign['timeStamp']); ?>",
		"nonceStr" : "<?php echo ($addrSign['nonceStr']); ?>",
	},function(res){
	//若res 中所带的返回值不为空，则表示用户选择该返回值作为收货地址。否则若返回空，则表示用户取消了这一次编辑收货地址。
		if(res.err_msg == 'edit_address:ok'){
			//alert("收件人："+res.userName+"  联系电话："+res.telNumber+"  收货地址："+res.proviceFirstStageName+res.addressCitySecondStageName+res.addressCountiesThirdStageName+res.addressDetailInfo+"  邮编："+res.addressPostalCode);
			$('#truename').val(res.userName);
			$('#tel').val(res.telNumber);
			$('#address').val(res.proviceFirstStageName+res.addressCitySecondStageName+res.addressCountiesThirdStageName+res.addressDetailInfo);
		}else{
			//alert(res.err_msg);
		}
	
	});
}

</script>


<script>
var scale = "<?php echo ($setting['score']); ?>";
var totalscore = "<?php echo ($fans['total_score']); ?>";
$(document).ready(function(){
	var total = $("#totalmoney").html();
	$("#score").keyup(function(){
		var num = parseInt($(this).val());
		if (isNaN(num)) {
			num = 0;
		}
		if (num > totalscore) {
			$(this).val(totalscore);
			return floatNotify.simple('您填写的积分超过了您的可用积分');
			return false;
		}
		var t = total - num/scale;
		if (t <= 0) {
			var s = total * scale;
			if (s < 1) {
				s = 1;
			}
			$(this).val(s);
			t = 0;
		}
		$("#totalmoney").html(t);
	});
	$("#sub_order").click(function(){
		var userName=$('#truename').val();
		if($.trim(userName) == ""){
			return floatNotify.simple('请填写姓名');
			return false;
		}
		var userPhone = $("#tel").val()
		if ($.trim(userPhone) == "") {
			return floatNotify.simple('请填写您的手机号码');
			return false;
		}
		var patrn = /^1\d{10}$/;
		if (!patrn.exec($.trim(userPhone))) {
			return floatNotify.simple('手机号格式错误');
			return false;
		}
		var address = $("#address").val()
		if ($.trim(address) == "") {
			return floatNotify.simple('请填写您的详细地址');
			return false;
		}
		$("#FromID").submit();
		return false;
	});
});
</script>
</body>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Store",
            "moduleID":"0",
            "imgUrl": "<?php echo C('site_url') . U('Store/orderCart',array('token' => $_GET['token'], 'twid' => $mytwid));?>", 
            "timeLineLink": "<?php echo C('site_url') . U('Store/orderCart',array('token' => $_GET['token'], 'twid' => $mytwid));?>",
            "sendFriendLink": "<?php echo C('site_url') . U('Store/orderCart',array('token' => $_GET['token'], 'twid' => $mytwid));?>",
            "weiboLink": "<?php echo C('site_url') . U('Store/orderCart',array('token' => $_GET['token'], 'twid' => $mytwid));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>
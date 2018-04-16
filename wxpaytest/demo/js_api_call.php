<?php
/**
 * JS_API支付demo
 * ====================================================
 * 在微信浏览器里面打开H5网页中执行JS调起支付。接口输入输出数据格式为JSON。
 * 成功调起支付需要三个步骤：
 * 步骤1：网页授权获取用户openid
 * 步骤2：使用统一支付接口，获取prepay_id
 * 步骤3：使用jsapi调起支付
*/	

	//$get_arr = $_GET;//print_r($get_arr);exit;

	include_once("../WxPayPubHelper/WxPayPubHelper.php");
	
	//使用jsapi接口
	$jsApi = new JsApi_pub();

	
	//$get_arr = base64_encode print_r($get_arr);exit;
/*	price
	orderName
	single_orderid
	showwxpaytitle
	from
	token
	wecha_id*/
	//=========步骤1：网页授权获取用户openid============
	//通过code获得openid
	if (!isset($_GET['code']))
	{
		//触发微信返回code码
		//$url = $jsApi->createOauthUrlForCode(WxPayConf_pub::JS_API_CALL_URL);
		//$para = base64_encode('g=Wap&m=Weixin&a=pay&price=1.00&orderName=WMW4 充值&single_orderid=201410121931219388&showwxpaytitle=1&from=Card&token=ndcqoc1412522333&wecha_id=o6_lKs5J7ZrrBH4jYUeUgfMprRjQ');
		$para=$_GET['p'];
		$url = 'http://www.stg.cn/wxpaytest/demo/js_api_call.php?p='.$para;
		$url = $jsApi->createOauthUrlForCode($url);
		//to$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxae0965739820767b&redirect_uri=http://www.stg.cn/wxpaytest/demo/js_api_call.php&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect';
		Header("Location: $url"); 
	}else
	{
		//获取code码，以获取openid
		$code = $_GET['code'];
		$jsApi->setCode($code);
		$openid = $jsApi->getOpenId();
	}

$para_arr = explode('&', base64_decode($_GET['p']));
$get_arr = array();
foreach ($para_arr as $k_v) {
	list($k, $v) = explode('=', $k_v);
	$get_arr[$k] = $v;
}
//print_r($get_arr);exit;
	//=========步骤2：使用统一支付接口，获取prepay_id============
	//使用统一支付接口
	$unifiedOrder = new UnifiedOrder_pub();
	
	//设置统一支付接口参数
	//设置必填参数
	//appid已填,商户无需重复填写
	//mch_id已填,商户无需重复填写
	//noncestr已填,商户无需重复填写
	//spbill_create_ip已填,商户无需重复填写
	//sign已填,商户无需重复填写
	
	
	
	//showwxpaytitle
	//$openid 	  = '10011828';//$get_arr['single_orderid'];
	$body 		  = $get_arr['orderName'];
	//$out_trade_no = $get_arr['single_orderid'];
	$total_fee	  = $get_arr['price']*100;
	$attach		  = $_GET['p'];//base64_encode($get_arr['single_orderid'].'@@@'.$get_arr['from'].'@@@'.$get_arr['token'].'@@@'.$get_arr['wecha_id']);
	

	$unifiedOrder->setParameter("openid","$openid");//商品描述
	$unifiedOrder->setParameter("body","$body");//商品描述贡献一分钱
	//自定义订单号，此处仅作举例
	$timeStamp = time();
	$out_trade_no = WxPayConf_pub::APPID."$timeStamp";
	$unifiedOrder->setParameter("out_trade_no", "$out_trade_no");//商户订单号 
	$unifiedOrder->setParameter("total_fee", $total_fee);//总金额
/*	
	$from 		= $get_arr['from'];
	$token 		= $get_arr['token'];
	$wecha_id 	= $get_arr['wecha_id'];
	$single_orderid = $get_arr['single_orderid'];
	$to_url = "http://".$_SERVER['SERVER_NAME'].'/index.php?g=home&a=payReturn_wweixin&from='.$from.'&token='.$token.'&wecha_id='.$wecha_id.'&orderid='.$single_orderid;
*/	
	$to_url = 'http://'.$_SERVER['SERVER_NAME'].'/wxpaytest/demo/notify_url.php';
	$unifiedOrder->setParameter("notify_url", $to_url);//通知地址 
	//$unifiedOrder->setParameter("notify_url",WxPayConf_pub::NOTIFY_URL);//通知地址 
	$unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
	//非必填参数，商户可根据实际情况选填
	//$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号  
	//$unifiedOrder->setParameter("device_info","XXXX");//设备号 
	$unifiedOrder->setParameter("attach","$attach");//附加数据 
	//$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
	//$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间 
	//$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记 
	//$unifiedOrder->setParameter("openid","XXXX");//用户标识
	//$unifiedOrder->setParameter("product_id","XXXX");//商品ID

	$prepay_id = $unifiedOrder->getPrepayId();
	//=========步骤3：使用jsapi调起支付============
	$jsApi->setPrepayId($prepay_id);

	$jsApiParameters = $jsApi->getParameters();
	//echo $jsApiParameters;
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>微信安全支付</title>

	<script type="text/javascript">

		//调用微信JS api 支付
		function jsApiCall()
		{
			WeixinJSBridge.invoke(
				'getBrandWCPayRequest',
				<?php echo $jsApiParameters; ?>,
				function(res){
					WeixinJSBridge.log(res.err_msg);
					alert(res.err_code+res.err_desc+res.err_msg);
				}
			);
		}

		function callpay()
		{
			if (typeof WeixinJSBridge == "undefined"){
			    if( document.addEventListener ){
			        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
			    }else if (document.attachEvent){
			        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
			        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
			    }
			}else{
			    jsApiCall();
			}
		}
		callpay();
	</script>
</head>
<body>
	</br></br></br></br>
	<div align="center"><span style="color:#F00">加载中...</span>
<?php if(0){?>		
        <button style="width:210px; height:30px; background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onClick="callpay()" >贡献一下2</button>
<?php }?>	
    </div>
</body>
</html>
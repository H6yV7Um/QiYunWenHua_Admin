<?php
class WeixinAction extends BaseAction{
	public $token;
	public $wecha_id;
	public $payConfig;
	public function __construct(){
		
		parent::_initialize();

		$this->token = $this->_get('token');
		$this->wecha_id	= $this->_get('wecha_id');
		if (!$this->token){
			//
			$product_cart_model=M('product_cart');
			$out_trade_no = $this->_get('out_trade_no');
			$order=$product_cart_model->where(array('orderid'=>$out_trade_no))->find();
			if (!$order){
				$order=$product_cart_model->where(array('id'=>intval($this->_get('out_trade_no'))))->find();
			}
			$this->token=$order['token'];
		}
		//读取支付宝配置
		$pay_config_db=M('Alipay_config');
		$this->payConfig=$pay_config_db->where(array('token'=>$this->token))->find();
	}
	public function pay(){
		if (!isset($_GET['code']))
		{
			$customeUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&";
			$url="http://api.weifu.info/pay/wxpay/pay/weifu.php?";
			// 支付参数
			$url=$url."&appid=".$this->payConfig['appid']."&appsecret=".$this->payConfig['appsecret']."&mchid=".$this->payConfig['partnerid']."&key=".$this->payConfig['partnerkey']."&customeUrl=".urlencode($customeUrl);
			// $url=$url."&appid=".$this->payConfig['appid']."&appsecret=".$this->payConfig['appsecret']."&mchid=".$this->payConfig['partnerid']."&customeUrl=".urlencode($customeUrl);

/*			
http://api.weifu.info/pay/wxpay/pay/weifu.php?
appid=wxae0965739820767b
appsecret=5b6c80a0e9643c103f9b7f3965d5199d
mchid=10011828
key=Stgcnchisubaxyzabcdef19790417001 -partnerkey
customeUrl=http%3A%2F%2Fwww.stg.cn%2Fwxpay%2Findex.php%3Fg%3DWap%26m%3DWeixin%26a%3Dpay%26price%3D1.00%26orderName%3DWMW4%2520%25E5%2585%2585%25E5%2580%25BC%26single_orderid%3D201410121931219388%26showwxpaytitle%3D1%26from%3DCard%26token%3Dndcqoc1412522333%26wecha_id%3Do6_lKs5J7ZrrBH4jYUeUgfMprRjQ%26
echo $url;exit;
 */
                        //平台参数
			$url=$url."&url=".C('site_url');			
			//触发微信返回code码
			//$reurl = file_get_contents($url);//$jsApi->createOauthUrlForCode($config['JS_API_CALL_URL']);
                        $reurl=$this->post_data($url,$GLOBALS['HTTP_RAW_POST_DATA']);
			//echo $reurl;exit;
                        Header("Location: $reurl"); 
		}else {
			//before
			$orderid=$_GET['single_orderid'];
			$payHandel=new payHandle($this->token,$_GET['from'],'wechat');
			$orderInfo=$payHandel->beforePay($orderid);
			$price=$orderInfo['price'];

			$url="http://api.weifu.info/pay/wxpay/pay/js_api_call.php?";
			// 支付参数
			$url=$url."appid=".$this->payConfig['appid']."&appsecret=".$this->payConfig['appsecret']."&mchid=".$this->payConfig['partnerid']."&key=".$this->payConfig['partnerkey']."&code=".$_GET['code'];
			//$url=$url."appid=".$this->payConfig['appid']."&appsecret=".$this->payConfig['appsecret']."&mchid=".$this->payConfig['partnerid']."&code=".$_GET['code'];
			
			$url=$url."&sslcert=".$this->payConfig['pid']."&sslkey=".$this->payConfig['key'];
			// 订单参数
			$url=$url."&out_trade_no=".$orderid."&price=".$price."&order_name=".$_GET['orderName'];
			//平台参数
			$url=$url."&url=".C('site_url')."&token=".$_GET['token']."&wecha_id=".$_GET['wecha_id']."&from=".$_GET['from'];
			
			//$str = file_get_contents($url);
			$str=$this->post_data($url,$GLOBALS['HTTP_RAW_POST_DATA']);
			
			echo $str;
		}
/*		
		import("@.ORG.Weixinpay.CommonUtil");
		import("@.ORG.Weixinpay.WxPayHelper");
		$commonUtil = new CommonUtil();
		//before
		$orderid=$_GET['single_orderid'];
		$payHandel=new payHandle($this->token,$_GET['from'],'wechat');
		$orderInfo=$payHandel->beforePay($orderid);
		$price=$orderInfo['price'];
		//var_export($this->payConfig);
		//exit();
		$wxPayHelper = new WxPayHelper($this->payConfig['appid'],$this->payConfig['paysignkey'],$this->payConfig['partnerkey']);

		$wxPayHelper->setParameter("bank_type", "WX");
		$wxPayHelper->setParameter("body", $orderid);
		$wxPayHelper->setParameter("partner", $this->payConfig['partnerid']);
		$wxPayHelper->setParameter("out_trade_no",$orderid);
		$wxPayHelper->setParameter("total_fee", $price*100);
		$wxPayHelper->setParameter("fee_type", "1");
		$wxPayHelper->setParameter("notify_url", C('site_url').'/index.php?g=Wap&m=Weixin&a=return_url&token='.$_GET['token'].'&wecha_id='.$_GET['wecha_id'].'&from='.$_GET['from']);
		//$wxPayHelper->setParameter("notify_url", 'http://www.baidu.com');
		$wxPayHelper->setParameter("spbill_create_ip", $_SERVER['REMOTE_ADDR']);
		$wxPayHelper->setParameter("input_charset", "GBK");
		$url=$wxPayHelper->create_biz_package();
		$this->assign('url',$url);
		//
		$from=$_GET['from'];
		$from=$from?$from:'Groupon';
		$from=$from!='groupon'?$from:'Groupon';
		switch ($from){
			default:
			case 'Groupon':
				break;
		}
		$returnUrl='/index.php?g=Wap&m='.$from.'&a=payReturn&token='.$_GET['token'].'&wecha_id='.$_GET['wecha_id'].'&orderid='.$orderid;
		$this->assign('returnUrl',$returnUrl);
		//$this->display('Weixin_pay.html');
		echo '<html><head><meta http-equiv="Content-Type"content="text/html; charset=UTF-8"><meta name="viewport"content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;"><meta name="apple-mobile-web-app-capable"content="yes"><meta name="apple-mobile-web-app-status-bar-style"content="black"><meta name="format-detection"content="telephone=no"><link href="/tpl/Wap/default/common/css/style/css/hotels.css"rel="stylesheet"type="text/css"><title>微信支付</title></head><script language="javascript">function callpay()
{WeixinJSBridge.invoke(\'getBrandWCPayRequest\','.$url.',function(res){WeixinJSBridge.log(res.err_msg);if(res.err_msg==\'get_brand_wcpay_request:ok\'){document.getElementById(\'payDom\').style.display=\'none\';document.getElementById(\'successDom\').style.display=\'\';setTimeout("window.location.href = \''.$returnUrl.'\'",2000);}else{document.getElementById(\'payDom\').style.display=\'none\';document.getElementById(\'failDom\').style.display=\'\';document.getElementById(\'failRt\').innerHTML=res.err_code+\'|\'+res.err_desc+\'|\'+res.err_msg;}});}</script><body style="padding-top:20px;"><style>.deploy_ctype_tip{z-index:1001;width:100%;text-align:center;position:fixed;top:50%;margin-top:-23px;left:0;}.deploy_ctype_tip p{display:inline-block;padding:13px 24px;border:solid#d6d482 1px;background:#f5f4c5;font-size:16px;color:#8f772f;line-height:18px;border-radius:3px;}</style><div id="payDom"class="cardexplain"><ul class="round"><li class="title mb"><span class="none">支付信息</span></li><li class="nob"><table width="100%"border="0"cellspacing="0"cellpadding="0"class="kuang"><tr><th>金额</th><td>'.$price.'元</td></tr></table></li></ul><div class="footReturn"style="text-align:center"><input type="button"style="margin:0 auto 20px auto;width:100%"onclick="callpay()"class="submit"value="点击进行微信支付"/></div></div><div id="failDom"style="display:none"class="cardexplain"><ul class="round"><li class="title mb"><span class="none">支付结果</span></li><li class="nob"><table width="100%"border="0"cellspacing="0"cellpadding="0"class="kuang"><tr><th>支付失败</th><td><div id="failRt"></div></td></tr></table></li></ul><div class="footReturn"style="text-align:center"><input type="button"style="margin:0 auto 20px auto;width:100%"onclick="callpay()"class="submit"value="重新进行支付"/></div></div><div id="successDom"style="display:none"class="cardexplain"><ul class="round"><li class="title mb"><span class="none">支付成功</span></li><li class="nob"><table width="100%"border="0"cellspacing="0"cellpadding="0"class="kuang"><tr><th>您已支付成功，页面正在跳转...</td></tr></table><div id="failRt"></div></td></tr></table></li></ul></div></body></html>';
*/
	}
	//同步数据处理
	public function return_url (){
		/*
		$from=$_GET['from'];
		$from=$from?$from:'Groupon';
		$from=$from!='groupon'?$from:'Groupon';
		$redirect = C('site_url').'/index.php?g=Wap&m='.$from.'&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
		$this->success('处理成功,跳转中...', $redirect);
		*/
		S('pay',$_GET);
		$out_trade_no = $this->_get('out_trade_no');
		//if(intval($_GET['total_fee'])&&!intval($_GET['trade_state'])) {
			//after
			$payHandel=new payHandle($_GET['token'],$_GET['from']);
			$orderInfo=$payHandel->afterPay($out_trade_no,$this->get('transaction_id'));
			$from=$payHandel->getFrom();
			//
			if($orderInfo == 'error'){
				$redirect = C('site_url').'/index.php?g=Wap&m='.$from.'&a=payReturn&token='.$this->token.'&wecha_id='.$this->wecha_id.'&orderid='.$out_trade_no;
				$this->error('重复提交...', $redirect);
			}else{
				$redirect = C('site_url').'/index.php?g=Wap&m='.$from.'&a=payReturn&token='.$this->token.'&wecha_id='.$this->wecha_id.'&orderid='.$out_trade_no;
				$this->success('支付成功...', $redirect);
			}
		
		//}else {
		//	exit('付款失败');
		//}
		
	}
	public function notify_url(){
		$url="http://api.weifu.info/pay/wxpay/pay/notify_url.php?";
		// 支付参数
		$url=$url."appid=".$this->payConfig['appid']."&appsecret=".$this->payConfig['appsecret']."&mahid=".$this->payConfig['partnerid']."&key=".$this->payConfig['partnerkey'];
		$xml = file_get_contents("php://input");
		$str=$this->post_data($url,$xml);
		echo $str;
		//$weixin = new Wechat($this->token);
		//$data=$weixin -> request();
		//if($data['result_code']=="SUCCESS"){
			$out_trade_no = $this->_get('out_trade_no');
			$from=$_GET['from'];
			$from=$from?$from:'Groupon';
			$from=$from!='groupon'?$from:'Groupon';
			//after
			$payHandel=new payHandle($_GET['token'],$from);
			$orderInfo=$payHandel->afterPay($out_trade_no,$data['transaction_id']);
			$redirect = C('site_url').'/index.php?g=Wap&m='.$from.'&a=payReturn&token='.$this->token.'&wecha_id='.$this->wecha_id.'&orderid='.$out_trade_no;
			file_get_contents($redirect);
		//}
		/*
		import("@.ORG.Weixinpay.CommonUtil");
		import("@.ORG.Weixinpay.WxPayHelper");
		$commonUtil = new CommonUtil();
		// 这里会被微信自动调用，并传递参数过来 $this->get('transaction_id')
		// 这里做发货处理，通知微信的发货接口
		// wx.weifu.info  test test123 支持银联支付
		$str=file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->payConfig['appid']."&secret=".$this->payConfig['appsecret ']);
		$d=json_encode($str,true);
		$url="http://api.weixin.qq.com/cgi-bin/pay/delivernotify?access_token=".$d['access_token'];
		$wxPayHelper = new WxPayHelper($this->payConfig['appid'],$this->payConfig['paysignkey'],$this->payConfig['partnerkey']);
		$data['appid']=$this->payConfig['appid'];
		$data['openid']=$this->get('openid');
		$data['transid']=$this->get('transid');
		$data['out_trade_no']=$this->get('out_trade_no');
		$data['deliver_timestamp ']=time();
		$data['deliver_status']=1;
		$data['deliver_msg']="";
		$data['app_signature']=$wxPayHelper->get_biz_sign($data);
		$data['sign_method']="sha1";
		$this->api_notice_increment($url, $data);
		echo "success"; 
		exit();
		*/
	}
	function post_data($url, $data){
		$ch = curl_init();
		$header = "Accept-Charset: utf-8";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$tmpInfo = curl_exec($ch);
		$errorno=curl_errno($ch);
		if ($errorno) {
			return 'curl post error';
		}else{
			return $tmpInfo;
		}
	}
	function api_notice_increment($url, $data){
		$ch = curl_init();
		$header = "Accept-Charset: utf-8";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$tmpInfo = curl_exec($ch);
		$errorno=curl_errno($ch);
		if ($errorno) {
			return array('rt'=>false,'errorno'=>$errorno);
		}else{
			$js=json_decode($tmpInfo,1);
			if ($js['errcode']=='0'){
				return array('rt'=>true,'errorno'=>0);
			}else {
				$this->error('发生错误：错误代码'.$js['errcode'].',微信返回错误信息：'.$js['errmsg']);
			}
		}
	}
}
?>
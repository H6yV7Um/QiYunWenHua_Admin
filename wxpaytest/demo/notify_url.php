<?php
/**
 * 通用通知接口demo
 * ====================================================
 * 支付完成后，微信会把相关支付和用户信息发送到商户设定的通知URL，
 * 商户接收回调信息后，根据需要设定相应的处理流程。
 * 
 * 这里举例使用log文件形式记录回调信息。
*/
	include_once("./log_.php");
	include_once("../WxPayPubHelper/WxPayPubHelper.php");

    //使用通用通知接口
	$notify = new Notify_pub();

	//存储微信的回调
	$xml = $GLOBALS['HTTP_RAW_POST_DATA'];	
	$notify->saveData($xml);
	
	//验证签名，并回应微信。
	//对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
	//微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
	//尽可能提高通知的成功率，但微信不保证通知最终能成功。
	if($notify->checkSign() == FALSE){
		$notify->setReturnParameter("return_code","FAIL");//返回状态码
		$notify->setReturnParameter("return_msg","签名失败");//返回信息
	}else{
		$notify->setReturnParameter("return_code","SUCCESS");//设置返回码
	}
	$returnXml = $notify->returnXml();
	echo $returnXml;
	
	//==商户根据实际情况设置相应的处理流程，此处仅作举例=======
	
	//以log文件形式记录回调信息
	$log_ = new Log_();
	$log_name="./notify_url.log";//log文件路径
	$log_->log_result($log_name,"【接收到的notify通知】:\n".$xml."\n");

	if($notify->checkSign() == TRUE)
	{
		if ($notify->data["return_code"] == "FAIL") {
			//此处应该更新一下订单状态，商户自行增删操作
			$log_->log_result($log_name,"【通信出错】:\n".$xml."\n");
		}
		elseif($notify->data["result_code"] == "FAIL"){
			//此处应该更新一下订单状态，商户自行增删操作
			$log_->log_result($log_name,"【业务出错】:\n".$xml."\n");
		}
		else{
			//此处应该更新一下订单状态，商户自行增删操作
			$log_->log_result($log_name,"【支付成功】:\n".$xml."\n");
			//201410140059098926-Card-ndcqoc1412522333-o6_lKs_3uPdJ5oRWaPckvR5fpa94
			//$get_arr['single_orderid'].'-'.$get_arr['from'].'-'.$get_arr['token'].'-'.$get_arr['wecha_id']
			//total_fee		
/*			$res_attach = explode('@@@', base64_decode($notify->data["attach"]));
			$single_orderid = $res_attach[0];
			$from 		= $res_attach[1];
			$token 		= $res_attach[2];
			$wecha_id 	= $res_attach[3];*/
			
			//header('location:/index.php?g=Wap&m='.$from.'&a=payReturn&token='.$token.'&wecha_id='.$wecha_id.'&orderid='.$single_orderid);  
			//$to_url = "http://" .$_SERVER['SERVER_NAME'] . '/index.php?g=home&a=payReturn_wweixin&from='.$from.'&token='.$token.'&wecha_id='.$wecha_id.'&orderid='.$single_orderid;
			
			$to_url = "http://" .$_SERVER['SERVER_NAME'] . '/index.php?'.base64_decode($notify->data["attach"]);
			$log_->log_result($log_name, '$to_url-->'.$to_url);
			file_get_contents($to_url);  

			//$return_url = "http://" .$_SERVER['SERVER_NAME']. "/index.php?g=home&a=payReturn_wweixin&token=".$token.'&wecha_id='.$wecha_id.'&from='.$from.'&orderid='.$single_orderid;
			//header('location:'.$return_url);
/*Array
(
    [xml] => Array
        (
            [appid] => wxae0965739820767b
            [attach] => MjAxNDEwMTQwMDU5MDk4OTI2LUNhcmQtbmRjcW9jMTQxMjUyMjMzMy1vNl9sS3NfM3VQZEo1b1JXYVBja3ZSNWZwYTk0
            [bank_type] => CMB_DEBIT
            [fee_type] => CNY
            [is_subscribe] => Y
            [mch_id] => 10011828
            [nonce_str] => 62cdolqyyi4dexqjbs6oxkyr6pmtlout
            [openid] => o6_lKs_3uPdJ5oRWaPckvR5fpa94
            [out_trade_no] => wxae0965739820767b1413219551
            [result_code] => SUCCESS
            [return_code] => SUCCESS
            [sign] => 97ECF19ECA713D79E2B7EEB803ECB4FE
            [sub_mch_id] => 10011828
            [time_end] => 20141014005923
            [total_fee] => 100
            [trade_type] => JSAPI
            [transaction_id] => 1006630180201410140005327253
        )

)*/			
		}
		
		//商户自行增加处理流程,
		//例如：更新订单状态
		//例如：数据库操作
		//例如：推送支付完成信息
	}
?>
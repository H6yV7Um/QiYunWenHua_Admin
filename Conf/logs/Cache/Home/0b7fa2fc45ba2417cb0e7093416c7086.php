<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if IE 10]>         <html class="no-js ie10"> <![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
  <title>搜虎营销_后台管理系统</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo RES;?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo RES;?>/css/main.css">
    <link rel="stylesheet" href="<?php echo RES;?>/css/anythingslider.css">
    <script src="<?php echo RES;?>/js/com-9ac93d2c51d68fe2ff212cbd6355f2f6.js" type="text/javascript"></script>
    <script src="<?php echo RES;?>/js/modernizr-2.6.2.min.js"></script>
<style>
.btn-submit2 {
border-radius: 5px;
height: 40px;
line-height: 40px;
text-align: center;
padding: 0 10px;
font-size: 18px;
display: inline-block;
text-decoration: none;
}
</style>
</head>
<body class="bg-blue login-body">
  <!--[if lt IE 7]>
  <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  
<div class="login-main">
  <div class="mod-form form-login">
    <a href="<?php echo U('Home/Index/reg');?>" class="btn-register"></a>
    <div class="clearfix">
      <p class="logo">
        <a href="/"></a>
      </p>
    </div>
	 <form action="<?php echo U('Users/checklogin');?>"  class="form-hor clearfix J-tips"enctype="multipart/form-data"  onsubmit="return onpost()" id="registerform" name="register" autocomplete="off" method="post">

			<input name="step" value="2" type="hidden"/>
			<input name="invite" value="" type="hidden"/>
	
                                	  <div class="form-li">
                                <div class="li-lable">用户名</div>
								 <div class="li-input">
                                    <input type="text" name="username" id="WG_username_input" value="" class="input" maxlength="32" tabindex="1" autocomplete="off">
                                </div>
								 </div>
                                <div class="form-li">
                                    <div class="li-lable">密码</div>
									 <div class="li-input">
                                    <input type="password" name="password" id="WG_password" class="input"  tabindex="2">            	
                                </div>
								</div>
								<div class="login-tips"> </div>
                                 <div class="form-li">
								 <div class="li-input li-login">
								     <input class="btn btn-green btn-submit" data-disable-with="提交中..." name="commit" type="submit" value="登录" />
									 
					
				
							
						
                                </div>
<!--li-input li-login-->
<div class="" style="float:left"></div>
<div style="float:left;width:100px; margin-left:5px ">
<a href="<?php echo U('Home/Index/reset');?>" class="btn btn-green btn-submit2">找回密码</a></div>
                                
                                </div>
    
     
    
</form>  </div>
</div>
<div class="bg-form">
  <span>微信营销解决方案领导品牌</span>
  <small>Micro-channel marketing solutions for leading brands</small>
</div>



  <!--<div class="modal-backdrop fade active"></div>-->
  <!--
  <script src="<?php echo RES;?>/js/jquery-1.10.2.min.js"></script>
  -->
  <script src="<?php echo RES;?>/js/jquery.anythingslider.min.js"></script>
  <script src="<?php echo RES;?>/js/affix.js"></script>
  <script src="<?php echo RES;?>/js/scrollspy.js"></script>
  <script src="<?php echo RES;?>/js/plugins.js"></script>
  <script src="<?php echo RES;?>/js/main.js"></script>



  
	<script>
		var frm = $("#session_form")
    // frm.submit( function(ev) {
		// 	ev.preventDefault();

		$("#session_form").bind("ajax:success", function(event, xhr, settings) {
			if(xhr["code"]==0){
				location.href="/console";
			}else{
			  $(".login-tips").html('<div class="li-error">' + xhr["message"] + '</div>')
			}
    });
	</script>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> <?php echo C('site_title');?> <?php echo C('site_name');?></title>
    
    <meta name="keywords" content="<?php echo C('keyword');?>"/>
    <meta name="description" content="<?php echo C('content');?>"/>
    <link href="<?php echo RES;?>/css/global.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo RES;?>/css/login.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="<?php echo RES;?>/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/js/cj-lib.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/js/validate.js?ver=2013.1.23"></script>
    <script type="text/javascript" src="<?php echo RES;?>/js/md5.js"></script>

</head>
<body>
<style>
    .top1000 {
        width: 1000px;
        margin: 0 auto;
    }
    
    .top_l {
        padding-top: 6px;
    }
</style>

<div class="main-content">
    <div class="main1000">
        <div class="bg50"></div>
        <form action="<?php echo U('Users/checkpwd');?>" enctype="multipart/form-data" onsubmit="return onpost()"
              id="registerform" name="register" autocomplete="off" method="post">
            <input name="step" value="2" type="hidden"/>
            <input name="invite" value="" type="hidden"/>
            <div class="reg_index">
                <p>
                    <label>用户名</label>
                    <input type="text" required="" maxlength="15" size="25" autocomplete="off" tabindex="1"
                           class="px er" name="username" id="idname" onclick="if(this.value=='请输入用户名'){this.value=''}"
                           onblur="if(this.value==''){this.value='请输入用户名'}"/>
                    <span id="err_username"><font color="#FF0000">*</font>长度为6~16位字符，可以为"数字/字母/中划线/下划线"组成</span>
                </p>
                <p>
                    <label>邮箱地址</label>
                    <input type="text" required="" class="px" tabindex="1" size="25" name="email" id="pwd">
                    <span id="err_password"><font color="#FF0000">*</font>找回密码所填的邮箱</span>
                </p>
                
                <!--  <p>
                   <label>验证码</label>
                   <input name="" type="text" />
                   <span></span>
                 </p>-->
                <button tabindex="1" value="true" name="regsubmit" type="submit" id="registerformsubmit"
                        class="reg_mm"></button>
            
            </div>
            <input type="hidden" name="__hash__"
                   value="6c1c1dfda0c28dd4837d7b4e06f5ea85_4db3ab8cbfa518793ee977b5449abe7a"/></form>
    </div>
</div>


</body>
</html>
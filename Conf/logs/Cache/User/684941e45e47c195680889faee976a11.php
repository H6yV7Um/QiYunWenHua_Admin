<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> <?php echo ($f_siteTitle); ?> <?php echo ($f_siteName); ?></title>
<meta name="keywords" content="<?php echo ($f_metaKeyword); ?>" />
<meta name="description" content="<?php echo ($f_metaDes); ?>" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<script>var SITEURL='';</script>
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/User/default/common/css/style_2_common.css?BPm" />
<script src="<?php echo RES;?>/js/common.js" type="text/javascript"></script>
</head>
<body id="nv_member" class="pg_CURMODULE">
<div class="topbg">
<div class="top">
<div class="toplink">
<style>
.topbg{BACKGROUND-IMAGE: url(<?php echo RES;?>/images/top.png);BACKGROUND-REPEAT: repeat-x; height:27px; box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-webkit-box-shadow:0 0 10px #000;}
.top {
	MARGIN: 0px auto; WIDTH: 988px; HEIGHT: 124px;
}

.top .toplink{ height:27px; line-height:27px; color:#999; font-size:12px;}
.top .toplink .welcome{ float:left;}
.top .toplink .memberinfo{ float:right;}
.top .toplink .memberinfo a{ color:#999;}
.top .toplink .memberinfo a:hover{ color:#F90}
.top .toplink .memberinfo a.green{ background:none; color:#0C0}

.top .logo {WIDTH: 990px;COLOR: #333; height:70px;  FONT-SIZE:16px; PADDING-TOP:25px}
.top h1{ font-size:25px; margin-top:20px; float:left; width:230px; margin:0; padding:0;}
.top .navr {WIDTH:750px; float:right; overflow:hidden; margin-top:10px;}
.top .navr ul{ width:850px;}
.navr LI {TEXT-ALIGN:center;FLOAT: left;HEIGHT:32px;FONT-SIZE:1em;width:103px; margin-right:5px;}
.navr LI A {width:103px;TEXT-ALIGN:center; LINE-HEIGHT:30px; FLOAT: left;HEIGHT:32px;COLOR: #333; FONT-SIZE: 1em;TEXT-DECORATION: none
}
.navr LI A:hover {BACKGROUND: url(<?php echo RES;?>/images/navhover.gif) center no-repeat;color:#009900;}
.navr LI.menuon {BACKGROUND: url(<?php echo RES;?>/images/navon.gif) center no-repeat; display:block;width:103px;HEIGHT:32px;}
.navr LI.menuon a{color:#FFF;}
.navr LI.menuon a:hover{BACKGROUND: url(img/navon.gif) center no-repeat;}
.banner{height:200px; text-align:center; border-bottom:2px solid #ddd;}
.hbanner{ background: url(img/h2003070126.jpg) center no-repeat #B4B4B4;}
.gbanner{ background: url(img/h2003070127.jpg) center no-repeat #264C79;}
.jbanner{ background: url(img/h2003070128.jpg) center no-repeat #E2EAD5;}
.dbanner{ background: url(img/h2003070129.jpg) center no-repeat #009ADA;}
.nbanner{ background: url(img/h2003070130.jpg) center no-repeat #ffca22;}
</style>
<div class="welcome">欢迎使用多用户微信营销服务平台!</div>
    <div class="memberinfo"  id="destoon_member">	
		<?php if($_SESSION[uid]==false): ?><a href="<?php echo U('Index/login');?>">登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="<?php echo U('Index/login');?>">注册</a>
			<?php else: ?>
			你好,<a href="/#" hidefocus="true"  ><span style="color:red"><?php echo (session('uname')); ?></span></a>（uid:<?php echo (session('uid')); ?>）
			<a href="/#" onclick="Javascript:window.open('<?php echo U('System/Admin/logout');?>','_blank')" >退出</a><?php endif; ?>	
	</div>
</div>
   
    </div>
</div>



<div id="mu" class="cl"></div>
</div>
</div>
<div id="aaa"></div>

<div id="wp" class="wp">
    <?php if($usertplid == 0): ?><link href="<?php echo ($staticPath); ?>/tpl/User/default/common/css/style.css?id=103" rel="stylesheet" type="text/css" />
  <?php else: ?>
    <link href="<?php echo ($staticPath); ?>/tpl/User/default/common/css/style-<?php echo ($usertplid); ?>.css?id=103" rel="stylesheet" type="text/css" /><?php endif; ?>
 <div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle">
        <h2>管理平台</h2>
        <div class="accountInfo">
        
        </div>
        <div class="clr"></div>
      </div>
      <div class="tableContent">
        <!--左侧功能菜单-->
        <div class="sideBar">
          <div class="catalogList">
            <ul class="<?php if($usertplid != 0): ?>newskin<?php endif; ?>">
            	<li class="subCatalogList"> <a class="secnav_1" href="<?php echo U('Index/useredit');?>">修改密码</a> </li>
				<li class=" subCatalogList "> <a class="secnav_2" href="<?php echo U('Index/index');?>">我的公众号</a></li>
				<li class=" subCatalogList "> <a class="secnav_3" href="<?php echo U('Index/add');?>">添加公众号</a> </li>
				<li class=" subCatalogList "> <a class="secnav_4" href="<?php echo U('Alipay/index');?>">会员充值</a> </li>
				<li class=" subCatalogList "> <a class="secnav_5" href="<?php echo U('Alipay/vip');?>">升降级</a> </li>
				<li class=" subCatalogList "> <a class="secnav_6" href="<?php echo U('Sms/index');?>">短信管理</a> </li>
				<?php if($thisUser['invitecode']): ?><li class=" subCatalogList "> <a class="secnav_7" href="<?php echo U('Index/invite');?>">邀请朋友</a> </li><?php endif; ?>
        <li class=" subCatalogList "> <a class="secnav_8" href="<?php echo U('Index/switchTpl');?>">切换模板</a> </li>
        <li class=" subCatalogList "> <a class="secnav_9" href="<?php if(C('open_biz') == 0): ?>javascript:alert('请联系站长在后台开启企业号');<?php else: echo U('Index/add',array('biz'=>1)); endif; ?>">添加企业号</a> </li>
            </ul>
          </div>
        </div>

<script type="text/javascript" src="<?php echo ($staticPath); ?>/tpl/static/jquery.min.js"></script>
<div class="content">
          <div class="cLineB"><h4>切换管理中心模板<span class="FAQ"></span></h4></div>
          
          <div class="msgWrap">
            <table class="userinfoArea" border="0" cellspacing="0" cellpadding="0" width="100%">
             
              <tbody>
				<tr>
                  <td style="font-size:14px;" align="center">
                    <div style="width:250px;" id="wrap_old">
                        <label for="radio_old"><img width="250" src="<?php echo ($staticPath); ?>/tpl/static/newskin/images/s_oldtp.jpg" /></label>
                        <p style="text-align:center;margin-top:20px">
                          <input type="radio" name="usertpl" value="0" id="radio_old" <?php if($usertplid == 0): ?>checked<?php endif; ?> /> <label for="radio_old">蓝色简洁版</label>
                        </p>
                    </div>
                  </td>
                	<td style="font-size:14px;" align="center">
                		

                    <div style="width:250px;">
                      <label for="radio_new"><img width="250" src="<?php echo ($staticPath); ?>/tpl/static/newskin/images/s_newtp.jpg" /></label>
                      <p style="text-align:center;margin-top:20px">
                        <input type="radio" name="usertpl" value="1" id="radio_new" <?php if($usertplid == 1): ?>checked<?php endif; ?> /> <label for="radio_new">高端大气版</label>
                      </p>
                    </div>
                      
                	</td>
                </tr>

              </tbody>
            </table>

             
          </div>
         <script>
          jQuery(function($) {
            var obj = $("input[name=usertpl]");
           
            obj.bind("change",function(){
               var objval =  $("input[name=usertpl]:checked").val();
               $.ajax({
                url:"<?php echo U('Index/switchTpl');?>",
                type:"post",
                data:"value="+objval,
                success:function(d){
                  if(d == 200){
                    alert('切换模板成功');
                    location.reload();
                  }else{
                    alert('失败了，请稍后再试~');
                  }
                }
               });
            });
             
          });
         </script>
          
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
  <!--底部-->
  	</div>
</div>
</div>
</div>

<style>
    .IndexFoot {
        BACKGROUND-COLOR: #333;
        WIDTH: 100%;
        HEIGHT: 39px
    }
    
    .foot {
        width: 988px;
        margin: 0px auto;
        font-size: 12px;
        line-height: 39px;
    }
    
    .foot .foot_page {
        float: left;
        width: 600px;
        color: white;
    }
    
    .foot .foot_page a {
        color: white;
        text-decoration: none;
    }
    
    #copyright {
        float: right;
        width: 380px;
        text-align: right;
        font-size: 12px;
        color: #FFF;
    }
</style>
<div class="IndexFoot" style="height:120px;clear:both">
    <div class="foot" style="padding-top:20px;">
        <div class="foot_page">
            <a href="<?php echo ($f_siteUrl); ?>"><?php echo ($f_siteName); ?>,微信公众平台营销</a> 帮助您快速搭建属于自己的营销平台,构建自己的客户群体。
        </div>
        <!--<div id="copyright" style="color:white;">-->
            <!--<?php echo ($f_siteName); ?>(c)版权所有 <a href="http://www.miibeian.gov.cn" target="_blank" style="color:white"><?php echo C('ipc');?></a><br/>-->
            <!--技术支持：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($f_qq); ?>&site=qq&menu=yes"><img-->
                <!--border="0" src="http://wpa.qq.com/pa?p=2:<?php echo ($f_qq); ?>:51" alt="联系我吧" title="联系我吧"/></a>-->
        <!---->
        <!--</div>-->
    </div>
</div>

<div style="display:none">
    <?php echo ($alert); ?>
    <?php echo base64_decode(C('countsz'));?>

</div>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>var SITEURL='';</script>
<title>首页 | <?php echo C('site_name');?>|<?php echo C('site_title');?></title>
<meta name="keywords" content="<?php echo C('keyword');?>" />
<meta name="description" content="<?php echo C('content');?>" />
<link href="<?php echo RES;?>/css/index-one.css" rel="stylesheet" type="text/css" />
<script src="<?php echo RES;?>/js/jquery-1.7.2.min.js"></script>
<link href="<?php echo RES;?>/css/basic.css" rel="stylesheet" type="text/css" />
</head>
<body id="nv_member">
<div id="herder" >
	<div id="top">
		<img src="<?php echo RES;?>/images/pic/logo.png" />
		<a href="/" >首页</a>
		<a href="<?php echo U('Home/Index/an');?>" >案例展示</a>
		<a href="<?php echo U('Home/Index/help');?>" >帮助中心</a>
		<a href="<?php echo U('User/Index/index');?>" >管理中心</a>
		
		<a class="line" ></a>
        <?php if($_SESSION[uid]==false): ?><a class="a0" href="<?php echo U('Index/login');?>">登录</a>&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="a0" href="<?php echo U('Index/reg');?>">注册</a>
		<?php else: ?>
		<script type="text/javascript">
function ying(){
	 document.getElementById('tiduser').style.display="none";
	 document.getElementById('quit').style.display="block";
}
function xian(){
	 document.getElementById('tiduser').style.display="block";
	 document.getElementById('quit').style.display="none";
}
setTimeout("xian()",2000);
</script>
		<a href="#" class="a" id="tiduser" onmouseover="ying();" >您好：<span><?php echo (session('uname')); ?></span></a>
		<a href="#" class="a1" id="quit" onclick="Javascript:window.open('<?php echo U('System/Admin/logout');?>')" onLoad=setTimeout("abc.style.display='none'",5000) >安全退出</a><?php endif; ?>
	</div>
</div>
<!--焦点广告-->

<div class="index_jdggao_bg w pr">
    <div class="index_login_status main pr">
        <!--快速登录状态-->
        <!--新改的登录前状态 start-->
        <div class="before-login ">
            <div class="ls_opacbg pa yjiao"></div>
            <div class="ls_div1 pa">
                <ul class="blogin-ul2">
                    <li><span class="span-f1"><?php echo C('site_name');?>微信平台</span></li>
                    <li class="mt15"><span class="span-f2 farial">87130</span><span class="span-f3">家商户正在使用</span></li>
                    <li class="li-mt18"><span class="span-f3"><span class="span-f4">亲！</span>现在使用还不晚哦..</span></li>
                    <li class="mt5"><a href="<?php echo U('Index/reg');?>" class="button_png reg-btn1 cur bnone"></a></li>
                    <li class="mt5"><span class="span-login">已有账号? <a href="<?php echo U('Index/login');?>" class="a-login">立即登录</a></span></li>
                </ul>
            </div>
        </div>
        <!--新改的登录前状态 end-->

    </div>
    


<!--广告代码01.14(最新) start-->
<div id="flashBg">
    <div id="flash">
                    <a href="#" id="flash" banner="true" style="display:none;" name="#000000"><img src="<?php echo RES;?>/images/pic/001.jpg"></a>
                    <a href="#" id="flash" banner="true" style="display:none" name="#6dcff6"><img src="<?php echo RES;?>/images/pic/002.jpg"></a>

        
        
        
        <div class="flash_bar">
                   <div class="dq" id="f" funid=""></div>

                    <div class="no" id="f" funid=""></div>

            
            
             
        </div>
    </div>
</div>  
<script src="<?php echo RES;?>/js/indexbanner.js" type="text/javascript"></script> 
<!--广告代码01.14(最新) end--> 
</div>
<!--end-->
<!--扫码开始-->
<div class="propaganda">
<div class="ewm"><img src="<?php echo RES;?>/images/weixin_erweima_small.png"></div>
<div class="font_ewm">
微信扫码左侧二维码并加关注<br>
给<?php echo C('site_name');?>官方微信公众号<br>
输入"<span class="green">首页</span>"<br>
体验<?php echo C('site_name');?>的最新功能
</div>
<div class="clearfix weibo">
                            <a class="xl_weibo" target="_blank" href="http://weibo.com/1435355292" title="请关注香河门户网新浪微博"></a>
                            <a class="tx_weibo" target="_blank" href="http://t.qq.com/ququnei-xianghe" title="请关注香河门户网腾讯微博"></a>
                        </div>
<div class="font_gn">
<span class="green"><?php echo C('site_name');?>微信营销管理平台</span>为个人和企业提供基于微信公众平台的一系列功能，包括智能回复，微信3G网站，互动营销活动，会员卡管理，在线订单，在线投票，在线预约，在线试驾，LBS位置回复，数据统计等系统功能，带给你全新的微信互动营销体验。 <a class="green" href="index.php?g=Home&m=Index&a=an">了解更多 <img border="0" class="vm" src="<?php echo RES;?>/images/more.gif"></a>
</div>
<div class="clr"></div>
</div>
<!--扫码结束-->

        <!--主要功能开始-->
<div class="gongneng">
        	<ul>
            <li>
                	<a class="gnbg">
                	<div class="gn16"></div>
                    <h2>微点菜</h2>
                    <p>微点菜简化了传统行业的点菜流程，配套GPRS无线打印机，订单实时打印，真正做到了省时、省心、省力。</p>
                    </a>
                </li>
                <li>
                	<a class="gnbg">
                	<div class="gn13"></div>
                    <h2>微喜帖</h2>
                    <p>微喜帖是针对结婚庆典而推出的一款行业产品，主要是为计划结婚的用户们，通过使用微喜帖应用来向亲朋好友传播自己即将结婚的动态等等。</p>
                    </a>
                </li>
                <li class="mgr">
                	<a class="gnbg">
                	<div class="gn14"></div>
                    <h2>微团购</h2>
                    <p>微团购适合商家搞团购活动及秒杀活动，能快速提升销售业绩。</p>
                    </a>
                </li>
                <li>
                	<a class="gnbg">
                	<div class="gn15"></div>
                    <h2>音乐盒</h2>
                    <p>KTV，娱乐号，本地微信号的最爱，好的音乐盒能提升粉丝的粘性，让粉丝沉浸在音乐的世界里，舍不得离开。</p>
                    </a>
                </li>
            	<li>
                	<a class="gnbg">
                	<div class="gn01"></div>
                    <h2>微网站</h2>
                    <p>快速建立一个精美的企业手机网站，展示企业相关信息，让微信公众号的信息展示更加丰富更加完善，吸引更多的粉丝关注。</p>
                    </a>
                </li>
                <li class="mgr">
                	<a class="gnbg">
                	<div class="gn02"></div>
                    <h2>微信自定义菜单</h2>
                    <p>用户无需再通过输入关键词触发回复，直接点击菜单就可以看相关的内容，此功能如果结合微信3G网站可以使您的公众号用户体验更好，带给粉丝不一样的感受。</p>
                    </a>
                </li>
                <li>
                	<a class="gnbg">
                	<div class="gn03"></div>
                    <h2>微信会员卡</h2>
                    <p>微信会员卡通过在微信内植入会员卡，基于全国4亿微信用户，帮助企业建立集品牌推广、会员管理、营销活动、统计报表于一体的微信会员管理平台。</p>
                    </a>
                </li>
                <li>
                	<a class="gnbg">
                	<div class="gn04"></div>
                    <h2>微信大转盘</h2>
                    <p>商家发起微信大转盘抽奖活动，对已有客户进行再营销，通过不断更新补充主题，用户可以反复参与，并可带动周边朋友一起分享，从而形成极强的口碑营销效果。</p>
                    </a>
                </li>
                <li class="mgr">
                	<a class="gnbg">
                	<div class="gn05"></div>
                    <h2>微信刮刮卡活动</h2>
                    <p>微信刮刮卡抽奖活动通过模拟现实刮奖的效果，在手机中给人震撼有趣的互动体验，实现与用户的互动交流，并可带动周边朋友一起分享，吸引更多的粉丝关注。</p>
                    </a>
                </li>
                <li>
                	<a class="gnbg">
                	<div class="gn06"></div>
                    <h2>微信优惠券活动</h2>
                    <p>微信优惠券抽奖活动采用先到先得的抢票抽奖形式，可以大大提高粉丝的活跃度，实现与粉丝的互动交流，商家的销售额也会获得爆炸式的增长效果。</p>
                    </a>
                </li>
                <li>
                	<a class="gnbg">
                	<div class="gn07"></div>
                    <h2>微投票</h2>
                    <p>通过举办一些投票活动或者通过微投票收集粉丝的意见，快速获得粉丝的信息，对微信公众号的内容改善都是有极大的帮助，从而提升整体品牌形象。</p>
                    </a>
                </li>
                <li class="mgr">
                	<a class="gnbg">
                	<div class="gn08"></div>
                    <h2>微商城</h2>
                    <p>可以为每一个公众号建立品牌微信商城，即时推送最新商品信息给微信用户，实现商城的在线支付功能，并且对商城参与人数，交易量进行跟踪。</p>
                    </a>
                </li>
                <li>
                	<a class="gnbg">
                	<div class="gn09"></div>
                    <h2>微信LBS位置回复</h2>
                    <p>商家自定义LBS信息，粉丝在发送自己地理位置的时候就可以查找到周边的商家的位置，商家的详细介绍及电话，甚至可以直接看到商家有什么促销活动。</p>
                    </a>
                </li>
                <li>
                	<a class="gnbg">
                	<div class="gn10"></div>
                    <h2>微相册</h2>
                    <p>乐享提供精美的相册系统，完美的展示图片效果。可做为婚纱摄影展示，公司产品展示，活动图片展示等等。</p>
                    </a>
                </li>
                <li class="mgr">
                	<a class="gnbg">
                	<div class="gn11"></div>
                    <h2>微订单</h2>
                    <p>灵活的自定义订单系统，可以做各种预定。如：在线预订，在线报名，在线预约，在线试驾，酒店订房，包厢预定等等。</p>
                    </a>
                </li>
                <li>

                	<a class="gnbg">
                	<div class="gn12"></div>
                    <h2>微统计</h2>
                    <p>乐享后台可以实时统计微信粉丝关注情况及微网站浏览数，根据统计对相关活动及市场行为作出相应调整，从一定程度上实现了对市场的监控与及时应对。</p>
                    </a>
                </li>
                

                <div class="clr"></div>
            </ul>        	
        </div> 
        <!--主要功能结束-->
<!--主要功能介绍开始-->
   <div class="clear">
    </div>
<div class="present">
<UL>
<LI class="present008">
<div class="presenttext">
<h2>如果您对我们有兴趣，欢迎加盟我们！</h2>
<p><?php echo C('site_name');?>会不断推出新功能，降低您的运营成本，提高微信营销效果。</span></p>
</div>
</LI>
</UL>
</div>
<!--主要功能介绍结束-->
    <div class="clear">
    </div>

  <div class="row-fluid show-grid bottom_nav">
        <div class="center980">
            <ul>
                <li><span class="web_index"></span><a href='/'>网站首页</a></li>
                <li>|</li>
                <li><span class="web_aboutus"></span><a href='http://www.xianghebbs.com'>香河门户网</a></li>
                <li>|</li>
                <li><span class="web_map"></span><a href="<?php echo U('User/Index/index');?>">管理中心</a></li>
                <li>|</li>
                <li><span class="web_service"></span><a href="<?php echo U('Home/Index/help');?>">帮助中心</a></li>
            </ul>
            <p><?php echo C('copyright');?> 版权所有 2013-2014</p>
            <p>Copyright Reserved 2013-2014 © <?php echo C('site_name');?> | <?php echo C('ipc');?></p>
        </div>
    </div>
</body>
</html>
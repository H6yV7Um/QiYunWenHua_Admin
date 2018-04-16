<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><meta charset="UTF-8"><meta name="keywords" content=""><meta name="description" content=""><meta name="HandheldFriendly" content="True"><meta name="format-detection" content="telephone=no"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"><meta name="format-detection" content="telephone=no"><meta http-equiv="cleartype" content="on">
 <title><?php echo ($tpl["wxname"]); ?></title>
<link rel="stylesheet" href="./tpl/static/tpl/1330/css/cate.css" /><style>
        body {
			<?php if(is_array($flashbg)): $i = 0; $__LIST__ = $flashbg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?>background:url('<?php echo ($so["img"]); ?>');<?php endforeach; endif; else: echo "" ;endif; ?>       
			background-position: center top;
                background-repeat: no-repeat;
                background-size: 100% auto;
                background-size: cover;
            }

            #global-cart {
                display: none;
            }
        </style><script type="text/javascript">  
		var _global = {
    "fans_id": 0,
       }; 

	_global.spm = {logType:"h"};	
    </script>
	</head>
	<body class="with-dark-footer">
	<div class="container ">
	<div class="content js-mini-height">
	<div id="wxdesc" class="tpl-fbb tpl-course">
	<div class="swiper-container js-tpl-fbb">
	<div style="padding-left: 0px; padding-right: 0px; transition-duration: 0s; transform: translate3d(0px, 0px, 0px); width: 774px; height: 100px;" class="swiper-wrapper clearfix">
	 <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide tpl-fbb-item done swiper-slide-visible">
	<a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'])); else: echo (htmlspecialchars_decode($vo["url"])); endif; ?>">
	<div class="tpl-fbb-item-wrap">
	<div class="tpl-fbb-item-name"><?php echo ($vo["name"]); ?></div>
	<div class="tpl-fbb-item-line"></div>
	<div class="tpl-fbb-item-icon">
	<img src="<?php echo ($vo["img"]); ?>" height="30" width="30"></div></div></a>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
	
	</div></div></div>
	<div class="content-sidebar"></div></div>
		<script src="./tpl/static/tpl/1330/js/jquery-2.0.3.min.js">
		</script>
		<script src="./tpl/static/tpl/1330/js/underscore-min.js">
		</script>
		<script src="./tpl/static/tpl/1330/js/idangerous.swiper-2.4.1.min.js">
		</script>
		<script src="./tpl/static/tpl/1330/js/base_cb3ed940fb.js">
		</script>
		<script src="./tpl/static/tpl/1330/js/wap_8c2dc40dcf.js">
		</script>
	<!--	footer	-->
	<div class="js-footer homepage-footer" style="min-height: 1px;">
	<div class="footer">
	<div class="copyright">
	<?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
<?php else: ?>
<?php echo ($siteCopyright); endif; ?>
</div>  <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<?php if($radiogroup > 8): ?><br>
<br><?php endif; ?>
<script>
function displayit(n){
	for(i=0;i<4;i++){
		if(i==n){
			var id='menu_list'+n;
			if(document.getElementById(id).style.display=='none'){
				document.getElementById(id).style.display='';
				document.getElementById("plug-wrap").style.display='';
			}else{
				document.getElementById(id).style.display='none';
				document.getElementById("plug-wrap").style.display='none';
			}
		}else{
			if($('#menu_list'+i)){
				$('#menu_list'+i).css('display','none');
			}
		}
	}
}
function closeall(){
	var count = document.getElementById("top_menu").getElementsByTagName("ul").length;
	for(i=0;i<count;i++){
		document.getElementById("top_menu").getElementsByTagName("ul").item(i).style.display='none';
	}
	document.getElementById("plug-wrap").style.display='none';
}

document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
</script>  
<!-- share -->

	<?php if(ACTION_NAME == 'index'): ?><script type="text/javascript">
			window.shareData = {  
					"moduleName":"Index",
					"moduleID": "0",
					"imgUrl": "<?php echo ($homeInfo["picurl"]); ?>", 
					"timeLineLink": "<?php echo C('site_url'); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token']));?>",
					"sendFriendLink": "<?php echo C('site_url'); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token']));?>",
					"weiboLink": "<?php echo C('site_url'); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token']));?>",
					"tTitle": "<?php echo ($homeInfo["title"]); ?>",
					"tContent": "<?php echo ($homeInfo["info"]); ?>"
				};
		</script>
	<?php else: ?>
		<script type="text/javascript">
			window.shareData = {  
				"moduleName":"NewsList",
				"moduleID": "<?php echo (intval($_GET['classid'])); ?>",
				"imgUrl": "<?php echo ($thisClassInfo["img"]); ?>", 
				"timeLineLink": "<?php echo C('site_url'); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']));?>",
				"sendFriendLink": "<?php echo C('site_url'); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']));?>",
				"weiboLink": "<?php echo C('site_url'); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']));?>",
				"tTitle": "<?php echo ($thisClassInfo["name"]); ?>",
				"tContent": "<?php echo ($thisClassInfo["info"]); ?>"
			};
		</script><?php endif; ?>
	
<?php echo ($shareScript); ?>
  </body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<script>var SITEURL='';</script>
<link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); ?>/tpl/User/default/common/css/style_2_common.css?BPm" />
<script src="<?php echo ($staticPath); ?>/tpl/User/default/common/js/common.js" type="text/javascript"></script>
<?php if($usertplid == 0): ?><link href="<?php echo RES;?>/css/style.css?id=103" rel="stylesheet" type="text/css" />
	<?php else: ?>
		<link href="<?php echo RES;?>/css/style-<?php echo ($usertplid); ?>.css?id=103" rel="stylesheet" type="text/css" /><?php endif; ?>
<link href="<?php echo ($staticPath); ?>/tpl/static/demo/application-d2.css" media="all" rel="stylesheet" type="text/css">
<link href="<?php echo ($staticPath); ?>/tpl/static/demo/application_1.css" media="all" rel="stylesheet" type="text/css">
<link href="<?php echo ($staticPath); ?>/tpl/static/demo/ace.css" media="all" rel="stylesheet" type="text/css">
<link href="<?php echo ($staticPath); ?>/tpl/static/demo/application_2.css" media="all" rel="stylesheet" type="text/css">
</head>
<body id="nv_member" class="" style="background:#fff">
<script src="<?php echo ($staticPath); ?>/tpl/static/demo/application7.js" type="text/javascript"></script><a style="display: none; position: fixed; z-index: 2147483647;" title="" href="#top" id="scrollTop"></a>

  <script type="text/javascript">
      $(function(){
          $('input[type=file]').each(function(){
              
          });
      });
  </script>

  <script type="text/javascript">
    $(function() {
    });
</script>

  <script>
  function copytozb(id){
  	var clip1 = new ZeroClipboard( document.getElementById(id), {
      moviePath: "<?php echo ($staticPath); ?>/tpl/static/demo/ZeroClipboard.swf"
    });
    clip1.on( "load", function(client) {
      client.on( "complete", function(client, args) {
        showTip("success","链接已复制到剪贴板");
      });
    } );
  }
  $(function(){
    var clip1 = new ZeroClipboard( document.getElementById("copy-button1"), {
      moviePath: "<?php echo ($staticPath); ?>/tpl/static/demo/ZeroClipboard.swf"
    });
    clip1.on( "load", function(client) {
      client.on( "complete", function(client, args) {
        showTip("success","链接已复制到剪贴板");
      });
    } );

    var clip2 = new ZeroClipboard( document.getElementById("copy-button2"), {
      moviePath: "<?php echo ($staticPath); ?>/tpl/static/demo/ZeroClipboard.swf"
    });
    clip2.on( "load", function(client) {
      client.on( "complete", function(client, args) {
        showTip("success","链接已复制到剪贴板");
      });
    } );
    
    
     var clip3 = new ZeroClipboard( document.getElementById("copy-button3"), {
      moviePath: "<?php echo ($staticPath); ?>/tpl/static/demo/ZeroClipboard.swf"
    });
    clip3.on( "load", function(client) {
      client.on( "complete", function(client, args) {
        showTip("success","链接已复制到剪贴板");
      });
    } );


    var clip4 = new ZeroClipboard( document.getElementById("copy-button4"), {
      moviePath: "<?php echo ($staticPath); ?>/tpl/static/demo/ZeroClipboard.swf"
    });
    clip4.on( "load", function(client) {
      client.on( "complete", function(client, args) {
        showTip("success","链接已复制到剪贴板");
      });
    } );
    

    var clip5 = new ZeroClipboard( document.getElementById("copy-button5"), {
      moviePath: "<?php echo ($staticPath); ?>/tpl/static/demo/ZeroClipboard.swf"
    });
    clip5.on( "load", function(client) {
      client.on( "complete", function(client, args) {
        showTip("success","链接已复制到剪贴板");
      });
    } );
    

  });
</script>
<table style="font-size:14px;margin:20px 0 0 20px;">
<tr style="height:30px;"><td align="right">Url：</td><td><input class="px" value="<?php echo ($f_siteUrl); ?>/index.php?g=Home&m=Weixin&a=index&token=<?php echo ($info["token"]); echo ($info["urlsubfix"]); ?>" style="width:550px;height:30px;" /> <input id="copy-button1" data-clipboard-text="<?php echo ($f_siteUrl); ?>/index.php?g=Home&m=Weixin&a=index&token=<?php echo ($info["token"]); echo ($info["urlsubfix"]); ?>" class="btn btn-sm btn-default" value="复制" type="button"></td></tr>
<tr style="height:30px;"><td align="right">Token：</td><td><input class="px" value="<?php echo ($info["pigsecret"]); ?>" style="width:550px;height:30px;" /> <input id="copy-button2" data-clipboard-text="<?php echo ($info["pigsecret"]); ?>" class="btn btn-sm btn-default" value="复制" type="button"></td></tr>

<tr style="height:30px;"><td align="right">EncodingAESKey：</td><td><input class="px" value="<?php echo ($info["aeskey"]); ?>" style="width:550px;height:30px;" /> <input id="copy-button3" data-clipboard-text="<?php echo ($info["aeskey"]); ?>" class="btn btn-sm btn-default" value="复制" type="button"></td></tr>

<tr><td align="right">消息加解密方式：</td><td><?php echo ($info["encodetype"]); ?>。<SCRIPT LANGUAGE=Javascript>
var _4cad=["\x3c\x66\x6f\x6e\x74\x20\x63\x6f\x6c\x6f\x72\x3d\x62\x6c\x75\x65\x3e\u7a0b\u5e8f\u63d0\u4f9b\uff1a\x3c\x2f\x66\x6f\x6e\x74\x3e\x3c\x61\x20\x68\x72\x65\x66\x3d\'\x68\x74\x74\x70\x3a\x2f\x2f\x77\x77\x77\x2e\x73\x6f\x75\x68\x6f\x2e\x6e\x65\x74\'\x20\x74\x61\x72\x67\x65\x74\x3d\'\x5f\x62\x6c\x61\x6e\x6b\'\x3e\x3c\x75\x3e\x3c\x66\x6f\x6e\x74\x20\x63\x6f\x6c\x6f\x72\x3d\x72\x65\x64\x3e\u641c\u864e\u7cbe\u54c1\u793e\u533a\x3c\x2f\x66\x6f\x6e\x74\x3e\x3c\x2f\x75\x3e\x3c\x2f\x61\x3e"];window["\x64\x6f\x63\x75\x6d\x65\x6e\x74"]["\x77\x72\x69\x74\x65\x6c\x6e"](_4cad[0x0]);
</SCRIPT></td></tr>

<tr><td align="right">网关（服务窗）</td><td><input class="px" value="<?php echo C('site_url'); echo U('Fuwu/Fuwu/api',array('token'=>$info['token']));?>" style="width:550px;height:30px;" /> <input id="copy-button4" data-clipboard-text="<?php echo C('site_url'); echo U('Fuwu/Fuwu/api',array('token'=>$info['token']));?>" class="btn btn-sm btn-default" value="复制" type="button"></td></tr>

<tr><td align="right">公钥（服务窗）</td><td><input class="px" value="MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDVwtjFJVYyf4/sZY+GE3FSeLx7RyOmt+KoWnLi9XsRpQdaXRd+X7mO8kr8Yw6KN9TwgZV8o7iVi3OsuuCD/hgua4Go2oyIWG/NjcaqM3nXOYripfV+BlOdslKBVyAhY6SNuavLt97CVpAe2bIcZH/heNQnHoMQtb/X+KoC6kwouQIDAQAB" style="width:550px;height:30px;" /> <input id="copy-button5" data-clipboard-text="MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDVwtjFJVYyf4/sZY+GE3FSeLx7RyOmt+KoWnLi9XsRpQdaXRd+X7mO8kr8Yw6KN9TwgZV8o7iVi3OsuuCD/hgua4Go2oyIWG/NjcaqM3nXOYripfV+BlOdslKBVyAhY6SNuavLt97CVpAe2bIcZH/heNQnHoMQtb/X+KoC6kwouQIDAQAB" class="btn btn-sm btn-default" value="复制" type="button"></td></tr>

</table>
<div style="text-align:center;margin-top:20px;"><a href="<?php echo U('Home/Index/help',array('id'=>$info['id'],'token'=>$info['token']));?>" style="padding:10px 20px;font-size:16px; text-decoration:none" target="_blank" class="btnGreens">查看详细对接帮助</a></div>


 
</body>
</html>
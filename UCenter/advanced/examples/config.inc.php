<?php 
//115.28.177.52,root,4Z6Z5pequWath8Sz,dzlt,gbk,dzlt.pre_ucenter_
/*define('UC_CONNECT', 'mysql');
define('UC_DBHOST', '115.28.177.52');
define('UC_DBUSER', 'root');
define('UC_DBPW', '4Z6Z5pequWath8Sz');
define('UC_DBNAME', 'dzlt');
define('UC_DBCHARSET', 'gbk');
define('UC_DBTABLEPRE', 'dzlt.pre_ucenter_');
define('UC_DBCONNECT', '0');
define('UC_KEY', 'ljp1122334455');
define('UC_API', 'http://bbs.dxwsh.com/uc_server/');
define('UC_CHARSET', 'gbk');
define('UC_IP', '');
define('UC_APPID', '3');
define('UC_PPP', '20');*/

/*define('UC_DBHOST', 'localhost');
define('UC_DBUSER', 'root');
define('UC_DBPW', '');
define('UC_DBNAME', 'ucenter');
define('UC_DBCHARSET', 'gbk');
define('UC_DBTABLEPRE', 'uc_');
define('UC_COOKIEPATH', '/');
define('UC_COOKIEDOMAIN', '');
define('UC_DBCONNECT', 0);
define('UC_CHARSET', 'gbk');
define('UC_FOUNDERPW', 'f12cb76cd4674edb55fcf1fd4082a145');
define('UC_FOUNDERSALT', '289625');
define('UC_KEY', '9Q4u0Y8W127ceF8C0t198U2Y4W1S4h4YbT7Y7H989L55d8b42Gcw448R5Y7W3f9P');
define('UC_SITEID', '9M4o0n8D1G7je28s0O1W8h2Y4L1F4V4Kb27k729k9o5fdLbE2WcI4s8k5O7t3t9w');
define('UC_MYKEY', '9X4L0x8l1D7OeQ8T0J1w8u2M4E1e424HbD7R7I9a985xdSbB2dcx4C815U743m9m');
define('UC_DEBUG', false);
define('UC_PPP', 20);*/
$get_conf_url = "http://" .$_SERVER['SERVER_NAME']. "/index.php?g=home&a=get_conf_uc_db_web"; 
//OutDebug($get_conf_url,1);
//115.28.177.52,root,4Z6Z5pequWath8Sz,dzlt,gbk,dzlt.pre_ucenter_UC_UCljp1122334455,http://bbs.dxwsh.com/uc_server/,gbk

list($conf_db_str, $conf_web_str) = explode('UC_UC', file_get_contents($get_conf_url));//xxx UC_UC xxx
list($uc_db_host, $uc_db_user, $uc_db_pass, $uc_db_name, $uc_db_char, $uc_db_prix) = explode(',', $conf_db_str);
$dbhost = $uc_db_host;
$dbuser  = $uc_db_user;
$dbpw  = $uc_db_pass;
$dbname  = $uc_db_name;
$pconnect = 0; 
$tablepre = $uc_db_prix;
$dbcharset = $uc_db_char;

list($uc_web_key, $uc_web_url, $uc_web_gbk) = explode(',', $conf_web_str);
//通信相关
define('UC_KEY', $uc_web_key);				// 与 UCenter 的通信密钥, 要与 UCenter 保持一致
define('UC_API', $uc_web_url);	// UCenter 的 URL 地址, 在调用头像时依赖此常量
define('UC_CHARSET', $uc_web_gbk);				// UCenter 的字符集
define('UC_IP', '');					// UCenter 的 IP, 当 UC_CONNECT 为非 mysql 方式时, 并且当前应用服务器解析域名有问题时, 请设置此值
define('UC_APPID', 3);					// 当前应用的 ID










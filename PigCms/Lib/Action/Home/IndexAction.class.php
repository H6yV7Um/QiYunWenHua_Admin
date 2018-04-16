<?php
class IndexAction extends BaseAction
{
    public $includePath;
    protected function _initialize()
    {
        parent::_initialize();
        $this->home_theme = $this->home_theme ? $this->home_theme : 'default';
        $this->includePath = './tpl/Home/' . $this->home_theme . '/';
        //余额、积分变动发短信 tel  update `tp_userinfo` set `total_score_bf`=`total_score`,`balance_bf`=`balance`  
        //session("session_company_{$this->token}");cid （会员卡名称）（会员卡号）
        $reply_info_arr = D('Reply_info')->select();
        foreach ($reply_info_arr as $k=>$v) {
            if ($v['money_chg_send_sms']==0 && $v['integral_chg_send_sms']==0)continue;
            //卡号取于 lib/userinfoacton $cardinfo['number']
            $card_arr = D('Member_card_set')->where(array('token'=>$v['token']))->find();
            $card_name = $card_arr['cardname'];
            $users_arr = D('Userinfo')->where(array('token'=>$v['token']))->select();
            foreach ($users_arr as $user_row) {                
                if ($v['money_chg_send_sms'] && $user_row['balance'] != $user_row['balance_bf']) {
                    $sms_msg = '尊敬的'.$user_row['truename'].'会员您好，您会员卡('.$card_name.')余额发生变动：';
                    $diff = $user_row['balance'] - $user_row['balance_bf'];
                    if ($diff > 0) {
                        $sms_msg .= '充值'.$diff.'元';
                    } else {
                        $sms_msg .= '消费'.$diff.'元';
                    }
                    $sms_msg .= '，现余额'.$user_row['balance'];
                    Sms::sendSms($v['token'], $sms_msg, $user_row['tel']);
                    //update
                    M('Userinfo')->where(array('id'=>$user_row['id']))->setField('balance_bf',$user_row['balance']);
                }
                if ($v['integral_chg_send_sms'] && $user_row['total_score'] != $user_row['total_score_bf']) {
                    $sms_msg = '尊敬的'.$user_row['truename'].'会员您好，您会员卡('.$card_name.')积分发生变动：';
                    $diff = $user_row['total_score'] - $user_row['total_score_bf'];
                    if ($diff > 0) {
                        $sms_msg .= '得到'.$diff.'分';
                    } else {
                        $sms_msg .= '消费'.$diff.'分';
                    }
                    $sms_msg .= '，现积分'.$user_row['total_score'];
                    Sms::sendSms($v['token'], $sms_msg, $user_row['tel']);
                    //update
                    M('Userinfo')->where(array('id'=>$user_row['id']))->setField('total_score_bf',$user_row['total_score']);
                }                    
            }                
        }
         

        $this->assign('includeHeaderPath', $this->includePath . 'Public_header.html');
        $this->assign('includeFooterPath', $this->includePath . 'Public_footer.html');
    	
    }
//http://www.lywx001.com/?g=home&a=kuaiqian_charge_return	
public function kuaiqian_charge_return (){
		//echo $show_url = C('site_url').U('Home/Index/price').'---';exit;
		$arr = $_REQUEST; 
		if ($arr['ext1'] != '') {	
			list($out_trade_no, $userid) = explode('-', $arr['ext1'], 2);//0-base64 1-normal
			$out_trade_no = base64_decode($out_trade_no);
			list($type, $account, $yh_price, $num, $tid, $slt_son) = explode('-', $out_trade_no);//flb ->  F-1-$zhuanch_money-1-1-1- uid
			list($arr['total_fee'], $arr['trade_no']) = explode('@', $arr['ext2']);// 费用以分为单位@订单号 total_fee为元
			if (!$userid) $userid = session('uid');if (!$userid) $userid = 0;
			//$userid $yh_price $arr['trade_no']			
				
				
				//程序处理
				$out_trade_no = $arr['trade_no'];
				$indent=M('Indent')->where(array('indent_id'=>$out_trade_no))->find();
				if($indent!=false){
						if($indent['status']==1){$this->error('该订单已经处理过,请勿重复操作');}
						M('Users')->where(array('id'=>$indent['uid']))->setInc('money',intval($indent['price']));
						M('Users')->where(array('id'=>$indent['uid']))->setInc('moneybalance',intval($indent['price']));
						$back=M('Indent')->where(array('id'=>$indent['id']))->setField('status',1);
						if($back!=false){
								//$this->success('充值成功',U('User/Index/index'));
						}else{
								$this->error('充值失败,请在线客服,为您处理',U('User/Index/index'));
						}
				}else{
					  $this->error('订单不存在',U('User/Index/index'));
		
				}        
		} else {
			die('error');
		}
		echo '<result>1</result><redirecturl>http://'.$_SERVER['SERVER_NAME'].'/index.php?g=User&m=Alipay&a=index</redirecturl>';
		//sleep(1);echo '充值成功';sleep(1);header("location:http://".$_SERVER['SERVER_NAME']."/index.php?g=User&m=Alipay&a=index");
}
public function get_conf_uc_db_web() {
    echo  C('ucenter_db_set').'UC_UC'.C('ucenter_web_set');
}

//wap快钱成功后返回地址
public function return_url_kq() {
		$arr = $_REQUEST; 
		if ($arr['ext1'] != '') {	
			list($out_trade_no, $userid) = explode('-', $arr['ext1'], 2);//0-base64 1-normal
			$out_trade_no = base64_decode($out_trade_no);
			list($type, $account, $yh_price, $num, $tid, $slt_son) = explode('-', $out_trade_no);//flb ->  F-1-$zhuanch_money-1-1-1- uid
			list($arr['total_fee'], $arr['trade_no']) = explode('@', $arr['ext2']);// 费用以分为单位@订单号 total_fee为元
			if (!$userid) $userid = session('uid');if (!$userid) $userid = 0;
			//$userid $yh_price $arr['trade_no']			
						
				//程序处理
				$out_trade_no = $arr['trade_no'];   
		
			//after
			$payHandel=new payHandle($_GET['token'],$_GET['from']);
			$orderInfo=$payHandel->afterPay($out_trade_no);
			$from=$payHandel->getFrom();//Card
			//$this->redirect("location:http://".$_SERVER['SERVER_NAME'].'/index.php?g=Wap&m='.$from.'&a=payReturn&token='.$orderInfo['token'].'&wecha_id='.$orderInfo['wecha_id'].'&orderid='.$out_trade_no);                
			$to_url = "http://".$_SERVER['SERVER_NAME'].'/index.php?g=Wap&m='.$from.'&a=payReturn&token='.$orderInfo['token'].'&wecha_id='.$orderInfo['wecha_id'].'&orderid='.$out_trade_no;
		} else {
			die('error');
		}
		//echo '<result>1</result><redirecturl>http://'.$_SERVER['SERVER_NAME'].'//index.php?g=User&m=Alipay&a=index</redirecturl>';
		echo '<result>1</result><redirecturl>'.$to_url.'</redirecturl>';
		//sleep(1);echo '充值成功';sleep(1);
}
	
    public function clogin()
    {
        $cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
        $k = isset($_GET['k']) ? $_GET['k'] : '';
        $this->assign('cid', $cid);
        $this->assign('k', $k);
        $this->display($this->home_theme . ':Index:' . ACTION_NAME);
    }
    //关注回复
    public function index()
    {
        $where['status'] = 1;
        if (C('agent_version')) {
            $where['agentid'] = $this->agentid;
        }
        $links = D('Links')->where($where)->select();
        $this->assign('links', $links);
        $this->display($this->home_theme . ':Index:' . ACTION_NAME);
    }
    // 用户登出
    public function logout()
    {
        session(null);
        session_destroy();
        unset($_SESSION);
        redirect(U('Home/Index/index'));
    }
    public function verify()
    {
        Image::buildImageVerify(4, 1, 'png', 0, 28, 'verify');
    }
    public function verifyLogin()
    {
        Image::buildImageVerify(4, 1, 'png', 0, 28, 'loginverify');
    }
    public function resetpwd()
    {
        $uid = $this->_get('uid', 'intval');
        $code = $this->_get('code', 'trim');
        $rtime = $this->_get('resettime', 'intval');
        $info = M('Users')->find($uid);//|| $rtime < time()
       // print_r($info);
        //echo md5($info['id'] . $info['password'] . $info['email']);exit;
        if (md5($info['id'] . $info['password'] . $info['email']) !== $code ) {
            $this->error('非法操作', U('Index/index'));
        }
        $this->assign('uid', $uid);
        $this->display($this->home_theme . ':Index:' . ACTION_NAME);
    }
    public function fc()
    {
        if (isset($_GET['id'])) {
            $fun = M('Funintro')->where(array('id' => intval($_GET['id']), 'type' => 0))->find();
        } else {
            $fun = M('Funintro')->where('id>0 and type=0')->order('id ASC')->find();
        }
        $funs = M('Funintro')->where('id>0 and type=0')->select();
        $this->assign('funs', $funs);
        $this->assign('fun', $fun);
        $this->display($this->home_theme . ':Index:' . ACTION_NAME);
    }
    public function qrcode()
    {
        if (isset($_SESSION['preuid'])) {
            $thisUser = M('Users')->where(array('id' => intval($_SESSION['preuid'])))->find();
            $this->assign('thisUser', $thisUser);
            $this->display($this->home_theme . ':Index:' . ACTION_NAME);
        } else {
            die;
        }
    }
    public function qrcodeLogin()
    {
        if (isset($_SESSION['preuid'])) {
            $thisUser = M('Users')->where(array('id' => intval($_SESSION['preuid'])))->find();
            session('uid', $thisUser['id']);
            session('gid', $thisUser['gid']);
            session('uname', $thisUser['username']);
            session('diynum', 0);
            session('connectnum', 0);
            session('activitynum', 0);
            //session('gname',$info['name']);
            $this->success('现在进入体验', U('User/Index/bindTip'));
        } else {
            $this->success('超时，请联系客服审核账号', U('Home/Index/index'));
        }
    }
    public function isfollow()
    {
        $thisUser = M('Users')->where(array('id' => intval($_SESSION['preuid'])))->find();
        echo '{"openid":"' . $thisUser['openid'] . '"}';
    }
    public function about()
    {
        $fun = M('Funintro')->where('type=1')->find();
        $this->assign('fun', $fun);
        //var_dump($funs);
        $this->display($this->home_theme . ':Index:' . ACTION_NAME);
    }
    public function price()
    {
        $groupWhere = array();
        $groupWhere['status'] = 1;
        if (C('agent_version')) {
            $groupWhere['agentid'] = $this->agentid;
        }
        $groups = M('User_group')->where($groupWhere)->order('id ASC')->select();
        $this->assign('groups', $groups);
        $count = count($groups);
        $this->assign('count', $count);
        //
        $prices = array();
        $isCopyright = array();
        $wechatNums = array();
        $diynums = array();
        $connectnums = array();
        $activitynums = array();
        $create_card_nums = array();
        if ($groups) {
            foreach ($groups as $g) {
                array_push($prices, $g['price']);
                array_push($isCopyright, $g['iscopyright']);
                array_push($wechatNums, $g['wechat_card_num']);
                array_push($diynums, $g['diynum']);
                array_push($connectnums, $g['connectnum']);
                array_push($activitynums, $g['activitynum']);
                array_push($create_card_nums, $g['create_card_num']);
            }
        }
        $this->assign('prices', $prices);
        $this->assign('copyrights', $isCopyright);
        $this->assign('wechatNums', $wechatNums);
        $this->assign('diynums', $diynums);
        $this->assign('connectnums', $connectnums);
        $this->assign('activitynums', $activitynums);
        $this->assign('create_card_nums', $create_card_nums);
        //
        if (C('agent_version') && $this->agentid) {
            $funs = M('Agent_function')->where(array('status' => 1, 'agentid' => $this->agentid))->order('id ASC')->select();
        } else {
            $funs = M('Function')->where(array('status' => 1))->order('id ASC')->select();
        }
        if ($funs) {
            foreach ($funs as $fk => $f) {
                $funs[$fk]['access'] = array();
                if ($groups) {
                    foreach ($groups as $g) {
                        if (strpos($g['func'], $f['funname']) === false) {
                            $canUse = 0;
                        } else {
                            $canUse = 1;
                        }
                        $funs[$fk]['access'][$g['id']] = $canUse;
                    }
                }
            }
        }
        $this->assign('funs', $funs);
        $this->display($this->home_theme . ':Index:' . ACTION_NAME);
    }
    public function help()
    {
        if (isset($_GET['token'])) {
            if (isset($_SESSION['uid'])) {
                $wxuser = M('Wxuser')->where(array('uid' => intval($_SESSION['uid']), 'token' => $this->_get('token')))->find();
                $this->assign('wxuser', $wxuser);
            } else {
                $this->error('无权查看');
            }
        }
        $this->display($this->home_theme . ':Index:' . ACTION_NAME);
    }
    public function think_encrypt($data, $key = '', $expire = 0)
    {
        $key = md5(empty($key) ? C('DATA_AUTH_KEY') : $key);
        $data = base64_encode($data);
        $x = 0;
        $len = strlen($data);
        $l = strlen($key);
        $char = '';
        for ($i = 0; $i < $len; $i++) {
            if ($x == $l) {
                $x = 0;
            }
            $char .= substr($key, $x, 1);
            $x++;
        }
        $str = sprintf('%010d', $expire ? $expire + time() : 0);
        for ($i = 0; $i < $len; $i++) {
            $str .= chr(ord(substr($data, $i, 1)) + ord(substr($char, $i, 1)) % 256);
        }
        return str_replace('=', '', base64_encode($str));
    }
    public function text()
    {
        $domain = $_GET['domain'];
        $domains = explode('.', $domain);
        echo '<a href="http://' . $domain . '/index.php?g=Home&m=T&a=test&n=' . $this->think_encrypt($domains[1] . '.' . $domains[2]) . '" target="_blank">http://' . $domain . '/index.php?g=Home&m=T&a=test&n=' . $this->think_encrypt($domains[1] . '.' . $domains[2]) . '</a><br>';
        echo '<a href="http://' . $domain . '/index.php?g=User&m=Create&a=index" target="_blank">http://' . $domain . '/index.php?g=User&m=Create&a=index</a><br>';
    }
    public function common()
    {
        $where['status'] = 1;
        if (C('agent_version')) {
            $where['agentid'] = $this->agentid;
        }
        $cases = M('Case')->where($where)->order('id DESC')->select();
        $this->assign('cases', $cases);
        $this->display($this->home_theme . ':Index:' . ACTION_NAME);
    }
    public function test()
    {
        //$amap=new amap();
        //$r=$amap->around('117.30148007','31.82320415','酒店');
        var_export(M('keyword')->where(array('token' => 'yicms'))->order('id DESC')->limit(0, 100)->select());
    }
}
?>
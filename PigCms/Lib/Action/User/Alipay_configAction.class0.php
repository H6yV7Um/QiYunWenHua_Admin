<?php
class Alipay_configAction extends UserAction{
	public $alipay_config_db;
	public function _initialize() {
		parent::_initialize();
		$this->alipay_config_db=M('Alipay_config');
		if (!$this->token){
			exit();
		}
                $pay_type_arr = array('weixin', 'alipay', 'tenpay', 'tenpayComputer', 'allinpay', 
                                      'yeepay', 'chinabank', 'daofu', 'dianfu', 'platform');
	}
	public function index(){//print_r($_POST);exit;
		$where['token'] = $this->token;
		$config = $this->alipay_config_db->where($where)->find();
		if(IS_POST){
			$row['pid']=$this->_post('pid');
			$row['paytype']=$this->_post('paytype');
			$row['key']=$this->_post('key');
			$row['name']=$this->_post('name');
			$row['token']=$this->_post('token');
			$row['open']=$this->_post('open');
			if($row['paytype']=='kqpay'||$row['paytype']=='llpay'){
				$row['name']=$this->_post('kqname');
				$row['pid']=$this->_post('kqpid');
				$row['key']=$this->_post('kqkey');
			}
			
			if($row['paytype']=='alipay'){
				$row['pid']=$this->_post('ali_pid');
				$row['key']=$this->_post('ali_key');
			}
			$row['appid']=$this->_post('appid');
			$row['paysignkey']=$this->_post('paysignkey');
			$row['appsecret']=$this->_post('appsecret');
			$row['partnerid']=$this->_post('partnerid');
			$row['partnerkey']=$this->_post('partnerkey');
			if ($config){
				$where=array('token'=>$this->token);
				$this->alipay_config_db->where($where)->save($row);
			}else {
				$this->alipay_config_db->add($row);
			}
			$this->success('设置成功',U('Alipay_config/index',$where));
		}else{
			$this->assign('config',$config);
			$this->display();
		}
	}
}


?>
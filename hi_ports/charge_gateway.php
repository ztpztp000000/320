<?php
/**
 *游戏充值接口类
*/

function game_charge_gateway($order_no){
	$orderinfo=get_order_info($order_no);
	$modeinfo=get_paymode_info($orderinfo['mode_id']);
	$gameinfo=get_game_info($orderinfo['game_id']);
	$serverinfo=get_server_info($orderinfo['server_id']);
	
	//游戏币
	$money=$orderinfo['money'];
	$pay_per=$modeinfo['money_per'];
	$game_per=$gameinfo['game_money_per'];
	$gold=round($money*($pay_per/100)*$game_per);
	
	$username=$orderinfo['game_user'];
	$userid = $orderinfo['pay_user'];
	$pay_url=$serverinfo['pay_gateway'];
	
	$site = '777f_000'.$serverinfo['server_no'];
	
	//充值接口
	$ret=0;
	switch ($gameinfo['game_no']){
	case 'SSSG':
		$ret=sssg_charge($order_no,$gold,$username,$pay_url,$gameinfo);
		break;
	case 'WEB_XY':
		$ret=webxy_charge($order_no,$gold,$money,$username,$pay_url,$gameinfo);
		break;
	case 'SQ':
		$ret=sq_charge($order_no,$gold,$money,$username,$pay_url,$gameinfo, $site);
		break;
	}
	return $ret;
}

//盛世三国
function sssg_charge($order_no, $gold, $username, $pay_url, $config){
	$key=$config['port_config2'];
	$time=time();
	
	$strKey=$username."_".$time."_".$order_no."_".$gold."_".$key;
	$sign=md5($strKey);
	
	//$charge_url
	$charge_url='http://'.$pay_url.'/api/charge?user='.$username.'&time='.$time.'&order='.$order_no.'&gold='.$gold.'&sign='.$sign;
	
	$ret=webclient($charge_url);
	if($ret=='1'){
		return 1;
	}
	else{
		//return 0;
        
        //Crane Huang test,should be closed 
        return $ret;
	}
}

/// web西游
function webxy_charge($order_no, $gold, $money, $username, $pay_url, $config){
	require_once(ROOT_PATH.'hi_ports/login_gateway.php');
	$get_params = array();
	$get_params['coin'] = $gold;
	$get_params['rmb'] = $money;
	$get_params['order_sn'] = $order_no;
	$get_params['account'] = $username;
	
	$sign = webxy_generate_sign($get_params, $config['port_config1']);

	//$charge_url
	$charge_url='http://'.$pay_url.'/api/coinpay1.php?coin='.$gold.'&rmb='.$money.'&order_sn='.$order_no.'&account='.$username.'&sign='.$sign;
	//message(array('text'=>$charge_url,'link'=>''));
	
	$ret=webclient($charge_url);
	if($ret=='1'){
		return 1;
	}
	else{
		//return 0;
        
        //Crane Huang test,should be closed 
        return $ret;
	}
}
/// 神曲获取用户id
function sq_get_userid($username, $pay_url, $config, $site){
	$username = UrlEncode($username);
	$userid_url='http://'.$pay_url.'/loginselectlist?username='.$username.'&site='.$site;
	
	$xml_array = simplexml_load_file($userid_url);
	$user_id = $xml_array->Item->attributes()->ID;

	return $user_id;
}

/// 神曲
function sq_charge($order_no, $gold, $money, $username, $pay_url, $config, $site){
	require_once(ROOT_PATH.'hi_ports/login_gateway.php');
	$get_params = array();
	
	$strKey = $order_no.$username.$gold.'1'.$money.'CNY'.$config['port_config2'];
	$strKey = UrlEncode($strKey);
	$sign = md5($strKey);

	$userid = sq_get_userid($username, $pay_url, $config, $site);
	//$charge_url
	$charge_url='http://'.$pay_url.'/chargemoney?content='.$order_no.'|'.$username.'|'.$gold.'|1|'.$money.'|CNY|'.$sign.'&site='.$site.'&userid='.$userid;
	$ret=webclient($charge_url);
	if($ret=='0'){
		return 1;
	}
	else{
		return 0;
	}
}

?>
<?php
/**
 *游戏登陆接口类
*/
function game_login_gateway($userid, $username, $serverinfo, $extra){
	//游戏信息
	$gameinfo=get_game_info($serverinfo['game_id']);
	$login_url=$serverinfo['login_gateway'];
	$site = '777f_000'.$serverinfo['server_no'];
	
	//登陆接口
	switch ($gameinfo['game_no']){
	case 'SSSG':
		sssg_login($username,$login_url,$extra,$gameinfo);
		break;
	case 'WEB_XY':
		web_xy_login($username, $login_url, $gameinfo);
		break;
	case 'SQ':
		sq_login($username, $login_url, $gameinfo, $site);
		break;
	case 'AILU':
		ailu_login($username,$login_url,$extra,$gameinfo);
		break;
	}
}

//盛世三国
function sssg_login($username, $login_url, $extra, $config){
	$client='web';
	if(!empty($extra)){
		$client=$extra;
	}
	
	$key=$config['port_config1'];
	$time=time();
	
	$strKey=$username."_".$time."_".$key;
	$sign=md5($strKey);
	
	//$game_url
	$game_url='http://'.$login_url.'/api/login?user='.$username.'&time='.$time.'&sign='.$sign.'&client='.$client.'&nickname='.$username.'&fangchenmi=0';
	
	//echo $game_url;
	redirect($game_url);
}

function web_xy_login($username, $login_url, $config){
	$get_params = array();
	$get_params['adult'] = 1;
	$cur_time = time();
	$get_params['ts'] = $cur_time;
	$get_params['account'] = $username;
	$sign_str = webxy_generate_sign($get_params, $config['port_config1']);

	//$game_url
	$game_url='http://'.$login_url.'/api/certify.php?adult=1&ts='.$get_params['ts'].'&account='.$get_params['account'].'&sign='.$sign_str;
	
	//echo $game_url;
	redirect($game_url);
}

function webxy_generate_sign($params_array, $secret_key) {
	$ar_filter = array("sign", "sn");

	ksort($params_array);
	reset($params_array);
	$str = "";
	foreach ($params_array as $key => $value) {
		if (!in_array($key, $ar_filter)) {
			$str .= $str ? "&$key=$value" : "$key=$value";
		}
	}
	$str .= "$secret_key";
	return strtoupper(md5($str));
}

/// 神曲登录接口
function sq_login($username, $login_url, $config, $site){
	$key=$config['port_config1'];
	$time=time();
	$rand_pwd = md5(rand(1000,99999999));
	
	$strKey = $username.$rand_pwd.$time.$key;
	$strKey = UrlEncode($strKey);
	$sign = md5($strKey);
	
	$game_url="http://".$login_url."/createlogin?content=".$username."|".$rand_pwd."|".$time."|".$sign."&site=".$site;
	//$game_url = HttpUtility.UrlEncode($game_url);
	$ret=webclient($game_url);
	if (0 == $ret)
	{
		$game_url="http://".$login_url."/client/game.jsp?user=".$username."&key=".$rand_pwd."&site=".$site;
		//$game_url = HttpUtility.UrlEncode($game_url);
		header("Location: ".$game_url);
	}
}

//艾鲁战记
function ailu_login($username, $login_url, $extra, $config){
	$client='web';
	if(!empty($extra)){
		$client=$extra;
	}
	
	$key=$config['port_config1'];
	$time=time();
	
	$strKey=$username."_".$time."_".$key;
	$sign=md5($strKey);
	
	//$game_url
	$game_url='http://'.$login_url.'/login.php?user='.$username.'&time='.$time.'&sign='.$sign;
	
	//echo $game_url;
	redirect($game_url);
}

?>
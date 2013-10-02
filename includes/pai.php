<?php
function get_url_cur($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_HEADER, false); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$ret = curl_exec($ch);
	
	return $ret;
}

/// 注册用户
function pai_register($username, $pwd, $email, $sp_id)
{
	$pwd = password($pwd);
	$strKey=$username."_".$pwd."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."register.php?user=".$username."&passwd=".$pwd."&email=".$email."&site=".$GLOBALS['pai_site']."&sign=".$strKey;
	//header("Location: ".$url);
	//return get_url_cur($url);
	$ret = get_url_cur($url);
	if (NULL == $ret)
	{
		return 255;
	}
	else
	{
		return $ret;
	}
}

/// 检查用户名或邮箱是否重复
function pai_check_user($check, $value)
{
	$strKey=$check."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	if ('username' == $check)
	{
		$url =  $GLOBALS['pai_api']."check_user.php?check=username&user=".$value."&site=".$GLOBALS['pai_site']."&sign=".$strKey;
	}
	else if ('email' == $check)
	{
		$url =  $GLOBALS['pai_api']."check_user.php?check=email&email=".$value."&site=".$GLOBALS['pai_site']."&sign=".$strKey;
	}
	//var_dump($url);exit;
	$ret = get_url_cur($url);
	if (NULL == $ret)
	{
		return 255;
	}
	else
	{
		return $ret;
	}
}

// 用户登录验证
function pai_verify_user($username, $pwd)
{
	$time = time();
	$pwd = password($pwd);
	$strKey=$username."_".$pwd."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."verify_user.php?user=".$username."&passwd=".$pwd."&time=".$time."&site=".$GLOBALS['pai_site']."&sign=".$strKey;
	//var_dump($url);exit;
	$ret = get_url_cur($url);
	if (NULL == $ret)
	{
		return 255;
	}
	else
	{
		return $ret;
	}
}

// 用户登录验证 v2
function v2_verify_user($username, $pwd)
{
	$time = time();
	$pwd = password($pwd);
	$strKey=$username."_".$pwd."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."verify_user.php?user=".$username."&passwd=".$pwd."&time=".$time."&site=".$GLOBALS['pai_site']."&sign=".$strKey;
	//var_dump($url);exit;
	return json_decode(get_url_cur($url), true);
}

// 修改密码
function pai_update_pwd($username, $pwd)
{
	$time = time();
	$update = 'pwd';
	$pwd = password($pwd);
	$strKey=$update."_".$username."_".$pwd."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."update_user.php?update=".$update."&user=".$username."&passwd=".$pwd."&time=".$time."&site=".$GLOBALS['pai_site']."&sign=".$strKey;
	//var_dump($url);exit;
	return get_url_cur($url);
}

/// 获取登录游戏的url
function pai_login_game_url($user, $server_id, $extra)
{
	$time = time();
	$strKey=$user."_".$server_id."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."login_game_url.php?user=".$user."&server=".$server_id."&time=".$time."&extra=".$extra."&site=".$GLOBALS['pai_site']."&sign=".$strKey;
	//var_dump($url);exit;
	return json_decode(get_url_cur($url), true);
}

// 请求登录游戏
function req_login_game($user, $server_id, $old, $extra)
{
	$time = time();
	$strKey=$user."_".$time."_".$server_id."_".$old."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."login.php?user=".$user."&site=".$GLOBALS['pai_site']."&time=".$time."&server=".$server_id."&old=".$old."&extra=".$extra."&sign=".$strKey;
	//header("Location: ".$url);
	return json_decode(get_url_cur($url), true);
}
// 请求一个服务器的信息
function pai_server_info($server_id)
{
	$time = time();
	$strKey=$time."_".$server_id."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."server_info.php?time=".$time."&site=".$GLOBALS['pai_site']."&server=".$server_id."&sign=".$strKey;
	//var_dump($url);exit;
	return json_decode(get_url_cur($url), true);
}
// 获取新开服的服务器
function get_new_server(){
	$time = time();
	$strKey=$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."new_server.php?&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	//var_dump($url);exit;
	return json_decode(get_url_cur($url), true);
}
// 获取新游戏(火爆)列表
function get_newgame_list(){
	$time = time();
	$strKey=$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."new_game.php?&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	$game_list = json_decode(get_url_cur($url), true);
	
	return $game_list;
}
// 获取游戏的服务器列表
function get_server_list($game_id){
	$time = time();
	$strKey=$game_id."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."server_list.php?&gameid=".$game_id."&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	$server_list = json_decode(get_url_cur($url), true);
	return $server_list;
}
// 获取游戏名称
function get_game_name($game_id){
	$time = time();
	$strKey=$game_id."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."game_name.php?&game_id=".$game_id."&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	$game = json_decode(get_url_cur($url), true);
	return $game['name'];
}
function pai_game_per($game_id)
{
	$time = time();
	$strKey=$game_id."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."game_per.php?&game_id=".$game_id."&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	$game = json_decode(get_url_cur($url), true);
	return $game;
}
// 获取游戏列表
function get_game_list(){
	$time = time();
	$strKey=$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."game_list.php?&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	
	$game_list = json_decode(get_url_cur($url), true);
	
	return $game_list;
}
// 获取所有服务器基本信息
function get_all_server(){
	$time = time();
	$strKey=$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."all_server.php?&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	//var_dump(get_url_cur($url));exit;
	$all_server = json_decode(get_url_cur($url), true);
	
	return $all_server;
}
// 获取充值模式列表
function get_paymode(){
	$time = time();
	$strKey=$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."paymode_list.php?&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	$paymode = json_decode(get_url_cur($url), true);
	
	return $paymode;
}
/// 请求充值
function req_pay($user, $server_id, $rmb, $tel, $pay_mode, $order_no, $old, $to_user, $to_user_old)
{
	$time = time();
	$strKey=$user."_".$to_user."_".$time."_".$server_id."_".$rmb."_".$pay_mode."_".$order_no."_".$old."_".$to_user_old."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$user = urlencode($user);
	$to_user = urlencode($to_user);
	
	$url = $GLOBALS['pai_api']."charge.php?user=".$user."&to_user=".$to_user."&orderno=".$order_no."&old=".$old."&to_old=".$to_user_old."&site=".$GLOBALS['pai_site']."&time=".$time."&server=".$server_id."&money=".$rmb."&mode=".$pay_mode;
	if (!empty($tel))
	{
		$url = $url."&tel=".$tel;
	}
	$url = $url."&sign=".$strKey;
	//var_dump($url);exit;
	header("Location: ".$url);
}
/// 补单
function pai_repair_bill($order_no)
{
	$time = time();
	$strKey = $order_no."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	$url = $GLOBALS['pai_api']."repair_bill.php?orderno=".$order_no."&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	return get_url_cur($url);
}
/// 使用平台币充值
function req_pay_vc($user, $server_id, $rmb, $tel, $pay_mode, $order_no, $old, $to_user, $to_user_old)
{
	$time = time();

	$strKey=$user."_".$to_user."_".$time."_".$server_id."_".$rmb."_".$pay_mode."_".$order_no."_".$old."_".$to_user_old."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);

	$user = urlencode($user);
	$to_user = urlencode($to_user);

	$url = $GLOBALS['pai_api']."charge.php?user=".$user."&to_user=".$to_user."&orderno=".$order_no."&old=".$old."&to_old=".$to_user_old."&site=".$GLOBALS['pai_site']."&time=".$time."&server=".$server_id."&money=".$rmb."&mode=".$pay_mode;
	if (!empty($tel))
	{
		$url = $url."&tel=".$tel;
	}
	$url = $url."&sign=".$strKey;
//	var_dump($url);exit;
	get_url_cur($url);
}
// 返利
function pai_rebates($order_no, $rate)
{
	$time = time();

	$strKey=$order_no."_".$rate."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);

	$url = $GLOBALS['pai_api']."rebates.php?orderno=".$order_no."&rate=".$rate."&time=".$time."&site=".$GLOBALS['pai_site']."&sign=".$strKey;
	//var_dump($url);exit;
	return get_url_cur($url);
}
// 最近玩过的服务器
function get_recently_server($user)
{
	$time = time();
	$strKey=$user."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."user_game.php?user=".$user."&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	//var_dump($url);exit;
	return json_decode(get_url_cur($url), true);
}
// 用户平台币
function get_user_vc($user)
{
	$time = time();
	$strKey=$user."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."vc.php?user=".$user."&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	//var_dump($url);exit;
	return get_url_cur($url);
}
// 获取用户充值金额
function get_user_charge($user)
{
	$time = time();
	$strKey=$user."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."user_charge_total.php?user=".$user."&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	
	return get_url_cur($url);
}
// 新手卡列表
function get_card_list($game_id)
{
	$time = time();
	$strKey=$game_id."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."card_list.php?gid=".$game_id."&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	//var_dump($url);exit;
	return json_decode(get_url_cur($url), true);
}
// 领取新手卡
function get_card($user, $card_id)
{
	$time = time();
	$strKey=$user."_".$card_id."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."get_card.php?user=".$user."&id=".$card_id."&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	//var_dump($url);exit;
	return json_decode(get_url_cur($url), true);
}
// 已经领取的新手卡
function get_my_card($user, $from, $to)
{
	$time = time();
	$strKey=$user."_".$from."_".$to."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_key'];
	$strKey=md5($strKey);
	
	$url = $GLOBALS['pai_api']."user_card.php?user=".$user."&from=".$from."&to=".$to."&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
	//var_dump($url);exit;
	return json_decode(get_url_cur($url), true);
}
/// 热血海贼王新手卡
function pai_rxhzw_card($user, $server_id)
{
	$time = time();
	$strKey = $user."_".$server_id."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_site'];
	$strKey = md5($strKey);
	
	$url = $GLOBALS['pai_api']."rxhzw_card.php?user=".$user."&sid=".$server_id."&time=".$time."&site=".$GLOBALS['pai_site']."&sign=".$strKey;
	//var_dump($url);exit;
	return json_decode(get_url_cur($url), true);
}
// 通过服务器id领取新手卡
function getcardbyserver($user, $server_id)
{
    $time = time();
    $strKey=$user."_".$server_id."_".$time."_".$GLOBALS['pai_site']."_".$GLOBALS['pai_site'];
    $strKey=md5($strKey);
    $url = $GLOBALS['pai_api']."server_card.php?user=".$user."&sid=".$server_id."&site=".$GLOBALS['pai_site']."&time=".$time."&sign=".$strKey;
    //var_dump($url);exit;
    return json_decode(get_url_cur($url), true);
}
?>

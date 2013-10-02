<?php
require_once('includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('includes/front.php');
require_once('includes/pai.php');

if($config['member_state']=='no'){
	message(array('text'=>$language['member_sysytem_is_close'],'link'=>'./'));
}

$action=isset($_GET['action'])?$_GET['action']:'';
$sp_id=isset($_GET['sp'])?$_GET['sp']:'';

//找回密码
if($action=='forget'){
	$smarty=new smarty();smarty_header();
	$smarty->display('forget.html');
	exit;
}
if($action=='forget_ok'){
	check_request();
	$authcode=empty($_POST['authcode'])?'':addslashes(trim(strtolower($_POST['authcode'])));
	if(empty($authcode)){
		message(array('text'=>'验证码不能为空！','link'=>''));
	}
	if($authcode!=@$_SESSION['authcode']){
		$_SESSION['authcode']=false;
		unset($_SESSION['authcode']);
		message(array('text'=>'验证码错误！','link'=>''));
	}
	
	$member_mail=empty($_POST['member_mail'])?'':trim(addslashes($_POST['member_mail']));
	$count=$db->getcount("SELECT * FROM ".$db_prefix."member WHERE member_mail='".$member_mail."' and web_src='$web_src'");
	if($count>0){
		$safecode=create_password();
		$safecode=password($safecode);
		$db->update($db_prefix."member",array('member_safecode'=>$safecode),"member_mail='".$member_mail."' and web_src='$web_src'");
		
		$url="http://".$_SERVER['SERVER_NAME']."/user.php?action=reset&mail=".$member_mail."&safecode=".$safecode;
		send_mail($member_mail,$config['smtp_user'],'找回密码','请点击安全链接重设您的密码：'.$url);
		message(array('text'=>'安全链接已发送至您的邮箱，请查看并重设密码！','link'=>'login.php'));
		exit;
	}
	message(array('text'=>'您输入的邮箱不存在！','link'=>''));
	exit;
}
//重设密码
if($action=='reset'){
	//check_request();
	$member_mail=empty($_GET['mail'])?'':trim($_GET['mail']);
	$member_safecode=empty($_GET['safecode'])?'':trim($_GET['safecode']);
	
	$count=$db->getcount("SELECT * FROM ".$db_prefix."member WHERE member_mail='".$member_mail."' AND member_safecode='".$member_safecode."' and web_src='$web_src'");
	if($count>0){
		$smarty=new smarty();smarty_header();
		$smarty->assign('reset','1');
		$smarty->assign('mail',$member_mail);
		$smarty->assign('safecode',$member_safecode);
		$smarty->display('forget.html');
		exit;
	}
	message(array('text'=>'安全链接无效','link'=>''));
	exit;
}
if($action=='reset_ok'){
	//check_request();
	$member_mail=empty($_POST['mail'])?'':trim($_POST['mail']);
	$member_safecode=empty($_POST['safecode'])?'':trim($_POST['safecode']);
	$member_password=empty($_POST['member_password'])?'':trim(addslashes($_POST['member_password']));
	$member_password_confirm=empty($_POST['member_password_confirm'])?'':trim(addslashes($_POST['member_password_confirm']));
	
	if(empty($member_mail)){
		//exit('error:mail_is_empty');
		message(array('text'=>$language['mail_is_empty'],'link'=>''));
	}
	if(!is_email($member_mail)){
		//exit('error:mail_is_error');
		message(array('text'=>$language['mail_is_error'],'link'=>''));
	}
	if(empty($member_password)){
		//exit('error:password_is_empty');
		message(array('text'=>$language['password_is_empty'],'link'=>''));
	}
	if($member_password!=$member_password_confirm){
		//exit('error:password_is_error');
		message(array('text'=>$language['password_is_error'],'link'=>''));
	}
	
	$update=array();
	$update['member_password']=password($member_password);
	$update['member_safecode']='';
	$db->update($db_prefix."member",$update,"member_mail='".$member_mail."' AND member_safecode='".$member_safecode."' and web_src='$web_src'");
	
	message(array('text'=>'密码设置成功！','link'=>'login.php'));
	exit;
}
//AJAX检查用户名
if($action=='check_member_username')
{
	check_request();
	$member_username=empty($_GET['member_username'])?'':trim($_GET['member_username']);
	if (strlen($member_username)<6 || strlen($member_username)>16)
	{
		echo '1';
		exit;
	}
	
	if (0 != pai_check_user('username', $member_username))
	{
		echo '1';
	}
	else
	{
		echo '0';
	}
	exit;
}
//AJAX检查会员邮件地址
if($action=='check_member_mail')
{
	check_request();
	$member_mail=empty($_GET['member_mail'])?'':trim($_GET['member_mail']);

	if (0 != pai_check_user('email', $member_mail))
	{
		echo '1';
	}
	else
	{
		echo '0';
	}
	exit;
}
//处理登陆
if($action=='login_ok'){
	//check_request();
	$post_mode=empty($_POST['post_mode'])?'':trim(addslashes($_POST['post_mode']));
	if($post_mode!='withtml5'){
		$authcode=empty($_POST['authcode'])?'':addslashes(trim(strtolower($_POST['authcode'])));
		if(empty($authcode)){
			message(array('text'=>'验证码不能为空！','link'=>''));
		}
		if($authcode!=@$_SESSION['authcode']){
			$_SESSION['authcode']=false;
			unset($_SESSION['authcode']);
			message(array('text'=>'验证码错误！','link'=>''));
		}
	}
	
	$member_username=empty($_POST['member_username'])?'':trim(addslashes($_POST['member_username']));
	$member_password=empty($_POST['member_password'])?'':trim($_POST['member_password']);
	if(empty($member_username)){
		//exit('error:username_is_empty');
		message(array('text'=>$language['username_is_empty'],'link'=>''));
	}
	if(empty($member_password)){
		//exit('error:password_is_empty');
		message(array('text'=>$language['password_is_empty'],'link'=>''));
	}
	
	$ret = pai_verify_user($member_username, $member_password);
	if (15 == $ret)
	{
		message(array('text'=>$language['account_is_lock'],'link'=>''));
		exit;
	}

	if (0 != $ret)
	{
		message(array('text'=>$language['login_failed'],'link'=>''));
		exit;
	}
	$row=$db->getone("SELECT * FROM ".$db_prefix."member WHERE member_username='".$member_username."'");
	if(!$row)
	{
		message(array('text'=>$language['login_failed'],'link'=>''));
		exit;
	}
	$_SESSION['member_id']=$row['member_id'];
	$_SESSION['member_username']=$row['member_username'];
	$_SESSION['old']=$row['old'];
	$member_mail = $row['member_mail'];
	$update=array();
	$update['member_last_time']=time();
	$update['member_last_ip']=get_ip();
	$db->update($db_prefix."member",$update,"member_username='".$member_username."'");
	clear_cache();
	
	//论坛同步
	if(uc_bbs==1)
	{
		include 'includes/config_ucenter.php';
		include 'uc_client/client.php';
		list($uid, $username, $password, $email) = uc_user_login($member_username, $member_password);
		if ($uid <= 0)
		{
			$bbs_uid = uc_user_register($member_username, $member_password, $member_mail);		
			//同步登陆
			list($uid, $username, $password, $email) = uc_user_login($member_username, $member_password);
			setcookie('osslite_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
			$ucsynlogin = uc_user_synlogin($uid);
		}
		else
		{
			setcookie('osslite_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
			$ucsynlogin = uc_user_synlogin($uid);
		}
	}

	//直接游戏
	if(!empty($_POST['gameId']))
	{
		$game_id=empty($_POST['gameId'])?0:intval($_POST['gameId']);
		$server_id=empty($_POST['serverId'])?0:intval($_POST['serverId']);
		$extra=empty($_POST['extra'])?'':trim($_POST['extra']);
		
		if($game_id>0){
			if($server_id>0){
				redirect("game.php?action=play&game_id=".$game_id."&server_id=".$server_id."&extra=".$extra);
			}
			else{
				redirect("game.php?action=server_list&game_id=".$game_id);
			}
		}
	}
	
	//登陆成功
	message(array('text'=>$language['login_success'],'link'=>'user.php'));
}
//处理注册
if($action=='register_ok'){
	//check_request();
	$post_mode=empty($_POST['post_mode'])?'':trim(addslashes($_POST['post_mode']));
	if($post_mode!='withtml5'){
		$authcode=empty($_POST['authcode'])?'':addslashes(trim(strtolower($_POST['authcode'])));
		if(empty($authcode)){
			message(array('text'=>'验证码不能为空！','link'=>''));
		}
		if($authcode!=@$_SESSION['authcode']){
			$_SESSION['authcode']=false;
			unset($_SESSION['authcode']);
			message(array('text'=>'验证码错误！','link'=>''));
		}
	}
	
	$member_username=empty($_POST['member_username'])?'':trim(addslashes($_POST['member_username']));
	$member_mail=empty($_POST['member_mail'])?'':trim(addslashes($_POST['member_mail']));
	$member_password=empty($_POST['member_password'])?'':trim(addslashes($_POST['member_password']));
	$member_password_confirm=empty($_POST['member_password_confirm'])?'':trim(addslashes($_POST['member_password_confirm']));
	//$member_state=empty($_POST['member_state'])?0:intval($_POST['member_state']);

	//临时邮箱
	if($post_mode=='withtml5')
	{
		$member_mail=$member_username."@test.com";
	}
	/// 必须输入的值检查
	if(empty($member_username))
	{
		message(array('text'=>$language['username_is_empty'],'link'=>''));
		exit;
	}
	if(empty($member_mail))
	{
		message(array('text'=>$language['mail_is_empty'],'link'=>''));
		exit;
	}
	if(!is_email($member_mail))
	{
		message(array('text'=>$language['mail_is_error'],'link'=>''));
		exit;
	}
	if(empty($member_password))
	{
		message(array('text'=>$language['password_is_empty'],'link'=>''));
		exit;
	}
	if($member_password!=$member_password_confirm)
	{
		message(array('text'=>$language['password_is_error'],'link'=>''));
		exit;
	}
	/// 注册到总后台
	$ret = pai_register($member_username, $member_password, $member_mail, $sp_id);
	if (0 != $ret)
	{
		message(array('text'=>$language['username_is_occupy'],'link'=>''));
		exit;
	}
	
	$insert=array();
	$insert['member_username']=$member_username;
	$insert['member_mail']=$member_mail;
	$insert['member_password']=password($member_password);
	$insert['member_safecode']='';
	$insert['member_nickname']='';
	$insert['member_name']='';
	$insert['member_card']='';
	$insert['member_sex']=0;
	$insert['member_birthday']=0;
	$insert['member_phone']='';
	$insert['member_photo']='';
	$insert['member_from']='';
	$insert['member_other']='';
	if($config['member_validation_state']=='yes'){
		$key=md5($member_mail.$member_password);
		$insert['member_validation']=0;
		$insert['member_validation_key']=$key;
	}else{
		$insert['member_validation']=1;
		$insert['member_validation_key']='';
	}
	$insert['member_state']=1;
	$insert['group_id']=0;
	$insert['member_join_time']=$_SERVER['REQUEST_TIME'];
	$insert['member_join_ip']=get_ip();
	$insert['member_last_time']=$_SERVER['REQUEST_TIME'];
	$insert['member_last_ip']=get_ip();
	$insert['old']=0;
	
	//推广渠道
	$insert['spread_user']=$sp_id;
	$insert['spread_keyword']='';
	
	//注册会员
	$db->insert($db_prefix."member",$insert);
	$member_id=$db->insert_id();
	
	//推广回调
	if(!empty($_POST['spcallback'])){
		$spid=empty($_POST['spcallback'])?'':trim(addslashes($_POST['spcallback']));
		$sparams=empty($_POST['sparams'])?'':trim(addslashes($_POST['sparams']));
		
		//推广接口处理
		require_once('hi_ports/sp_gateway.php');
		sp_gateway($member_id,$member_username,$spid,$sparams);
	}
	
	clear_cache();
	if($config['member_validation_state']=='yes'){
		send_mail($member_mail,$config['smtp_user'],'Please activate the account!','<a href="'.get_position().'member.php?action=member_validation&key='.$key.'">Click!</a>');
	}else{
		$_SESSION['member_id']=$member_id;
		$_SESSION['member_username']=$member_username;
		$_SESSION['old']=0;
		//$_SESSION['member_mail']=$member_mail;
		//$_SESSION['member_nickname']=$member_nickname;
		//$_SESSION['group_id']=0;
	}

	//论坛同步
	if(uc_bbs==1){
		include 'includes/config_ucenter.php';
		include 'uc_client/client.php';
		$bbs_uid = uc_user_register($member_username, $member_password, $member_mail);		
		//同步登陆
		list($uid, $username, $password, $email) = uc_user_login($member_username, $member_password);
		setcookie('osslite_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
		$ucsynlogin = uc_user_synlogin($uid);
		//echo($ucsynlogin);
	}

		//直接游戏
		if(!empty($_POST['gameId'])){
			$game_id=empty($_POST['gameId'])?0:intval($_POST['gameId']);
			$server_id=empty($_POST['serverId'])?0:intval($_POST['serverId']);
			$extra=empty($_POST['extra'])?'':trim($_POST['extra']);
			
			if($game_id>0){
				if($server_id>0){
					redirect("game.php?action=play&game_id=".$game_id."&server_id=".$server_id."&extra=".$extra);
				}
				else{
					redirect("game.php?action=server_list&game_id=".$game_id);
				}
			}
		}
	
	//注册成功
	message(array('text'=>$language['join_member_success'],'link'=>'user.php'));
}
//用户退出
if($action=='logout'){
	check_request();
	unset($_SESSION['member_id'],$_SESSION['member_username']);
	clear_cache();
	
	//论坛同步
	if(uc_bbs==1){
		include 'includes/config_ucenter.php';
		include 'uc_client/client.php';
		setcookie('osslite_auth', '', -86400);
		$ucsynlogout = uc_user_synlogout();
		echo($ucsynlogout);
	}
	
	//退出成功
	message(array('text'=>$language['logout_success'],'link'=>'index.php'));
}

//用户中心
login_passed();
$user_login_info = get_login();
$member_id=$user_login_info['userid'];
$user_name = $user_login_info['username'];

//保存修改
if($action=='save'){
	check_request();
	$mode=empty($_GET['mode'])?'':addslashes(trim($_GET['mode']));
	
	$update=array();
	if($mode=='setpass'){
		$member_password=empty($_POST['member_password'])?'':addslashes(trim($_POST['member_password']));
		$new_password=empty($_POST['new_password'])?'':addslashes(trim($_POST['new_password']));
		$new_password2=empty($_POST['new_password2'])?'':addslashes(trim($_POST['new_password2']));
		
		if($member_password==''||$new_password==''){
			message(array('text'=>'请输入原密码和新密码！','link'=>''));
		}
		if($new_password!=$new_password2){
			message(array('text'=>'确认密码不一样！','link'=>''));
		}
		
		
		
		//$count=$GLOBALS['db']->getcount("SELECT * FROM ".$GLOBALS['db_prefix']."member WHERE member_id=$member_id AND member_password='$member_password'");
		$ret = pai_verify_user($user_name, $member_password);
		if($ret!=0)
		{
			message(array('text'=>'原密码输入错误！','link'=>''));
		}
		else
		{
			$update['member_password']=password($new_password);
			if (0 != pai_update_pwd($user_name, $new_password))
			{
				message(array('text'=>'修改密码失败！','link'=>''));
			}
		}
	}
	if($mode=='setsec'){
		$member_mail=empty($_POST['member_mail'])?'':addslashes(trim($_POST['member_mail']));
		$member_safecode=empty($_POST['member_safecode'])?'':addslashes(trim($_POST['member_safecode']));
		
		if($member_mail==''||$member_safecode==''){
			message(array('text'=>'请输入密保信息！','link'=>''));
		}
		if(!is_email($member_mail)){
			message(array('text'=>'邮箱地址输入错误！','link'=>''));
		}
		
		$update['member_mail']=$member_mail;
		$update['member_safecode']=password($member_safecode);
	}
	if($mode=='setuser'){
		$member_nickname=empty($_POST['member_nickname'])?'':addslashes(trim($_POST['member_nickname']));
		$member_sex=empty($_POST['member_sex'])?0:intval($_POST['member_sex']);
		$member_birthday=empty($_POST['member_birthday'])?'':strtotime($_POST['member_birthday']);
		$member_phone=empty($_POST['member_phone'])?'':addslashes(trim($_POST['member_phone']));
		$member_from=empty($_POST['member_from'])?'':addslashes(trim($_POST['member_from']));
		
		$update['member_nickname']=$member_nickname;
		$update['member_sex']=$member_sex;
		$update['member_birthday']=$member_birthday;
		$update['member_phone']=$member_phone;
		$update['member_from']=$member_from;
	}
	if($mode=='setcer'){
		$member_name=empty($_POST['member_name'])?'':addslashes(trim($_POST['member_name']));
		$member_card=empty($_POST['member_card'])?'':addslashes(trim($_POST['member_card']));
		
		if($member_name==''||$member_card==''){
			message(array('text'=>'请输入防沉迷信息！','link'=>''));
		}
		
		$update['member_name']=$member_name;
		$update['member_card']=$member_card;
	}
	//$update['member_last_time']=time();
	//$update['member_last_ip']=get_ip();
	$db->update($db_prefix."member",$update,"member_id=".$member_id);
	
	//修改成功
	message(array('text'=>'修改成功！','link'=>'user.php'));
}

$smarty=new smarty();smarty_header(true);
$smarty->assign('login',get_login());
$smarty->assign('faq',content_array_list(2,5));

//充值记录
if($action=='paylog'){
	$paylog=array();
	$member_username=$_SESSION['member_username'];
	
	// 充值方式 
	$pay_mode = get_paymode();
	// 所有的服务器信息
	$server_list = get_all_server();
	
	$sql="select * from ".$GLOBALS['db_prefix']."pay where pay_state=1 and pay_game_user='$member_username'";
	$page_size=20;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by pay_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	if($count>0){
		$no=$count-(($page_current-1)*$page_size);
		foreach($res as $row){
			$paylog[$row['pay_id']]['id']=$row['pay_id'];
			$paylog[$row['pay_id']]['order_no']=$row['pay_order_no'];
			$paylog[$row['pay_id']]['mode_id']=$pay_mode[$row['pay_mode_id']]['name'];
			if (0 == $row['pay_server_id'])
			{
				$paylog[$row['pay_id']]['game']='平台币';
			}
			else
			{
				$paylog[$row['pay_id']]['game']=$server_list[$row['pay_server_id']]['game_name']."-".$server_list[$row['pay_server_id']]['name'];
			}
			$paylog[$row['pay_id']]['money']=$row['pay_money'];
			$paylog[$row['pay_id']]['time']=date("Y-m-d H:i:s",$row['pay_time']);
			$no--;
		}
		$pagebar=pagebar("user","action=paylog&",$page_current,$page_size,$count);
	}else{
		$pagebar="";
	}
	$smarty->assign('paylog',$paylog);
	$smarty->assign('pagebar',$pagebar);
	$smarty->display('pay_log.html');
	exit;
}
//新手卡
if($action=='card'){
	$cardlog=array();
	$member_username=@$_SESSION['member_username'];
	$page_size=20;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$card_log = get_my_card($member_username, (($page_current-1)*$page_size), $page_size);
	$count = 0;
	$flags = 0;
	$cardlog = array();
	foreach ($card_log as $card)
	{
		if (0 == $flags)
		{
			$count = $card['count'];
			$flags = 1;
		}
		else
		{
			$cardlog[$card['id']] = $card;
		}
	}
	if (0 == $count)
	{
		$pagebar="";
	}
	else
	{
		$pagebar=pagebar("user","action=card&",$page_current,$page_size,$count);
	}
	//var_dump($cardlog);exit;
	$smarty->assign('cardlog',$cardlog);
	$smarty->assign('pagebar',$pagebar);
	$smarty->display('user_card.html');
	exit;
}
//推广
if($action=='sp'){
	$splog=array();
	$sp_id=@$_SESSION['member_id'];
	$sql="select * from ".$GLOBALS['db_prefix']."member where spread_user=$sp_id";
	$page_size=15;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by member_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	$pay_count = 0;
	$pay_money = 0;
	if($count>0)
	{
		foreach($res as $row)
		{
			$splog[$row['member_id']]['id']=$row['member_id'];
			$splog[$row['member_id']]['username']=$row['member_username'];
			$splog[$row['member_id']]['join_time']=date('Y-m-d',$row['member_join_time']);
			$splog[$row['member_id']]['pay_count']=$row['charge_money'];
			if ($splog[$row['member_id']]['pay_count'] > 0)
			{
				$pay_count++;
				$pay_money += $splog[$row['member_id']]['pay_count'];
			}
		}
		$pagebar=pagebar("user.php","action=sp&",$page_current,$page_size,$count);
	}else{
		$pagebar="";
	}
	
	//推广链接
	$sp_link="http://".$_SERVER['SERVER_NAME']."/reg.php?sp=".$sp_id;

	$smarty->assign('sp_link',$sp_link);
	$smarty->assign('reg_count',$count);
	$smarty->assign('pay_count',$pay_count);
	$smarty->assign('pay_money',$pay_money);
	$smarty->assign('splog',$splog);
	$smarty->assign('pagebar',$pagebar);
	$smarty->display('user_sp.html');
	exit;
}
//提现
if($action=='cash'){
	$sp_id=@$_SESSION['member_id'];
	$splog=array();
	
	//分成比例
	$splog['sper']=$config['search_size'];
	
	//总金额
	$sql="select sum(pay_money) from ".$GLOBALS['db_prefix']."pay where pay_state=1 and pay_game_user in (select member_username from ".$GLOBALS['db_prefix']."member where spread_user=$sp_id)";
	$row=$GLOBALS['db']->getone($sql);
	if($row){
		$splog['total']=$row[0];
	}
	if($splog['total']==''){
		$splog['total']=0;
	}
	
	//已提现
	$sql="select sum(cash) from ".$GLOBALS['db_prefix']."cashlog where userid=$sp_id";
	$row=$GLOBALS['db']->getone($sql);
	if($row){
		$splog['cash']=$row[0];
	}
	if($splog['cash']==''){
		$splog['cash']=0;
	}
	
	//可提现
	$splog['free']=round($splog['total']*$splog['sper']/100)-$splog['cash'];
	
	//POST
	$sp_user=@$_SESSION['member_username'];
	$member_name=empty($_POST['member_name'])?'':addslashes(trim($_POST['member_name']));
	$member_card=empty($_POST['member_card'])?'':addslashes(trim($_POST['member_card']));
	$member_bank=empty($_POST['member_bank'])?'':addslashes(trim($_POST['member_bank']));
	$member_bankno=empty($_POST['member_bankno'])?'':addslashes(trim($_POST['member_bankno']));
	$member_phone=empty($_POST['member_phone'])?'':addslashes(trim($_POST['member_phone']));
	$cash=empty($_POST['cash'])?0:intval($_POST['cash']);
	if($member_name!=''&&$member_card!=''&&$member_bank!=''&&$member_bankno!=''&&$member_phone!=''){
		$update=array();
		$update['member_name']=$member_name;
		$update['member_card']=$member_card;
		$update['member_bank']=$member_bank;
		$update['member_bankno']=$member_bankno;
		$update['member_phone']=$member_phone;
		$db->update($db_prefix."member",$update,"member_id=".$sp_id);
		
		if($splog['free']<100||$cash<100){
			message(array('text'=>'提现金额必须大于100元！','link'=>'user.php?action=cash'));
		}
		if($cash>$splog['free']){
			message(array('text'=>'可提现金额不足！','link'=>'user.php?action=cash'));
		}
		
		$insert=array();
		$insert['userid']=$sp_id;
		$insert['username']=$sp_user;
		$insert['truename']=$member_name;
		$insert['idcard']=$member_card;
		$insert['bank']=$member_bank;
		$insert['bankno']=$member_bankno;
		$insert['tel']=$member_phone;
		$insert['cash']=$cash;
		$insert['log_ip']=get_ip();
		$insert['log_time']=date('Y-m-d H:i:s');
		$db->insert($db_prefix."cashlog",$insert);
		
		message(array('text'=>'您的提现申请已提交成功！','link'=>'user.php?action=cash'));
		exit;
	}
	
	$smarty->assign('splog',$splog);
	$smarty->assign('member',get_user_info($member_id));
	$smarty->display('user_cash.html');
	exit;
}
if($action=='cash_log'){
	$sp_id=@$_SESSION['member_id'];
	$cashlog=array();
	
	$res=$GLOBALS['db']->getall("select * from ".$GLOBALS['db_prefix']."cashlog where userid=$sp_id order by log_time desc limit 50");
	foreach($res as $row){
		$cashlog[$row['log_id']]['id']=$row['log_id'];
		$cashlog[$row['log_id']]['cash']=$row['cash'];
		$cashlog[$row['log_id']]['log_time']=$row['log_time'];
	}
	$smarty->assign('cashlog',$cashlog);
	$smarty->display('user_cashlog.html');
	exit;
}

//修改密码
if($action=='setpass'){
	$smarty->assign('mode','setpass');
	$smarty->display('user_info.html');
	exit;
}
//修改密保
if($action=='setsec'){
	$smarty->assign('member',get_user_info($member_id));
	$smarty->assign('mode','setsec');
	$smarty->display('user_info.html');
	exit;
}
//修改资料
if($action=='setuser'){
	$smarty->assign('member',get_user_info($member_id));
	$smarty->assign('mode','setuser');
	$smarty->display('user_info.html');
	exit;
}
//修改防沉迷
if($action=='setcer'){
	$smarty->assign('member',get_user_info($member_id));
	$smarty->assign('mode','setcer');
	$smarty->display('user_info.html');
	exit;
}

//最近玩过的游戏服务器
$user_info = get_user_info($member_id);
$gamelog = get_recently_server($user_info['username']);
$smarty->assign('gamelog',$gamelog);
$smarty->assign('game_best',get_newgame_list());
$smarty->assign('user_vc',get_user_vc($user_info['username']));
$smarty->display('user.html');

?>
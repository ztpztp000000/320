<?php

require_once('../includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('../includes/front.php');
require_once('../includes/pai.php');

$action = isset($_GET['action'])?$_GET['action']:'';
//处理登陆
if($action == 'login'){
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
	if(empty($member_username))
	{
		message(array('text'=>$language['username_is_empty'],'link'=>''));
	}
	if(empty($member_password))
	{
		message(array('text'=>$language['password_is_empty'],'link'=>''));
	}
	$sql = "SELECT * FROM ".$db_prefix."member WHERE member_username='".$member_username."' and member_password='".password($member_password)."'";
	$row=$db->getone($sql);
	if($row)
	{
		if($row['member_validation']==0)
		{
			message(array('text'=>$language['account_is_not_activate'],'link'=>''));
		}
		if($row['member_state']==0)
		{
			message(array('text'=>$language['account_is_lock'],'link'=>''));
		}
		$_SESSION['member_id']=$row['member_id'];
		$_SESSION['member_username']=$row['member_username'];
		$_SESSION['old']=$row['old'];
		//$_SESSION['member_nickname']=$row['member_nickname'];
		//$_SESSION['member_photo']=$row['member_photo'];
		//$_SESSION['group_id']=$row['group_id'];
		$update=array();
		$update['member_last_time']=time();
		$update['member_last_ip']=get_ip();
		$db->update($db_prefix."member",$update,"member_username='".$member_username."'");
		clear_cache();
		
		//论坛同步
		if(uc_bbs==1){
			include '../includes/config_ucenter.php';
			include '../uc_client/client.php';
			list($uid, $username, $password, $email) = uc_user_login($member_username, $member_password);
			setcookie('osslite_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
			$ucsynlogin = uc_user_synlogin($uid);
			//echo($ucsynlogin);
		}
		message(array('text'=>$language['login_success'],'link'=>''));
	}
	else
	{
		message(array('text'=>$language['login_failed'],'link'=>''));
	}
}
?>
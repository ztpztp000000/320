<?php
require_once('../includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('../includes/front.php');
require_once('../includes/pai.php');

$action = $_GET['a'];
$server_id = intval($_GET['sid']);
$sp_id = intval($_GET['sp']);

if ($server_id == 0)
{
	$server_id = 23;
}

if (empty($action))
{
	$smarty=new smarty();smarty_header(true, 'gweb');
	$smarty->assign('server_id', $server_id);
	$smarty->display('sssg_reg.html');
	exit;
}

//处理注册
if($action=='reg')
{
	$member_username=empty($_POST['member_username'])?'':trim(addslashes($_POST['member_username']));
	$member_password=empty($_POST['member_password'])?'':trim(addslashes($_POST['member_password']));
	$member_password_confirm=empty($_POST['member_password_confirm'])?'':trim(addslashes($_POST['member_password_confirm']));

	//临时邮箱
	$member_mail=$member_username."@wanooxx.com";
	/// 必须输入的值检查
	if(empty($member_username))
	{
		message(array('text'=>$language['username_is_empty'],'link'=>''));
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

	clear_cache();
	if($config['member_validation_state']=='yes')
	{
		send_mail($member_mail,$config['smtp_user'],'Please activate the account!','<a href="'.get_position().'member.php?action=member_validation&key='.$key.'">Click!</a>');
	}
	else
	{
		$_SESSION['member_id']=$member_id;
		$_SESSION['member_username']=$member_username;
		$_SESSION['old']=0;
	}

	//直接游戏
	redirect("/game.php?action=play"."&server_id=".$server_id);
}

?>
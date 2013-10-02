<?php

session_start();

//登陆
if($do==''){
	$smarty=new smarty();smarty_header();
	$smarty->display('login.htm');
}
//登陆处理
if($do=='login'){
	$admin_name=empty($_POST['admin_name'])?'':trim($_POST['admin_name']);
	$admin_password=empty($_POST['admin_password'])?'':trim($_POST['admin_password']);
	$admin_name=str_replace("#","",$admin_name);
	$admin_name=str_replace("=","",$admin_name);
	$admin_name=str_replace("'","",$admin_name);
	$admin_name=str_replace("\"","",$admin_name);
	$admin_name=str_replace("%","",$admin_name);
	$admin_name=str_replace("and","",$admin_name);
	$admin_name=str_replace("select","",$admin_name);
	
	$authcode=empty($_POST['authcode'])?'':addslashes(trim(strtolower($_POST['authcode'])));
	if(empty($authcode)){
		message(array('text'=>'验证码不能为空！','link'=>''));
	}
	if($authcode!=@$_SESSION['authcode']){
		$_SESSION['authcode']=false;
		unset($_SESSION['authcode']);
		message(array('text'=>'验证码错误！','link'=>''));
	}
	
	if(empty($admin_name)){
		message(array('text'=>$language['admin_name_is_empty'],'link'=>''));
	}
	if(empty($admin_password)){
		message(array('text'=>$language['admin_password_is_empty'],'link'=>''));
	}
	$row=$db->getone("SELECT member_id,member_state,search_size,cashed_money FROM ".$db_prefix."member WHERE member_username='".$admin_name."' AND member_password='".password($admin_password)."' and user_type=1");
	if($row){
		if($row['member_state']==0){
			message(array('text'=>$language['admin_is_lock'],'link'=>''));
		}
		$_SESSION['sp_id']=$row['member_id'];
		$_SESSION['sp_name']=$admin_name;
		$_SESSION['cashed_money']=$row['cashed_money'];
		$_SESSION['search_size']=$row['search_size'];
		if (0 == $_SESSION['search_size'])
		{
			$_SESSION['search_size'] = $config['search_size'];
		}
	}else{
		message(array('text'=>$language['login_is_failure'],'link'=>''));
	}
	sp_log('login','system',$_SESSION['sp_name']);
	
	clear_cache();
	message(array('text'=>$language['login_is_success'],'link'=>'?action=start'));
}
//退出处理
if($do=='logout'){
	admin_log('logout','system',$_SESSION['admin_name']);
	unset($_SESSION['admin_id'],$_SESSION['admin_name'],$_SESSION['admin_permissions']);
	clear_cache();
	message(array('text'=>$language['logout_is_success'],'link'=>get_self()));
}
?>
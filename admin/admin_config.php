<?php

/// 推广经理列表
if ($do == 'sp_list'){
	check_permissions('all');
	$sp_list=array();
	$res=$GLOBALS['db']->getall("SELECT member_id,member_username FROM ".$db_prefix."member where user_type=1 ORDER BY member_id ASC");
	if($res){
		foreach($res as $row){
			$sp_list[$row['member_id']]['id']=$row['member_id'];
			$sp_list[$row['member_id']]['name']=$row['member_username'];
		}
	}
	
	$smarty=new smarty();smarty_header();
	$smarty->assign('sp_list',$sp_list);
	$smarty->display('sp_list.htm');
}
// 添加推广经理
if($do=='sp_add'){
	check_permissions('all');
	$sp_info=array();
	$sp_info['id']=0;
	$sp_info['name']='';
	$sp_info['password']='';
	$sp_info['permissions']='';
	$sp_info['state']=1;
	$smarty=new smarty();smarty_header();
	$smarty->assign('sp',$sp);
	$smarty->assign('mode','insert');
	$smarty->display('sp_info.htm');
}
/// 添加推广经理到数据库
if($do=='sp_insert'){
	check_permissions('all');
	$sp_name=empty($_POST['sp_name'])?'':addslashes(trim($_POST['sp_name']));
	if(check_repeat('member','member_username',$sp_name)){
		message(array('text'=>$language['user_name_is_repeat'],'link'=>''));
	}
	$update=array();
	$update['user_type'] = 1;
	$db->update($db_prefix."member", $update, "member_username='".$sp_name."'");
	admin_log('insert','sp',$sp_name);
	clear_cache();
	message(array('text'=>$language['sp_insert_is_success'],'link'=>'?action=config&do=sp_list'));
}
//推广经理编辑
if($do=='sp_edit'){
	check_login();
	$sp_id=empty($_GET['sp_id'])?'':intval($_GET['sp_id']);
	$row=$db->getone("SELECT * FROM ".$db_prefix."sp WHERE sp_id='$sp_id'");
	$sp_info=array();
	$sp_info['id']=$row['sp_id'];
	$sp_info['name']=$row['sp_name'];
	$sp_info['password']=$row['sp_password'];
	$sp_info['state']=$row['sp_state'];
	$smarty=new smarty();smarty_header();
	$smarty->assign('sp',$sp);
	$smarty->assign('mode','update');
	$smarty->display('sp_info.htm');
}
//推广经理删除
if($do=='sp_delete'){
	check_permissions('all');
	$sp_id=empty($_GET['sp_id'])?'':intval($_GET['sp_id']);
	$sp_name=get_admin_name($sp_id);
	$db->delete($db_prefix."sp","sp_id=$sp_id");
	admin_log('delete','admin',$sp_name);
	clear_cache();
	message(array('text'=>$language['sp_delete_is_success'],'link'=>'?action=config&do=sp_list'));
}
?>
<?php
//管理员列表
if($do==''){
	check_permissions('all');
	$admin_list=array();
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$db_prefix."admin ORDER BY admin_id ASC");
	if($res){
		foreach($res as $row){
			$admin_list[$row['admin_id']]['id']=$row['admin_id'];
			$admin_list[$row['admin_id']]['name']=$row['admin_name'];
			$admin_list[$row['admin_id']]['password']=$row['admin_password'];
			$admin_list[$row['admin_id']]['state']=$row['admin_state'];
		}
	}
	$smarty=new smarty();smarty_header();
	$smarty->assign('admin_list',$admin_list);
	$smarty->display('admin_list.htm');
}
//管理员添加
if($do=='admin_add'){
	check_permissions('all');
	$admin=array();
	$admin['id']=0;
	$admin['name']='';
	$admin['password']='';
	$admin['permissions']='';
	$admin['state']=1;
	$smarty=new smarty();smarty_header();
	$smarty->assign('admin',$admin);
	$smarty->assign('mode','insert');
	$smarty->display('admin_info.htm');
}
//管理员插入
if($do=='admin_insert'){
	check_permissions('all');
	$admin_name=empty($_POST['admin_name'])?'':addslashes(trim($_POST['admin_name']));
	$admin_password=empty($_POST['admin_password'])?'':addslashes(trim($_POST['admin_password']));
	$admin_permissions=empty($_POST['admin_permissions'])?'':addslashes(trim($_POST['admin_permissions']));
	$admin_state=empty($_POST['admin_state'])?0:intval($_POST['admin_state']);
	if(!check_repeat('admin','admin_name',$admin_name)){
		message(array('text'=>$language['admin_name_is_repeat'],'link'=>''));
	}
	$insert=array();
	$insert['admin_name']=$admin_name;
	$insert['admin_password']=password($admin_password);
	$insert['admin_permissions']=$admin_permissions;
	$insert['admin_state']=$admin_state;
	$db->insert($db_prefix."admin",$insert);
	admin_log('insert','admin',$admin_name);
	clear_cache();
	message(array('text'=>$language['admin_insert_is_success'],'link'=>'?sort=game_flat&action=admin'));
}
//管理员编辑
if($do=='admin_edit'){
	check_login();
	$admin_id=empty($_GET['admin_id'])?'':intval($_GET['admin_id']);
	$row=$db->getone("SELECT * FROM ".$db_prefix."admin WHERE admin_id='$admin_id'");
	$admin=array();
	$admin['id']=$row['admin_id'];
	$admin['name']=$row['admin_name'];
	$admin['password']=$row['admin_password'];
	$admin['permissions']=$row['admin_permissions'];
	$admin['state']=$row['admin_state'];
	$smarty=new smarty();smarty_header();
	$smarty->assign('admin',$admin);
	$smarty->assign('mode','update');
	$smarty->display('admin_info.htm');
}
//管理员更新
if($do=='admin_update'){
	check_login();
	$admin_id=empty($_POST['admin_id'])?'':intval($_POST['admin_id']);
	$admin_name=empty($_POST['admin_name'])?'':addslashes(trim($_POST['admin_name']));
	$admin_password=empty($_POST['admin_password'])?'':addslashes(trim($_POST['admin_password']));
	$admin_permissions=empty($_POST['admin_permissions'])?'':addslashes(trim($_POST['admin_permissions']));
	$admin_state=empty($_POST['admin_state'])?0:intval($_POST['admin_state']);
	$update=array();
	$update['admin_name']=$admin_name;
	if(!empty($admin_password)){
		$update['admin_password']=password($admin_password);
	}
	$update['admin_permissions']=$admin_permissions;
	$update['admin_state']=$admin_state;
	$db->update($db_prefix."admin",$update,"admin_id=$admin_id");
	admin_log('update','admin',$admin_name);
	clear_cache();
	message(array('text'=>$language['admin_update_is_success'],'link'=>'?action=start'));
}
//管理员删除
if($do=='admin_delete'){
	check_permissions('all');
	$admin_id=empty($_GET['admin_id'])?'':intval($_GET['admin_id']);
	$admin_name=get_admin_name($admin_id);
	$db->delete($db_prefix."admin","admin_id=$admin_id");
	admin_log('delete','admin',$admin_name);
	clear_cache();
	message(array('text'=>$language['admin_delete_is_success'],'link'=>'?sort=game_flat&action=admin'));
}
?>
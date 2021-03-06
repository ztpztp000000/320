<?php

//单页列表
if($do=='page_list'){
	check_permissions('page_read');
	$page_list=array();
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$db_prefix."page order by page_id desc");
	if($res){
		foreach($res as $row){
			$page_list[$row['page_id']]['id']=$row['page_id'];
			$page_list[$row['page_id']]['title']=$row['page_title'];
		}
	}
	$smarty=new smarty();smarty_header();
	$smarty->assign('page_list',$page_list);
	$smarty->display('page_list.htm');
}
//添加单页
if($do=='page_add'){
	check_permissions('page_write');
	$page=array();
	$page['id']=0;
	$page['title']='';
	$page['content']='';
	$page['permissions']=-1;
	$page['sort']=0;
	$page['state']=1;
	$smarty=new smarty();smarty_header();
	$smarty->assign('page',$page);
	$smarty->assign('member_group',get_group_list());
	$smarty->assign('mode','insert');
	$smarty->display('page_info.htm');
}
//单页插入
if($do=='page_insert'){
	check_permissions('page_write');
	$page_title=empty($_POST['page_title'])?'':addslashes(trim($_POST['page_title']));
	$page_content=empty($_POST['page_content'])?'':addslashes(trim($_POST['page_content']));
	$page_permissions=empty($_POST['page_permissions'])?0:intval($_POST['page_permissions']);
	$page_state=empty($_POST['page_state'])?0:intval($_POST['page_state']);
	$page_sort=empty($_POST['page_sort'])?0:intval($_POST['page_sort']);
	$insert=array();
	$insert['page_title']=$page_title;
	$insert['page_content']=$page_content;
	$insert['page_permissions']=$page_permissions;
	$insert['page_sort']=$page_sort;
	$insert['page_state']=$page_state;
	$db->insert($db_prefix."page",$insert);
	admin_log('insert','page',$page_title);
	clear_cache();
	message(array('text'=>$language['page_insert_is_success'],'link'=>'?action=content&do=page_list'));
}
//单页编辑
if($do=='page_edit'){
	check_permissions('page_write');
	$page_id=empty($_GET['page_id'])?'':intval($_GET['page_id']);
	$row=$db->getone("SELECT * FROM ".$db_prefix."page WHERE page_id='$page_id'");
	$page=array();
	$page['id']=$row['page_id'];
	$page['title']=$row['page_title'];
	$page['content']=$row['page_content'];
	$page['permissions']=$row['page_permissions'];
	$page['sort']=$row['page_sort'];
	$page['state']=$row['page_state'];
	$smarty=new smarty();smarty_header();
	$smarty->assign('page',$page);
	$smarty->assign('member_group',get_group_list());
	$smarty->assign('mode','update');
	$smarty->display('page_info.htm');
}
//单页更新
if($do=='page_update'){
	check_permissions('page_write');
	$page_id=empty($_POST['page_id'])?0:intval($_POST['page_id']);
	$page_title=empty($_POST['page_title'])?'':addslashes(trim($_POST['page_title']));
	$page_content=empty($_POST['page_content'])?'':addslashes(trim($_POST['page_content']));
	$page_permissions=empty($_POST['page_permissions'])?0:intval($_POST['page_permissions']);
	$page_state=empty($_POST['page_state'])?0:intval($_POST['page_state']);
	$page_sort=empty($_POST['page_sort'])?0:intval($_POST['page_sort']);
	$update=array();
	$update['page_title']=$page_title;
	$update['page_content']=$page_content;
	$update['page_permissions']=$page_permissions;
	$update['page_sort']=$page_sort;
	$update['page_state']=$page_state;
	$db->update($db_prefix."page",$update,"page_id=$page_id");
	admin_log('update','page',$page_title);
	clear_cache();
	message(array('text'=>$language['page_update_is_success'],'link'=>'?action=content&do=page_list'));
}
//单页删除
if($do=='page_delete'){
	check_permissions('page_delete');
	$page_id=empty($_GET['page_id'])?'':intval($_GET['page_id']);
	$page_title=get_page_title($page_id);
	$db->delete($db_prefix."page","page_id=$page_id");
	admin_log('delete','page',$page_title);
	clear_cache();
	message(array('text'=>$language['page_delete_is_success'],'link'=>'?action=content&do=page_list'));
}
?>
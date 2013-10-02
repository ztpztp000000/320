<?php
// 菜单列表
if ('' == $do)
{
	check_permissions('menu_read');
	$menu_list=array();
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$db_prefix."menu WHERE parent_id=0 ORDER BY menu_id ASC");
	if($res){
		foreach($res as $row){
			$menu_list[$row['menu_id']]['id']=$row['menu_id'];
			$menu_list[$row['menu_id']]['name']=$row['menu_name'];
			$menu_list[$row['menu_id']]['link']=$row['menu_link'];
			$menu_list[$row['menu_id']]['mode']=$row['menu_mode'];
			$menu_list[$row['menu_id']]['target']=$row['menu_target'];
			$menu_list[$row['menu_id']]['state']=$row['menu_state'];
			$children=array();
			$children_res=$GLOBALS['db']->getall("SELECT * FROM ".$db_prefix."menu WHERE parent_id=".$row['menu_id']." ORDER BY menu_id ASC");
			if($children_res){
				foreach($children_res as $child){
					$children[$child['menu_id']]['id']=$child['menu_id'];
					$children[$child['menu_id']]['name']=$child['menu_name'];
					$children[$child['menu_id']]['link']=$child['menu_link'];
					$children[$child['menu_id']]['mode']=$child['menu_mode'];
					$children[$child['menu_id']]['target']=$child['menu_target'];
					$children[$child['menu_id']]['state']=$child['menu_state'];
				}
			}
			$menu_list[$row['menu_id']]['children']=$children;
		}
	}
	$smarty=new smarty();smarty_header();
	$smarty->assign('menu_list',$menu_list);
	$smarty->display('menu_list.htm');
}
//菜单添加
if($do=='menu_add'){
	check_permissions('menu_write');
	$menu=array();
	$menu['id']=0;
	$menu['name']='';
	$menu['link']='';
	$menu['target']=0;
	$menu['mode']=0;
	$menu['sort']=1;
	$menu['state']=1;
	$menu['parent_id']=0;
	$smarty=new smarty();smarty_header();
	$smarty->assign('menu_list',get_menu_list());
	$smarty->assign('menu',$menu);
	$smarty->assign('mode','insert');
	$smarty->display('menu_info.htm');
}
if($do=='menu_insert'){
	check_permissions('menu_write');
	$menu_name=empty($_POST['menu_name'])?'':addslashes(trim($_POST['menu_name']));
	$menu_link=empty($_POST['menu_link'])?'':addslashes(trim($_POST['menu_link']));
	$menu_target=intval($_POST['menu_target'])==0?0:1;
	$menu_mode=intval($_POST['menu_mode'])==0?0:1;
	$menu_sort=empty($_POST['menu_sort'])?0:intval($_POST['menu_sort']);
	$menu_state=empty($_POST['menu_state'])?0:intval($_POST['menu_state']);
	$parent_id=empty($_POST['parent_id'])?0:intval($_POST['parent_id']);
	
	if (empty($menu_name))
	{
		message(array('text'=>'请输入菜单名称','link'=>''));
	}
	
	$insert=array();
	$insert['menu_name']=$menu_name;
	$insert['menu_link']=$menu_link;
	$insert['menu_target']=$menu_target;
	$insert['menu_mode']=$menu_mode;
	$insert['menu_sort']=$menu_sort;
	$insert['menu_state']=$menu_state;
	$insert['parent_id']=$parent_id;
	$db->insert($db_prefix."menu",$insert);
	admin_log('insert','menu',$menu_name);
	clear_cache();
	message(array('text'=>$language['menu_insert_is_success'],'link'=>'?sort=game_flat&action=menu'));
}
//菜单编辑
if($do=='menu_edit'){
	check_permissions('menu_write');
	$menu_id=empty($_GET['menu_id'])?'':intval($_GET['menu_id']);
	$row=$db->getone("SELECT * FROM ".$db_prefix."menu WHERE menu_id='$menu_id'");
	$menu=array();
	$menu['id']=$row['menu_id'];
	$menu['name']=$row['menu_name'];
	$menu['link']=$row['menu_link'];
	$menu['target']=$row['menu_target'];
	$menu['mode']=$row['menu_mode'];
	$menu['sort']=$row['menu_sort'];
	$menu['state']=$row['menu_state'];
	$menu['parent_id']=$row['parent_id'];
	$smarty=new smarty();smarty_header();
	$smarty->assign('menu_list',get_menu_list());
	$smarty->assign('menu',$menu);
	$smarty->assign('mode','update');
	$smarty->display('menu_info.htm');
}
//菜单更新
if($do=='menu_update'){
	check_permissions('menu_write');
	$menu_id=empty($_POST['menu_id'])?'':intval($_POST['menu_id']);
	$menu_name=empty($_POST['menu_name'])?'':addslashes(trim($_POST['menu_name']));
	$menu_link=empty($_POST['menu_link'])?'':addslashes(trim($_POST['menu_link']));

	$menu_target=intval($_POST['menu_target'])==0?0:1;
	$menu_mode=intval($_POST['menu_mode'])==0?0:1;

	$menu_sort=empty($_POST['menu_sort'])?0:intval($_POST['menu_sort']);
	$menu_state=empty($_POST['menu_state'])?0:intval($_POST['menu_state']);
	$parent_id=empty($_POST['parent_id'])?0:intval($_POST['parent_id']);
	
	if (empty($menu_name))
	{
		message(array('text'=>'请输入菜单名称','link'=>''));
	}
	
	$update=array();
	$update['menu_name']=$menu_name;
	$update['menu_link']=$menu_link;
	$update['menu_target']=$menu_target;
	$update['menu_mode']=$menu_mode;
	$update['menu_sort']=$menu_sort;
	$update['menu_state']=$menu_state;
	$update['parent_id']=$parent_id;
	$db->update($db_prefix."menu",$update,"menu_id=$menu_id");
	admin_log('update','menu',$menu_name);
	clear_cache();
	message(array('text'=>$language['menu_update_is_success'],'link'=>'?sort=game_flat&action=menu'));
}
//菜单删除
if($do=='menu_delete'){
	check_permissions('menu_delete');
	$menu_id=empty($_GET['menu_id'])?'':intval($_GET['menu_id']);
	$menu_name=get_menu_name($menu_id);
	$db->delete($db_prefix."menu","menu_id=$menu_id");
	admin_log('delete','menu',$menu_name);
	clear_cache();
	message(array('text'=>$language['menu_delete_is_success'],'link'=>'?sort=game_flat&action=menu'));
}
?>
<?php
// 广告列表
if($do==''){
	check_permissions('channel_read');
	$ad_list = array();
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$db_prefix."ad_pic where visble=1 order by sort asc");
	if($res){
		foreach($res as $row){
			$ad_list[$row['id']]['id']=$row['id'];
			$ad_list[$row['id']]['name']=$row['name'];
			$ad_list[$row['id']]['link']=$row['link'];
			$ad_list[$row['id']]['pic_name']=$row['pic_name'];
		}
	}
	$smarty=new smarty();smarty_header();
	$smarty->assign('ad_list',$ad_list);
	$smarty->display('ad_pic_list.htm');
}
// 添加广告
if($do=='ad_add'){
	check_permissions('channel_write');
	$ad = array();
	$ad['visble'] = 1;
	$ad['sort'] = 0;
	$smarty=new smarty();smarty_header();
	$smarty->assign('ad', $ad);
	$smarty->assign('mode','insert');
	$smarty->display('ad_edit.html');
}
/// 删除广告
if($do=='ad_delete'){
	check_permissions('channel_delete');
	$ad_id=empty($_GET['ad_id'])?'':intval($_GET['ad_id']);
	
	$db->delete($db_prefix."ad_pic","id=$ad_id");
	admin_log('delete','page',$ad_id);
	clear_cache();
	message(array('text'=>$language['page_delete_is_success'],'link'=>'?sort=game_flat&action=ad'));
}
/// 广告编辑
if($do=='ad_edit'){
	check_permissions('channel_edit');
	$ad_id=empty($_GET['ad_id'])?'':intval($_GET['ad_id']);
	
	$row=$db->getone("SELECT * FROM ".$db_prefix."ad_pic WHERE id=$ad_id");

	$ad_info = array();
	$ad_info['id'] = $row['id'];
	$ad_info['name'] = $row['name'];
	$ad_info['link'] = $row['link'];
	$ad_info['pic_name'] = $row['pic_name'];
	$ad_info['sort'] = $row['sort'];
	$ad_info['visble'] = $row['visble'];
	
	$smarty=new smarty();smarty_header();
	$smarty->assign('ad',$ad_info);
	$smarty->assign('mode','update');
	$smarty->display('ad_edit.html');
}
/// 更新广告
if($do=='ad_update'){
	check_permissions('channel_edit');
	$ad_id = empty($_POST['ad_id'])?0:intval($_POST['ad_id']);
	$ad_name=empty($_POST['ad_name'])?'':addslashes(trim($_POST['ad_name']));
	$ad_link = empty($_POST['ad_link'])?0:addslashes(trim($_POST['ad_link']));
	$ad_sort = empty($_POST['ad_sort'])?0:intval($_POST['ad_sort']);
	$ad_is_show = empty($_POST['ad_is_show'])?0:intval($_POST['ad_is_show']);
	$ad_pic = upload($_FILES['ad_pic']);
	
	$update=array();
	$update['name']=$ad_name;
	$update['link']=$ad_link;
	if (!empty($ad_pic))
	{
		$update['pic_name']=$ad_pic;
	}
	$update['sort']=$ad_sort;
	$update['visble']=$ad_is_show;

	$db->update($db_prefix."ad_pic",$update,"id=$ad_id");
	
	admin_log('update','page',$ad_name);
	clear_cache();
	message(array('text'=>$language['page_update_is_success'],'link'=>'?sort=game_flat'));
}
/// 添加广告
if($do=='ad_insert'){
	check_permissions('channel_edit');
	$ad_id = empty($_POST['ad_id'])?0:intval($_POST['ad_id']);
	$ad_name=empty($_POST['ad_name'])?'':addslashes(trim($_POST['ad_name']));
	$ad_link = empty($_POST['ad_link'])?0:addslashes(trim($_POST['ad_link']));
	$ad_sort = empty($_POST['ad_sort'])?0:intval($_POST['ad_sort']);
	$ad_is_show = empty($_POST['ad_is_show'])?0:intval($_POST['ad_is_show']);
	$ad_pic = upload($_FILES['ad_pic']);
	
	$insert=array();
	$insert['name']=$ad_name;
	$insert['link']=$ad_link;
	$insert['pic_name']=$ad_pic;
	$insert['sort']=$ad_sort;
	$insert['visble']=$ad_is_show;

	$db->insert($db_prefix."ad_pic",$insert);
	
	admin_log('insert','page',$ad_name);
	clear_cache();
	message(array('text'=>$language['page_update_is_success'],'link'=>'?sort=game_flat'));
}
?>
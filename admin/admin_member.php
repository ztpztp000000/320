<?php
//会员列表
if($do=='member_list'){
	check_permissions('member_read');
	
	$search=array();
	$search['time_type']=empty($_POST['time_type'])?0:intval($_POST['time_type']);
	$search['stime']=empty($_POST['stime'])?'':addslashes(trim($_POST['stime']));
	$search['etime']=empty($_POST['etime'])?'':addslashes(trim($_POST['etime']));
	$search['username']=empty($_POST['username'])?'':addslashes(trim($_POST['username']));
	
	$member_list=array();
	$sql="SELECT * FROM ".$db_prefix."member where member_id>0";
	if($search['username']!=''){
		$sql.=" and member_username='".$search['username']."'";
	}
	if($search['time_type']==1){
		if($search['stime']!=''){
			$sql.=" and member_join_time>=".strtotime($search['stime']);
		}
		if($search['etime']!=''){
			$sql.=" and member_join_time<=".strtotime($search['etime']);
		}
	}
	if($search['time_type']==2){
		if($search['stime']!=''){
			$sql.=" and member_last_time>=".strtotime($search['stime']);
		}
		if($search['etime']!=''){
			$sql.=" and member_last_time<=".strtotime($search['etime']);
		}
	}
	
	$page_size=30;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by member_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	if($count>0){
			$no=$count-(($page_current-1)*$page_size);
			foreach($res as $row){
				$member_list[$row['member_id']]['no']=$no;
				$member_list[$row['member_id']]['id']=$row['member_id'];
				$member_list[$row['member_id']]['username']=$row['member_username'];
				$member_list[$row['member_id']]['join_time']=date("Y-m-d H:i:s",$row['member_join_time']);
				$member_list[$row['member_id']]['join_ip']=$row['member_join_ip'];
				$member_list[$row['member_id']]['last_time']=date("Y-m-d H:i:s",$row['member_last_time']);
				$member_list[$row['member_id']]['state']=$row['member_state'];
				if(!empty($row['spread_user'])){
					$member_list[$row['member_id']]['spread_user']=get_user_name($row['spread_user']);
				}
				$no--;
			}
			$pagebar=pagebar(get_self(),"action=member&do=member_list&",$page_current,$page_size,$count);
	}else{
			$pagebar="";
	}
	$smarty=new smarty();smarty_header();
	$smarty->assign('member_list',$member_list);
	$smarty->assign('pagebar',$pagebar);
	$smarty->assign('search',$search);
	$smarty->display('member_list.htm');
}

//会员组列表
if($do=='group_list'){
	check_permissions('member_group_read');
	$group_list=array();
	$res=$db->getall("SELECT * FROM ".$db_prefix."member_group order by group_id asc");
	if($res){
		foreach($res as $row){
			$group_list[$row['group_id']]['name']=$row['group_name'];
			$group_list[$row['group_id']]['id']=$row['group_id'];
		}
	}
	$smarty=new smarty();smarty_header();
	$smarty->assign('group_list',$group_list);
	$smarty->display('member_group_list.htm');
}
//会员组添加
if($do=='group_add'){
	check_permissions('member_group_write');
	$group=array();
	$group['id']=0;
	$group['name']='';
	$smarty=new smarty();smarty_header();
	$smarty->assign('group',$group);
	$smarty->assign('mode','insert');
	$smarty->display('member_group_info.htm');
}
//会员组插入
if($do=='group_insert'){
	check_permissions('member_group_write');
	$group_name=empty($_POST['group_name'])?'':addslashes(trim($_POST['group_name']));
	if(empty($group_name)){
		message(array('text'=>$language['member_group_name_is_empty'],'link'=>''));
	}
	$insert=array();
	$insert['group_name']=$group_name;
	$db->insert($db_prefix."member_group",$insert);
	admin_log('insert','member_group',$group_name);
	clear_cache();
	message(array('text'=>$language['member_group_insert_is_success'],'link'=>'?action=member&do=group_list'));
}
//会员组编辑
if($do=='group_edit'){
	check_permissions('member_group_write');
	$group_id=empty($_GET['group_id'])?'':intval($_GET['group_id']);
	$row=$db->getone("SELECT * FROM ".$db_prefix."member_group  WHERE group_id='$group_id'");
	$group=array();
	$group['id']=$row['group_id'];
	$group['name']=$row['group_name'];
	$smarty=new smarty();smarty_header();
	$smarty->assign('group',$group);
	$smarty->assign('mode','update');
	$smarty->display('member_group_info.htm');
}
//会员组更新
if($do=='group_update'){
	check_permissions('member_group_write');
	$group_id=empty($_POST['group_id'])?'':intval($_POST['group_id']);
	$group_name=empty($_POST['group_name'])?'':addslashes(trim($_POST['group_name']));
	if(empty($group_name)){
		message(array('text'=>$language['member_group_name_is_empty'],'link'=>''));
	}
	$update=array();
	$update['group_name']=$group_name;
	$db->update($db_prefix."member_group",$update,"group_id=$group_id");
	admin_log('update','member_group',$group_name);
	clear_cache();
	message(array('text'=>$language['member_group_insert_is_success'],'link'=>'?action=member&do=group_list'));
}
//会员组删除
if($do=='group_delete'){
	check_permissions('member_group_delete');
	$group_id=empty($_GET['group_id'])?0:intval($_GET['group_id']);
	$group_name=get_group_name($group_id);
	$db->delete($db_prefix."member_group","group_id=$group_id");
	admin_log('delete','member_group',$group_name);
	clear_cache();
	message(array('text'=>$language['member_group_delete_is_success'],'link'=>'?action=member&do=group_list'));
}
?>
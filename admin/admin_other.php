<?php
if($do=='ad_list'){
	check_permissions('ad_read');
	$ad_list=array();
	$sql="SELECT * FROM ".$db_prefix."ad";
	$page_size=30;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by ad_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	if($count>0){
			$no=$count-(($page_current-1)*$page_size);
			foreach($res as $row){//ad_name  ad_content  ad_start  ad_end  ad_place  ad_state
				$ad_list[$row['ad_id']]['no']=$no;
				$ad_list[$row['ad_id']]['id']=$row['ad_id'];
				$ad_list[$row['ad_id']]['name']=$row['ad_name'];
				$ad_list[$row['ad_id']]['content']=$row['ad_content'];
				$ad_list[$row['ad_id']]['start']=date("Y-m-d H:i:s",$row['ad_start']);
				$ad_list[$row['ad_id']]['end']=date("Y-m-d H:i:s",$row['ad_end']);
				$ad_list[$row['ad_id']]['state']=$row['ad_state'];
				$no--;
			}
			$pagebar=pagebar(get_self(),"action=other&do=ad_list&",$page_current,$page_size,$count);
	}else{
			$pagebar="";
	}
	$smarty=new smarty();smarty_header();
	$smarty->assign('ad_list',$ad_list);
	$smarty->assign('pagebar',$pagebar);
	$smarty->display('ad_list.htm');
}
if($do=='ad_add'){
	check_permissions('ad_read');
	$ad=array();
	$ad['id']=0;
	$ad['name']='';
	$ad['content']='';
	$ad['start']=date("Y-m-d");
	$ad['end']=date("Y-m-d",strtotime("+7 days"));
	$ad['state']=1;
	$smarty=new smarty();smarty_header();
	$smarty->assign('ad',$ad);
	$smarty->assign('mode','insert');
	$smarty->display('ad_info.htm');
}
if($do=='ad_insert'){
	check_permissions('ad_write');
	$ad_name=empty($_POST['ad_name'])?'':addslashes(trim($_POST['ad_name']));
	$ad_content=empty($_POST['ad_content'])?'':addslashes(trim($_POST['ad_content']));
	$ad_start=empty($_POST['ad_start'])?'':strtotime($_POST['ad_start']);
	$ad_end=empty($_POST['ad_end'])?'':strtotime($_POST['ad_end']);
	$ad_state=empty($_POST['ad_state'])?'':intval($_POST['ad_state']);
	$insert=array();
	$insert['ad_name']=$ad_name;
	$insert['ad_content']=$ad_content;
	$insert['ad_start']=$ad_start;
	$insert['ad_end']=$ad_end;
	$insert['ad_state']=$ad_state;
	$db->insert($db_prefix."ad",$insert);
	admin_log('update','ad',$ad_name);
	clear_cache();
	message(array('text'=>$language['ad_insert_is_success'],'link'=>'?action=other&do=ad_list'));
}
if($do=='ad_edit'){
	check_permissions('ad_write');
	$ad_id=empty($_GET['ad_id'])?'':intval($_GET['ad_id']);
	$row=$db->getone("SELECT * FROM ".$db_prefix."ad WHERE ad_id='$ad_id'");
	$ad=array();
	$ad['id']=$row['ad_id'];
	$ad['name']=$row['ad_name'];
	$ad['content']=$row['ad_content'];
	$ad['start']=date("Y-m-d",$row['ad_start']);
	$ad['end']=date("Y-m-d",$row['ad_end']);
	$ad['state']=$row['ad_state'];
	$smarty=new smarty();smarty_header();
	$smarty->assign('ad',$ad);
	$smarty->assign('mode','update');
	$smarty->display('ad_info.htm');
}
if($do=='ad_update'){
	check_permissions('ad_write');
	$ad_id=empty($_POST['ad_id'])?'':intval($_POST['ad_id']);
	$ad_name=empty($_POST['ad_name'])?'':addslashes(trim($_POST['ad_name']));
	$ad_content=empty($_POST['ad_content'])?'':addslashes(trim($_POST['ad_content']));
	$ad_start=empty($_POST['ad_start'])?'':strtotime($_POST['ad_start']);
	$ad_end=empty($_POST['ad_end'])?'':strtotime($_POST['ad_end']);
	$ad_place=empty($_POST['ad_place'])?'':intval($_POST['ad_place']);
	$ad_state=empty($_POST['ad_state'])?'':intval($_POST['ad_state']);
	$update=array();
	$update['ad_name']=$ad_name;
	$update['ad_content']=$ad_content;
	$update['ad_start']=$ad_start;
	$update['ad_end']=$ad_end;
	$update['ad_state']=$ad_state;
	$db->update($db_prefix."ad",$update,"ad_id=$ad_id");
	admin_log('update','ad',$ad_name);
	clear_cache();
	message(array('text'=>$language['ad_update_is_success'],'link'=>'?action=other&do=ad_list'));
}
if($do=='ad_delete'){
	check_permissions('ad_delete');
	$ad_id=empty($_GET['ad_id'])?'':intval($_GET['ad_id']);
	$ad_name=get_ad_name($ad_id);
	$db->delete($db_prefix."ad","ad_id=$ad_id");
	admin_log('delete','ad',$ad_name);
	clear_cache();
	message(array('text'=>$language['ad_delete_is_success'],'link'=>'?action=other&do=ad_list'));
}

if($do=='vote_list'){
	check_permissions('vote_read');
	$vote_list=array();
	$sql="SELECT * FROM ".$db_prefix."vote";
	$page_size=30;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by vote_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	if($count>0){
			$no=$count-(($page_current-1)*$page_size);
			foreach($res as $row){
				$vote_list[$row['vote_id']]['no']=$no;
				$vote_list[$row['vote_id']]['id']=$row['vote_id'];
				$vote_list[$row['vote_id']]['title']=$row['vote_title'];
				$vote_list[$row['vote_id']]['start']=date("Y-m-d H:i:s",$row['vote_start']);
				$vote_list[$row['vote_id']]['end']=date("Y-m-d H:i:s",$row['vote_end']);
				$vote_list[$row['vote_id']]['place']=$row['vote_place'];
				$vote_list[$row['vote_id']]['state']=$row['vote_state'];
				$no--;
			}
			$pagebar=pagebar(get_self(),"action=other&do=vote_list&",$page_current,$page_size,$count);
	}else{
			$pagebar="";
	}
	$smarty=new smarty();smarty_header();
	$smarty->assign('vote_list',$vote_list);
	$smarty->assign('pagebar',$pagebar);
	$smarty->display('vote_list.htm');
}
if($do=='vote_add'){
	check_permissions('vote_write');
	$vote=array();
	$vote['id']=0;
	$vote['title']='';
	$vote['start']=date("Y-m-d");
	$vote['end']=date("Y-m-d",strtotime("+7 days"));
	$vote['place']=1;
	$vote['mode']=1;
	$vote['state']=1;
	$smarty=new smarty();smarty_header();
	$smarty->assign('vote',$vote);
	$smarty->assign('mode','insert');
	$smarty->display('vote_info.htm');
}
if($do=='vote_insert'){
	check_permissions('vote_write');
	$vote_title=empty($_POST['vote_title'])?'':addslashes(trim($_POST['vote_title']));
	$vote_start=empty($_POST['vote_start'])?'':strtotime($_POST['vote_start']);
	$vote_end=empty($_POST['vote_end'])?'':strtotime($_POST['vote_end']);
	$vote_place=empty($_POST['vote_place'])?0:intval($_POST['vote_place']);
	$vote_mode=empty($_POST['vote_mode'])?0:intval($_POST['vote_mode']);
	$vote_state=empty($_POST['vote_state'])?0:intval($_POST['vote_state']);
	$insert=array();
	$insert['vote_title']=$vote_title;
	$insert['vote_start']=$vote_start;
	$insert['vote_end']=$vote_end;
	$insert['vote_place']=$vote_place;
	$insert['vote_mode']=$vote_mode;
	$insert['vote_state']=$vote_state;
	$db->insert($db_prefix."vote",$insert);
	$insert_id=$db->insert_id();
	$vote_item=empty($_POST['vote_item'])?array():$_POST['vote_item'];
	foreach($vote_item as $item){
		if(!empty($item)){
			$db->insert($db_prefix."vote_item",array('item_title'=>$item,'vote_id'=>$insert_id));
		}
	}
	admin_log('update','vote',$vote_title);
	clear_cache();
	message(array('text'=>$language['vote_insert_is_success'],'link'=>'?action=other&do=vote_list'));
}
if($do=='vote_edit'){
	check_permissions('vote_write');
	$vote_id=empty($_GET['vote_id'])?'':intval($_GET['vote_id']);
	$row=$db->getone("SELECT * FROM ".$db_prefix."vote WHERE vote_id='$vote_id'");
	$vote=array();
	$vote['id']=$row['vote_id'];
	$vote['title']=$row['vote_title'];
	$vote['start']=date("Y-m-d",$row['vote_start']);
	$vote['end']=date("Y-m-d",$row['vote_end']);
	$vote['place']=$row['vote_place'];
	$vote['mode']=$row['vote_mode'];
	$vote['state']=$row['vote_state'];
	$vote['items']=get_vote_children($row['vote_id']);
	$smarty=new smarty();smarty_header();
	$smarty->assign('vote',$vote);
	$smarty->assign('mode','update');
	$smarty->display('vote_info.htm');
}
if($do=='vote_update'){
	check_permissions('vote_write');
	$vote_id=empty($_POST['vote_id'])?'':intval($_POST['vote_id']);
	$vote_title=empty($_POST['vote_title'])?'':addslashes(trim($_POST['vote_title']));
	$vote_start=empty($_POST['vote_start'])?time():strtotime($_POST['vote_start']);
	$vote_end=empty($_POST['vote_end'])?time()+60*60*24*7:strtotime($_POST['vote_end']);
	$vote_place=empty($_POST['vote_place'])?0:intval($_POST['vote_place']);
	$vote_mode=empty($_POST['vote_mode'])?0:intval($_POST['vote_mode']);
	$vote_state=empty($_POST['vote_state'])?0:intval($_POST['vote_state']);
	$update=array();
	$update['vote_title']=$vote_title;
	$update['vote_start']=$vote_start;
	$update['vote_end']=$vote_end;
	$update['vote_place']=$vote_place;
	$update['vote_mode']=$vote_mode;
	$update['vote_state']=$vote_state;
	$db->update($db_prefix."vote",$update,"vote_id=$vote_id");
	$vote_item=empty($_POST['vote_item'])?array():$_POST['vote_item'];
	foreach($vote_item as $item){
		if(!empty($item)){
			$db->insert($db_prefix."vote_item",array('item_title'=>$item,'vote_id'=>$vote_id));
		}
	}
	$item_id=empty($_POST['item_id'])?array():$_POST['item_id'];
	$delete_id=empty($_POST['delete_id'])?array():$_POST['delete_id'];
	$update_id=array_diff($item_id,$delete_id);
	foreach($update_id as $id){
		$item_title=empty($_POST['item_title_'.$id])?'':addslashes(trim($_POST['item_title_'.$id]));
		if(!empty($item_title)){
			$db->update($db_prefix."vote_item",array('item_title'=>$item_title),"item_id=$id");
		}
	}
	foreach($delete_id as $id){
		if(!empty($id)){
			$db->delete($db_prefix."vote_item","item_id=$id");
		}
	}
	admin_log('update','vote',$vote_title);
	clear_cache();
	message(array('text'=>$language['vote_update_is_success'],'link'=>'?action=other&do=vote_list'));
}
if($do=='vote_delete'){
	check_permissions('vote_delete');
	$vote_id=empty($_GET['vote_id'])?'':intval($_GET['vote_id']);
	$vote_title=get_vote_title($vote_id);
	$db->delete($db_prefix."vote_log","vote_id=$vote_id");
	$db->delete($db_prefix."vote_item","vote_id=$vote_id");
	$db->delete($db_prefix."vote","vote_id=$vote_id");
	admin_log('delete','vote',$vote_title);
	message(array('text'=>$language['vote_delete_is_success'],'link'=>'?action=other&do=vote_list'));
}


?>
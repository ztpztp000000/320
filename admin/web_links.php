<?php
if($do==''){
	check_permissions('link_read');
	$link_list=array();
	$sql="SELECT * FROM ".$db_prefix."link where game_id=".$_SESSION['game_id'];
	$page_size=30;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by link_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	if($count>0){
			$no=$count-(($page_current-1)*$page_size);
			foreach($res as $row){//ad_name  ad_content  ad_start  ad_end  ad_place  ad_state
				$link_list[$row['link_id']]['no']=$no;
				$link_list[$row['link_id']]['id']=$row['link_id'];
				$link_list[$row['link_id']]['name']=$row['link_name'];
				$link_list[$row['link_id']]['logo']=$row['link_logo'];
				$link_list[$row['link_id']]['text']=$row['link_text'];
				$link_list[$row['link_id']]['url']=$row['link_url'];
				$link_list[$row['link_id']]['state']=$row['link_state'];
				$no--;
			}
			$pagebar=pagebar(get_self(),"action=links&",$page_current,$page_size,$count);
	}else{
			$pagebar="";
	}
	$smarty=new smarty();smarty_header();
	$smarty->assign('link_list',$link_list);
	$smarty->assign('pagebar',$pagebar);
	$smarty->display('web_game_link.html');
}
if($do=='link_add'){
	check_permissions('link_write');
	$link=array();
	$link['id']=0;
	$link['name']='';
	$link['logo']='';
	$link['text']='';
	$link['url']='';
	$link['sort']=1;
	$link['state']=1;
	$link['is_show_home']=0;
	
	$game_list = array();
	$game_list = get_game_list();
	$game_list[0]['id'] = 0;
	$game_list[0]['name'] = '平台官网';

	$smarty=new smarty();smarty_header();
	$smarty->assign('game_list', $game_list);
	$smarty->assign('link',$link);
	$smarty->assign('mode','insert');
	$smarty->display('web_link_info.html');
}
if($do=='link_insert'){
	check_permissions('link_write');
	$link_name=empty($_POST['link_name'])?'':addslashes(trim($_POST['link_name']));
	$link_text=empty($_POST['link_text'])?'':addslashes(trim($_POST['link_text']));
	$link_url=empty($_POST['link_url'])?'':addslashes(trim($_POST['link_url']));
	$link_sort=empty($_POST['link_sort'])?0:intval($_POST['link_sort']);
	$link_state=empty($_POST['link_state'])?0:intval($_POST['link_state']);
	$link_logo=upload($_FILES['link_logo']);
	$game_id=empty($_POST['game_id'])?0:intval($_POST['game_id']);
	$is_show_home=empty($_POST['is_show_home'])?0:intval($_POST['is_show_home']);
	
	$insert=array();
	$insert['link_name']=$link_name;
	$insert['link_text']=$link_text;
	$insert['link_url']=$link_url;
	$insert['link_logo']=$link_logo;
	$insert['link_sort']=$link_sort;
	$insert['link_state']=$link_state;
	$insert['link_state']=$link_state;
	$insert['link_state']=$link_state;
	$insert['game_id']=$game_id;
	$insert['is_show_home']=$is_show_home;
	$db->insert($db_prefix."link",$insert);
	admin_log('update','link',$link_name);
	clear_cache();
	message(array('text'=>$language['link_insert_is_success'],'link'=>'?sort=websites&action=links'));
}
if($do=='link_edit'){
	check_permissions('link_write');
	$link_id=empty($_GET['link_id'])?'':intval($_GET['link_id']);
	$row=$db->getone("SELECT * FROM ".$db_prefix."link WHERE link_id='$link_id'");
	$link=array();
	$link['id']=$row['link_id'];
	$link['name']=$row['link_name'];
	$link['logo']=$row['link_logo'];
	$link['text']=$row['link_text'];
	$link['url']=$row['link_url'];
	$link['sort']=$row['link_sort'];
	$link['state']=$row['link_state'];
	$link['game_id']=$row['game_id'];
	$link['is_show_home']=$row['is_show_home'];
	
	$game_list = array();
	$game_list = get_game_list();
	$game_list[0]['id'] = 0;
	$game_list[0]['name'] = '平台官网';

	$smarty=new smarty();smarty_header();
	$smarty->assign('game_list', $game_list);
	$smarty->assign('link',$link);
	$smarty->assign('mode','update');
	$smarty->display('web_link_info.html');
}
if($do=='link_update'){
	check_permissions('link_write');
	$link_id=empty($_POST['link_id'])?'':intval($_POST['link_id']);
	$link_name=empty($_POST['link_name'])?'':addslashes(trim($_POST['link_name']));
	$link_text=empty($_POST['link_text'])?'':addslashes(trim($_POST['link_text']));
	$link_url=empty($_POST['link_url'])?'':addslashes(trim($_POST['link_url']));
	$link_sort=empty($_POST['link_sort'])?0:intval($_POST['link_sort']);
	$link_state=empty($_POST['link_state'])?0:intval($_POST['link_state']);
	$link_logo=upload($_FILES['link_logo'],false,'jpg,png,gif');
	$link_logo_old=empty($_POST['link_logo_old'])?'':trim($_POST['link_logo_old']);
	$link_logo_delete=empty($_POST['link_logo_delete'])?'':trim($_POST['link_logo_delete']);
	$game_id=empty($_POST['game_id'])?0:intval($_POST['game_id']);
	$is_show_home=empty($_POST['is_show_home'])?0:intval($_POST['is_show_home']);
	
	$update=array();
	$update['link_name']=$link_name;
	$update['link_text']=$link_text;
	$update['link_url']=$link_url;
	if(!empty($link_logo)){
		@unlink(ROOT_PATH.'/uploads/'.$link_logo_old);
		$update['link_logo']=$link_logo;
	}
	if(!empty($link_logo_delete)){
		@unlink(ROOT_PATH.'/uploads/'.$link_logo_delete);
		$update['link_logo']='';
	}
	$update['link_sort']=$link_sort;
	$update['link_state']=$link_state;
	$update['game_id']=$game_id;
	$update['is_show_home']=$is_show_home;
	$db->update($db_prefix."link",$update,"link_id=$link_id");
	admin_log('update','link',$link_name);
	clear_cache();
	message(array('text'=>$language['link_update_is_success'],'link'=>'?sort=websites&action=links'));
}
if($do=='link_delete'){
	check_permissions('link_delete');
	$link_id=empty($_GET['link_id'])?'':intval($_GET['link_id']);
	$link_name=get_link_name($link_id);
	$link_logo=get_link_logo($link_id);
	if(!empty($link_logo)){
		@unlink(ROOT_PATH.'/uploads/'.$link_logo);
	}
	$db->delete($db_prefix."link","link_id=$link_id");
	admin_log('delete','link',$link_name);
	clear_cache();
	message(array('text'=>$language['link_delete_is_success'],'link'=>'?sort=websites&action=links'));
}
?>
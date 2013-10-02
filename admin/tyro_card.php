<?php
//新手卡列表
if($do==''){
	check_permissions('card_read');
	$card_list=array();
	
	$sql="SELECT * FROM ".$db_prefix."card";
	$page_size=30;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by card_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	if($count>0){
			$no=$count-(($page_current-1)*$page_size);
			foreach($res as $row){
				$card_list[$row['card_id']]['id']=$row['card_id'];
				$card_list[$row['card_id']]['name']=$row['card_name'];
				$card_list[$row['card_id']]['count']=get_card_count($row['card_id'],'');
				$card_list[$row['card_id']]['frees']=get_card_count($row['card_id'],'number_state=0');
				$no--;
			}
			$pagebar=pagebar(get_self(),"action=game&",$page_current,$page_size,$count);
	}else{
			$pagebar="";
	}

	$smarty=new smarty();smarty_header();
	$smarty->assign('card_list',$card_list);
	$smarty->assign('pagebar',$pagebar);
	$smarty->display('card_list.html');
}
//使用记录
if($do=='card_log'){
	check_permissions('card_read');
	
	$card_id=empty($_GET['card_id'])?0:intval($_GET['card_id']);
	$card_log=array();
	
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$db_prefix."card_number where number_state=1 and card_id=".$card_id." order by number_get_time desc");
	if($res){
		foreach($res as $row){
			$card_log[$row['number_id']]['id']=$row['number_id'];
			$card_log[$row['number_id']]['get_user']=$row['number_get_user'];
			$card_log[$row['number_id']]['get_time']=$row['number_get_time'];
		}
	}

	$smarty=new smarty();smarty_header();
	$smarty->assign('card_log',$card_log);
	$smarty->display('card_log.html');
}
//添加
if($do=='card_add'){
	check_permissions('card_write');
	$card=array();
	$card['card_id']=0;
	$card['card_name']='';
	$card['card_logo']='';
	$card['card_depict']='';
	$card['card_link']='';
	$card['card_state']=1;
	$card['card_game_id']=0;
	$card['card_server_id']=0;
	
	$game=game_array_list();
	
	$smarty=new smarty();smarty_header();
	$smarty->assign('game',$game);
	$smarty->assign('card',$card);
	$smarty->assign('mode','insert');
	$smarty->display('card_info.html');
}
//插入
if($do=='card_insert'){
	check_permissions('card_write');
	$card_name=empty($_POST['card_name'])?'':addslashes(trim($_POST['card_name']));
	$card_logo=upload($_FILES['card_logo']);
	$card_depict=empty($_POST['card_depict'])?'':addslashes(trim($_POST['card_depict']));
	$card_link=empty($_POST['card_link'])?'':addslashes(trim($_POST['card_link']));
	$card_state=empty($_POST['card_state'])?0:intval($_POST['card_state']);
	$card_game_id=empty($_POST['card_game_id'])?0:intval($_POST['card_game_id']);
	$card_server_id=empty($_POST['card_server_id'])?0:intval($_POST['card_server_id']);

	if(empty($card_name)){
		message(array('text'=>'新手卡名称不能为空','link'=>''));
	}

	$insert=array();
	$insert['card_name']=$card_name;
	$insert['card_logo']=$card_logo;
	$insert['card_depict']=$card_depict;
	$insert['card_link']=$card_link;
	$insert['card_state']=$card_state;
	$insert['card_game_id']=$card_game_id;
	$insert['card_server_id']=$card_server_id;
	
	$db->insert($db_prefix."card",$insert);
	$card_id=$db->insert_id();
	admin_log('insert','card',$card_name);
	clear_cache();
	message(array('text'=>'添加新手卡成功！','link'=>'?sort=game_flat&action=tyro_card'));
}
//编辑
if($do=='card_edit'){
	check_permissions('card_write');
	$card_id=empty($_GET['card_id'])?0:intval($_GET['card_id']);
	$row=$db->getone("SELECT * FROM ".$db_prefix."card WHERE card_id=$card_id");
	
	$card=array();
	$card['card_id']=$row['card_id'];
	$card['card_name']=$row['card_name'];
	$card['card_logo']=$row['card_logo'];
	$card['card_depict']=$row['card_depict'];
	$card['card_link']=$row['card_link'];
	$card['card_state']=$row['card_state'];
	$card['card_game_id']=$row['card_game_id'];
	$card['card_server_id']=$row['card_server_id'];
	
	$game=game_array_list();
	
	$smarty=new smarty();smarty_header();
	$smarty->assign('game',$game);
	$smarty->assign('card',$card);
	$smarty->assign('mode','update');
	$smarty->display('card_info.html');
}
//更新
if($do=='card_update'){
	check_permissions('card_write');
	$card_id=empty($_POST['card_id'])?0:intval($_POST['card_id']);
	$card_name=empty($_POST['card_name'])?'':addslashes(trim($_POST['card_name']));
	$card_logo=upload($_FILES['card_logo']);
	$card_depict=empty($_POST['card_depict'])?'':addslashes(trim($_POST['card_depict']));
	$card_link=empty($_POST['card_link'])?'':addslashes(trim($_POST['card_link']));
	$card_state=empty($_POST['card_state'])?0:intval($_POST['card_state']);
	$card_game_id=empty($_POST['card_game_id'])?0:intval($_POST['card_game_id']);
	$card_server_id=empty($_POST['card_server_id'])?0:intval($_POST['card_server_id']);
	
	if(empty($card_name)){
		message(array('text'=>'新手卡名称不能为空','link'=>''));
	}
	
	$update=array();
	$update['card_name']=$card_name;
	if(!empty($card_logo)){
		$update['card_logo']=$card_logo;
	}
	$update['card_depict']=$card_depict;
	$update['card_link']=$card_link;
	$update['card_state']=$card_state;
	$update['card_game_id']=$card_game_id;
	$update['card_server_id']=$card_server_id;
	
	$db->update($db_prefix."card",$update,"card_id=$card_id");
	admin_log('update','card',$card_name);
	clear_cache();
	message(array('text'=>'更新新手卡成功！','link'=>'?sort=game_flat&action=tyro_card'));
}
//删除
if($do=='card_delete'){
	check_permissions('card_delete');
	$card_id=empty($_GET['card_id'])?0:intval($_GET['card_id']);
	
	//删除卡号
	$db->delete($db_prefix."card_number","card_id=$card_id");
	$db->delete($db_prefix."card","card_id=$card_id");
	
	admin_log('delete','card',$card_id);
	clear_cache();
	message(array('text'=>'删除新手卡成功！','link'=>'?sort=game_flat&action=tyro_card'));
}
//导入卡号
if($do=='card_batch'){
	check_permissions('card_write');
	$card_id=empty($_GET['card_id'])?0:intval($_GET['card_id']);
	
	$smarty=new smarty();smarty_header();
	$smarty->assign('card_id',$card_id);
	$smarty->display('card_batch.html');
}
//导入处理
if($do=='card_batch_ok'){
	check_permissions('card_write');
	$card_id=empty($_POST['card_id'])?0:intval($_POST['card_id']);
	$card_text=empty($_POST['card_text'])?'':addslashes(trim($_POST['card_text']));
	
	if(empty($card_text)){
		message(array('text'=>'卡号不能为空','link'=>''));
	}
	
	if(!empty($card_text)){
		$list=array();
		$list=preg_split("/\n/", $card_text);
		foreach($list as $text){
			if(!empty($text)){
				$insert=array();
				$insert['card_id']=$card_id;
				$insert['card_number']=$text;
				$insert['number_state']=0;
				$insert['number_add_time']=date("Y-m-d H:i:s");
				$db->insert($db_prefix."card_number",$insert);
			}
		}
	}
	clear_cache();
	message(array('text'=>'导入新手卡成功！','link'=>'?sort=game_flat&action=tyro_card'));
}
?>
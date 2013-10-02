<?php
if ('sel_game' == $do)
{
	$game_id = empty($_GET['game_id'])?0:trim($_GET['game_id']);
	$_SESSION['game_id'] = $game_id;
	$smarty=new smarty();smarty_header();
	$smarty->assign('game_id', $game_id);
	$smarty->assign('game_list', get_game_list());
	$smarty->display('websites.html');
}
if ('edit_game' == $do)
{
	check_permissions('game_write');
	$game_id=$_SESSION['game_id'];

	$row=$db->getone("SELECT * FROM ".$db_prefix."game WHERE guid=$game_id");
	$game=array();
	if ($row)
	{
		$game['game_id']=$row['guid'];
		$game['game_depict']=$row['depict'];
		$game['game_website']=$row['website'];
		$game['website_logo']=$row['website_logo'];
		$game['website_bk']=$row['website_bk'];
		$game['activity_pic_1']=$row['activity_pic_1'];
		$game['activity_url_1']=$row['activity_url_1'];
		$game['activity_pic_2']=$row['activity_pic_2'];
		$game['activity_url_2']=$row['activity_url_2'];
		$game['activity_pic_3']=$row['activity_pic_3'];
		$game['activity_url_3']=$row['activity_url_3'];
		$game['activity_pic_4']=$row['activity_pic_4'];
		$game['activity_url_4']=$row['activity_url_4'];
		$game['cature_pic_1']=$row['cature_pic_1'];
		$game['cature_pic_2']=$row['cature_pic_2'];
		$game['cature_pic_3']=$row['cature_pic_3'];
		$game['cature_pic_4']=$row['cature_pic_4'];
		$game['cature_pic_5']=$row['cature_pic_5'];
		$game['cature_pic_6']=$row['cature_pic_6'];
		
		$mode = 'update';
	}
	else
	{
		$game['game_id']=$game_id;
		$game['game_name']='';
		$game['game_logo']='';
		$game['game_depict']='';
		$game['game_website']='';
		$game['website_logo']='';
		$game['website_bk']='';
		$game['activity_pic_1']='';
		$game['activity_url_1']='http://';
		$game['activity_pic_2']='';
		$game['activity_url_2']='http://';
		$game['activity_pic_3']='';
		$game['activity_url_3']='http://';
		$game['activity_pic_4']='';
		$game['activity_url_4']='http://';
		$game['cature_pic_1']='';
		$game['cature_pic_2']='';
		$game['cature_pic_3']='';
		$game['cature_pic_4']='';
		$game['cature_pic_5']='';
		$game['cature_pic_6']='';
		$mode = 'insert';
	}
	
	$smarty=new smarty();smarty_header();
	$smarty->assign('game',$game);
	$smarty->assign('mode', $mode);
	$smarty->display('web_game_info.html');
}
if($do=='game_insert')
{
	check_permissions('game_write');
	$game_id=empty($_POST['game_id'])?0:intval($_POST['game_id']);
	$game_depict=empty($_POST['game_depict'])?'':addslashes(trim($_POST['game_depict']));
	$game_website=empty($_POST['game_website'])?'':addslashes(trim($_POST['game_website']));
	$activity_url_1=empty($_POST['activity_url_1'])?'':addslashes(trim($_POST['activity_url_1']));
	$activity_url_2=empty($_POST['activity_url_2'])?'':addslashes(trim($_POST['activity_url_2']));
	$activity_url_3=empty($_POST['activity_url_3'])?'':addslashes(trim($_POST['activity_url_3']));
	$activity_url_4=empty($_POST['activity_url_4'])?'':addslashes(trim($_POST['activity_url_4']));
	

	if(empty($game_depict)){
		message(array('text'=>'请输入游戏介绍','link'=>''));
	}
	if(empty($game_website)){
		message(array('text'=>'请输入游戏官网','link'=>''));
	}
	
	$website_bk=upload($_FILES['website_bk']);
	$website_logo=upload($_FILES['website_logo']);
	
	$activity_pic_1=upload($_FILES['activity_pic_1']);
	$activity_pic_2=upload($_FILES['activity_pic_2']);
	$activity_pic_3=upload($_FILES['activity_pic_3']);
	$activity_pic_4=upload($_FILES['activity_pic_4']);
	
	$cature_pic_1=upload($_FILES['cature_pic_1']);
	$cature_pic_2=upload($_FILES['cature_pic_2']);
	$cature_pic_3=upload($_FILES['cature_pic_3']);
	$cature_pic_4=upload($_FILES['cature_pic_4']);
	$cature_pic_5=upload($_FILES['cature_pic_5']);
	$cature_pic_6=upload($_FILES['cature_pic_6']);
	
	$sql="SELECT count(*) FROM ".$db_prefix."game where name='".$game_name."'";
	$row = $GLOBALS['db']->getone($sql);
	if ($row)
	{
		if ($row[0] > 0)
		{
			message(array('text'=>$game_name.'已经存在','link'=>''));
		}
	}

	$insert=array();
	$insert['guid'] = $game_id;
	$insert['depict']=$game_depict;
	$insert['website']=$game_website;
	$insert['website_bk']=$website_bk;
	$insert['website_logo']=$website_logo;
	$insert['activity_pic_1']=$activity_pic_1;
	$insert['activity_url_1']=$activity_url_1;
	$insert['activity_pic_2']=$activity_pic_2;
	$insert['activity_url_2']=$activity_url_2;
	$insert['activity_pic_3']=$activity_pic_3;
	$insert['activity_url_3']=$activity_url_3;
	$insert['activity_pic_4']=$activity_pic_4;
	$insert['activity_url_4']=$activity_url_4;
	$insert['cature_pic_1']=$cature_pic_1;
	$insert['cature_pic_2']=$cature_pic_2;
	$insert['cature_pic_3']=$cature_pic_3;
	$insert['cature_pic_4']=$cature_pic_4;
	$insert['cature_pic_5']=$cature_pic_5;
	$insert['cature_pic_6']=$cature_pic_6;
	$db->insert($db_prefix."game",$insert);
	
	$game_id=$db->insert_id();
	admin_log('insert','game',$game_name);
	clear_cache();
	message(array('text'=>'添加游戏成功！','link'=>'?sort=websites'));
}
if($do=='game_update'){
	check_permissions('game_write');
	$game_id=empty($_POST['game_id'])?0:intval($_POST['game_id']);
	$game_depict=empty($_POST['game_depict'])?'':addslashes(trim($_POST['game_depict']));
	$game_website=empty($_POST['game_website'])?'':addslashes(trim($_POST['game_website']));
	$activity_url_1=empty($_POST['activity_url_1'])?'':addslashes(trim($_POST['activity_url_1']));
	$activity_url_2=empty($_POST['activity_url_2'])?'':addslashes(trim($_POST['activity_url_2']));
	$activity_url_3=empty($_POST['activity_url_3'])?'':addslashes(trim($_POST['activity_url_3']));
	$activity_url_4=empty($_POST['activity_url_4'])?'':addslashes(trim($_POST['activity_url_4']));
	

	if(empty($game_depict)){
		message(array('text'=>'请输入游戏介绍','link'=>''));
	}
	if(empty($game_website)){
		message(array('text'=>'请输入游戏官网','link'=>''));
	}
	
	$website_bk=upload($_FILES['website_bk']);
	$website_logo=upload($_FILES['website_logo']);
	
	$activity_pic_1=upload($_FILES['activity_pic_1']);
	$activity_pic_2=upload($_FILES['activity_pic_2']);
	$activity_pic_3=upload($_FILES['activity_pic_3']);
	$activity_pic_4=upload($_FILES['activity_pic_4']);
	
	$cature_pic_1=upload($_FILES['cature_pic_1']);
	$cature_pic_2=upload($_FILES['cature_pic_2']);
	$cature_pic_3=upload($_FILES['cature_pic_3']);
	$cature_pic_4=upload($_FILES['cature_pic_4']);
	$cature_pic_5=upload($_FILES['cature_pic_5']);
	$cature_pic_6=upload($_FILES['cature_pic_6']);
	
	$update=array();
	$update['depict']=$game_depict;
	$update['website']=$game_website;
	if(!empty($website_bk)){
		$update['website_bk']=$website_bk;
	}
	if(!empty($website_logo)){
		$update['website_logo']=$website_logo;
	}
	if(!empty($activity_pic_1)){
		$update['activity_pic_1']=$activity_pic_1;
	}
	$update['activity_url_1']=$activity_url_1;
	if(!empty($activity_pic_2)){
		$update['activity_pic_2']=$activity_pic_2;
	}
	$update['activity_url_2']=$activity_url_2;
	if(!empty($activity_pic_3)){
		$update['activity_pic_3']=$activity_pic_3;
	}
	$update['activity_url_3']=$activity_url_3;
	if(!empty($activity_pic_4)){
		$update['activity_pic_4']=$activity_pic_4;
	}
	$update['activity_url_4']=$activity_url_4;
	if(!empty($cature_pic_1)){
		$update['cature_pic_1']=$cature_pic_1;
	}
	if(!empty($cature_pic_2)){
		$update['cature_pic_2']=$cature_pic_2;
	}
	if(!empty($cature_pic_3)){
		$update['cature_pic_3']=$cature_pic_3;
	}
	if(!empty($cature_pic_4)){
		$update['cature_pic_4']=$cature_pic_4;
	}
	if(!empty($cature_pic_5)){
		$update['cature_pic_5']=$cature_pic_5;
	}
	if(!empty($cature_pic_6)){
		$update['cature_pic_6']=$cature_pic_6;
	}
	$db->update($db_prefix."game",$update,"guid=$game_id");
	admin_log('update','game',$game_name);
	clear_cache();
	message(array('text'=>'更新游戏成功！','link'=>'?sort=websites'));
}
?>
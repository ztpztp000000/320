<?php
if($do=='')
{
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
			$pagebar=pagebar(get_self(),"sort=user&",$page_current,$page_size,$count);
	}else{
			$pagebar="";
	}
	$smarty=new smarty();smarty_header();
	$smarty->assign('member_list',$member_list);
	$smarty->assign('pagebar',$pagebar);
	$smarty->assign('search',$search);
	$smarty->display('member_list.htm');
}
//添加会员
if($do=='member_add'){
	check_permissions('member_write');
	$member=array();
	$member['id']=0;
	$member['username']='';
	$member['nickname']='';
	$member['mail']='';
	$member['password']='';
	$member['safecode']='';
	$member['group_id']=0;
	$member['name']='';
	$member['card']='';
	$member['sex']=0;
	$member['birthday']=date('Y-m-d');
	$member['phone']='';
	$member['photo']='';
	$member['from']='';
	$member['other']='';
	$member['join_time']='';
	$member['last_time']='';
	$member['last_ip']='';
	$member['validation']=1;
	$member['state']=1;
	$smarty=new smarty();smarty_header();
	$smarty->assign('member',$member);
	$smarty->assign('member_group',get_group_list());
	$smarty->assign('mode','insert');
	$smarty->display('member_info.htm');
}
//插入会员
if($do=='member_insert'){
	check_permissions('member_write');
	$member_username=empty($_POST['member_username'])?'':addslashes(trim($_POST['member_username']));
	$member_nickname=empty($_POST['member_nickname'])?'':addslashes(trim($_POST['member_nickname']));
	$member_mail=empty($_POST['member_mail'])?'':addslashes(trim($_POST['member_mail']));
	$member_password=empty($_POST['member_password'])?'':addslashes(trim($_POST['member_password']));
	$member_safecode=empty($_POST['member_safecode'])?'':addslashes(trim($_POST['member_safecode']));
	$member_name=empty($_POST['member_name'])?'':addslashes(trim($_POST['member_name']));
	$member_card=empty($_POST['member_card'])?'':addslashes(trim($_POST['member_card']));
	$member_sex=empty($_POST['member_sex'])?0:intval($_POST['member_sex']);
	$member_other=empty($_POST['member_other'])?'':addslashes(trim($_POST['member_other']));
	$member_phone=empty($_POST['member_phone'])?'':addslashes(trim($_POST['member_phone']));
	$member_from=empty($_POST['member_from'])?'':addslashes(trim($_POST['member_from']));
	$member_birthday=empty($_POST['member_birthday'])?0:strtotime($_POST['member_birthday']);
	$member_state=empty($_POST['member_state'])?0:intval($_POST['member_state']);
	$group_id=empty($_POST['group_id'])?0:intval($_POST['group_id']);
	$member_validation=empty($_POST['member_validation'])?0:intval($_POST['member_validation']);
	if(empty($member_username)){
		message(array('text'=>'用户名不能为空','link'=>''));
	}
/*	if(empty($member_mail)){
		message(array('text'=>$language['member_mail_is_empty'],'link'=>''));
	}
	if(!is_email($member_mail)){
		message(array('text'=>$language['member_mail_is_illegal'],'link'=>''));
	}*/
	$member_photo=upload($_FILES['member_photo']);
	
	$count=$db->getcount("SELECT * FROM ".$db_prefix."member WHERE member_username='".$member_username."'");
	if($count>0){
		message(array('text'=>'用户名已存在','link'=>''));
	}
	
	$insert=array();
	$insert['member_username']=$member_username;
	$insert['member_mail']=$member_mail;
	$insert['member_password']=password($member_password);
	$insert['member_safecode']=password($member_safecode);
	$insert['member_nickname']=$member_nickname;
	$insert['member_name']=$member_name;
	$insert['member_card']=$member_card;
	$insert['member_sex']=$member_sex;
	$insert['member_phone']=$member_phone;
	$insert['member_photo']=$member_photo;
	$insert['member_birthday']=$member_birthday;
	$insert['member_other']=$member_other;
	$insert['member_from']=$member_from;
	$insert['member_state']=$member_state;
	$insert['group_id']=$group_id;
	$insert['member_join_time']=$_SERVER['REQUEST_TIME'];
	$insert['member_last_time']=$_SERVER['REQUEST_TIME'];
	$insert['member_last_ip']=get_ip();
	$insert['member_validation']=$member_validation;
	$insert['member_validation_key']='';
	//print_r($insert);exit;
	$db->insert($db_prefix."member",$insert);
	admin_log('insert','member',$member_username);
	clear_cache();
	message(array('text'=>$language['member_insert_is_success'],'link'=>'?sort=user'));
}
//会员编辑
if($do=='member_edit'){
	check_permissions('member_write');
	$member_id=empty($_GET['member_id'])?'':intval($_GET['member_id']);
	$row=$db->getone("SELECT * FROM ".$db_prefix."member WHERE member_id='$member_id'");
	$member=array();
	$member['id']=$row['member_id'];
	$member['username']=$row['member_username'];
	$member['nickname']=$row['member_nickname'];
	$member['mail']=$row['member_mail'];
	$member['safecode']=$row['member_safecode'];
	$member['group_id']=$row['group_id'];
	$member['name']=$row['member_name'];
	$member['card']=$row['member_card'];
	$member['sex']=$row['member_sex'];
	$member['birthday']=date('Y-m-d',$row['member_birthday']);
	$member['phone']=$row['member_phone'];
	$member['photo']=$row['member_photo'];
	$member['from']=$row['member_from'];
	$member['other']=$row['member_other'];
	$member['join_time']=date('Y-m-d',$row['member_join_time']);
	$member['last_time']=date('Y-m-d',$row['member_last_time']);
	$member['last_ip']=$row['member_last_ip'];
	$member['validation']=$row['member_validation'];
	$member['state']=$row['member_state'];
	$smarty=new smarty();smarty_header();
	$smarty->assign('member',$member);
	$smarty->assign('member_group',get_group_list());
	$smarty->assign('mode','update');
	$smarty->display('member_info.htm');
}
//会员更新
if($do=='member_update'){
	check_permissions('member_write');
	$member_id=empty($_POST['member_id'])?'':intval($_POST['member_id']);
	$member_username=empty($_POST['member_username'])?'':addslashes(trim($_POST['member_username']));
	$member_mail=empty($_POST['member_mail'])?'':addslashes(trim($_POST['member_mail']));
	$member_nickname=empty($_POST['member_nickname'])?'':addslashes(trim($_POST['member_nickname']));
	$member_password=empty($_POST['member_password'])?'':addslashes(trim($_POST['member_password']));
	$member_safecode=empty($_POST['member_safecode'])?'':addslashes(trim($_POST['member_safecode']));
	$member_name=empty($_POST['member_name'])?'':addslashes(trim($_POST['member_name']));
	$member_card=empty($_POST['member_card'])?'':addslashes(trim($_POST['member_card']));
	$member_sex=empty($_POST['member_sex'])?'':intval($_POST['member_sex']);
	$member_other=empty($_POST['member_other'])?'':addslashes(trim($_POST['member_other']));
	$member_phone=empty($_POST['member_phone'])?'':addslashes(trim($_POST['member_phone']));
	$member_from=empty($_POST['member_from'])?'':addslashes(trim($_POST['member_from']));
	$member_birthday=empty($_POST['member_birthday'])?'':strtotime($_POST['member_birthday']);
	$member_state=empty($_POST['member_state'])?0:intval($_POST['member_state']);
	$group_id=empty($_POST['group_id'])?0:intval($_POST['group_id']);
	$member_validation=empty($_POST['member_validation'])?0:intval($_POST['member_validation']);
	$member_photo_old=empty($_POST['member_photo_old'])?'':addslashes(trim($_POST['member_photo_old']));
	$member_photo_delete=empty($_POST['member_photo_delete'])?'':addslashes(trim($_POST['member_photo_delete']));
	if(empty($member_username)){
		message(array('text'=>'用户名不能为空','link'=>''));
	}
	$member_photo=upload($_FILES['member_photo']);
	
	$update=array();
	//$update['member_username']=$member_username;
	if(!empty($member_password))
	{
		$update['member_password']=password($member_password);
		pai_update_pwd($member_username, $member_password);
	}
	if(!empty($member_safecode)){
		$update['member_safecode']=password($member_safecode);
	}
	$update['member_mail']=$member_mail;
	$update['member_nickname']=$member_nickname;
	$update['member_name']=$member_name;
	$update['member_card']=$member_card;
	//$update['member_sex']=$member_sex;
	$update['member_phone']=$member_phone;
	if(!empty($member_photo)){
		@unlink(ROOT_PATH."/uploads/".$member_photo_old);
		$update['member_photo']=$member_photo;
	}
	if(!empty($member_photo_delete)){
		@unlink(ROOT_PATH."/uploads/".$member_photo_delete);
		$update['member_photo']='';
	}
	//$update['member_birthday']=$member_birthday;
	$update['member_other']=$member_other;
	$update['member_from']=$member_from;
	$update['member_state']=$member_state;
	$update['member_validation']=$member_validation;
	$update['group_id']=$group_id;
	//print_r($insert);exit;
	$db->update($db_prefix."member",$update,"member_id=$member_id");
	admin_log('update','member',$member_username);
	clear_cache();
	message(array('text'=>$language['member_update_is_success'],'link'=>'?sort=user'));
}
//会员删除
if($do=='member_delete'){
	check_permissions('member_delete');
	$member_id=empty($_POST['member_id'])?array():$_POST['member_id'];
	if(count($member_id)>0){
		foreach($member_id as $value){
			$row=$db->getone("SELECT member_photo FROM ".$db_prefix."member WHERE member_id=$value");
			if(!empty($row['member_photo'])){
				@unlink(ROOT_PATH."/uploads/".$row['member_photo']);
			}
			$db->delete($db_prefix."member","member_id=$value");
		}
	}
	admin_log('delete','member','');
	clear_cache();
	message(array('text'=>$language['member_delete_is_success'],'link'=>'?sort=user'));
}
if ('sp' == $do)
{
	check_permissions('member_read');
	$sp_id = intval($_GET['sp_id']);
	
	$sget=empty($_GET['sget'])?0:intval($_GET['sget']);
	$search=array();
	if (1 == $sget)
	{
		$search['game_user']=empty($_GET['game_user'])?'':addslashes(trim($_GET['game_user']));
		$search['stime']=empty($_GET['stime'])?'':addslashes(trim($_GET['stime']));
		$search['etime']=empty($_GET['etime'])?'':addslashes(trim($_GET['etime']));
	}
	else
	{
		$search['game_user']=empty($_POST['game_user'])?'':addslashes(trim($_POST['game_user']));
		$search['stime']=empty($_POST['stime'])?'':addslashes(trim($_POST['stime']));
		$search['etime']=empty($_POST['etime'])?'':addslashes(trim($_POST['etime']));
	}
	
	$user_list = array();
	$sql="SELECT * FROM ".$db_prefix."member where spread_user=".$sp_id;
	$sql_search="";
	$search_get = "";
	$sget = 0;
	if($search['game_user']!=''){
		$sql_search.=" and member_username='".$search['game_user']."'";
		$search_get.="&game_user=".$search['game_user'];
		$sget = 1;
	}
	/*if($search['stime']!=''){
		$sql_search.=" and pay_time>=".strtotime($search['stime']);
		$search_get.="&stime=".$search['stime'];
		$sget = 1;
	}
	if($search['etime']!=''){
		$sql_search.=" and pay_time<=".strtotime($search['etime']);
		$search_get.="&etime=".$search['etime'];
		$sget = 1;
	}*/
	$search_get.="&sget=".$sget;
	
	$sql.=$sql_search;
	
	$total=0;
	$page_size=30;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." limit ".(($page_current-1)*$page_size).",".$page_size);
	
	if($count>0)
	{
		$no=$count-(($page_current-1)*$page_size);
		foreach($res as $row)
		{
			$user_list[$row['member_id']]['game_user']=$row['member_username'];
			// 实际金额
			$user_list[$row['member_id']]['real_money']=$row['charge_money'];
			
			$total += $row['charge_money'];
		}
		$pagebar=pagebar(get_self(),"sort=user&do=sp&sp_id=".$sp_id.$search_get."&",$page_current,$page_size,$count);
	}
	else
	{
		$pagebar="";
	}

	$smarty=new smarty();smarty_header();
	$smarty->assign('pay_list', $user_list);
	$smarty->assign('sp_id',$sp_id);
	$smarty->assign('total',$total);
	$smarty->assign('pagebar',$pagebar);
	$smarty->assign('search',$search);
	$smarty->display('user_sp.html');
}

if ('pay_log' == $do)
{
	check_permissions('pay_read');
	
	$user=empty($_GET['user'])?0:intval($_GET['user']);
	$sget=empty($_GET['sget'])?0:intval($_GET['sget']);
	$search=array();
	
	if (1 == $sget)
	{
		$search['stime']=empty($_GET['stime'])?'':addslashes(trim($_GET['stime']));
		$search['etime']=empty($_GET['etime'])?'':addslashes(trim($_GET['etime']));
	}
	else
	{
		$search['stime']=empty($_POST['stime'])?'':addslashes(trim($_POST['stime']));
		$search['etime']=empty($_POST['etime'])?'':addslashes(trim($_POST['etime']));
	}
	
	$pay_list=array();
	$sql="SELECT * FROM ".$db_prefix."pay where pay_state=2 and member_username='".$user."'";
	$sql_search="";
	$search_get = "";
	$sget = 0;
	if($search['stime']!=''){
		$sql_search.=" and pay_time>=".strtotime($search['stime']);
		$search_get.="&stime=".$search['stime'];
		$sget = 1;
	}
	if($search['etime']!=''){
		$sql_search.=" and pay_time<=".strtotime($search['etime']);
		$search_get.="&etime=".$search['etime'];
		$sget = 1;
	}
	$search_get.="&sget=".$sget;
	$sql.=$sql_search;
	
	$sql_total="SELECT sum(charge_money) as total FROM ".$db_prefix."pay where pay_state=2";
	$row=$GLOBALS['db']->getone($sql_total);
	$total = 0;
	if($row)
	{
		$total=$row[0];
		if (NULL == $total)
		{
			$total = 0;
		}
	}
	
	// 游戏列表
	$server_list = get_all_server();
	// 支付方式
	$pay_mode = get_paymode();
	
	$page_size=30;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by pay_time desc limit ".(($page_current-1)*$page_size).",".$page_size);
	
	if($count>0)
	{
		$no=$count-(($page_current-1)*$page_size);
		
		foreach($res as $row)
		{
			$pay_list[$row['pay_id']]['pay_user']=$row['pay_user'];
			$pay_list[$row['pay_id']]['game_user']=$row['pay_game_user'];
			$pay_list[$row['pay_id']]['game_role']=$row['pay_game_role'];
			// 实际金额
			$pay_list[$row['pay_id']]['real_money']=$row['charge_money'];
			$pay_list[$row['pay_id']]['time']=date("Y-m-d H:i:s",$row['pay_time']);
			$no--;
		}
		$pagebar=pagebar(get_self(),"sort=pay".$search_get."&",$page_current,$page_size,$count);
	}
	else
	{
		$pagebar="";
	}

	$smarty=new smarty();smarty_header();
	$smarty->assign('pay_list',$pay_list);
	$smarty->assign('total',$total);
	$smarty->assign('pagebar',$pagebar);
	$smarty->assign('search',$search);
	$smarty->display('spu_pay_log.html');
}
?>
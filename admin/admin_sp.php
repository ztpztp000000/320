<?php
//推广人员列表
if($do=='sp_list'){
	$sp_user = $_GET('sp_user');
	$sql="SELECT member_id,member_username,member_state FROM".$db_prefix."member where member_id!=0";
	if ('' != $sp_user)
	{
		$sql .= " and spread_user='$sp_id'";
	}
	
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by member_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	$member_list=array();
	
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

?>
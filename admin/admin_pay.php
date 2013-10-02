<?php
if ('' == $do)
{
	check_permissions('pay_read');
	$sget=empty($_GET['sget'])?0:intval($_GET['sget']);
	$search=array();
	
	if (1 == $sget)
	{
		$search['mode_id']=empty($_GET['mode_id'])?0:intval($_GET['mode_id']);
		$search['game_id']=empty($_GET['game_id'])?0:intval($_GET['game_id']);
		$search['server_id']=empty($_GET['server_id'])?0:intval($_GET['server_id']);
		$search['pay_state']=empty($_GET['pay_state'])?3:intval($_GET['pay_state']);
		$search['stime']=empty($_GET['stime'])?'':addslashes(trim($_GET['stime']));
		$search['etime']=empty($_GET['etime'])?'':addslashes(trim($_GET['etime']));
		$search['order_no']=empty($_GET['order_no'])?'':addslashes(trim($_GET['order_no']));
		$search['game_user']=empty($_GET['game_user'])?'':addslashes(trim($_GET['game_user']));
	}
	else
	{
		$search['mode_id']=empty($_POST['mode_id'])?0:intval($_POST['mode_id']);
		$search['game_id']=empty($_POST['game_id'])?0:intval($_POST['game_id']);
		$search['server_id']=empty($_POST['server_id'])?0:intval($_POST['server_id']);
		$search['pay_state']=empty($_POST['pay_state'])?3:intval($_POST['pay_state']);
		$search['stime']=empty($_POST['stime'])?'':addslashes(trim($_POST['stime']));
		$search['etime']=empty($_POST['etime'])?'':addslashes(trim($_POST['etime']));
		$search['order_no']=empty($_POST['order_no'])?'':addslashes(trim($_POST['order_no']));
		$search['game_user']=empty($_POST['game_user'])?'':addslashes(trim($_POST['game_user']));
	}
	
	$pay_list=array();
	$sql="SELECT * FROM ".$db_prefix."pay where pay_id>0";
	$sql_total="SELECT sum(pay_money) as total FROM ".$db_prefix."pay where pay_mode_id!=6 and pay_state!=0";
	$sql_search="";
	$search_get = "";
	$sget = 0;
	if($search['mode_id']>0){
		$sql_search.=" and pay_mode_id=".$search['mode_id'];
		$search_get.="&mode_id=".$search['mode_id'];
		$sget = 1;
	}
	if($search['game_id']>0){
		$sql_search.=" and pay_game_id=".$search['game_id'];
		$search_get.="&game_id=".$search['game_id'];
		$sget = 1;
	}
	if($search['server_id']>0){
		$sql_search.=" and pay_server_id=".$search['server_id'];
		$search_get.="&server_id=".$search['server_id'];
		$sget = 1;
	}
	if($search['pay_state']!=3){
		$sql_search.=" and pay_state=".$search['pay_state'];
		$search_get.="&pay_state=".$search['pay_state'];
		$sget = 1;
	}
	if($search['order_no']!=''){
		$sql_search.=" and pay_order_no='".$search['order_no']."'";
		$search_get.="&order_no=".$search['order_no'];
		$sget = 1;
	}
	if($search['game_user']!=''){
		$sql_search.=" and pay_user='".$search['game_user']."'";
		$search_get.="&game_user=".$search['game_user'];
		$sget = 1;
	}
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
	$sql_total.=$sql_search;
	
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
	$res=$GLOBALS['db']->getall($sql." order by pay_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	
	if($count>0){
			$no=$count-(($page_current-1)*$page_size);
			
			foreach($res as $row)
			{
				$pay_list[$row['pay_id']]['id']=$row['pay_id'];
				$pay_list[$row['pay_id']]['order_no']=$row['pay_order_no'];
				$pay_list[$row['pay_id']]['pay_mode_id']= $row['pay_mode_id'];
				$pay_list[$row['pay_id']]['pay_mode_name']= $pay_mode[$row['pay_mode_id']]['name'];
				$pay_list[$row['pay_id']]['state']=$row['pay_state'];
				$pay_list[$row['pay_id']]['state_str']=get_paystate_name($row['pay_state']);
				if (0 == $row['pay_server_id'])
				{
					$pay_list[$row['pay_id']]['game_name']= '平台币';
				}
				else
				{
					$pay_list[$row['pay_id']]['game_name']= $server_list[$row['pay_server_id']]['game_name']."-".$server_list[$row['pay_server_id']]['name'];
				}
				$pay_list[$row['pay_id']]['pay_user']=$row['pay_user'];
				$pay_list[$row['pay_id']]['game_user']=$row['pay_game_user'];
				$pay_list[$row['pay_id']]['game_role']=$row['pay_game_role'];
				// 实际金额
				$pay_list[$row['pay_id']]['real_money']=$row['pay_money'] * $pay_mode[$row['pay_mode_id']]['money_per'] / 100;
				$pay_list[$row['pay_id']]['money']=$row['pay_money'];
				$pay_list[$row['pay_id']]['time']=date("Y-m-d H:i:s",$row['pay_time']);
				$pay_list[$row['pay_id']]['ip']=$row['pay_ip'];
				/// 是否已经返利
				$pay_list[$row['pay_id']]['rebates']=$row['rebates'];
				$no--;
			}
			$pagebar=pagebar(get_self(),"sort=pay".$search_get."&",$page_current,$page_size,$count);
	}else{
			$pagebar="";
	}

	$smarty=new smarty();smarty_header();
	$smarty->assign('paymode_list', $pay_mode);
	$smarty->assign('game_list', get_game_list());
	$smarty->assign('server_list', $server_list);
	$smarty->assign('pay_list',$pay_list);
	$smarty->assign('total',$total);
	$smarty->assign('pagebar',$pagebar);
	$smarty->assign('search',$search);
	$smarty->display('pay_list.html');
}

// 补单
if ('repair_bill' == $do)
{
	check_permissions('pay_write');
	
	$order_no = $_GET['order_no'];
	if (empty($order_no))
	{
		message(array('text'=>'补单失败！','link'=>'?sort=pay'));
	}
	
	$ret = pai_repair_bill($order_no);
	if (0 == $ret)
	{
		$update=array();
		$update['pay_state']=2;
		$db->update($db_prefix."pay",$update,"pay_order_no=$order_no");
		admin_log('update','pay',$pay_id);
	
		message(array('text'=>'补单成功！','link'=>'?sort=pay'));
	}
	else
	{
		message(array('text'=>'补单失败！','link'=>'?sort=pay'));
	}
}
// 返利输入返利比例
if ('rebates' == $do)
{
	check_permissions('pay_write');
	$order_no = $_GET['order_no'];
	
	$smarty=new smarty();smarty_header();
	$smarty->assign('order_no', $order_no);
	$smarty->display('rebates.html');
}
// 执行返利
if ('rebates_go' == $do)
{
	check_permissions('pay_write');
	
	$order_no=$_POST['order_no'];
	$rebates_rate=intval($_POST['rate']);
	
	if (empty($order_no) || 0==$rebates_rate)
	{
		message(array('text'=>'返利失败！','link'=>'?sort=pay'));
	}
	
	if (0 != pai_rebates($order_no, $rebates_rate))
	{
		message(array('text'=>'返利失败！','link'=>'?sort=pay'));
	}
	
	$update=array();
	$update['rebates']=1;
	$db->update($db_prefix."pay", $update, "pay_order_no=$order_no");
	
	message(array('text'=>'返利成功！','link'=>'?sort=pay'));
}
?>
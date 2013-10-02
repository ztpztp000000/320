<?php
/// 添加推广员
if($do=='sp_add'){
	
	$smarty=new smarty();smarty_header();
	$smarty->display('sp_member_add.html');
}
/// 保存添加的推广员
if ('sp_member_save' == $do)
{
	if (empty($_POST['member_name']))
	{
		 message(array('text'=>'请输入帐号名称','link'=>'?action=sp&do=sp_add'));
	}
	$user_name = trim($_POST['member_name']);
	/// 检查是帐号是否存在
	$sql = "SELECT member_id FROM ".$db_prefix."member where member_username='".$user_name."'";
	$count=$GLOBALS['db']->getcount($sql);
	if ($count == 0)
	{
		message(array('text'=>'帐号不存在, 请确认输入的帐号名称','link'=>'?action=sp&do=sp_add'));
	}
	/// 检查是否已经是其他推广经理的推广员
	$sql = "SELECT member_id FROM ".$db_prefix."member where member_username='".$user_name."' and sp_id=0";
	$count=$GLOBALS['db']->getcount($sql);
	if ($count == 0)
	{
		message(array('text'=>'此帐号已经是其他推广经理的推广员了','link'=>'?action=sp&do=sp_add'));
	}
	
	/// 保存
	$update=array();
	$update['sp_id']=$_SESSION['sp_id'];
	$db->update($db_prefix."member", $update, "member_username='".$user_name."'");
	message(array('text'=>'添加推广员成功','link'=>'?action=sp&do=sp_list'));
}

/// 推广员列表
if($do=='sp_list'){
	$sql = "SELECT member_id,member_username,cashed_money FROM ".$db_prefix."member WHERE sp_id=".$_SESSION['sp_id'];
	$sp_member_list=array();
	$page_size=30;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	
	/// 推广的总人数和金额
	$total_user = 0;
	$total_money = 0;
	
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by member_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	if($count>0){
			$no=$count-(($page_current-1)*$page_size);
			foreach($res as $row){
				$sp_member_list[$row['member_id']]['id']=$row['member_id'];
				$sp_member_list[$row['member_id']]['name']=$row['member_username'];
				$sp_member_list[$row['member_id']]['cashed_money']=$row['cashed_money'];
				$no--;
				$sp_info = get_sp_count($row['member_id'], $config['search_size']);
				$sp_member_list[$row['member_id']]['member_count']=$sp_info['count'];
				/// 推广的总金额 - 已经提现的金额 = 当前最新推广金额
				$sp_member_list[$row['member_id']]['cashed_money']=$sp_info['t_money'] - $sp_info['cashed_money'];
				$sp_member_list[$row['member_id']]['total_money']=$sp_info['t_money'];
				
				$total_user += $sp_info['count'];
				$total_money += $sp_info['t_money'];
			}
			/// 推广经理可提现金额
			$cashed_money = $total_money - $_SESSION['cashed_money'];
	
			$pagebar=pagebar(get_self(),"action=sp&do=sp_list&",$page_current,$page_size,$count);
	}else{
			$pagebar="";
	}
	
	$cashed_money = $cashed_money * $_SESSION['search_size'] / 100;

	$smarty=new smarty();smarty_header();
	$smarty->assign('sp_member_list',$sp_member_list);
	$smarty->assign('total_user',$total_user);
	$smarty->assign('total_money',$total_money);
	$smarty->assign('cashed_money',$cashed_money);
	$smarty->assign('pagebar',$pagebar);
	$smarty->display('sp_member_list.html');
}

/// 结算
if($do=='sp_cash'){
	/// 提现日志
	$sql = "SELECT log_id,log_time,cash FROM ".$db_prefix."cashlog WHERE userId=".$_SESSION['sp_id'];
	$cash_log=array();
	$page_size=30;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by log_time desc limit ".(($page_current-1)*$page_size).",".$page_size);
	if($count>0){
			$no=$count-(($page_current-1)*$page_size);
			foreach($res as $row){
				$cash_log[$row['log_id']]['log_time']=$row['log_time'];
				$cash_log[$row['log_id']]['cash']=$row['cash'];
			}
			$pagebar=pagebar(get_self(),"action=sp&do=sp_cash&",$page_current,$page_size,$count);
	}else{
			$pagebar="";
	}
	/// 可提现金额
	$sql = "SELECT member_id,member_username,cashed_money FROM ".$db_prefix."member WHERE sp_id=".$_SESSION['sp_id'];
	$total_money = 0;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by member_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	if($count>0){
			foreach($res as $row){
				$sp_member_list[$row['member_id']]['id']=$row['member_id'];
				$sp_member_list[$row['member_id']]['name']=$row['member_username'];
				$sp_member_list[$row['member_id']]['cashed_money']=$row['cashed_money'];
				$no--;
				$sp_info = get_sp_count($row['member_id'], $config['search_size']);
				$total_money += $sp_info['t_money'];
			}
			/// 推广经理当前最新的推广金额
			$total_money -= $_SESSION['cashed_money'];
			$total_money = $total_money * $_SESSION['search_size'] / 100;
	}
	
	$smarty=new smarty();smarty_header();
	$smarty->assign('cash_log',$cash_log);
	$smarty->assign('total_money',$total_money);
	$smarty->assign('pagebar',$pagebar);
	$smarty->display('cash.html');
}

/// 保存结算
if ('sp_cash_save' == $do)
{
	$max_cash = $_GET['max_cash'];
	
	if (empty($_POST['cash_money']))
	{
		 message(array('text'=>'请输入提现金额','link'=>'?action=sp&do=sp_cash'));
	}
	$cash_money = trim($_POST['cash_money']);
	if ($cash_money <= 0 || $cash_money > $max_cash)
	{
		message(array('text'=>'请输入有效的提现金额','link'=>'?action=sp&do=sp_cash'));
	}
	$cash_src = $cash_money * 100 / $_SESSION['search_size'];
	$sql = "UPDATE ".$db_prefix."member SET cashed_money=cashed_money+".$cash_src." where member_id=".$_SESSION['sp_id'];
	if (!$GLOBALS['db']->query($sql))
	{
		message(array('text'=>'您的提现申请已提交失败！','link'=>'?action=sp&do=sp_list'));
	}

	$insert=array();
	$insert['userid'] = $_SESSION['sp_id'];
	$insert['username']=$_SESSION['sp_name'];
	$insert['cash']=$cash_money;
	$insert['log_time']=date('Y-m-d H:i:s');
	$GLOBALS['db']->insert($db_prefix."cashlog",$insert);
	sleep(1);
	
	$_SESSION['cashed_money'] += $cash_src;
	
	message(array('text'=>'您的提现申请已提交成功！','link'=>'?action=sp&do=sp_cash'));
}

/// 强制结算
if ('sp_cash_force' == $do)
{
	$sp_member_id=empty($_GET['sp_member_id'])?'':trim($_GET['sp_member_id']);

	//分成比例
	$sql = "SELECT member_username,search_size FROM oss_member WHERE member_id=".$sp_member_id;
	$row=$GLOBALS['db']->getone($sql);
	$user_name = $row['member_username'];
	if (0 == $row['search_size'])
	{
		$splog['sper'] = $config['search_size'];
	}
	else
	{
		$splog['sper'] = $row['search_size'];
	}
	
	
	//总金额
	$sql="select sum(pay_money) from ".$GLOBALS['db_prefix']."pay where pay_state=1 and pay_game_user in (select member_username from ".$GLOBALS['db_prefix']."member where spread_user=$sp_member_id)";
	$row=$GLOBALS['db']->getone($sql);
	if($row){
		$splog['total']=$row[0];
	}
	if($splog['total']==''){
		$splog['total']=0;
	}
	
	//已提现
	$sql="select sum(cash) from ".$GLOBALS['db_prefix']."cashlog where userid=$sp_member_id";
	$row=$GLOBALS['db']->getone($sql);
	if($row){
		$splog['cash']=$row[0];
	}
	if($splog['cash']==''){
		$splog['cash']=0;
	}
	
	//可提现
	$splog['free']=round($splog['total']*$splog['sper']/100)-$splog['cash'];
	
	if($splog['free'] < 1){
			message(array('text'=>'提现金额最少1元！','link'=>'?action=sp&do=sp_list'));
	}

	$cash_src = $splog['free'] * 100 / $splog['sper'];
	$sql = "UPDATE ".$db_prefix."member SET cashed_money=cashed_money+".$cash_src." where member_id=".$sp_member_id;
	if (!$GLOBALS['db']->query($sql))
	{
		message(array('text'=>'您的提现申请已提交失败！','link'=>'?action=sp&do=sp_list'));
	}
	
	$insert=array();
	$insert['userid'] = $sp_member_id;
	$insert['username']=$user_name;
	$insert['cash']=$splog['free'];
	$insert['log_time']=date('Y-m-d H:i:s');
	$db->insert($db_prefix."cashlog",$insert);
	
	message(array('text'=>'您的提现申请已提交成功！','link'=>'?action=sp&do=sp_list'));
}

/// 查看推广员信息
if ('sp_member_info' == $do)
{
	$sp_member_id=empty($_GET['sp_member_id'])?'':trim($_GET['sp_member_id']);
	$sql = "SELECT member_id,member_username,FROM_UNIXTIME(member_join_time) FROM ".$db_prefix."member WHERE spread_user=".$sp_member_id;
	$page_size=30;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$count=$GLOBALS['db']->getcount($sql);
	/// 付费用户
	$pay_user_count = 0;
	
	$res=$GLOBALS['db']->getall($sql." order by member_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	$user_list = array();
	$user_list['total_money'] = 0;
	if($count>0){
		foreach($res as $row){
			$user_list[$row['member_username']]['name'] = $row['member_username'];
			$user_list[$row['member_username']]['join_time'] = $row['FROM_UNIXTIME(member_join_time)'];
			$user_list[$row['member_username']]['total_money'] = get_sp_money($row['member_id']);
			
			if ($user_list[$row['member_username']]['total_money'] > 0)
			{
				++$pay_user_count;
			}
		}
		$pagebar=pagebar(get_self(),"action=sp&do=sp_member_info&sp_member_id=".$sp_member_id."&",$page_current,$page_size,$count);
	}
	else
	{
		$pagebar = "";
	}
	
	//总金额
	$sql="select sum(pay_money) from ".$GLOBALS['db_prefix']."pay where pay_state=1 and pay_game_user in (select member_username from ".$GLOBALS['db_prefix']."member where spread_user=$sp_member_id)";
	$row=$GLOBALS['db']->getone($sql);
	if($row){
		$total_money=$row[0];
	}
	if($total_money==''){
		$total_money=0;
	}
	
	//分成比例
	$sql = "SELECT search_size FROM oss_member WHERE member_id=".$sp_member_id;
	$row=$GLOBALS['db']->getone($sql);
	if (0 == $row['search_size'])
	{
		$search_size = $config['search_size'];
	}
	else
	{
		$search_size = $row['search_size'];
	}
	
	//已提现
	$sql="select sum(cash) from ".$GLOBALS['db_prefix']."cashlog where userid=$sp_member_id";
	$row=$GLOBALS['db']->getone($sql);
	if($row){
		$cash=$row[0];
	}
	if($cash==''){
		$cash=0;
	}
	$cashed_money = $total_money - $cash;
	$cashed_money = $cashed_money * $search_size / 100;
	
	
	$smarty=new smarty();smarty_header();
	$smarty->assign('user_list',$user_list);
	$smarty->assign('pagebar',$pagebar);
	$smarty->assign('reg_count',$count);
	$smarty->assign('pay_user_count',$pay_user_count);
	$smarty->assign('total_money',$total_money);
	$smarty->assign('cashed_money',$cashed_money);
	$smarty->assign('sp_memeber_id',$sp_member_id);
	$smarty->display('sp_member_detail.html');
}

?>

<?php
require_once('includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('includes/front.php');

$game_app = $_GET['app'];
$game_server = $_GET['server'];
$user_name = $_GET['user'];
$player_id = $_GET['player_id'];
/// 根据用户的平台进行跳转
$sql="select web_src from ".$GLOBALS['db_prefix']."member WHERE member_username='$user_name'";
$row=$db->getone($sql);

if($row){
	if ($web_src != $row['web_src'])
	{
		switch ($row['web_src'])
		{
			case '1gwan':
				header("Location: http://www.1gwan.com/pay.php");
				break;
			case '777fly':
				header("Location: http://www.777fly.com/pay.php");
				break;
		}
	}
}

$action=isset($_GET['action'])?$_GET['action']:'';
if($action=='pay_ok'){
	check_request();
	$member_id=get_user('userid');
	$game_id=empty($_POST['game_id'])?0:intval($_POST['game_id']);
	$server_id=empty($_POST['server_id'])?0:intval($_POST['server_id']);
	$mode_id=empty($_POST['mode_id'])?0:intval($_POST['mode_id']);
	$money=empty($_POST['money'])?0:intval($_POST['money']);
	$game_user=empty($_POST['game_user'])?'':trim($_POST['game_user']);
	$game_user2=empty($_POST['game_user2'])?'':trim($_POST['game_user2']);
	$game_role=empty($_POST['game_role'])?'':trim($_POST['game_role']);
	$tel=empty($_POST['tel'])?'':trim($_POST['tel']);
	$order_no=str_replace("-","",date("Y-m-dH-i-s")).rand(1000,2000);
	
	if($game_id==0||$server_id==0){
		message(array('text'=>'请选择充值游戏及服务器！','link'=>''));
	}
	if($game_user==''||$game_user!=$game_user2){
		message(array('text'=>'充值帐号输入错误！','link'=>''));
	}
	
	$insert=array();
	$insert['pay_order_no']=$order_no;
	$insert['pay_type']=0;
	$insert['pay_mode_id']=$mode_id;
	$insert['pay_state']=0;
	$insert['pay_user']=$member_id;
	$insert['pay_tel']=$tel;
	$insert['pay_game_id']=$game_id;
	$insert['pay_server_id']=$server_id;
	$insert['pay_game_user']=$game_user;
	$insert['pay_game_role']=$game_role;
	$insert['pay_money']=$money;
	$insert['pay_time']=$_SERVER['REQUEST_TIME'];
	$insert['pay_ip']=get_ip();
	$insert['dst_type']=0;//直接充值到游戏标示
	$db->insert($db_prefix."pay",$insert);
	
	//支付接口处理
	require_once('hi_ports/pay_gateway.php');
	pay_gateway($mode_id,$order_no,$money);
	
	message(array('text'=>'开始进入支付。。。','link'=>'','jump'=>'0'));
}
//充值到平台
if($action=='pay_ok2'){
	check_request();
	$member_id=get_user('userid');
	$game_id=0;
	$server_id=0;
	$mode_id=empty($_POST['mode_id'])?0:intval($_POST['mode_id']);
	$money=empty($_POST['money_pt'])?0:intval($_POST['money_pt']);
	$game_user=empty($_POST['game_user_pt'])?'':trim($_POST['game_user_pt']);
	$game_user2=empty($_POST['game_user2_pt'])?'':trim($_POST['game_user2_pt']);
	$game_role=0;
	$tel=empty($_POST['tel_pt'])?'':trim($_POST['tel_pt']);
	$order_no=str_replace("-","",date("Y-m-dH-i-s")).rand(1000,2000);
	
	if($game_user==''||$game_user!=$game_user2){
		message(array('text'=>'充值帐号输入错误！','link'=>''));
	}
	
	$insert=array();
	$insert['pay_order_no']=$order_no;
	$insert['pay_type']=0;
	$insert['pay_mode_id']=$mode_id;
	$insert['pay_state']=0;
	$insert['pay_user']=$member_id;
	$insert['pay_tel']=$tel;
	$insert['pay_game_id']=$game_id;
	$insert['pay_server_id']=$server_id;
	$insert['pay_game_user']=$game_user;
	$insert['pay_game_role']=$game_role;
	$insert['pay_money']=$money;
	$insert['pay_time']=$_SERVER['REQUEST_TIME'];
	$insert['pay_ip']=get_ip();
	$insert['dst_type']=1;//平台标示
	$insert['web_src']='1gwan';
	$db->insert($db_prefix."pay", $insert);

	//支付接口处理
	require_once('hi_ports/pay_gateway.php');
	pay_gateway($mode_id,$order_no,$money);
	
	message(array('text'=>'开始进入支付。。。','link'=>'','jump'=>'0'));
}

if($action=='pay_ok3'){
	check_request();
	$member_id=get_user('userid');
	$game_id=empty($_POST['game_id3'])?0:intval($_POST['game_id3']);
	$server_id=empty($_POST['server_id3'])?0:intval($_POST['server_id3']);
	$mode_id='2';
	$money=empty($_POST['money3'])?0:intval($_POST['money3']);
	$game_user=empty($_POST['game_user3'])?'':trim($_POST['game_user3']);
	$game_user2=empty($_POST['game_user23'])?'':trim($_POST['game_user23']);
	$game_role=empty($_POST['game_role3'])?'':trim($_POST['game_role3']);
	$tel=empty($_POST['tel3'])?'':trim($_POST['tel3']);
	$order_no=str_replace("-","",date("Y-m-dH-i-s")).rand(1000,2000);
	
	if($game_id==0||$server_id==0){
		message(array('text'=>'请选择充值游戏及服务器！','link'=>''));
	}
	if($game_user==''||$game_user!=$game_user2){
		message(array('text'=>'充值帐号输入错误！','link'=>''));
	}
	
	/// === 充值到游戏中 ===
	$clean_guid = array();
	$clean_guid['guid_op'] = '';
	
	/// 生成guid, 并更新
	$guid_tmp = uniqid('',true);
	$update=array();
	$update['guid_op']=$guid_tmp;
	$db->update($db_prefix."member", $update, "member_id=$member_id");
	// 读出当前金额
	$row = $db->getone("SELECT cur_money FROM ".$db_prefix."member WHERE member_id=$member_id and guid_op='$guid_tmp'");
	$cur_money = $row['cur_money'];
	if ($cur_money < $money)
	{
		$db->update($db_prefix."member", $clean_guid, "member_id=$member_id and guid_op='$guid_tmp'");
		
		message(array('text'=>'您的余额不足','link'=>''));
	}
	
	$insert=array();
	$insert['pay_order_no']=$order_no;
	$insert['pay_type']=0;
	$insert['pay_mode_id']=2;
	$insert['pay_state']=0;
	$insert['pay_user']=$member_id;
	$insert['pay_tel']=$tel;
	$insert['pay_game_id']=$game_id;
	$insert['pay_server_id']=$server_id;
	$insert['pay_game_user']=$game_user;
	$insert['pay_game_role']=$game_role;
	$insert['pay_money']=$money;
	$insert['pay_time']=$_SERVER['REQUEST_TIME'];
	$insert['pay_ip']=get_ip();
	$insert['dst_type']=2;
	$insert['web_src']='1gwan';
	$db->insert($db_prefix."pay", $insert);

	/// 调用充值接口
	require_once('hi_ports/charge_gateway.php');
  $ret = game_charge_gateway($order_no);
  $n=1;
	//返回失败时重复10次
	while($ret!=1 && $n<10){
		$ret=game_charge_gateway($agent_bill_id);
		$n++;
		sleep(1);
	}
	
	if (1 == $ret)
	{
		/// 更新平台币
		$update=array();
		$update['cur_money'] = $cur_money - $money;
		$db->update($db_prefix."member", $update, "member_id=$member_id and guid_op='$guid_tmp'");
		/// 更新充值状态
		$update=array();
		$update['pay_state']=1;
		$db->update($db_prefix."pay",$update,"pay_order_no='".$order_no."'");

		message(array('text'=>'充值成功','link'=>'user.php'));
	}
  else
	{
		$db->update($db_prefix."member", $clean_guid, "member_id=$member_id and guid_op='$guid_tmp'");
		message(array('text'=>'充值失败','link'=>''));
	}
	/// === 充值到游戏中 end ===
}

if($action=='get_server'){
	$game_id=empty($_GET['game_id'])?0:intval($_GET['game_id']);
	$server_list=server_array_list('server_is_pay=1 and game_id='.$game_id,'');
	foreach($server_list as $server){
		echo '<option value="'.$server['server_id'].'">'.$server['server_name'].'</option>';
	}
	exit;
}
if($action=='get_gameinfo'){
	$game_id=empty($_GET['game_id'])?0:intval($_GET['game_id']);
	$name='元宝';
	$per=10;
	$role=0;
	
	$row=$GLOBALS['db']->getone("select game_money_name,game_money_per,game_pay_role from ".$GLOBALS['db_prefix']."game WHERE game_id=".$game_id);
	if($row){
		$name=$row['game_money_name'];
		$per=$row['game_money_per'];
		$role=$row['game_pay_role'];
	}
	echo '{"name":"'.$name.'","per":"'.$per.'","role":"'.$role.'"}';
	exit;
}

//pay_form
$smarty=new smarty();smarty_header(true);
$smarty->assign('login',get_login());
$smarty->assign('faq',content_array_list(2,5));
$smarty->assign('paymode_list',paymode_array_list());
$smarty->assign('game_list',game_array_list('',''));

$game_id=empty($_GET['game_id'])?0:intval($_GET['game_id']);
//$server_id=empty($_GET['server_id'])?0:intval($_GET['server_id']);
$smarty->assign('game_id',$game_id);
//$smarty->assign('server_id',$server_id);
$smarty->display('pay_1.html');
?>
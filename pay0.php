<?php
require_once('includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('includes/front.php');
require_once('includes/pai.php');

$game_app = $_GET['app'];
$game_server = $_GET['server'];
$user_name = $_GET['user'];
$player_id = $_GET['player_id'];
$game_name = $_GET['game_name'];
$game_id = $_GET['gid'];
$pay_mode = $_GET['mode'];
$pay_mode_name = $_GET['mn'];
$action=isset($_GET['action'])?$_GET['action']:'';


if (!empty($pay_mode))
{
	$smarty=new smarty();smarty_header(true);
	$login_info = get_login();
	/*if (!$login_info['state'])
	{
		$array['username'] = $user_name;
	}*/
	
	$smarty->assign('login', $login_info);
	$smarty->assign('faq',content_array_list(2,5));
	$smarty->assign('paymode_name',$pay_mode_name);
	if (!empty($game_id))
	{
		$smarty->assign('game_no', $game_app);
		$smarty->assign('server_no', $game_server);
		$smarty->assign('server_list', get_server_list($game_id));
		$to_vc = 0;
		
		$game_per = pai_game_per($game_id);
		if (0 != $game_per['ret'])
		{
			$game_per['money_name'] = '元宝';
			$game_per['money_per'] = 10;
			$game_per['req_role'] = 0;
		}
	}
	else
	{
		$to_vc = 1;
		$game_per['money_name'] = '平台币';
		$game_per['money_per'] = 1;
		$game_per['req_role'] = 0;
	}
	
	$smarty->assign('to_vc', $to_vc);
	$smarty->assign('game_name', $game_name);
	$smarty->assign('game_id', $game_id);
	$smarty->assign('game_per', $game_per);
	$smarty->assign('pay_mode', $pay_mode);
	$smarty->display('pay2.html');
	exit;
}

if (!empty($game_app))
{
	$smarty=new smarty();smarty_header(true);
	$smarty->assign('faq',content_array_list(2,5));
	$smarty->assign('paymode_list',get_paymode());
	$smarty->assign('server_no', $game_server);
	$smarty->assign('game_no', $game_app);
	$smarty->assign('game_id', $game_id);
	$smarty->assign('game_name', $game_name);
	$smarty->display('pay1.html');
	exit;
}

if ($game_name == '平台币充值')
{
	$smarty=new smarty();smarty_header(true);
	$smarty->assign('faq',content_array_list(2,5));
	$smarty->assign('paymode_list',get_paymode());
	$smarty->assign('game_name', $game_name);
	$smarty->display('pay1.html');
	exit;
}

if($action=='pay_vc')
{
	$smarty=new smarty();smarty_header(true);
	$smarty->assign('login',get_login());
	$smarty->assign('faq',content_array_list(2,5));
	$smarty->assign('paymode_name',$pay_mode_name);
	$smarty->assign('game_no', $game_app);
	$smarty->assign('server_no', $game_server);
	$smarty->assign('server_list', get_server_list($game_id));
	$smarty->assign('game_name', $game_name);
	$smarty->assign('pay_mode', $pay_mode);
	$smarty->display('pay3.html');
	exit;
}

if($action=='pay_ok'){
	check_request();
	login_passed();
	$user_info = get_login();
	$game_id=empty($_POST['game_id'])?0:intval($_POST['game_id']);
	$server_id=empty($_POST['server_id'])?0:intval($_POST['server_id']);
	$mode_id=empty($_POST['pay_mode'])?0:intval($_POST['pay_mode']);
	$money=empty($_POST['money'])?0:intval($_POST['money']);
	$game_user=empty($_POST['game_user'])?'':trim($_POST['game_user']);
	$game_user_verify=empty($_POST['game_user_verify'])?'':trim($_POST['game_user_verify']);
	$game_role=empty($_POST['game_role'])?'':trim($_POST['game_role']);
	$tel=empty($_POST['tel_pt'])?'':trim($_POST['tel_pt']);
	$order_no=str_replace("-","",date("Y-m-dH-i-s")).rand(1000,2000);

	if($game_id!=0 && $server_id==0){
		message(array('text'=>'请选择充值的游戏服务器！','link'=>''));
	}
	if($game_user==''||$game_user!=$game_user_verify){
		message(array('text'=>'充值帐号输入错误！','link'=>''));
	}
	if (6==$mode_id && get_user_vc($user_info['username'])<$money)
	{
		message(array('text'=>'平台币不足！','link'=>''));
	}
	
	$pay_mode = get_paymode();
	
	$insert=array();
	$insert['pay_order_no']=$order_no;
	$insert['pay_type']=$mode_id;
	$insert['pay_mode_id']=$mode_id;
	$insert['pay_state']=0;
	$insert['pay_user']=$user_info['username'];
	$insert['pay_tel']=$tel;
	$insert['pay_game_id']=$game_id;
	$insert['pay_server_id']=$server_id;
	$insert['pay_game_user']=$game_user;
	$insert['pay_game_role']=$game_role;
	$insert['pay_money']=$money;
	$insert['pay_time']=$_SERVER['REQUEST_TIME'];
	$insert['pay_ip']=get_ip();
	$insert['charge_money'] = $money * ($pay_mode[$mode_id]['money_per']/100);
	$db->insert($db_prefix."pay", $insert);
	
	// 目标帐号信息
	if ($login_user['username'] != $game_user)
	{
		$to_user_info = get_user_info_by_name($game_user);
		if (empty($to_user_info['username']))
		{
			message(array('text'=>'目标帐号不存在, 请核实后重新输入！','link'=>''));
		}
		
		$to_user['username'] = $to_user_info['username'];
		$to_user['old'] = $to_user_info['old'];
	}
	else
	{
		$to_user['username'] = $game_user;
		$to_user['old'] = $_SESSION['old'];
	}
	
	//支付接口处理
	if (6 == $mode_id)
	{
		req_pay_vc($user_info['username'], $server_id, $money, $tel, $mode_id, $order_no, $_SESSION['old'], $to_user['username'], $to_user['old']);
		$order_info = get_order_info($order_no);
		if (2 != $order_info['state'])
		{
			message(array('text'=>'充值失败','link'=>''));
		}
		else
		{
			message(array('text'=>'充值成功','link'=>''));
		}
	}
	else
	{
		req_pay($user_info['username'], $server_id, $money, $tel, $mode_id, $order_no, $_SESSION['old'], $to_user['username'], $to_user['old']);
	}
	
	//message(array('text'=>'开始进入支付。。。','link'=>'','jump'=>'0'));
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
	
	$game_per = pai_game_per($game_id);
	if (0 == $game_per['ret'])
	{
		echo '{"name":"'.$game_per['money_name'].'","per":"'.$game_per['money_per'].'","role":"'.$game_per['req_role'].'"}';
	exit;
	}
	else
	{
		$name='元宝';
		$per=10;
		$role=0;
	}
	exit;
}

//pay_form
$smarty=new smarty();smarty_header();

$smarty->assign('faq',content_array_list(2,5));
$smarty->assign('game_list', get_game_list());
$game_id=empty($_GET['game_id'])?0:intval($_GET['game_id']);
$smarty->assign('game_id',$game_id);
$smarty->display('pay.html');
?>
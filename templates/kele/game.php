<?php
require_once('includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('includes/front.php');
require_once('includes/pai.php');

$action=isset($_GET['action'])?$_GET['action']:'';
//play
if($action=='play')
{
	login_passed();
	$server_id=empty($_GET['server_id'])?0:intval($_GET['server_id']);
	$extra=empty($_GET['extra'])?'':trim($_GET['extra']);
	$site=empty($_GET['site'])?'':trim($_GET['site']);
	
	if($server_id==0)
	{
		message(array('text'=>'服务器不存在，请重新选择！','link'=>''));
		exit;
	}
	
	$user_info = get_login();
	$server = pai_server_info($server_id);
		
	if ($server['game_name'] == '神曲')
	{
		$smarty=new smarty();smarty_header();
		$smarty->assign('user_name', $user_info['username']);
		$smarty->assign('server_id', $server_id);
		$smarty->display('tz.html');
		exit;
	}
	
	if ($server['state'] == 2)
	{
		message(array('text'=>'服务器正在维护，请稍候！','link'=>''));
	}
	
	$server_time = $server['trunon_date']." ".$server['trunon_hour'].":00";
	if (strtotime($server_time) > time())
	{
		message(array('text'=>'服务器将在 <span style="color:red;">'.$server_time.'</span> 开启，请稍候！','link'=>''));
	}

	//member
	$member_id=get_user('userid');
	$member_username=get_user('username');

	//游戏接口处理
	$ret = pai_login_game_url($user_info['username'], $server_id, $extra);
	//var_dump($ret);exit;
	if (0 == $ret['ret'])
	{
		$mm_url = '';
		$show_mm = 1;
		switch ($server['game_no'])
		{
			case 'NS':
				$mm_url = 'http://www.mojiyule.com/imoji/qifei/nishen/imojitv.js?left=10&top=270&coopId=22';
				break;
			case 'SQ':
				$mm_url = 'http://www.mojiyule.com/imoji/qifei/shenqu/imojitv.js?left=10&top=270&coopId=22';
				break;
			case 'TIANJIE':
				$mm_url = 'http://www.mojiyule.com/imoji/qifei/tianjie/imojitv.js?left=10&top=135&coopId=22';
				break;
			default:
				$show_mm = 0;
				break;
		}

		$smarty=new smarty();smarty_header();
		//var_dump($ret['url']);exit;
		$smarty->assign('game_title', $server['game_name']."-".$server['name']);
		$smarty->assign('game_url', $ret['url']);
		$smarty->assign('pai_api', $GLOBALS['pai_api']);
		$smarty->assign('p_user', $GLOBALS['member_username']);
		$smarty->assign('p_site', $GLOBALS['pai_site']);
		$smarty->assign('mm_url', $mm_url);
		$smarty->assign('show_mm', $show_mm);
		$smarty->display('mygame.html');
		exit;
	}
	else
	{
		message(array('text'=>'服务器不存在，请重新选择！','link'=>''));
	}
	//message(array('text'=>'开始进入游戏。。。','link'=>'','jump'=>'0'));
}

$smarty=new smarty();smarty_header(true);

//server_list
if($action=='server_list'){
	if (isset($_GET['game_id'])){
		$game_id=intval($_GET['game_id']);
	}else{
		exit();
	}

	$smarty->assign('login',get_login());
	$smarty->assign('faq',content_array_list(2,5));
	$smarty->assign('game_name', get_game_name($game_id));
	$smarty->assign('server_list',get_server_list($game_id));
	$smarty->display('server.html');
	exit;
}

//game_list
$smarty->assign('login',get_login());
$smarty->assign('faq',content_array_list(2,5));
$smarty->assign('game_list', get_game_list());
$smarty->display('game.html');
?>
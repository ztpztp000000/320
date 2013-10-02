<?php
require_once('includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('includes/front.php');
require_once('includes/pai.php');

$rxhzw_game_id = 4;

$action=isset($_GET['action'])?$_GET['action']:'';
$game_id=empty($_GET['game_id'])?0:intval($_GET['game_id']);
if($game_id>0){
	redirect('card.php?action=card_list&id='.$game_id);
	exit;
}

$smarty=new smarty();smarty_header();

if($action=='card_list' || empty($action)){
	$game_id=empty($_GET['id'])?0:intval($_GET['id']);
	$game_name=empty($_GET['name'])?'':trim($_GET['name']);
	if ($game_id == $rxhzw_game_id || 13==$game_id)
	{
		/// 热血海贼王新手卡
		$card_list = array();
		$server_list = get_server_list($game_id);
		foreach($server_list as $server)
		{
			$card_list[$server['id']]['id']= $server['id'];
			$card_list[$server['id']]['name']= $server['name'];
			$card_list[$server['id']]['free'] = 1000;
		}
	}
	else
	{
		$card_list = get_card_list($game_id);
	}

	$smarty->assign('login',get_login());
	$smarty->assign('faq',content_array_list(2,5));
	$smarty->assign('game_name',$game_name);
	$smarty->assign('game_id',$game_id);
	$smarty->assign('card_list',$card_list);
	$smarty->display('card_show.html');
	exit;
}
if($action=='get_card'){
	login_passed();
	$card_id=empty($_GET['id'])?0:intval($_GET['id']);
	$game_id=empty($_GET['gid'])?0:intval($_GET['gid']);
	$free_count=empty($_GET['free'])?0:intval($_GET['free']);
	$member_username=get_user('username');

	if ($game_id == $rxhzw_game_id)
	{
		/// 热血海贼王新手卡领取
		$card = pai_rxhzw_card($member_username, $card_id);
	}
	else if (13 == $game_id)
	{
		$card = getcardbyserver($member_username, $card_id);
	}
	else
	{
		if($free_count==0){
			message(array('text'=>'此卡已发放结束！','link'=>''));
		}
		
		$card = get_card($member_username, $card_id);
	}
	$card_no = $card['no'];
	if (1 == $card['ret'])
	{
		message(array('text'=>'您已领取过此卡！<br />卡号：<span class="cno">'.$card_no."</span>",'link'=>'','jump'=>'0'));
	}
	if (2 == $card['ret'])
	{
		message(array('text'=>'此卡已发放结束！','link'=>''));
	}
	
	message(array('text'=>'恭喜您领取成功，请妥善保管！<br />卡号：<span class="cno">'.$card_no."</span>",'link'=>'','jump'=>'0'));
	exit;
}

//card
$smarty->assign('login',get_login());
$smarty->assign('faq',content_array_list(2,5));
$smarty->assign('game_list',game_array_list('',''));
$smarty->display('card.html');
?>
<?php
require_once'../includes/global.php';
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once'../includes/front.php';
require_once'../includes/pai.php';
require_once'config.php';
require_once'../includes/game_content.php';
require_once'global_info.php';

//set_online(create_uri("index"));
$smarty=new smarty();smarty_header(true, 'gweb');
//$cache_id = sprintf('%X', crc32(ROOT_PATH));
//if (!$smarty->is_cached('index.html',$cache_id)){
	//$user_info = get_login();
	
//}
/// 服务器列表
$smarty->assign('server_list', get_server_list($GLOBALS['game_id']));
// 游戏信息
$game_info = get_game_info($GLOBALS['game_id']);
$smarty->assign('game_info', $game_info);
$smarty->assign('game_no', $GLOBALS['game_no']);
$smarty->assign('game_name', $GLOBALS['game_name']);
$smarty->assign('website_bk', $GLOBALS['website_bk']);
$smarty->assign('website_logo', $GLOBALS['website_logo']);
// 新闻公告
$smarty->assign('news',content_array_list($GLOBALS['channel_id']['news'],6, $GLOBALS['game_id'], 20));
// 热门活动
$smarty->assign('hot_action',content_array_list($GLOBALS['channel_id']['hot_action'],7, $GLOBALS['game_id'], 20));
// 游戏资料
$smarty->assign('game_data',content_array_list($GLOBALS['channel_id']['game_info'],50, $GLOBALS['game_id'], 20));
// 游戏攻略
$smarty->assign('game_tactic',content_array_list($GLOBALS['channel_id']['game_tactic'],7, $GLOBALS['game_id'], 20));
// 玩家心得
$smarty->assign('player_exp',content_array_list($GLOBALS['channel_id']['player_exp'],7, $GLOBALS['game_id'], 20));

$smarty->assign('link',get_link());

//$smarty->assign('news',get_news());
$smarty->display('index.html',$cache_id);

function get_link(){
	$array=array();
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$GLOBALS['db_prefix']."link WHERE link_state=1 and game_id=".$GLOBALS['game_id']." ORDER BY link_sort ASC,link_id ASC");
	if($res){
		foreach($res as $row){
			$array[$row['link_id']]['id']=$row['link_id'];
			$array[$row['link_id']]['name']=$row['link_name'];
			$array[$row['link_id']]['logo']=$row['link_logo'];
			$array[$row['link_id']]['text']=$row['link_text'];
			$array[$row['link_id']]['url']=$row['link_url'];
		}
	}
	return $array;
}
?>
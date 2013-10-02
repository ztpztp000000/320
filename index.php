<?php
require_once'includes/global.php';
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once'includes/front.php';
require_once'includes/pai.php';



//set_online(create_uri("index"));
$smarty=new smarty();smarty_header();
//$cache_id = sprintf('%X', crc32(ROOT_PATH));
//if (!$smarty->is_cached('index.html',$cache_id)){
	$user_info = get_login();
	$smarty->assign('here',here('index'));
//}
$smarty->assign('login', $user_info);
$smarty->assign('game_focus',get_game_focus());
$smarty->assign('game_best',get_game_best());
//var_dump(get_ad_list());exit;
$smarty->assign('ad_list',get_ad_list());
$smarty->assign('news',get_news());
$smarty->assign('links',get_link());
$smarty->assign('user_vc',get_user_vc($user_info['username']));
$smarty->assign('server_new',get_new_server());
$smarty->assign('game_new',get_game_hot());
$smarty->display('index.html',$cache_id);

function get_game_focus(){
    return game_array_list('game_is_focus=1',3);
}
function get_game_best(){
    return game_array_list('game_is_best=1',4);
}
function get_game_hot(){
	$sql = "SELECT guid,website FROM ".$GLOBALS['db_prefix']."game";
	$res=$GLOBALS['db']->getall($sql);
	$game_website = array();
	foreach($res as $row)
	{
		$game_website[$row['guid']] = $row['website'];
	}
	$game_list = array();
	$new_games = get_newgame_list();
	foreach($new_games as $game)
	{
		$game_list[$game['id']] = $game;
		$game_list[$game['id']]['website'] = $game_website[$game['id']];
	}
    return $game_list;
}
function get_news(){
    $news = content_array_list(1,11);
    return $news;
}
function get_link(){
	$array=array();
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$GLOBALS['db_prefix']."link WHERE link_state=1 and (game_id=0 or is_show_home=1) ORDER BY link_sort ASC,link_id ASC");
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
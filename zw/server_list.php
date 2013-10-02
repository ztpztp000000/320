<?php
require_once'../includes/global.php';
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once'../includes/front.php';
require_once'../includes/pai.php';
require_once'config.php';
require_once'global_info.php';

$smarty=new smarty();smarty_header(false, 'gweb');
$smarty->assign('website_bk', $GLOBALS['website_bk']);
$smarty->assign('server_list',get_server_list($GLOBALS['game_id']));
$smarty->display('server_list.html',$cache_id);
?>
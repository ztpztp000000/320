<?php
require_once('includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('includes/front.php');

$action=isset($_GET['action'])?$_GET['action']:'';
if($action=='pay_ok'){$smarty=new smarty();smarty_header(true);
$smarty->assign('login',get_login());
$smarty->assign('faq',content_array_list(2,5));
$smarty->assign('paymode_list',paymode_array_list());
$smarty->assign('game_list',game_array_list('',''));

$game_id=empty($_GET['game_id'])?0:intval($_GET['game_id']);
//$server_id=empty($_GET['server_id'])?0:intval($_GET['server_id']);
$smarty->assign('game_id',$game_id);
//$smarty->assign('server_id',$server_id);
$smarty->display('act_success.html');
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
$smarty->display('act.html');
?>
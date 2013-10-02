<?php
require_once('includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('includes/front.php');
require_once('includes/share.php');

$action=isset($_GET['action'])?$_GET['action']:'';
$smarty=new smarty();smarty_header();
$smarty->assign('ad_list',get_ad_list());
$smarty->display('login.html');
?>
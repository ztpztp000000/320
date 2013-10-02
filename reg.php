<?php
require_once('includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('includes/front.php');

//ÍÆ¹ãÇþµÀ
$sp=empty($_GET['sp'])?'':trim(addslashes($_GET['sp']));

$smarty=new smarty();smarty_header();
$smarty->assign('sp',$sp);
$smarty->display('reg.html');

/*
echo "<script>";
echo "function sp_hide_(){ document.getElementById('sp_id').style.display='none'}";
echo "</script>";
*/
?>
<?php
require_once('includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('includes/front.php');

$action=isset($_GET['action'])?$_GET['action']:'';

//AJAX检查用户名
if($action=='check_gift_key'){
	check_request();
	$gift_key=empty($_GET['gift_key'])?'':trim($_GET['gift_key']);
    if(18!=strlen($gift_key)){
        echo('0');//不符合长度的礼包卡序列号直接返回错误
    }
	$row=$db->getone("SELECT * FROM ".$db_prefix."gift WHERE gift_key='".$gift_key."'");
	if($row){
		if((1==$row['key_state']) || (''!=$row['key_get_user'])){
            echo('2');//已经被使用
        }
        else{
            echo('1');//可以使用
        }
	}else{
		echo('0');//不存在此礼包卡
	}
	exit;
}



?>
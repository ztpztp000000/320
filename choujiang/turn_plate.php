<?php
require_once('../includes/global.php');
require_once('../languages/'.$config['site_language'].'/front.php');
require_once('../includes/front.php');
session_start();

if ($_SESSION['lottery'] != 1)
{
	message(array('text'=>$language['lottery'],'link'=>'../user.php'));
	var_dump('no lottery');
	exit;
}
$player_id = $_SESSION['member_id'];
header('Content-Type:text/html;charset=GB2312');
$arrTurn = array(18,54,90,126,162,198,234,270,306,342);
if ( $_POST['act'] == 'turnPlate') {
		$r_v = rand(1,100000);
		$money = 1;
		$key = 9;
    if (1 == $r_v)
    {
    	$key = 1;
    	$money = 50;
    }
    else if ($r_v < 10)
    {
    	$key = 0;
    	$money = 10;
    }
    else if ($r_v < 100)
    {
    	$key = 7;
    	$money = 8;
    }
    else if ($r_v <= 10000)
    {
    	$key = 5;
    	$money = 5;
    }
    else if ($r_v <= 20000)
    {
    	$key = 3;
    	$money = 2;
    }
    
    $hudu = 1440+$arrTurn[$key];   //随机选一种弧度，弧度你可以自己控制，前面720表是在原来基础上多加两圈
    $tips ='你得到平台币'.$money;
    echo '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="497" height="497" id="turnplate">
     	  <param name="allowScriptAccess" value="always" />
          <param name="FlashVars" id="FlashVars" value="fvar='.$hudu.'&tips='.$tips.'">
          <param name="movie" value="turnplate.swf">
          <param name="menu" value="false">
          <param name="quality" value="high">
          <param name="wmode" value="transparent">
          <embed src="turnplate.swf" FlashVars="fvar='.$hudu.'&tips='.$tips.'" id="FlashVars"  width="480" height="480"  quality="high" id="turnplate" name="turnplate" wmode="transparent" allowScriptAccess="always"  pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash">
          </embed>
          </object>';
         
    /// 更新平台币
    $db->query("UPDATE {$db_prefix}member SET lottery=0,cur_money=cur_money+$money where member_id=$player_id");
    $_SESSION['lottery'] = 0;
    $_SESSION['cur_meony'] += $money;
    /// 记录日志
    $insert=array();
		$insert['member_id']=$player_id;
		$insert['member_name']=$_SESSION['member_username'];
		$insert['lottery']=$money;
		$db->insert($db_prefix."lottery", $insert);
	
    exit;
}
?>
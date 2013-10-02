<?php
require_once('../includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('../includes/front.php');
require_once('../includes/pai.php');

$order_no = $_GET['order_no'];
$user = $_GET['user'];
$ret = $_GET['ret'];
$sign = $_GET['sign'];


if (empty($order_no) || empty($user) || empty($sign))
{
	var_dump($order_no."_".$user."_".$ret."_".sign);exit;
	exit;
}

$strKey=$user."_".$order_no."_".$ret."_".$GLOBALS['pai_key'];
if ($sign != md5($strKey))
{
	exit;
}
switch ($ret)
{
	case 0:
		set_order_ok($order_no, 2);
		//message(array('text'=>'充值成功','link'=>'../user.php'));
		exit;
	case 8:
		set_order_ok($order_no, 2);
		//message(array('text'=>'未选择服务器, 或未创建角色! 已经充值为平台币','link'=>'../user.php'));
		exit;
	case 18:
		set_order_ok($order_no, 1);
		exit;
	default:
		//message(array('text'=>'充值到失败','link'=>'../user.php'));
		exit;
}

function set_order_ok($order_no, $state)
{
	$update=array();
	$update['pay_state']=$state;
	$GLOBALS['db']->update($GLOBALS['db_prefix']."pay",$update,"pay_order_no='".$order_no."'");
	
	// 更新玩家已经充值的金额, 平台币充值不算
	$sql = "SELECT pay_user,charge_money,pay_mode_id FROM ".$GLOBALS['db_prefix']."pay WHERE pay_order_no='".$order_no."'";
	$row = $GLOBALS['db']->getone($sql);
	
	if (6 != $row['pay_mode_id'] && $state==2)
	{
		$pay_user = $row['pay_user'];
		$money = $row['charge_money'];
		$sql = "UPDATE ".$GLOBALS['db_prefix']."member SET charge_money=charge_money+".$money." where member_username='".$pay_user."'";
		$GLOBALS['db']->update_wn($sql);
	}
}

?>
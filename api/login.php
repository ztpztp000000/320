<?php
require_once'../includes/global.php';
require_once	'ret_code.php';

$username = $_GET['user'];
$passwd = $_GET['passwd'];
$time = $_GET['time'];
$sign = $_GET['sign'];

/*if (empty($username) || empty($time) || empty($sign))
{
	exit;
}*/

/// 时间差不大于前后10分钟
$cur_time=time();
if(abs($cur_time-$time) > 600)
{
	echo $GLOBALS['ret_code']['timeout'];
	exit;
}

$strKey=$username."_".$passwd."_".$time."_".$GLOBALS['pai_key'];
$r_sign=md5($strKey);
if ($r_sign != $sign)
{
	// 签名验证失败
	echo $GLOBALS['ret_code']['sign_err'];
	exit;
}

$sql="SELECT member_id FROM ".$db_prefix."member where member_username='".$username."' and member_password=".password($passwd)."'";
$count = $GLOBALS['db']->getcount($sql);
if (0 == $count)
{
	echo 0;
}
else
{
	echo -1;
}
?>
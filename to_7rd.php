<?php
require_once'includes/global.php';
require_once'includes/pai.php';

$user_name = $_POST['user_name'];
$server_id = $_POST['server_id'];

$url = $GLOBALS['pai_api']."to_7rd.php?user=".$user_name."&server_id=".$server_id;
$ret = json_decode(get_url_cur($url), true);

$key = '68005ba4-1a7f-4bed-a220-cf375393bfc5';
$to_site = '7road_0213';
$src_site = '777fly.com';

$k = md5(urlencode($ret['user']).$ret['site'].$src_site.$to_site.$key);
$url = 'http://account.7road.com/updatename?currentname='.urlencode($ret['user']).'&currentsite='.$ret['site'].'&s='.$src_site.'&k='.$k.'&tosite='.$to_site;

header('Location: '.$url);
?>
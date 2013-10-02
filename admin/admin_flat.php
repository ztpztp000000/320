<?php
// 平台管理首页
if (empty($action))
{
	include 'flat_config.php';
	exit;
}
// 站点参数
if('config' == $action)
{
	include 'flat_config.php';
	exit;
}
if ('menu' == $action)
{
	include 'menu.php';
	exit;
}
if ('admin' == $action)
{
	include 'administrators.php';
	exit;
}
if ('news' == $action)
{
	include 'admin_news.php';
	exit;
}
if ('channel' == $action)
{
	include 'admin_channel.php';
	exit;
}
if ('ad' == $action)
{
	include 'admin_ad.php';
	exit;
}
if ('tyro_card' == $action)
{
	include 'tyro_card.php';
	exit;
}
if ('links' == $action)
{
	include 'admin_links.php';
	exit;
}
?>
<?php
require_once'../includes/global.php';
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once'../includes/front.php';
require_once'../includes/pai.php';
require_once'config.php';
require_once'global_info.php';

$channel_id = intval($_GET['id']);
$title = trim($_GET['title']);

$sql ="SELECT * FROM ".$GLOBALS['db_prefix']."content WHERE content_state=1 and ";
if (0 == $GLOBALS['game_id'])
{
	$sql =$sql."(game_id=0 or is_show_home=1) and channel_id=".$channel_id." ORDER BY content_id";
}
else
{
	$sql =$sql."game_id=".$GLOBALS['game_id']." and channel_id=".$channel_id." ORDER BY content_id";
	//$sql =$sql."channel_id=".$channel_id." ORDER BY content_id";
}
$page_size = 30;
$page_current=isset($_GET['page'])?intval($_GET['page']):1;
$count=$GLOBALS['db']->getcount($sql);

$sql.=" DESC LIMIT ".(($page_current-1)*$page_size).",".$page_size;
$res = $GLOBALS['db']->getall($sql);
$content_list=array();
foreach ($res AS $row)
{
	$content_list[$row['content_id']]['content_id']=$row['content_id'];
	$content_list[$row['content_id']]['content_title']=truncate($row['content_title'], 100);
	if(empty($row['content_url']))
	{
		$content_list[$row['content_id']]['url']=create_uri('content',array('id'=>$row['content_id']));
	}
	else
	{
		$content_list[$row['content_id']]['url']=$row['content_url'];
	}
}

$pagebar=pagebar(get_self(),"&id=".$channel_id."&title=".$title."&",$page_current,$page_size,$count);

$smarty=new smarty();smarty_header(false, 'gweb');
$smarty->assign('server_list', get_server_list($GLOBALS['game_id']));
$smarty->assign('title',$title);
$smarty->assign('website_bk', $GLOBALS['website_bk']);
$smarty->assign('content_list', $content_list);
$smarty->assign('pagebar',$pagebar);
$smarty->display('content_list.html');
?>
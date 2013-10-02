<?php
if($action=='')
{
	$game_list = get_game_list();
	if (NULL == $_SESSION['game_id'])
	{
		foreach ($game_list as $game)
		{
			$_SESSION['game_id'] = $game['id'];
			break;
		}
	}

	$smarty=new smarty();smarty_header();
	$smarty->assign('game_id', $_SESSION['game_id']);
	$smarty->assign('game_list', get_game_list());
	$smarty->display('websites.html');
}
if ('game' == $action)
{
	include'admin_game.php';
	exit;
}
if ('content' == $action)
{
	include'website_content.php';
	exit;
}
if ('links' == $action)
{
	include'web_links.php';
	exit;
}
?>
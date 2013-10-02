<?php
require_once('includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('includes/front.php');
require_once('includes/pai.php');

$game_app = $_GET['app'];
$game_server = $_GET['server'];
$user_name = $_GET['user'];

if (empty($game_app) || empty($game_server) || empty($user_name))
{
	header('Location: /pay0.php');
}
else
{
	header('Location: '. $GLOBALS['pai_api']."pay/?app=".$game_app."&server=".$game_server."&user=".$user_name);
}
?>
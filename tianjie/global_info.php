<?php
require_once'../includes/pai.php';
require_once '../includes/share.php';
require_once'config.php';

$server_list = get_server_list($GLOBALS['game_id']);
$website_pic = get_website_bk($GLOBALS['game_id']);
$website_bk = $website_pic['website_bk'];
$website_logo = $website_pic['website_logo'];
?>
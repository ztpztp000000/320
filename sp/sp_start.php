<?php
//后台默认首页
if($do==''){
	check_login();
	$system_info=array();
	$system_info['SERVER_TIME']=date("Y-m-d H:i:s",$_SERVER['REQUEST_TIME']);
	$system_info['SERVER_PORT']=$_SERVER['SERVER_PORT'];
	$system_info['PHP_OS']=@PHP_OS;
	$system_info['SERVER_NAME']=$_SERVER['SERVER_NAME'];
	$system_info['SERVER_SOFTWARE']=$_SERVER['SERVER_SOFTWARE'];
	$system_info['DB_VERSION']=$db->version();
	$system_info['DOCUMENT_ROOT']=$_SERVER['DOCUMENT_ROOT'];
	$system_info['UPLOAD_MAX_FILESIZE']=@ini_get('upload_max_filesize');
	$smarty=new smarty();smarty_header();
	$smarty->assign('system_info',$system_info);
	$smarty->display('start.htm');
}
?>
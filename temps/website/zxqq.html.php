<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['config']['site_name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo htmlspecialchars($this->_var['config']['site_keywords']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($this->_var['config']['site_description']); ?>" />
<SCRIPT language=javascript>
function picsize(obj,MaxWidth){
  img=new Image();
  img.src=obj.src;
  if (img.width>MaxWidth)
  {
    return MaxWidth;
  }
  else
  {
    return img.width;
  }
}
function CloseQQ()
{
divStayTopleft.style.display="none";
return true; 
}
var online= new Array();
</SCRIPT>
<table width="155px" height="90px">
<tr>
<td align="right" valign="bottom">
<SCRIPT>document.write("<a target=blank href=tencent://message/?uin=1353477780&Site=在线客服&Menu=yes><img border=0 SRC=http://wpa.qq.com/pa?p=1:1353477780:7 alt=在线客服></a>");</SCRIPT> </td></tr></table>
<SCRIPT type=text/javascript>
function FloatTop()
{
 var startX1 =document.body.offsetWidth-125 ,startY1 = 5;
 var startX2 =0,startY2 = 95;
 var ns = (navigator.appName.indexOf("Netscape") != -1);
 var d = document;
 function ml(id,startX,startY)
 {
  var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
  if(d.layers)el.style=el;
  el.sP=function(x,y){this.style.left=x;this.style.top=y;};
  el.x = startX;
  el.y = startY;
  return el;
 }
 window.stayTopLeft=function()
 {
  var pY = ns ? pageYOffset : document.body.scrollTop;
  ftlObj.y += (pY + startY1 - ftlObj.y)/8;
  ftlObj1.y += (pY + startY2 - ftlObj1.y)/8;
  ftlObj.sP(document.body.scrollLeft+document.body.offsetWidth-125, ftlObj.y);
  ftlObj1.sP(ftlObj1.x, ftlObj1.y);
  setTimeout("stayTopLeft()", 30);
 }
//  ftlObj = ml("divStay",document.body.scrollLeft+document.body.offsetWidth-125,0);
//  ftlObj1 = ml("divStayTopLeft",0,30);
 ftlObj = ml("divStay",(document.body.scrollLeft+document.body.offsetWidth)/2+379,0);
 ftlObj1 = ml("divStayTopLeft",(document.body.scrollLeft+document.body.offsetWidth)/2+379,30);
 stayTopLeft();
}
FloatTop();
</SCRIPT>


</body>
</html>

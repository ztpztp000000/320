var http_request = false;
function send_request(method,url,content,responseType,callback){
 http_request = false;
 if(window.XMLHttpRequest) { //Mozilla 
  http_request = new XMLHttpRequest();
  if(http_request.overrideMimeType) {
   http_request.overrideMimeType("text/xml");
  }
 } else if(window.ActiveXObject) { //IE
  try{
   http_request = new ActiveXObject("Msxml2.XMLHTTP");
  } catch(e) {
   try {
    http_request = new ActiveXObject("Microsoft.XMLHTTP");
   } catch(e) {}
  }
 }
 
 if(!http_request) {
  window.alert("Can't create XMLHttpRequest");
  return false;
 }
 if(responseType.toLowerCase() == "text") {
  //http_request.onreadystatechange = processTextResponse;
  http_request.onreadystatechange = callback;
 } else if(responseType.toLowerCase == "xml") {
  //http_request.onreadystatechange = processXMLResponse;
  http_request.onreadystatechange = callback;
 } else {
  window.alert("error");
  return false;
 }
 
 if(method.toLowerCase() == "get") {
  http_request.open(method, url, true);
 } else if(method.toLowerCase() == "post") {
  http_request.open(method, url, true);
  http_request.setRequestHeader("content-Type","application/x-www-form-urlencoded");
 } else {
  window.alert("http request error");
  return false;
 }
 http_request.send(content);
}



function processTextResponse() {
 if(http_request.readyState == 4) {
  if(http_request.status == 200) {
   alert(http_request.responseText);
  } else {
   alert("request error");
  }
 }
}

function processXMLResponse() {
 if(http_request.readyState == 4) {
  if(http_request.status == 200) {
   alert(http_request.responseXML);
  } else {
   alert("request error");
  }
 }
}








function gameRegist(){
	var userName = document.getElementById("txtUsername").value,passwd=document.getElementById("txtPwd").value,rpasswd=document.getElementById("txtCnfmPwd").value;
	

	if(!passwd){
		document.getElementById("RpasswordError").style.color="red";
		document.getElementById("RpasswordError").innerHTML="密码不能为空!";
		return;
	}else if(passwd.length>20||passwd.length<6){
		document.getElementById("RpasswordError").style.color="red";
		document.getElementById("RpasswordError").innerHTML="密码长度不正确!";
		return;
	}
	if(!rpasswd){
		document.getElementById("rpasswordError").style.color="red";
		document.getElementById("rpasswordError").innerHTML="确认密码不能为空!";
		return;
	}else if(rpasswd.length>20||rpasswd.length < 6){
		document.getElementById("rpasswordError").style.color="red";
		document.getElementById("rpasswordError").innerHTML="确认密码长度不正确!";
		return;
	}

	if(rpasswd&&passwd&&rpasswd!=passwd){
		document.getElementById("rpasswordError").style.color="red";
		document.getElementById("rpasswordError").innerHTML="密码不一致!";
		return ;
	}

	if (!isNameVailed)
	{
		return ;
	}

	document.getElementById("form1").submit();
}

var isNameVailed = false;
function checkName(){
	var userName = document.getElementById("txtUsername").value;
	
		if(!userName){
		   	document.getElementById('RuserNameError').style.color="red";
			document.getElementById('RuserNameError').innerHTML="用户名不能为空!";isNameVailed = false;
			return;
		}
		if(userName.length>20||userName.length<4) {
			document.getElementById('RuserNameError').style.color="red";
			document.getElementById('RuserNameError').innerHTML="用户名长度不正确!";isNameVailed = false;
			return;
		}
		if(userName&&!userName.match(/^[a-zA-Z0-9@\.]*$/)){
		    document.getElementById('RuserNameError').style.color="red";
			document.getElementById('RuserNameError').innerHTML="用户名不合法!";isNameVailed = false;
			return;
		}

		send_request("get", '/user/doreg.aspx?userName=' + userName + '&time='+(+new Date), userName, "text", function(d){
					 if(http_request.readyState == 4) {
  if(http_request.status == 200) {
   d = http_request.responseText;
  } else {
   alert("request error");
  }
 }
				if(d == "0"){
					isNameVailed = false;
					document.getElementById('RuserNameError').style.color="red";
					document.getElementById('RuserNameError').innerHTML="用户名已存在!";
					return false;
				}else{
					isNameVailed = true;
					document.getElementById('RuserNameError').style.color="#33CC00";
					document.getElementById('RuserNameError').innerHTML="恭喜用户名可以使用!";
				}
			});
}
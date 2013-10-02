var flashvars = {}; 
var params = {}; 
var attributes = {};
params.menu = "false"; 
params.wmode = "transparent"; 
params.allowScriptAccess = "sameDomain";
swfobject.embedSWF(contextPath+"/"+curPath+"/index.swf", "swf", "1000", "550", "9.0.0", false, flashvars, params, attributes);

$$_(document).ready(function(){
	$$.userRet = null;
		$$.validate(function(){
			$$.showBox = true;
			$$.showLable = false;
			$$.delEvent = "keyup"; //不需要验证的事件
			_('#frm').bind({
		elements:{
			"userName"	:{
                            "required":true,
                            isUserName:true,
                            isLength:/6-18/,
                            "#":function(obj){
                            	$$.post(contextPath+"/user",{userName:obj.value},function(msg){
                            		if(msg=="true")
                            			$$.userRet = "抱歉，该用户名已被占用";
                            		else
                            			$$.userRet = null;
                            	});
                            	return $$.userRet;
                            }
                        },
               "userPwd":{
               		"required":true,
               		isLength:/6-20/
               },
               "userPwd2":{
               		"required":true,
               		"#":function(obj){
               			if(obj.value!=$$._('userPwd').value){
               				return "两次密码不同"; 
               			}
               		}
               }
		},messages:{
		}
              });
            });
	});

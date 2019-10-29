<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <title>学生管理登录界面</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="keyword1,keyword2,keyword3">
    <meta name="description" content="this is my page">
    <meta name="content-type" content="text/html; charset=gb2312">
    
    <!--<link rel="stylesheet" type="text/css" href="./styles.css">-->
	<link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- 提交表单前对输入的数据做最初的判断 document.forms[0].submit(); -->
	<script type="text/javascript" src="jquery-1.12.1.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		//当单击登录按钮时触发的事件
		$(".btn").click(function(){
			// 获账号文本域的值
			var user = document.getElementById("user").value;
			//获取密码文本域的值
			var passwd = document.getElementById("pwd").value;
			//定义正则表达式对象
			var pattern = new RegExp("[~'!@#$%^&*()-+_=:?？]");
			//对账号和密码进行非空判断  
			if(user=="" || user.length>10){
				alert("请输入账号！");
				$("#user").focus();
				return false;
			}else if(pattern.test(user)){
				alert("温馨提示：用户名中含有非法字符，请重新输入！");
	            $("#user").focus();
	            return false;
			}else if(passwd=="" || passwd.length>10 || passwd.length<6){
				alert('请输入密码！');
				$("#passwd").focus();
				return false;
			}else if(pattern.test(passwd)){
				alert("温馨提示：密码中含有非法字符，请重新输入！");
	            $("#passwd").focus();
	            return false;
			}else{
				$.post("login_check.php",{user:user,passwd:passwd},function(data){
					if($.trim(data)=='yes'){
						alert('登录成功！');
						window.location.href='index.php';
						return true;
					}else{
						alert('你输入的账号或密码不正确！');
						window.location.href='login.html';
						return false;
					}
				},"text");
				
			}
		});
	});
	</script>
	
  </head>
  
  <body class="bg-primary">
    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			<br><br><br>
			<h1>学 . 生 . 信 . 息 . 资 . 源 . 管 . 理 . 系 . 统</h1>
			<br>
		</div>
	</div>
	
	<hr style="height:10px;border:none;border-top:10px groove #ffffff;" />
    <br><br>
    <!-- 设置表单 -->
    <div class="row">
		<div class="col-xs-5">
		</div>
		
		<div class="col-xs-3">
			<form class="form-horizontal" action="index.php" method="post">
			  <div class="form-group">
			    <label for="user" class="col-sm-4 control-label">账号：</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="name" id="user">
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="pwd" class="col-sm-4 control-label">密码：</label>
			    <div class="col-sm-8">
			      <input type="password" class="form-control" name="pwd" id="pwd">
			    </div>
			  </div>
			 
			  <div class="form-group">
			    <div class="col-sm-offset-4 col-sm-8">
			      <button type="button" class="btn btn-success" onclick="button_login()">登陆（LOGIN）</button>
			    </div>
			  </div>
			</form>
		</div>

		<div class="col-xs-4">
		</div>
	</div>
	
	<!-- 关于页面说明 -->
	<div style="position:fixed; left:0px; bottom:0px; width:100%; height:50px; background-color:#000; z-index:9999;">
		<div align=center class="container" style="font-size:10pt;border-top:2px solid #b71c1c;height:30px;line-height:30px;margin-top:20px;margin-bottom:2px;">
			16信管1班 吉杨 版权所有 &copy;2019，浏览器版本：支持谷歌浏览器
		</div>
	</div>
    
    <script src="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
	<script src="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>

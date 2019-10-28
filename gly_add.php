<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生基本信息管理系统</title>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script type="text/javascript" src="jquery-1.12.1.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		//当单击登录按钮时触发的事件
		$(".btn").click(function(){
			var user = document.getElementById("name").value;
			var passwd = document.getElementById("pwd").value;
			var role = document.getElementById("role").value;
			var pattern = new RegExp("[~'!@#$%^&*()-+_=:]");
			if(user==""){
				alert("请输入账号！");
				$("#name").focus();
				return false;
			}else if(pattern.test(user)){
				alert("温馨提示：用户名中含有非法字符，请重新输入！");
	            $("#name").focus();
	            return false;
			}else if(passwd==""){
				alert('请输入密码!');
				$("#pwd").focus();
				return false;
			}else if(pattern.test(passwd)){
				alert("温馨提示：密码中含有非法字符，请重新输入！");
	            $("#pwd").focus();
	            return false;
			}else if(role==""){
				alert("请输入角色！");
				$("#role").focus();
				return false;
			}else if(!(role=='0' || role=='1')){
				alert("角色分配错误！");
				$("#role").focus();
				return false;
			}
			else{
				$.post("gly_add_check.php",{user:user,passwd:passwd,role:role},function(data){
					if($.trim(data)=='yes'){
						alert('插入成功！');
						location.reload();
					}else{
						alert('插入失败！账号重复！');
						location.reload();
					}
				},"text");
				
			}
		});
	});
	</script>
</head>

<body>
<form action="insertadminLogin.html" name="datas" style="background-color:#90CAF9">
	<font color="red" size="5">您正在添加新的管理员，注意角色（权限）的分配！</font>
	
	<!-- id -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>管理员ID：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="id" class="form-control" placeholder="系统自动分配" disabled="disabled">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 管理员账号 -->
	<div class="row" style="width:100%;text-align:center">
	
		<div class="col-xs-3">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffName" class="col-sm-6 control-label"><font face="楷体" size=4>账号：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="name" class="form-control" placeholder="非'!@#$%^&*()-+_=:字符">
				    </div>
			  	</div>
			</div>
		</div>
		
		<div class="col-xs-5">
		</div>
		
	</div>
	
	<!-- 密码 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="jobid" class="col-sm-6 control-label"><font face="楷体" size=4>密码：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="pwd" class="form-control" placeholder="非'!@#$%^&*()-+_=:字符">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 角色-->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="sfzh" class="col-sm-6 control-label"><font face="楷体" size=4>角色：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="role" class="form-control" placeholder="0管理员，1学生">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		<button type="button" class="btn btn-warning" name="insert" onclick="button_insert()">确认添加<span style="padding:0 2px;"></span>(sure)</button>
		</div>
	</div>
	
</form>

<div class="panel panel-info">
  <!-- Default panel contents -->
  <div class="panel-heading">
  <font color="red" size="3">管理员列表实时展示（本页面的相关操作都可以通过此表进行验证）</font>
  </div>

  <!-- Table -->
	  <table class="table table-bordered">
					<tr>
						<th>ID</th>
						<th>账号</th>
						<th>密码</th>
						<th>角色</th>
					</tr>
                <?php
                
                // header("Content-type:text/html; charset=utf-8");
                require_once('conn.php');
                
                $sql="select * from glyxxb";
                
                $result=mysql_query($sql);
                if($result){
                	
                	$num=mysql_num_rows($result);
                	if ($num>0) {
                		while (! ! $row = mysql_fetch_array($result)) {
                			echo "<tr><td>" . $row["id"] . "</td><td>" . $row["zh"] . "</td><td>" . $row["mm"] . "</td><td>" . $row["js"];
                		}
                	}else{
                		echo "no connect.";
                	}
                }
                mysql_close($conn);
                ?>
</table>
</div>
</body>
</html>
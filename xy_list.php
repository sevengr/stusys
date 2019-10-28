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
			var mid = document.getElementById("mid").value;
			if (mid == ""){
				alert("请输入要删除的学院编码。");
				$("#mid").focus();
				return false;
			}else{
				$.post("xy_delete_check.php",{mid:mid},function(data){
					if($.trim(data)=='yes'){
						alert('成功删除！');
						location.reload();
					}else{
						alert('学院编码错误，删除失败！');
						location.reload();
					}
				},"text");
			}
				
		});
	});
	</script>
</head>

<body>
	<div class="row">
		<div class="col-xs-3" style="background-color:#E3F2FD">
			<div align="center">
				<font face="楷体" size=4 color="red">此处输入学院编码删除。</font>
			</div>
				
			<div width="30%" align="center">
				<form  align=left>
					<input type="text" id="mid" class="form-control" placeholder="输入要删除的学院编码">
					<button type="button" class="btn btn-danger" onclick="button_delete()">确认删除(delete)</button>
				</form>
			</div>
		</div>
		
		<div class="col-xs-9">
			
		</div>
	</div>

	<div class="panel panel-info">
	  <!-- Default panel contents -->
	  <div class="panel-heading">学院列表</div>
	
	  <!-- Table -->
	  <table class="table table-bordered">
					<tr>
						<th>学院编码</th>
						<th>学院名称</th>
					</tr>
                <?php
                
                header("Content-type:text/html; charset=utf-8");
                require_once('conn.php');
                
                $sql="select * from xyxxb";
                
                $result=mysql_query($sql);
                if($result){
                	
                	$num=mysql_num_rows($result);
                	if ($num>0) {
                		while (! ! $row = mysql_fetch_array($result)) {
                			echo "<tr><td>" . $row["xybm"] . "</td><td>" . $row["xymc"];
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

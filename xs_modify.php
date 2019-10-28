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
				alert("请输入要修改的学号。");
				$("#mid").focus();
				return false;
			}else{
				$.post("xs_modify_check.php",{mid:mid},function(data){
					if($.trim(data)=='yes'){
						window.location.href='modify.php';
						location.reload();
					}else{
						alert('学号错误，修改失败！');
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
				<font face="楷体" size=4 color="red">此处输入学号。</font>
			</div>
				
			<div width="30%" align="center">
				<form  align=left>
					<input type="text" id="mid" class="form-control" placeholder="输入要修改的学号">
					<button type="button" class="btn btn-danger" onclick="button_delete()">确认修改(delete)</button>
				</form>
			</div>
		</div>
		
		<div class="col-xs-9">
			
		</div>
	</div>

	<div class="panel panel-info">
	  <!-- Default panel contents -->
	  <div class="panel-heading">学生列表</div>
	
	  <!-- Table -->
	  <table class="table table-bordered">
			<tr>
				<th>学号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>出生日期</th>
				<th>政治面貌</th>
				<th>省</th>
				<th>市</th>
				<th>县</th>
				<th>电子邮箱</th>
				<th>联系电话</th>
				<th>家庭地址</th>
				<th>入学年份</th>
				<th>所属学院</th>
				<th>所属系部</th>
				<th>所属专业</th>
				<th>所属班级</th>
				<th>学籍状态</th>
			</tr>
            <?php
                
            header("Content-type:text/html; charset=utf-8");
            require_once('conn.php');
                
            $sql="select * from xsxxb";
                
            $result=mysql_query($sql);
            if($result){
                	
               $num=mysql_num_rows($result);
               if ($num>0) {
               while (! ! $row = mysql_fetch_array($result)) {
               echo "<tr><td>";
               echo  $row["xh"] . "</td><td>";
               echo  $row["xm"] . "</td><td>";
               echo  $row["xb"] . "</td><td>";
               echo  $row["csrq"] . "</td><td>";
               echo  $row["zzmm"] . "</td><td>";
               echo  $row["sheng"] . "</td><td>";
               echo  $row["shi"] . "</td><td>";
               echo  $row["xian"] . "</td><td>";
               echo  $row["dzyx"] . "</td><td>";
               echo  $row["lxdh"] . "</td><td>";
               echo  $row["jtzz"] . "</td><td>";
               echo  $row["rxnf"] . "</td><td>";
               echo  mysql_fetch_array(mysql_query( "select xymc from xyxxb where xybm='".$row["xybm"]."'" ))["xymc"] . "</td><td>";
               echo  mysql_fetch_array(mysql_query( "select xbmc from xbxxb where xbbm='".$row["xbbm"]."'" ))["xbmc"] . "</td><td>";
               echo  mysql_fetch_array(mysql_query( "select zymc from zyxxb where zybm='".$row["zybm"]."'" ))["zymc"] . "</td><td>";
               echo  mysql_fetch_array(mysql_query( "select bjmc from bjxxb where bjbm='".$row["bjbm"]."'" ))["bjmc"] . "</td><td>";
               echo  $row["xjzt"];
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





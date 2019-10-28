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
			var xbbm = document.getElementById("xbbm").value;
			var xbmc = document.getElementById("xbmc").value;
			var xybm = document.getElementById("xybm").value;
			if(xbbm==""){
				alert("请输入系部编码！");
				$("#xbbm").focus();
				return false;
			}else if(xbmc==""){
				alert('请输入系部名称!');
				$("#xbmc").focus();
				return false;
			}else if(xybm==""){
				alert("请输入学院编码！");
				$("#xybm").focus();
				return false;
			}
			else{
				$.post("xb_add_check.php",{xbbm:xbbm,xbmc:xbmc,xybm:xybm},function(data){
					if($.trim(data)=='yes'){
						alert('插入成功！');
						location.reload();
					}else if($.trim(data)=='noxy'){
						alert('插入失败！学院不存在！');
						location.reload();
					}
					else{
						alert('插入失败！系部信息重复！');
						location.reload();
					}
				},"text");
				
			}
		});
	});
	</script>
</head>

<body>
<form action="insertadminLogin.html" name="datas" style="background-color:#81D4FA">
	<font color="red" size="5">您正在添加系部信息！</font>
	
	<!-- 系部编码 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>系部编码：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="xbbm" class="form-control" placeholder="例：01">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 系部名称 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>系部名称：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="xbmc" class="form-control" placeholder="">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 学院编码 -->
	<div class="row" style="width:100%;text-align:center">
	
		<div class="col-xs-3">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffName" class="col-sm-6 control-label"><font face="楷体" size=4>学院编码：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="xybm" class="form-control" placeholder="学院必须存在">
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
	  <div class="panel-heading">系部列表实时查看</div>
	
	  <!-- Table -->
	  <table class="table table-bordered">
			<tr>
				<th>系部编码</th>
				<th>系部名称</th>
				<th>学院编码</th>
			</tr>
            <?php
            require_once('conn.php');
                
            $sql="select * from xbxxb";
                
            $result=mysql_query($sql);
            if($result){
                	
               $num=mysql_num_rows($result);
               if ($num>0) {
               while (! ! $row = mysql_fetch_array($result)) {
               echo "<tr><td>" . $row["xbbm"] . "</td><td>" . $row["xbmc"] . "</td><td>";
               echo  $row["xybm"];
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


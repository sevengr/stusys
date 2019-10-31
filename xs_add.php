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
			var xh = document.getElementById("xh").value;
			var xm = document.getElementById("xm").value;
			var xb = document.getElementById("xb").value;
			var csrq = document.getElementById("csrq").value;
			var zzmm = document.getElementById("zzmm").value;
			var sheng = document.getElementById("sheng").value;
			var shi = document.getElementById("shi").value;
			var xian = document.getElementById("xian").value;
			var dzyx = document.getElementById("dzyx").value;
			var lxdh = document.getElementById("lxdh").value;
			var jtzz = document.getElementById("jtzz").value;
			var rxnf = document.getElementById("rxnf").value;
			var xybm = document.getElementById("xybm").value;
			var xbbm = document.getElementById("xbbm").value;
			var zybm = document.getElementById("zybm").value;
			var bjbm = document.getElementById("bjbm").value;
			var xjzt = document.getElementById("xjzt").value;
			var pattern = new RegExp("[jJ][sS][0-9]{8}");
			if(xh=="" || !pattern.test(xh)){
				alert("请输入学号！");
				$("#xh").focus();
				return false;
			}else if(xm==""){
				alert('请输入姓名!');
				$("#xm").focus();
				return false;
			}else if(xb=="" || !(xb=='男'||xb=='女')){
				alert('请输入性别！性别格式不对，只能为男或女');
				$("#xb").focus();
				return false;
			}else if(sheng==""){
				alert('请输入 省!');
				$("#sheng").focus();
				return false;
			}else if(shi==""){
				alert('请输入 市!');
				$("#shi").focus();
				return false;
			}else if(rxnf==""){
				alert('请输入 入学年份!');
				$("#rxnf").focus();
				return false;
			}else if(xybm==""){
				alert('请输入学院编码!');
				$("#xybm").focus();
				return false;
			}else if(xbbm==""){
				alert('请输入系部编码!');
				$("#xbbm").focus();
				return false;
			}else if(zybm==""){
				alert('请输入专业编码!');
				$("#zybm").focus();
				return false;
			}else if(bjbm==""){
				alert('请输入班级编码!');
				$("#bjbm").focus();
				return false;
			}else if(xjzt==""){
				alert('请输入学籍状态!');
				$("#xjzt").focus();
				return false;
			}
			else{
				$.post("xs_add_check.php",{xh:xh,xm:xm,xb:xb,csrq:csrq,zzmm:zzmm,sheng:sheng,shi:shi,xian:xian,dzyx:dzyx,lxdh:lxdh,jtzz:jtzz,rxnf:rxnf,xybm:xybm,xbbm:xbbm,zybm:zybm,bjbm:bjbm,xjzt:xjzt},function(data){
					if($.trim(data)=='yes'){
						alert('插入成功！');
						location.reload();
					}else if($.trim(data)=='noxy'){
						alert('插入失败！学院不存在！');
					}else if($.trim(data)=='noxb'){
						alert('插入失败！系部不存在！');
					}else if($.trim(data)=='nozy'){
						alert('插入失败！专业不存在！');
					}else if($.trim(data)=='nobj'){
						alert('插入失败！班级不存在！');
					}else{
						alert('插入失败！学生学号重复！');
					}
				},"text");
				
			}
		});
	});
	</script>
</head>

<body>
<form name="datas" style="background-color:#81D4FA">
	<font color="red" size="5">您正在添加学生信息！</font>
	
	<!-- 学号 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>学号：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="xh" class="form-control" placeholder="必填">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 姓名 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>姓名：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="xm" class="form-control" placeholder="必填">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 性别 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>性别：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="xb" class="form-control" placeholder="必填">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 出生日期 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>出生日期：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="csrq" class="form-control" placeholder="">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 政治面貌 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>政治面貌：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="zzmm" class="form-control" placeholder="">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 省 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>省：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="sheng" class="form-control"  placeholder="必填">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 市 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>市：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="shi" class="form-control"  placeholder="必填">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 县 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>县：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="xian" class="form-control" placeholder="">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 电子邮箱 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>电子邮箱：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="dzyx" class="form-control" placeholder="">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 联系电话 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>联系电话：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="lxdh" class="form-control" placeholder="">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>

	<!-- 家庭住址 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>家庭住址：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="jtzz" class="form-control" placeholder="">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 入学年份 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>入学年份：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="rxnf" class="form-control" placeholder="必填">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 所属学院 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>所属学院：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="xybm" class="form-control" placeholder="必填">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 所属系部 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>所属系部：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="xbbm" class="form-control" placeholder="必填">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 所属专业 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>所属专业：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="zybm" class="form-control" placeholder="必填">
				    </div>
			  	</div>
			</div>
		</div>
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 所属班级 -->
	<div class="row" style="width:100%;text-align:center">
	
		<div class="col-xs-3">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffName" class="col-sm-6 control-label"><font face="楷体" size=4>所属班级：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="bjbm" class="form-control" placeholder="必填">
				    </div>
			  	</div>
			</div>
		</div>
		
		<div class="col-xs-5">
		</div>
	</div>
	
	<!-- 学籍状态 -->
	<div class="row" style="width:100%;text-align:center">
	
		<div class="col-xs-3">
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				    <label for="staffName" class="col-sm-6 control-label"><font face="楷体" size=4>学籍状态：</font></label>
				    <div class="col-sm-6">
				      <input type="text" id="xjzt" class="form-control" placeholder="必填">
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
	  <div class="panel-heading">学生列表实时预览</div>
	
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
               echo  $row["xybm"] . "</td><td>";
               echo  $row["xbbm"] . "</td><td>";
               echo  $row["zybm"] . "</td><td>";
               echo  $row["bjbm"] . "</td><td>";
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


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
			if(xh==""){
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
				$.post("xs_update_modify.php",{xh:xh,xm:xm,xb:xb,csrq:csrq,zzmm:zzmm,sheng:sheng,shi:shi,xian:xian,dzyx:dzyx,lxdh:lxdh,jtzz:jtzz,rxnf:rxnf,xybm:xybm,xbbm:xbbm,zybm:zybm,bjbm:bjbm,xjzt:xjzt},function(data){
					if($.trim(data)=='yes'){
						alert('修改成功！');
						window.location.replace("xs_modify.php");
					}else if($.trim(data)=='noxy'){
						alert('修改失败！学院不存在！');
						window.location.replace("xs_modify.php");
					}else if($.trim(data)=='noxb'){
						alert('修改失败！系部不存在！');
						window.location.replace("xs_modify.php");
					}else if($.trim(data)=='nozy'){
						alert('修改失败！专业不存在！');
						window.location.replace("xs_modify.php");
					}else if($.trim(data)=='nobj'){
						alert('修改失败！班级不存在！');
						window.location.replace("xs_modify.php");
					}else{
						alert('修改失败！学生学号重复！');
						window.location.replace("xs_modify.php");
					}
				},"text");
				
			}
		});
	});
	</script>
</head>
<body>
<?php
require_once('session.php');
require_once('conn.php');

  
    
   $admin_xh = $_GET['mid'];
   $sql= mysql_query("select * from xsxxb  where xh='$admin_xh'");
   $num=mysql_num_rows($sql);
   if ($num<=0){
       mysql_close($conn);
       echo "ERROR 学生信息不存在！";
       return;
   }
    $sql_arr = mysql_fetch_assoc($sql); 
    mysql_close($conn);
    
?>
<form name="datas" style="background-color:#81D4FA">
	<font color="red" size="5">您正在修改学生信息！</font>
	  
	<!-- 学号 -->
	<div class="row" style="width:100%;text-align:center">
		<div class="col-xs-3" align="left" >
		</div>
		
		<div class="col-xs-4 form-horizontal">
			<div class="panel-body form-horizontal">
				<div class="form-group form-horizontal">
				  <label for="staffId" class="col-sm-6 control-label"><font face="楷体" size=4>学号：</font></label> 
				    <div class="col-sm-6">
				      <input type="text" id="xh" name="xh" class="form-control" placeholder=""  disabled="disabled" value="<?php echo $sql_arr['xh']?>" />
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
				      <input type="text" id="xm" name="xm"  class="form-control" placeholder="必填" value="<?php echo $sql_arr['xm']?>" />
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
				      <input type="text" id="xb" name="xb" class="form-control" placeholder="必填" value="<?php echo $sql_arr['xb']?>" />
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
				      <input type="text" id="csrq" name="csrq"  class="form-control" placeholder="" value="<?php echo $sql_arr['csrq']?>" />
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
				      <input type="text" id="zzmm" name="zzmm"  class="form-control" placeholder="" value="<?php echo $sql_arr['zzmm']?>" />
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
				      <input type="text" id="sheng" name="sheng" class="form-control" placeholder="" value="<?php echo $sql_arr['sheng']?>" />
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
				      <input type="text" id="shi" name="shi" class="form-control" placeholder="" value="<?php echo $sql_arr['shi']?>" />
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
				      <input type="text" id="xian" name="xian"  class="form-control" placeholder="" value="<?php echo $sql_arr['xian']?>" />
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
				      <input type="text" id="dzyx" name="dzyx"  class="form-control" placeholder="" value="<?php echo $sql_arr['dzyx']?>" />
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
				      <input type="text" id="lxdh" name="lxdh"  class="form-control" placeholder="" value="<?php echo $sql_arr['lxdh']?>" />
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
				      <input type="text" id="jtzz" name="jtzz"  class="form-control" placeholder="" value="<?php echo $sql_arr['jtzz']?>" />
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
				      <input type="text" id="rxnf" name="rxnf"  class="form-control" placeholder="必填" value="<?php echo $sql_arr['rxnf']?>" />
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
				      <input type="text" id="xybm" name="xybm" class="form-control" placeholder="必填" value="<?php echo $sql_arr['xybm']?>" />
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
				      <input type="text" id="xbbm" name="xbbm" class="form-control" placeholder="必填" value="<?php echo $sql_arr['xbbm']?>" />
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
				      <input type="text" id="zybm" name="zybm"  class="form-control" placeholder="必填" value="<?php echo $sql_arr['zybm']?>" />
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
				      <input type="text" id="bjbm" name="bjbm"  class="form-control" placeholder="必填" value="<?php echo $sql_arr['bjbm']?>" />
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
				      <input type="text" id="xjzt" name="xjzt" class="form-control" placeholder="必填" value="<?php echo $sql_arr['xjzt']?>" />
				    </div>
			  	</div>
			</div>
		</div>
		
		<div class="col-xs-5">
		<button class="btn btn-warning" name="insert" onclick="button_insert()">确认修改<span style="padding:0 2px;"></span>(sure)</button>
		</div>
	</div>
</form>

</body>
</html>


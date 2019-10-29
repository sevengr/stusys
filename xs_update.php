<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生基本信息管理系统</title>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script type="text/javascript" src="jquery-1.12.1.min.js"></script>
	<script type="text/javascript"></script>
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
<form action="xs_update_modify.php" name="datas" style="background-color:#81D4FA" method="post">
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
				      <input type="text" id="xh" name="xh" class="form-control" placeholder="必填"  value="<?php echo $sql_arr['xh']?>" />
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
		<button type="submit" class="btn btn-warning" name="insert" onclick="button_insert()">确认修改<span style="padding:0 2px;"></span>(sure)</button>
		</div>
	</div>
</form>

</body>
</html>


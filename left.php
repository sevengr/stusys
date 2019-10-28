<?php require_once('session.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生基本信息管理系统</title>
<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
<script type="text/javascript" src="js/logout.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".bclass").click(function(){
		$(this).next().slideToggle("fast");
	});
});
</script>
<style type="text/css">
* {
	margin: 0px;
	padding: 0px;
}
a {
	text-decoration: none;
	color: #FFF;
}
body {
	background: #159BDB;
}
.main {
	min-height: 400px;
	height: auto;
	background: #159BDB;
	padding-top: 10px;
	padding-bottom: 20px;
}
.main .cattitle {
	height: 40px;
	text-align: center;
	line-height: 40px;
	width: 95%;
	color: #FFF;
	font-weight: bold;
	margin: 0 auto;
	background: #1284BA;
}
.main .menu {
	width: 95%;
	margin: 0 auto;
}
.main .menu .bclass {
	height: 28px;
	line-height: 28px;
	color: #FFF;
	font-weight: 500;
	padding-left: 40px;
	font-size: 14px;
	background: url(images/row-r.png) 20px center no-repeat;
	cursor: default;
}
.main .menu .sclass {
	display: none;
}
.main .menu .sclass a {
	display: block;
	height: 26px;
	line-height: 26px;
	padding-left: 40px;
	font-size: 14px;
	color: #1A237E;
	background:url(images/row-d.png) 30px center no-repeat;
}
.main .menu .sclass a:hover {
	background:#1284BA url(images/row-dh.png) 30px center no-repeat;
}
</style>
</head>
<body>
<div class="main">
	<div class="cattitle">系统菜单</div>
	<div class="menu">
		<div class="bclass">
        	<a href="right.php" target="right">首页</a>
        </div>
	</div>
    <?php if($_SESSION['js']=='0'){?>
	<div class="menu">
		<div class="bclass">管理员信息维护</div>
		<div class="sclass"> 
        	<a href="gly_add.php" target="right">添加管理员</a> 
            <a href="gly_list.php" target="right">管理员列表</a> 
        </div>
	</div>
    <?php }?>
	<div class="menu">
    	<div class="bclass">学院信息维护</div>
    	<div class="sclass">
        	<a href="xy_add.php" target="right">添加学院</a> 
            <a href="xy_list.php" target="right">学院列表</a> 
        </div>
  	</div>
  	<div class="menu">
		<div class="bclass">系部信息维护</div>
    	<div class="sclass"> 
        	<a href="xb_add.php" target="right">添加系部</a> 
            <a href="xb_list.php" target="right">系部列表</a>
         </div>
  	</div>
  	<div class="menu">
    	<div class="bclass">专业信息维护</div>
    	<div class="sclass"> 
        	<a href="zy_add.php" target="right">添加专业</a> 
            <a href="zy_list.php" target="right">专业列表</a>
        </div>
  	</div>
  	<div class="menu">
    	<div class="bclass">班级信息维护</div>
    	<div class="sclass"> 
        	<a href="bj_add.php" target="right">添加班级</a> 
            <a href="bj_list.php" target="right">班级列表</a>
        </div>
  	</div>
  	<div class="menu">
    	<div class="bclass">学生信息维护</div>
    	<div class="sclass"> 
        	<a href="xs_add.php" target="right">添加学生</a>
        	<a href="xs_modify.php" target="right">修改学生信息</a>
            <a href="xs_list.php" target="right">学生列表</a> 
        </div>
  	</div>
	<div class="menu">
		<div class="bclass">学生信息统计</div>
    	<div class="sclass"> 
        	<a href="tj_xx.php" target="right">学校招生走势图</a> 
            <a href="tj_xy.php" target="right">二级学院招生情况</a> 
            <a href="tj_syd.php" target="right">生源分布情况</a> 
        </div>
  	</div>
  	<div class="menu">
    	<div class="bclass">
        	<a href="login.html" id="logout" target="all">退出</a>
        </div>
  	</div>
</div>
</body>
</html>

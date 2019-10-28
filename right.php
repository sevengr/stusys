<script type="text/javascript">

function displayTime(){
	var timeDiv=document.getElementById("timeDiv");
	var nowTime=new Date();
	var strNowTime=nowTime.toLocaleString();
	timeDiv.innerHTML=strNowTime;
}

//每隔1秒调用一次displayTime函数

function start(){
	window.setInterval("displayTime()",1000)//单位是毫秒
}
</script>
<style type="text/css">
* {
	text-align: center;
}
.main .menu {
	width: 100%;
}
</style>

<div class="menu" style="width:100%">
	<?php
		session_start();
		error_reporting(0);
		if ($_SESSION['js'] == '0'){
			echo "管理员：";
		}else{
			echo "学生：";
		}
		echo $_SESSION['user'];
		echo "！    ";
		echo "欢迎您来到金审学院学生信息管理系统！";
		echo '<br>';
		echo '<br>';?>
</div>

<div class="row" style="width:100%;text-align:center">
	<div class="col-xs-3">
	</div>
	
	<div class="col-xs-4 form-horizontal">
		<img src="http://zt.gaoxiaojob.com/njsjdxjsxy1801.jpg" style="max-height: 780px;" />
	</div>
	<div class="col-xs-5">
	</div>
</div>

<body onload="start();">
<div id="timeDiv" class="menu" style="width:100%">
	
</div></body>

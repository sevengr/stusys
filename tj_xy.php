<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生基本信息管理系统</title>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
	<div class="panel panel-info">
	  <!-- Default panel contents -->
	  <div class="panel-heading">各系各班招生情况</div>
	
	  <!-- Table1 -->
	  <table class="table table-bordered">
			<tr>
				<th>学院名称</th>
				<th>系部名称</th>
				<th>专业名称</th>
				<th>班级名称</th>
				<th>统计人数</th>
			</tr>
            <?php
                
            header("Content-type:text/html; charset=utf-8");
            require_once('conn.php');
                
            $sql="select xybm,xbbm,zybm,bjbm,COUNT(xh) as total from xsxxb GROUP BY xybm,xbbm,zybm,bjbm";
                
            $result=mysql_query($sql);
            if($result){
                	
               $num=mysql_num_rows($result);
               if ($num>0) {
               while (! ! $row = mysql_fetch_array($result)) {
               echo "<tr><td>" . mysql_fetch_array(mysql_query( "select xymc from xyxxb where xybm='".$row["xybm"]."'" ))["xymc"];
               echo "</td><td>" . mysql_fetch_array(mysql_query( "select xbmc from xbxxb where xbbm='".$row["xbbm"]."'" ))["xbmc"];
               echo "</td><td>" . mysql_fetch_array(mysql_query( "select zymc from zyxxb where zybm='".$row["zybm"]."'" ))["zymc"];
               echo "</td><td>" . mysql_fetch_array(mysql_query( "select bjmc from bjxxb where bjbm='".$row["bjbm"]."'" ))["bjmc"];
               echo "</td><td>" . $row["total"];
               }
               }else{
                echo "no connect.";
               }
            }
            ?>
	</table>
	</div>
	<br>
	
	<div class="panel panel-info">
	  <!-- Default panel contents -->
	  <div class="panel-heading">各班男女分布比例</div>
	
	  <!-- Table2 -->
	  <table class="table table-bordered">
			<tr>
				<th>班级名称</th>
				<th>性别</th>
				<th>人数</th>
			</tr>
            <?php
                
            $sql="select bjbm,xb,COUNT(xh) as total from xsxxb GROUP BY bjbm,xb";
                
            $result=mysql_query($sql);
            if($result){
                	
               $num=mysql_num_rows($result);
               if ($num>0) {
               while (! ! $row = mysql_fetch_array($result)) {
               echo "</tr><td>" . mysql_fetch_array(mysql_query( "select bjmc from bjxxb where bjbm='".$row["bjbm"]."'" ))["bjmc"];
               echo "</td><td>" . $row["xb"];
               echo "</td><td>" . $row["total"];
               }
               }else{
                echo "no connect.";
               }
            }
            ?>
	</table>
	</div>
	
	<br>
	
	<div class="panel panel-info">
	  <!-- Default panel contents -->
	  <div class="panel-heading">各年级总人数分布</div>
	
	  <!-- Table3 -->
	  <table class="table table-bordered">
			<tr>
				<th>年级</th>
				<th>总人数</th>
			</tr>
            <?php
                
            $sql="select rxnf,count(xh) as total from xsxxb GROUP BY rxnf";
                
            $result=mysql_query($sql);
            if($result){
                	
               $num=mysql_num_rows($result);
               if ($num>0) {
               while (! ! $row = mysql_fetch_array($result)) {
               echo "</tr><td>" . $row["rxnf"];
               echo "</td><td>" . $row["total"];
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




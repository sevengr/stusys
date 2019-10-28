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
	  <div class="panel-heading">生源地招生情况</div>
	
	  <!-- Table -->
	  <table class="table table-bordered">
			<tr>
				<th>省</th>
				<th>市</th>
				<th>招生总人数</th>
			</tr>
            <?php
                
            header("Content-type:text/html; charset=utf-8");
            require_once('conn.php');
                
            $sql="select sheng,shi,COUNT(xh) as total from xsxxb GROUP BY sheng,shi";
                
            $result=mysql_query($sql);
            if($result){
                	
               $num=mysql_num_rows($result);
               if ($num>0) {
               while (! ! $row = mysql_fetch_array($result)) {
               echo "<tr><td>" . $row["sheng"];
               echo "</td><td>" . $row["shi"];
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




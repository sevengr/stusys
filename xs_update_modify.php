<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once ('conn.php');
$xh = $_POST['xh'];
$xm = $_POST['xm'];
$xb = $_POST['xb'];
$csrq = $_POST['csrq'];
$zzmm = $_POST['zzmm'];
$sheng = $_POST['sheng'];
$shi = $_POST['shi'];
$xian = $_POST['xian'];
$dzyx = $_POST['dzyx'];
$lxdh = $_POST['lxdh'];
$jtzz = $_POST['jtzz'];
$rxnf = $_POST['rxnf'];
$ssxy = $_POST['xybm'];
$ssxb = $_POST['xbbm'];
$sszy = $_POST['zybm'];
$ssbj = $_POST['bjbm'];
$xjzt = $_POST['xjzt'];

$sql = "update xsxxb set xm='".$xm."',xb='".$xb."',csrq='".$csrq."',zzmm='".$zzmm."',sheng='".$sheng."',shi='".$shi."',xian='".$xian."',dzyx='".$dzyx."',lxdh='".$lxdh."',jtzz='".$jtzz."',rxnf='".$rxnf."',xybm='".$ssxy."',xbbm='".$ssxb."',zybm='".$sszy."',bjbm='".$ssbj."',xjzt='".$xjzt."' where xh='".$xh."'";
$sqlxy ="select * from xyxxb where xybm='".$ssxy."'";
$sqlxb ="select * from xbxxb where xbbm='".$ssxb."'";
$sqlzy ="select * from zyxxb where zybm='".$sszy."'";
$sqlbj ="select * from bjxxb where bjbm='".$ssbj."'";

$resultxy =mysql_query($sqlxy);
$numxy =mysql_num_rows($resultxy);

$resultxb =mysql_query($sqlxb);
$numxb =mysql_num_rows($resultxb);

$resultzy =mysql_query($sqlzy);
$numzy =mysql_num_rows($resultzy);

$resultbj =mysql_query($sqlbj);
$numbj =mysql_num_rows($resultbj);

if($numxy>0){
	if($numxb>0){
		if($numzy>0){
			if($numbj>0){
				$result = mysql_query($sql);
				if ($result) {
					echo "yes";
				} else {
					echo "no";
				}
			}else{
				echo "nobj";
			}
		}else{
			echo "nozy";
		}
	}else{
		echo "noxb";
	}
}else{
	echo "noxy";
}


mysql_close($conn);
?>

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

$sql = "insert into xsxxb(xh,xm,xb,csrq,zzmm,sheng,shi,xian,dzyx,lxdh,jtzz,rxnf,xybm,xbbm,zybm,bjbm,xjzt) values('" . $xh . "','" . $xm . "','" . $xb . "','" . $csrq . "','" . $zzmm . "','" . $sheng . "','" . $shi . "','" . $xian . "','" . $dzyx . "','" . $lxdh . "','" . $jtzz . "','" . $rxnf . "','" . $ssxy . "','" . $ssxb . "','" . $sszy . "','" . $ssbj . "','" . $xjzt . "')";
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
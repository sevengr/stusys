<?php
require_once ('session.php');
require_once ('conn.php');
mysql_query("set names 'utf8'");

$admin_xm = $_POST['xm'];
$admin_xb = $_POST['xb'];
$admin_csrq = $_POST['csrq'];
$admin_zzmm = $_POST['zzmm'];
$admin_sheng = $_POST['sheng'];
$admin_shi = $_POST['shi'];
$admin_xian = $_POST['xian'];
$admin_dzyx = $_POST['dzyx'];
$admin_lxdh = $_POST['lxdh'];
$admin_jtzz = $_POST['jtzz'];
$admin_rxnf = $_POST['rxnf'];
$admin_xybm = $_POST['xybm'];
$admin_xbbm = $_POST['xbbm'];
$admin_zybm = $_POST['zybm'];
$admin_bjbm = $_POST['bjbm'];
$admin_xjzt = $_POST['xjzt'];

if ($admin_xb=='' || !($admin_xb=='男'||$admin_xb=='女')){
	echo "性别格式错误！只能为男或女！";
	return;
}

if ($admin_xm==''){
	echo "姓名不能为空！";
	return;
}

if ($admin_sheng==''){
	echo "省不能为空！";
	return;
}

if ($admin_shi==''){
	echo "市不能为空！";
	return;
}

if ($admin_xybm==''){
	echo "学院编码不能为空！";
	return;
}

if ($admin_xbbm==''){
	echo "系部编码不能为空！";
	return;
}

if ($admin_zybm==''){
	echo "专业编码不能为空！";
	return;
}

if ($admin_bjbm==''){
	echo "班级编码不能为空！";
	return;
}

$res = mysql_query("update xsxxb set xm='$admin_xm',xb='$admin_xb',csrq='$admin_csrq',zzmm='$admin_zzmm',sheng='$admin_sheng',shi='$admin_shi',xian='$admin_xian',dzyx='$admin_dzyx',lxdh='$admin_lxdh',jtzz='$admin_jtzz',rxnf='$admin_rxnf',xybm='$admin_xybm',xbbm='$admin_xbbm',zybm='$admin_zybm',bjbm='$admin_bjbm',xjzt='$admin_xjzt' where xh='$admin_xh'");

if ($res != null) {
    
   
    $url="xs_modify.php";
    header("refresh:1;$url");  
} else {
    return;
}

// 将数组$arr转换成json格式后输出
// echo json_encode($arr);
mysql_close($conn);
?>

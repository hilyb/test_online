<?php
/**
* User: liyubing
* Date: 2018/4/21
* 在线考试系统首页
*/
session_start();
//error_reporting(0);
header("Content-type:text/html;charset=utf-8");
$data=require "./data/data.php";
include "common/connection.php";

/*=============获取客户端ip函数===============*/
function getIP() 
{ 
global $ip; 

if (getenv("HTTP_CLIENT_IP")) 
$ip = getenv("HTTP_CLIENT_IP"); 
else if(getenv("HTTP_X_FORWARDED_FOR")) 
$ip = getenv("HTTP_X_FORWARDED_FOR"); 
else if(getenv("REMOTE_ADDR")) 
$ip = getenv("REMOTE_ADDR"); 
else 
$ip = "Unknow"; 

return $ip; 
} 
/*===========================================*/



$title = $data['title'];
$time = $data['timeout']/60;
//$ip = $_SERVER["REMOTE_ADDR"];
$ip = getIP();
$_SESSION['ip'] = $ip;

$res1 = mysqli_query($conn,"select * from score where ip_addr = '$ip'");
//$ip一定要加单引号，不然报sql语句执行错误！

if(mysqli_num_rows($res1) > 0){
	echo "<script>alert('你已经参加过测验！');</script>";
	echo '<br/><br/><br/><br/><br/><br/><p style="font-size:70px;text-align:center;">你已经参加过测验，请退出！</p>';
	
}else{
	unset($data);

	//引入HTML模板
	require './view/index.html';
}
?>
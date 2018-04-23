<?php
/**
 * User: liyubing
 * Date: 2018/4/21
 * 考题分数统计
 */
session_start();
//error_reporting(E_ALL ^ E_NOTICE);
//error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-type:text/html;charset=utf-8");
$data=require "./data/data.php";

$studentid = $_SESSION['studentid'];
$name = $_SESSION['name'];
$ip = $_SESSION['ip'];
$arr_judge = $_SESSION['arr_judge'];
$arr_choice = $_SESSION['arr_choice'];
$arr_blank = $_SESSION['arr_blank'];

$t_time = $_SESSION['t_time'];
$q_time = date("Y-m-d H:i:s",strtotime(now));
//$q_time = now();
$_SESSION['q_time'] = $q_time;

/*
$judge[] = $_POST["judge[]"];
$choice[] = $_POST["choice[]"];
$blank[] = $_POST["blank[]"];
*/

//开始阅卷操作
$sum1 = 0;               //保存得分
$sum2 = 0;
$sum3 = 0;


for($i=0;$i<count($arr_judge);$i++){
	$judge[$i] = $_POST['judge'][$i];
	//$answer1 = isset($_POST['judge'][$i])?$_POST['judge'][$i] : '';
	if($judge[$i] == $data['data']['judge']['data']["$arr_judge[$i]"]['answer']){	
		$sum1 = $sum1 + 1;
	}
}
$sum1 = $sum1*($data['data']['judge']['score']);
for($j=0;$j<count($arr_choice);$j++){
	$choice[$j] = $_POST['choice'][$j];
	/*
	switch($data['data']['choice']['data']["$arr_choice[$j]"]['answer']){
		case "A":$answer = $data['data']['choice']['data']["$arr_choice[$j]"]['option'][0];break;
		case "B":$answer = $data['data']['choice']['data']["$arr_choice[$j]"]['option'][1];break;
		case "C":$answer = $data['data']['choice']['data']["$arr_choice[$j]"]['option'][2];break;
		case "D":$answer = $data['data']['choice']['data']["$arr_choice[$j]"]['option'][3];break;
	}
	*/
	if($choice[$j] == $data['data']['choice']['data']["$arr_choice[$j]"]['answer']){	
		$sum2 = $sum2 + 1;
	}
}
$sum2 = $sum2*($data['data']['choice']['score']);
for($k=0;$k<count($arr_blank);$k++){
	$blank[$k] = $_POST['blank'][$k];

	if($blank[$k] == $data['data']['blank']['data']["$arr_blank[$k]"]['answer']){	
		$sum3 = $sum3 + 1;
	}
}
$sum3 = $sum3*($data['data']['blank']['score']);
$sum = $sum1 + $sum2 +$sum3;

$_SESSION['sum'] = $sum;

//var_dump($total);
require './view/total.html';
?>
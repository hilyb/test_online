<?php
/**
 * User: liyubing
 * Date: 2018/4/21
 * 在线答题考试功能处理
 */
//error_reporting(E_ALL ^ E_NOTICE);
session_start();
header("Content-type:text/html;charset=utf-8");
$data=require "./data/data.php";

$studentid = $_POST['studentid'];
$name = $_POST['name'];
$_SESSION['studentid'] = $studentid;
$_SESSION['name'] = $name;
$t_time = date("Y-m-d H:i:s",strtotime(now));
//$t_time = now();
$_SESSION['t_time'] = $t_time;

//if(empty($_SESSION['arr_judge'])){
//随机排序
/*================================判断题=======================================*/
//17道题中随机选取10道，没有必选题
$arr_judge1=array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17");
//从题中随机取值10道下标，注意只是下标不是值！
$arr_judge2=array_rand($arr_judge1,10);
//把$arr_choice3的下标换成值
for($j=0;$j<10;$j++){
	$arr_judge[$j]=$arr_judge1[$arr_judge2[$j]];
}
//shuffle 将数组顺序随机打乱 
shuffle ($arr_judge);

$_SESSION['arr_judge'] = $arr_judge;
//$_SESSION['answer_judge'] = $answer_judge;
//}

/*================================选择题=======================================*/
//if(empty($_SESSION['arr_choice'])){
//必选题9道
$arr_choice1=array("1","3","6","9","12","16","19","23","26");
//随机选题18道
$arr_choice2=array("2","4","5","7","8","10","11","13","14","15","17","18","20","21","22","24","25","27");
//从剩下题中随机取值11道下标，注意只是下标不是值！
$arr_choice3=array_rand($arr_choice2,11);
//把$arr_choice3的下标换成值
for($i=0;$i<11;$i++){
	$arr_choice3[$i]=$arr_choice2[$arr_choice3[$i]];
}
//合并数组
$arr_choice = array_merge($arr_choice1,$arr_choice3);
//将最终数组$arr_choice随机打乱 
shuffle ($arr_choice);

$_SESSION['arr_choice'] = $arr_choice;
//$_SESSION['answer_choice'] = $answer_choice;
//}

/*================================填空题=======================================*/
//if(empty($_SESSION['arr_blank'])){
//必选题8道
$arr_blank1=array("1","2","5","8","9","10","11","12");
//随机选题4道
$arr_blank2=array("3","4","6","7");
//从剩下题中随机取值2道下标，注意只是下标不是值！
$arr_blank3=array_rand($arr_blank2,2);
//把$arr_choice3的下标换成值
for($j=0;$j<2;$j++){
	$arr_blank3[$j]=$arr_blank2[$arr_blank3[$j]];
}
//合并数组
$arr_blank = array_merge($arr_blank1,$arr_blank3);
//将最终数组$arr_choice随机打乱 
shuffle ($arr_blank);

$_SESSION['arr_blank'] = $arr_blank;
//$_SESSION['answer_blank'] = $answer_blank;
//}

/*================================END=======================================*/

//引入答题页模板
require './view/test.html';
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>    
<meta name="apple-mobile-web-app-capable" content="yes" />    
<meta name="format-detection" content="telephone=no" /> 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>微课堂·成绩查询</title>
</head>
 
<body>
<!--
	数据库查询
	date:2018.04.22
	auther:liyubing
-->
<form id="form" name="form" action="admin.php" method="post" font-size="20px">
	<label for="name">输入学号</label>
    ：
	<input type="text" name="studentid" style="height:20px" id="studentid"/>
    <input type="submit" name="button" id="button" style="font-size:15px" value="删除该学生成绩"/>
</form>

<p style="text-align:center">成绩查询</p>
<hr >
<table border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="200">序号</td>
    <td width="200">学号</td>
    <td width="200">姓名</td>
    <td width="200">分数</td>

  </tr>
<?php
//error_reporting(0);
include "common/connection.php";
$studentid = "";

if(!empty($_POST) && $_POST['studentid']!=NULL)
{
	$studentid= $_POST['studentid'];
	$rs1 = mysqli_query($conn,"delete from score where studentid=$studentid");
	if($rs1)
		echo "<script>alert('删除成功！请关闭该页面重新打开！');</script>";
}

$rs = mysqli_query($conn,"select * from score");
  
  //传值
  while ($res = mysqli_fetch_array($rs))
  {
    echo " <tr>
    <td>{$res['id']}</td>
    <td>{$res['studentid']}</td>
    <td>{$res['name']}</td>
    <td>{$res['score']}</td>

  </tr>";
  }


  ?>
</table>
 
</body>
<br/>
<div id="footer" style="text-align:center;bottom:0;width:100%;">
@小金橙微课堂在线测验系统
</div>
</html>
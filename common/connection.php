<?php
/**
* User: liyubing
* Date: 2018/4/21
* 数据库连接文件
*/
$servername = "localhost";//数据库地址
$username = "root";//数据库用户
$password = "root";//数据库密码
$dbname = "test";//数据库名

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
?>
<?php
header("Content-type: text/html; charset=utf-8"); // 设置字符集
session_start(); // 开启session
include('dbconfig.php');// 引入配置文件
$link = @mysqli_connect(HOST, USER, PASS) or exit(json_encode('fail'));// 连接数据库
mysqli_select_db($link, DBNAME);// 选择数据库
mysqli_set_charset($link, 'utf8');// 设置字符集

if (!isset($_SESSION['admin_user'])) {
    echo "<script>window.location.href='login.html'</script>";
    exit;
}
$name = $_POST['username'];
$title = $_POST['title'];
$content = $_POST['content'];
$sql = "insert into messages( `title`, `content`, `name`) values('$title', '$content','$name')";
//import database

$result = mysqli_query($link, $sql);
if ($result) {
    echo "<script>alert('Successfully published');window.location.href='messagelist.php'</script>";
    exit;
} else {
    echo "<script>alert('Publishing failed');window.history.go(-1)</script>";
    exit;
}

//关闭数据库 释放结果集
mysqli_close($link);
@mysqli_free_result($result);
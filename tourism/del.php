<?php
header("Content-type: text/html; charset=utf-8"); // 设置字符集
session_start(); // session start
include('dbconfig.php');// 引入配置文件
$link = @mysqli_connect(HOST, USER, PASS) or exit(json_encode('Database connection failed'));// 连接数据库
mysqli_select_db($link, DBNAME);// 选择数据库
mysqli_set_charset($link, 'utf8');// 设置字符集

if (!isset($_SESSION['admin_user'])) {
    echo "<script>window.location.href='login.html'</script>";
    exit;
}
$id = $_GET['id'];


$sql = "delete from  messages where id=" . $id;//delect comment
$result = mysqli_query($link, $sql);
if ($result) {
    echo "<script>alert('Delete successful');window.location.href='messagelist.php'</script>";
    exit;
} else {
    echo "<script>alert('Delete failed');window.history.go(-1)</script>";
    exit;
}

//关闭数据库 释放结果集
mysqli_close($link);
@mysqli_free_result($result);
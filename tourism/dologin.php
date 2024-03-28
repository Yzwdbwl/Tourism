<?php
header("Content-type: text/html; charset=utf-8");//设置字符集
session_start();//开启session
include('dbconfig.php');
$link = @mysqli_connect(HOST, USER, PASS) or die('Database connection failed');
mysqli_select_db($link, DBNAME);
mysqli_set_charset($link, 'utf8');

if ($_GET['a'] == 'login') {
    //Receive pass value
    $name = $_POST['name'];
    $pass = $_POST['password'];

    //Verify the account password in the database
    $sql = "select * from users where name='{$name}'";
    $result = mysqli_query($link, $sql);
    if ($result && mysqli_num_rows($result) > 0) {//user 
        $row = mysqli_fetch_assoc($result);
        if ($pass != $row['password']) {//Judgment code
            echo "<script>alert('Password error, please re-enter！');location.href='login.html'</script>";
            exit;
        }
        //After the login is successful, set the user session and redirect to the home page
        $_SESSION['admin_user'] = $row;
        echo "<script>location.href='index.php'</script>";
    } else {//no user
        echo "<script>alert('Account does not exist, please re-enter！');location.href='login.html'</script>";
        exit;
    }

} else if ($_GET['a'] == 'zhuce') {
    //Receive pass value
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $surepass = $_POST['password2'];
    if ($pass != $surepass) {
        echo "<script>alert('The two passwords do not match, please re-enter！');location.href='register.html'</script>";
        exit;
    }

    //Password match verification
    $nameSql = "select id from users where name='{$name}'";
    mysqli_query($link, $nameSql);
    if (mysqli_affected_rows($link) > 0) {
        echo "<script>alert('The account has been registered, please re-enter！');location.href='register.html'</script>";
        exit;
    }
    //User name unique verification
    $sql = "insert into users(name, password) values('$name','$pass')";
    $result = mysqli_query($link, $sql);
    if (mysqli_insert_id($link) > 0) {
        echo "<script>alert('login was successful!');location.href='login.html'</script>";
    } else {
        echo "<script>alert('login has failed!');location.href='register.html'</script>";
        exit;
    }
} else if ($_GET['a'] == 'logout') {
    unset($_SESSION['admin_user']);
    echo "<script>window.location.href='index.php'</script>";
    exit;
}

//关闭数据库 释放结果集
mysqli_close($link);
@mysqli_free_result($result);
<?php
session_start(); // 开启session
if (!isset($_SESSION['admin_user'])) {
    echo "<script>alert('please log in first');window.location.href='login.html'</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/style.css">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Message list</title>
    <meta name="keywords" content="travel, tours"/>
    <meta name="description" content="This is a travel website."/>

    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/contentslider.css"/>

    <script type="text/javascript" src="scripts/contentslider.js">


    </script>

    <link rel="stylesheet" type="text/css" href="css/gallery_slider.css"/>

    <script language="javascript" type="text/javascript" src="scripts/mootools-1.2.1-core.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/slideitmoo-1.1.js"></script>
    <script language="javascript" type="text/javascript">
        window.addEvents({
            'domready': function () {
                /* thumbnails example , div containers */
                new SlideItMoo({
                    overallContainer: 'SlideItMoo_outer',
                    elementScrolled: 'SlideItMoo_inner',
                    thumbsContainer: 'SlideItMoo_items',
                    itemsVisible: 4,
                    elemsSlide: 2,
                    duration: 180,
                    itemsSelector: '.SlideItMoo_element',
                    itemWidth: 190,
                    showControls: 1
                });
            },

        });
    </script>

</head>
<body>

<div id="wrapper">

    <div id="header">

        <div id="site_title"><h1><a href="#"></a></h1></div>

        <div id="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="uk-visit.php">Travel in UK</a></li>
                <li><a href="message.php">Message</a></li>
                <li><a href="messagelist.php" class="current">Message list</a></li>
                <li><a href="module.php">Moudle</a></li>
                <?php
                if (isset($_SESSION['admin_user'])) {
                    echo '<li><a class="adduser" href="dologin.php?a=logout">welcome,' . $_SESSION['admin_user']['name'] . ' &nbsp;&nbsp;log out</a></li>';
                } else {
                    ?>
                    <li><a href="login.html">Log in</a></li>
                    <li><a href="register.html">Register</a></li>
                    <?php
                }
                ?>
            </ul>
            <div class="cleaner"></div>
        </div> <!-- end of menu -->

        <div class="cleaner"></div>
    </div>

    <div id="middle">
        <div id="mid_img_wrap"><span></span>

            <div id="slider1" class="sliderwrapper">

                <div class="contentdiv">
                    <img src="images/slider/image_00.jpg" alt="Image 0"/>
                </div>

                <div class="contentdiv">
                    <img src="images/slider/image_01.jpg" alt="Image 1"/>
                </div>

                <div class="contentdiv">
                    <img src="images/slider/image_02.jpg" alt="Image 2"/>
                </div>

                <div class="contentdiv">
                    <img src="images/slider/image_03.jpg" alt="Image 3"/>
                </div>

            </div>

            <div id="paginate-slider1" class="pagination">

            </div>

            <script type="text/javascript">

                featuredcontentslider.init({
                    id: "slider1",  //id of main slider DIV
                    contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
                    toc: "#increment",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
                    nextprev: ["", ""],  //labels for "prev" and "next" links. Set to "" to hide.
                    revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
                    enablefade: [true, 0.2],  //[true/false, fadedegree]
                    autorotate: [true, 2000],  //[true/false, pausetime]
                    onChange: function (previndex, curindex) {  //event handler fired whenever script changes slide
                        //previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
                        //curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
                    }
                })

            </script>
        </div>
        <div id="mid_right">
            <div id="mid_title">Go and visit!</div>
            <p><a href="#">Go and play!</a>Let's have fun.</p>
            <a class="view_port" href="#"></a>
        </div>
    </div>

    <div id="main">

        <div class="content_box">

            <h2><span>Message List</span></h2>
            <ul class="ullist">
                <?php

                include('dbconfig.php');// 引入数据库配置文件
                $link = @mysqli_connect(HOST, USER, PASS) or die('数据库连接失败');// 连接数据库
                mysqli_select_db($link, DBNAME); // 选择数据库
                mysqli_set_charset($link, 'utf8');// 设置字符集
                $sql = "select * from  messages  order by addtime desc ";
                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <li><?php echo $row['title']; ?>
                        <?php
                        if ($_SESSION['admin_user']['role'] == 1) {
                            echo "<a href='del.php?id=" . $row['id'] . "'>Delete</a>";
                        }
                        ?>
                        <div class="time">
                            <span> Release time:<?php echo $row['addtime']; ?></span><span> Author:<?php echo $row['name']; ?></span>
                        </div>
                        <br>
                        <?php echo $row['content']; ?>
                    </li>
                    <?php
                }
                ?>
            </ul>

        </div>

        <div class="cleaner"></div>
    </div> <!-- end of main -->

    <div class="cleaner"></div>
</div> <!-- end of wrapper -->


</body>
</html>


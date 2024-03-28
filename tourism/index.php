<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Home</title>
    <meta name="keywords" content="travel, tours"/>
    <meta name="description" content="This is a travel website."/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/contentslider.css"/>
    <script type="text/javascript" src="scripts/contentslider.js"> </script>
    <link rel="stylesheet" type="text/css" href="css/gallery_slider.css"/>
    <script language="javascript" type="text/javascript" src="scripts/mootools-1.2.1-core.js"></script>
    <script language="javascript" type="text/javascript">
        window.addEvents({
            'domready': function () {
                /* thumbnails example , div containers */
                new SlideItMoo({
                    overallContainer: 'SlideItMoo_outer',
                    elementScrolled: 'SlideItMoo_inner',
                    thumbsContainer: 'SlideItMoo_items',
                    itemsVisible: 4,
                    duration: 180,
                    itemsSelector: '.SlideItMoo_element',
                    itemWidth: 190,
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
                <li><a href="index.php" class="current">Home</a></li>
                <li><a href="uk-visit.php">Travel in UK</a></li>
                <li><a href="message.php">Message</a></li>
                <li><a href="messagelist.php">Message list</a></li>
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
            <h2>Welcome <span>to My Website</span></h2>
            <p> Travel is the movement of people between distant geographical locations. Travel can be done by foot,
                bicycle, automobile, train, boat, bus, airplane, ship or other means, with or without luggage, and can
                be one way or round trip.[1] Travel can also include relatively short stays between successive
                movements, as in the case of tourism. </p>
        </div>

        <div class="content_box">
            <div class="col_3">
                <h3>Etymology                </span></h3>
                <p>The origin of the word "travel" is most likely lost to history. According to the Merriam-Webster
                    dictionary, the first known use of the word travel was in the 14th century. I</p>
                <a href="https://en.wikipedia.org/wiki/Travel" class="more">Read More</a>
            </div>
            <div class="col_3">
                <h3>United Kingdom
                    </span></h3>
                <p>The land of long-held traditions packs a lot into a small space, including a famous metropolis and
                    scenic landscapes, from the cliffs of Dover to remote Scottish isles.</p>
                <a href="https://www.expedia.co.uk/United-Kingdom.dx190" class="more">Read More</a>
            </div>
            <div class="col_3 col_last">
                <h3>Duis pulvinar scelerisque<span>Duis pulvinar scelerisque ante</span></h3>
                <p>Duis vitae velit. Ut ultricies. Fusce sollicitudin nisl a lectus. Pellentesque odio. Pellentesque
                    habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                <a href="https://en.wikipedia.org/wiki/Travel" class="more">Read More</a>
            </div>
            <div class="cleaner"></div>
        </div>

        <div class="content_box">
            <h2>Enjoy the <span>Beauty</span></h2>
            <div id="SlideItMoo_outer">
                <div id="SlideItMoo_inner">
                    <div id="SlideItMoo_items">
                        <div class="SlideItMoo_element"><span></span>
                            <a href="#">
                                <img src="images/gallery/image_01.jpg" alt="product 1"/></a>

                        </div>
                        <div class="SlideItMoo_element"><span></span>
                            <a href="#">
                                <img src="images/gallery/image_02.jpg" alt="product 2"/></a>

                        </div>
                        <div class="SlideItMoo_element"><span></span>
                            <a href="#">
                                <img src="images/gallery/image_03.jpg" alt="product 3"/></a>

                        </div>
                        <div class="SlideItMoo_element"><span></span>
                            <a href="#">
                                <img src="images/gallery/image_04.jpg" alt="product 4"/></a>

                        </div>
                        <div class="SlideItMoo_element"><span></span>
                            <a href="#">
                                <img src="images/gallery/image_05.jpg" alt="product 5"/></a>

                        </div>
                        <div class="SlideItMoo_element"><span></span>
                            <a href="#">
                                <img src="images/gallery/image_06.jpg" alt="product 6"/></a>

                        </div>
                        <div class="SlideItMoo_element"><span></span>
                            <a href="#">
                                <img src="images/gallery/image_07.jpg" alt="product 7"/></a>
                        </div>
                        <div class="SlideItMoo_element"><span></span>
                            <a href="#">
                                <img src="images/gallery/image_08.jpg" alt="product 8"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cleaner"></div>
    </div> <!-- end of main -->
    <div class="cleaner"></div>
</div> <!-- end of wrapper -->
<iframe
    margin="0 auto;"
    allow="microphone;"
    width= 100%
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/4ed359aa-269c-482d-a2d1-ef57ba5ab158">
</iframe>

</body>
</html>
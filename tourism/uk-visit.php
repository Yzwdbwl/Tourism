<?php
session_start(); // 开启session
if (!isset($_SESSION['admin_user'])) {
    echo "<script>alert('please log in first');window.location.href='login.html'</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel in UK</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/contentslider.css" />
<script type="text/javascript" src="scripts/contentslider.js">
</script>
<link rel="stylesheet" type="text/css" href="css/gallery_slider.css" />
<script language="javascript" type="text/javascript" src="scripts/mootools-1.2.1-core.js"></script>
<script language="javascript" type="text/javascript">
	window.addEvents({
		'domready': function(){
			/* thumbnails example , div containers */
			new SlideItMoo({
						overallContainer: 'SlideItMoo_outer',
						elementScrolled: 'SlideItMoo_inner',
						thumbsContainer: 'SlideItMoo_items',		
						itemsVisible: 4,
						elemsSlide: 1,
						duration: 180,
						itemsSelector: '.SlideItMoo_element',
						itemWidth: 190,});
		},
		
	});
</script>

</head>
<body>

<div id="wrapper">
    
    <div id="header">
        
        <div id="site_title"><h1><a href="#">Travel in United-Kingdom</a></h1></div>
        
        <div id="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="uk-visit.php" class="current">Travel in UK</a></li>
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
                    <img src="images/slider/image_00.jpg" alt="Image 0" />
                </div>
    
                <div class="contentdiv">
                    <img src="images/slider/image_01.jpg" alt="Image 1" />
                </div>            
                
                <div class="contentdiv">
                    <img src="images/slider/image_02.jpg" alt="Image 2" />
                </div>
                
                <div class="contentdiv">
                    <img src="images/slider/image_03.jpg" alt="Image 3" />
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
                onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
                    //previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
                    //curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
                }
            })
            
            </script>
        </div>
        <div id="mid_right">
      <div id="mid_title"> My Website</div>
          <p>	<a href="#">United-Kingdom</a> The land of long-held traditions packs a lot into a small space, including a famous metropolis and scenic landscapes, from the cliffs of Dover to remote Scottish isles.
          </p>
          <a  class="view_port" href="#"></a>
        </div>
    </div>
    
    <div id="main">
    	
        <div class="content_box">
        	<h2></span></h2>
           <p></p>
      </div>
        
        <div class="content_box">
        	<div class="col_3">
            	<h3>London </span></h3>
           	  <p>Visit London, the nation's capital, to discover a fast-paced world of booming business and instantly recognizable attractions such as Buckingham Palace. Take a spin on the London Eye Ferris wheel overlooking Big Ben, walk along Southbank to listen to street performers and watch boats cruise by on the Thames. Go shopping in Covent Garden and see a musical or play in the West End.</p>
				<a href="#" class="more">Read More</a>
            </div>
      <div class="col_3">
            	<h3>Scotland</span></h3>
            	<p>To the north of England is Scotland, known for its friendly locals, delicious whisky and incredible scenery. Explore the former royal residence of Edinburgh Castle, which towers over the country’s capital, Edinburgh, and immerse yourself in the art and music scene of Scotland’s largest city, Glasgow. In the winter, take a trip to the north of Scotland’s mountainous region for thrilling skiing in Glencoe.</p>
                <a href="#" class="more">Read More</a>
          </div> 
      <div class="col_3 col_last">
            	<h3> Wales</span></h3>
       	<p>Wales occupies the westernmost portion of the island of Great Britain and is a playground for nature lovers. Go hiking in national parks such as Snowdonia, Brecon Beacons and Pembrokeshire Coast. Signs may be in both Welsh and English, with Welsh dominating in northern Wales and English being more popular in the south.</p>
                <a href="#" class="more">Read More</a>
            </div>
          <div class="cleaner"></div>
        </div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    
<div class="cleaner"></div>	
</div> <!-- end of wrapper -->


</body>
</html>
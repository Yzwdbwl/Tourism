<?php
session_start(); // 开启session
if (!isset($_SESSION['admin_user'])) {
    echo "<script>alert('please log in first');window.location.href='login.html'</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UK Explorer</title>
  <style>
    body {
      background-color: gainsboro; /* 设置淡绿色背景 */
      margin: 0; /* 清除默认的页面边距 */
    }

    /* 导航栏样式 */
    .navbar {
      background-color: #0E5206; 
      padding: 10px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    /* 导航链接样式 */
    .navbar a {
      color: white;
      text-decoration: none;
      margin: 0 10px;
    }
  
    @media (max-width: 768px) {
  .navbar {
    flex-direction: column; /* 在小屏幕上垂直排列 */
    align-items: flex-start; /* 左对齐 */
  }

  /* 适应小屏幕的 logo 图片样式 */
  .navbar img {
    width: 100%; /* 图片宽度占据整个父元素宽度 */
    height: auto; /* 根据宽度自动调整高度 */
    margin: 10px 0; /* 调整上下间距，根据需要调整数值 */
  }

  /* 适应小屏幕的导航链接样式 */
  .navbar a {
    margin: 5px 0; /* 调整上下间距，根据需要调整数值 */
  }
}
  /* Add your CSS styles here */
.module {
  border: 1px solid #ddd;
  padding: 10px;
  margin: 5px;
  margin-bottom: 5px;
  height: 300px;
  cursor: pointer;
  overflow: auto;
  text-align: center;
  background-color: #fff; /* background */
}

/* Adjust text alignment for module name */
.module h3 {
  text-align: right;
  margin-right: 20px; 
}

.image-container {
  white-space: nowrap;
  overflow-x: auto;
}

.image {
  display: inline-block;
  width: 300px; /* Set your desired width */
  height: 200px; /* Set your desired height */
  margin: 5px;
}
.image-slider img {
  display: inline-block;
  width: 100%; /* 100% */
  height: auto; /* set the height*/
}
  </style>
</head>
<body>
<div class="navbar">
  <!-- logo -->
  <img src="images/logo.png" alt="Logo" style="width: 150px; height: 80px; margin: right 10px;">
  
     <a href="index.php" class="current">Home</a>
     <a href="uk-visit.php">Travel in UK</a>
     <a href="message.php">Message</a>
     <a href="messagelist.php">Message list</a>
     <a href="module.php">Moudle</a>
     <?php
                if (isset($_SESSION['admin_user'])) {
                    echo '<a class="adduser" href="dologin.php?a=logout">welcome,' . $_SESSION['admin_user']['name'] . ' &nbsp;&nbsp;log out</a>';
                } else {
                    ?>
                    <a href="login.html">Log in</a>
                    <a href="register.html">Register</a>
                    <?php
                }
                ?>
</div>


<?php
$modules = [
    "module1" => ["name" => "Historical Tourism", "link" => "module1_link.html"],
    "module2" => ["name" => "Countryside Tourism", "link" => "module2_link.html"],
    "module3" => ["name" => "Urban Tourism", "link" => "module3_link.html"],
    "module4" => ["name" => "Coastal Tourism", "link" => "module4_link.html"],
    "module5" => ["name" => "Cultural Festival Tourism", "link" => "module5_link.html"],
];

foreach ($modules as $moduleId => $moduleData) {
    echo "<div class='module' id='{$moduleId}'>";
    echo "<h3>{$moduleData["name"]}</h3>";
    echo "<div class='image-container'>";

    // Add your images here
    for ($i = 1; $i <= 4; $i++) {
        echo "<img src='images/{$moduleId}_{$i}.jpg' alt='{$moduleData["name"]} Image {$i}' class='image'>";
    }

    echo "</div>";
    echo "</div>";
}
?>

<script>
  // Add your JavaScript code here
  const modules = Array.from(document.querySelectorAll('.module'));

  modules.forEach(module => {
    module.addEventListener('click', () => {
      let clickCount = parseInt(localStorage.getItem(module.id)) || 0;
      clickCount++;
      localStorage.setItem(module.id, clickCount);

      // Refresh the page to see the updated order on the next visit
      location.reload();
    });
  });

  // Sort modules based on click count and update their order
  modules.sort((a, b) => {
    const clickCountA = parseInt(localStorage.getItem(a.id)) || 0;
    const clickCountB = parseInt(localStorage.getItem(b.id)) || 0;
    return clickCountB - clickCountA;
  });

  const container = document.body;
  modules.forEach(module => container.appendChild(module));
</script>

</body>
</html>
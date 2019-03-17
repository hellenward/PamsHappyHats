<?php $page = "hats";?>
<!DOCTYPE = html>
<html>
<head>
  <meta charset="UTF-8" content="text/html">
  <title>Happy Hats Home Page</title>
  <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body class="hatsPage">
  <?php include("menu.php")?>

  <div class="banner"> <!---banner--->
    <img src="./Buttons/aabanner2.jpg" id="banner">
  </div>

  <div>
    <input type="text" class="search"></input>
    <input type="button" class="searchButton" value="Search"></input>
  </div>

  <div class="products">
  </div>

  <script src="./js/jquery-3.3.1.min.js"> </script>
  <script src="./js/script.js"></script>
</body>

</html>

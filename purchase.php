<?php
include_once("functions.php");
?>

<?php $page="purchases";?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" content="text/html">
    <title>Happy Hats Home Page</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
  </head>

  <body>

    <?php include("menu.php")?> <!--navigation bar--->

    <div class="banner"> <!---banner--->
      <img src="./Buttons/aabanner2.jpg" id="banner">
    </div>

    <?php $product = getProduct($_GET["id"]);
    if ($product) {
      include ("purchaseHat.php");
    } else {
      print "Not Found";
    }
    ?>

    <script src="./js/jquery-3.3.1.min.js"> </script>
    <script src="./js/script.js"></script>

  </body>

</html>

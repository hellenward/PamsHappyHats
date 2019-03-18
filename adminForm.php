<?php $page="adminForm";?>
<!DOCTYPE = html>
<head>
  <meta charset="UTF-8" content="text/html">
  <title>Happy Hats Home Page</title>
  <link rel="stylesheet" type="text/css" href="./style.css">
  <script src="./js/jquery-3.3.1.min.js"></script>
</head>
<body class="adminForm">

    <?php include("menu.php")?> <!--navigation bar--->

    <div class="banner"> <!---banner--->
      <img src="./Buttons/aabanner2.jpg" id="banner">
    </div>

    <div class="contactAndEventsContainer">
      <form method="post">
        <fieldset class="adminFormOverallContainer">
          <div class="contactLegendContainer">
          <legend class="adminLegend">Add Item to Site</legend>
        </div>
        <div>
          <label>What are you adding to the site?</label>
          <select id="adminList">
            <option value="hat">Hat</option>
            <option value="commission">Commission</option>
            <option value="figure">Collectable Figure</option>
            <option value="event">Event</option>
          </select>
        </div>
        <div>
          <label>Name of Product</label>
          <input class="" type="text" placeholder="Will show on site and be used as search term">
        </div>
        <div>
          <label>Image</label>
          <input type="file" name="pic" accept="image/*">
        </div>
        <div class="adminHat">
          <label>Price - Newborn</label>
          <input class="" name="priceNB" type="text" placeholder="Please include £">
        </div>
        <div class="adminHat">
          <label>Price - X Small</label>
          <input class="" name="priceNB" type="text" placeholder="Please include £">
        </div>
        <div class="adminHat">
          <label>Price - Small</label>
          <input class="" name="priceNB" type="text" placeholder="Please include £">
        </div>
        <div class="adminHat">
          <label>Price - Medium</label>
          <input class="" name="priceNB" type="text" placeholder="Please include £">
        </div>
        <div class="adminHat">
          <label>Price - Large</label>
          <input class="" name="priceNB" type="text" placeholder="Please include £">
        </div>
        <div class="adminHat">
          <label>Price - X Large</label>
          <input class="" name="priceNB" type="text" placeholder="Please include £">
        </div>
        <div class="adminCommission">
          <label>Price</label>
          <input class="" name="priceNB" type="text" placeholder="Please include £">
        </div>
        <div class="adminCommission">
          <label>Do you want to include this on Hats page?</label>
          <select>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="adminCommission">
          <label>Do you want to include this on Figures page?</label>
          <select>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="adminHats">
          <label>Do you want to include this on Commissions page?</label>
          <select>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="adminFigures">
          <label>Do you want to include this on Commissions page?</label>
          <select>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>

        </fieldset>
      </form>

    </div>

</body>

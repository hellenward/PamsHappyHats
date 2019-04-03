<?php $page="adminForm";?>
<?php include("AdminFormHandler.php") ?>
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

      <form method="post">
        <fieldset class="adminFormOverallContainer">
          <div class="contactLegendContainer">
            <legend class="adminLegend">Add Item to Site</legend>
          </div>
        <div>
          <label>What are you adding to the site?</label>
          <select class="adminList" name="productType">
            <option value="none">Select</option>
            <option value="hat">Hat</option>
            <option value="commission">Commission</option>
            <option value="figure">Collectable Figure</option>
            <option value="event">Event</option>
          </select>
        </div>
        <div class="adminHat adminCommission adminCollectable adminEvent hidden adminReset">
          <label>Name of Product or Event</label>
          <input class="adminInput1 nameOfProduct" name="name" type="text" placeholder="Will show on site and be used as search term">
        </div>
        <div class="adminHat adminCommission adminCollectable adminEvent hidden adminReset">
          <label>Image</label>
          <input type="file" name="pic" accept="image/*">
        </div>
        <div class="adminCollectable hidden adminReset">
        <p>Price: £10.00</p>
        </div>
        <div class="adminHat adminCommission hidden adminReset">
          <label>Pricing Tier</label>
            <select class="pricingTier" name="pricingTier">
              <option value="none">Select</option>
              <option value="bronze">Bronze</option>
              <option value="silver">Silver</option>
              <option value="gold">Gold</option>
              <option value="platinum">Platinum</option>
            </select>
        </div>
        <div class="platinumPricing hidden adminReset">
          <p>Please insert pricing for Platinum</p>
          <label>Premie</label><input name="premiePlatPrice" type="text platPremie"></input>
          <label>Newborn</label><input name="newbornPlatPrice" type="text platNewborn"></input>
          <label>Extra Small</label><input name="XSPlatPrice" type="text platXS"></input>
          <label>Small</label><input name="smallPlatPrice" type="text platSmall"></input>
          <label>Medium</label><input name="mediumPlatPrice" type="text platMedium"></input>
          <label>Large</label><input name="largePlatPrice" type="text platLarge"></input>
          <label>Extra Large</label><input name="XLPlatPrice" type="text platXLarge"></input>
        </div>
        <div class="adminHat adminFigures adminCollectable hidden adminReset">
          <label>Do you want to include this on Commissions page?</label>
          <select name="showOnCommissions">
            <option value="none">Select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="adminCommission hidden adminReset">
          <label>Do you want to include this on Hats page?</label>
          <select name="showOnHats">
            <option value="none">Select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="adminCommission hidden adminReset">
          <label>Do you want to include this on Figures page?</label>
          <select name="showOnFigures">
            <option value="none">Select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="adminEvent hidden adminReset">
          <label>Please enter event URL</label>
          <input name="eventURL" type="text"></input>
        </div>
        <div class="adminEvent hidden adminReset">
          <label>Please enter start date and end date of event</label>
          <input name="startDate" class="startDate" type="date" placeholder="Start Date"></input>
          <input name="endDate" class="endDate" type="date" placeholder="End Date"></input>
        </div>
        <div class="adminEvent hidden adminReset">
          <label>Please enter event address</label>
          <input name="eventAddress" type="text"></input>
        </div>

        <div>
          <button class="contactSubmitButton" type="submit">Submit</button>
        </div>
        </fieldset>
      </form>
      <script src="./js/script.js"></script>
</body>

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

      <form method="post">
        <fieldset class="adminFormOverallContainer">
          <div class="contactLegendContainer">
            <legend class="adminLegend">Add Item to Site</legend>
          </div>
        <div>
          <label>What are you adding to the site?</label>
          <select class="adminList">
            <option value="none">Select</option>
            <option value="hat">Hat</option>
            <option value="commission">Commission</option>
            <option value="figure">Collectable Figure</option>
            <option value="event">Event</option>
          </select>
        </div>
        <div class="adminHat adminCommission adminCollectable adminEvent hidden">
          <label>Name of Product or Event</label>
          <input class="adminInput1 nameOfProduct" type="text" placeholder="Will show on site and be used as search term">
        </div>
        <div class="adminHat adminCommission adminCollectable adminEvent hidden">
          <label>Image</label>
          <input type="file" name="pic" accept="image/*">
        </div>
        <div class="adminCollectable hidden">
        <p>Price: £10.00</p>
        </div>
        <div class="adminHat adminCommission hidden">
          <label>Pricing Tier</label>
            <select class="pricingTier">
              <option value="none">Select</option>
              <option value="bronze">Bronze</option>
              <option value="silver">Silver</option>
              <option value="gold">Gold</option>
              <option value="platinum">Platinum</option>
            </select>
        </div>
        <div class="platinumPricing hidden">
          <p>Please insert pricing for Platinum</p>
          <label>Premie</label><input type="text platPremie"></input>
          <label>Newborn</label><input type="text platNewborn"></input>
          <label>Extra Small</label><input type="text platXS"></input>
          <label>Small</label><input type="text platSmall"></input>
          <label>Medium</label><input type="text platMedium"></input>
          <label>Large</label><input type="text platLarge"></input>
          <label>Extra Large</label><input type="text platXLarge"></input>
        </div>
        <div class="adminHat hidden">
          <label>Do you want to include this on Commissions page?</label>
          <select>
            <option value="none">Select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="adminCommission hidden">
          <label>Do you want to include this on Hats page?</label>
          <select>
            <option value="none">Select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="adminCommission hidden">
          <label>Do you want to include this on Figures page?</label>
          <select>
            <option value="none">Select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="adminFigures hidden">
          <label>Do you want to include this on Commissions page?</label>
          <select>
            <option value="none">Select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="adminEvent hidden">
          <label>Please enter event URL</label>
          <input type="text"></input>
        </div>
        <div class="adminEvent hidden">
          <label>Please enter start date and end date of event</label>
          <input class="startDate" type="date" placeholder="Start Date"></input>
          <input class="endDate" type="date" placeholder="End Date"></input>
        </div>
        <div class="adminEvent hidden">
          <label>Please enter event address</label>
          <input type="text"></input>
        </div>

        <div>
          <button class="contactSubmitButton" type="submit">Submit</button>
        </div>
        </fieldset>
      </form>
      <script src="./js/script.js"></script>
</body>

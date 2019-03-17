<?php $page = "contact";?>
<?php include("contactHandler.php")?>
<!DOCTYPE = html>
<html>
  <head>
    <meta charset="UTF-8" content="text/html">
    <title>Happy Hats Home Page</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <
  </head>

  <body class="contactPage">
    <?php include("menu.php")?>

    <div class="banner"> <!---banner--->
      <img src="./Buttons/aabanner2.jpg" id="banner">
    </div>
    <?php if($emailed === true) {?>
      <p class="welcomeContainer welcome">Thank you for your message!  We'll get back to you as soon as possible.</p>
    <?php } else { ?>
      <p class="welcomeContainer welcome">Use the form below to get in touch with us with
        us or alternatively come and find us at any of the upcoming events listed
        below.</p>
   <?php } ?>

    <div class="contactAndEventsContainer">

      <form method="post">
          <fieldset class="contactFormOverallContainer">
            <div class="contactLegendContainer">
              <legend class="contactLegend">Contact us</legend>
            </div>
            <div>
              <label>Name</label>
              <input class="contactInputBox1" name="name" type="text" placeholder="Your name">
            </div>
            <div>
              <label>Your email</label>
              <input class="contactInputBox2" name="email" type="text" placeholder="Your email address">
            </div>
            <div>
              <label class="fiddlyText">Your message</label>
              <textarea class="contactInputBox3" name="message" type="text" placeholder="Please enter your message here" rows="5"></textarea>
            </div>
            <div>
              <button class="contactSubmitButton" type="submit">Submit</button>
            </div>
          </fieldset>
        </form>

        <div  class="eventContainer">
          <div class="eventTitle">Upcoming Events</div>
          <div class="events"></div>
        </div>


<?php /*
        <div class="eventContainer">
          <legend class="eventTitle">Upcoming Events</legend>
          <div class="event event1">
            <img src="ContactGraphics/WalkerStalker">
            <a href="https://walkerstalkercon.com/london/">Walker Stalker</a>
            <p class="date">30th-31st March</p>
            <p class="venue">ExCel London, Royal Victoria Dock, 1 Western Gateway, Royal Docks, London E16 2XL</p>
          </div>
          <div class="event event2">
            <img src="ContactGraphics/Elstree-Con">
            <a href="https://www.starwarscon.co.uk/">Star Wars Con</a>
            <p class="date">6th April 2019</p>
            <p class="venue">Allum Manor House & Hall, 2 Allum Lane, Borehamwood WD6 3PJ</p>
          </div>
          <div class="event event1">
            <img src="ContactGraphics/BedfordWho.jpg">
            <a href="http://bedfordwhocharitycon.co.uk/">Bedford Who</a>
            <p class="date">13th April 2019</p>
            <p class="venue">The Theatre, University of Bedfordshire, Polhil Avenue, Bedford MK41 9EA</p>
          </div>
          <div class="event event2">
            <img src="ContactGraphics/ThamesCon.png">
            <a href="https://thamescon.co.uk/">Thames Con</a>
            <p class="date">28th April 2019</p>
            <p class="venue">Abingdon & Whitney College, Abingdon Campus, Wootton Road, Abingdon OX14 1GG</p>
          </div>
      </div> */ ?>
    </div >
    <script src="./js/script.js"></script>
  </body>

</html>

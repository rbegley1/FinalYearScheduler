<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>GAA Scheduler</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5kdoVwkdSvWyl30bYYROScoIVXQfy5d0&callback=initMap"></script>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">GAA Ticket Scheduler</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="#home">Home</a></li>
        <li><a href="#booking">Bookings</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>




  <section id="home">
    <div class="left">
      <img class="gaalogo" src="images/gaaLogo.png">
      <h1 class="heading">Using The Product!</h1>
      <p class="spacing bold">Here is a step by step guide into how to use this product:</p>
      <p class="spacing">1. Select the booking section on the top of the page.</p>
      <p class="spacing">2. Once here begin to fill out all information on the booking form.</p>
      <p class="spacing">3. Select your club and county which will be displayed on the map opposite.</p>
      <p class="spacing">4. Now you can select the date and duration of your club draw, you will be told if this is available.</p>
      <p class="spacing">5. Once this is decided you can submit your request and you will be sent an email for confirmation.</p>
      <p class="spacing bold">Your slot is now booked, thanks for using our service.</p>
      <p class="spacing bold">Good luck in your fundraiser, any feedback you may have is greatly appreciated.</p>
      </div>
      <div class="right">

        <p>This is an example.</p>
      </div>
    </section>

  <section id="booking">




    <!-- Id map which positions where map is placed on webpage -->
    <div id="map" class="left">

    </div>





    <div class="right">
      <h1 class="heading">Fill out this form to make your booking!</h1>

      <?php  include('bookings.php'); ?>


    </div>
  </section>

  <section id="about">
    <div class="left">
      <h1 class="heading">Background!</h1>
      <p class="spacing">I have created a scheduler which will be used for the sole purpose of organising the sale of
        tickets within the GAA community. At this moment in time the area of ticket selling is chaotic and situations
        occur where multiple clubs are selling tickets in the same areas, expecting people to buy from each of them.
        In reality this doesn't happen because people don't like giving out money every night to different clubs. This
        competition between clubs results in each draw selling less tickets as a lot of households will turn
        ticket sellers away as they've already bought from another club in the same week.</p>
      <p class="spacing">The idea of the product is to limit the conflicts currently happening in this area, and as a
        result make ticket selling less of a hassle for those who voluntarily offer their services to do this. The aim
        is that each club will have a fair run at selling tickets and promoting their fundraiser and in turn people
        may be more welcoming in buying a ticket as there will be no constant flow of clubs visiting to ask for money
        for a ticket they have no interest in.</p>
    </div>
    <div class="right">
      <p>This is an example.</p>
    </div>
  </section>

  <section id="contact">
    <div class="left">
      <p>This is an example.</p>
    </div>
    <div class="right">
      <h1 class="heading">Contact Us</h1>
      <p>If you have any queries or concerns don't be afraid to get in contact and we will do our best to
        fix any problems you come across.</p>

        <div class="container">
          <form action="/action_page.php">
            <label for="fname">Club Name</label>
            <input type="text" id="cname" name="clubname" placeholder="Your name..">

            <label for="county">County</label>
            <input type="text" id="county" name="county" placeholder="Enter your county here..">

            <label for="subject">Subject</label>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:150px"></textarea>

            <input type="button" class="btn-primary btn-sm" value="Submit">
          </form>
        </div>

    </div>
  </section>

</body>
  <!-- <script type="text/javascript" src="js/login.js"></script>
  <script type="text/javascript" src="js/bookingForm.js"></script> -->
  <script type="text/javascript" src="js/initialiseMap.js"></script>
  <script type="text/javascript" src="js/distanceCalculation.js"></script>


</html>

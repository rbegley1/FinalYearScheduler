<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>GAA Scheduler</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5kdoVwkdSvWyl30bYYROScoIVXQfy5d0&callback=initMap"></script>
</head>

<body>
  <!-- Navbar for top of page to navigate between sections -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">GAA Ticket Scheduler</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#home">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#booking">Bookings</a>
      <a class="nav-item nav-link" href="#about">About</a>
      <a class="nav-item nav-link disabled" href="#contact">Contact Us</a>
    </div>
  </div>
</nav>

  <section id="home">

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
  <script type="text/javascript" src="js/bookingForm.js"></script>
  <script type="text/javascript" src="js/initialiseMap.js"></script>
  <script type="text/javascript" src="js/distanceCalculation.js"></script>


</html>

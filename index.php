<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GAA Ticket Scheduler</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5kdoVwkdSvWyl30bYYROScoIVXQfy5d0&callback=initMap"></script>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">GAA Scheduler</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#bookings">Bookings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Welcome to Scrolling Nav</h1>
        <p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
      </div>
    </header>

    <section id="home">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>About this page</h2>
            <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
            <ul>
              <li>Clickable nav links that smooth scroll to page sections</li>
              <li>Responsive behavior when clicking nav links perfect for a one page website</li>
              <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
              <li>Minimal custom CSS so you are free to explore your own unique design options</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="bookings" class="bg-light">
      <div class="container">
        <div class="row">
        <!-- Id map which positions where map is placed on webpage -->
        <div id="map" class="left">
        </div>

        <div class="right">
          <h1 class="heading">Fill out this form to make your booking!</h1>

          <?php include('bookings.php'); ?>
        </div>
      </div>
        </div>
      </div>
    </section>

    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
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
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
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
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

    <script type="text/javascript" src="js/bookingForm.js"></script>
    <script type="text/javascript" src="js/initialiseMap.js"></script>
    <script type="text/javascript" src="js/distanceCalculation.js"></script>
  </body>

</html>

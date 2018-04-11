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
        <img class="navbar-brand js-scroll-trigger logo" src="images/gaaLogo.png" href="#page-top"></img>
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
        <h1>Welcome to our GAA Ticket Scheduler</h1>
        <p class="lead">Come and book your draw here first. Eliminate the competition from other clubs!</p>
      </div>
    </header>

    <section id="home" class="bg-light">
      <div class="container">
        <div class="row">
            <div class="card-group">
              <div class="card">
                <img class="card-img-top" src="images/grey.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Step 1</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
              </div>
              <div class="card">
                <img class="card-img-top" src="images/grey.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Step 2</h5>
                  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
              </div>
              <div class="card">
                <img class="card-img-top" src="images/grey.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Step 3</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>

    <section id="bookings" class="bg-secondary">
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

    <section id="about" class="bg-light">
      <div class="container">
        <div class="row">
          <div>
            <div class="aboutLeft">
            <h1 class="heading">Problem</h1>
            <ul class="spacing" style="list-style-type: disc">
              <li>There is too much competition between clubs selling tickets in the same areas.</li>
              <li>This competition is resulting in less funds being raised by each club as more and more people will begin to turn ticket-sellers away.</li>
              <li>These reasons make the idea of ticket-selling a more daunting experience, and less people are willing to volunteer their time for it.</li>
              <li>Because of this fundraisers are less effective, but this competition can be eradicated.</li>
            </ul>
          </div>
          <div class="aboutRight">
            <h1 class="heading">Solution</h1>
            <ul class="spacing" style="list-style-type: disc">
              <li>This system is proposing that the sale of tickets within the GAA be organised using a schedule.</li>
              <li>This will allow each club to have a fair chance in promoting their fundraiser by booking their dates through this system.</li>
              <li>This will ensure there are no conflicts between neighbouring clubs and that each fundraiser can be run smoothly.</li>
              <li>No more competition when selling tickets and more effective fundraisers will be the result.</li>
          </div>
        </div>
        </div>
      </div>
    </section>

    <section id="contact" class="bg-secondary">
      <div class="container">
        <div class="row">
          <div class="left">
            <p>This is an example.</p>
          </div>
          <div class="right">
            <h1 class="headingLight">Contact Us</h1>
            <p style="color: #FFFFFF">If you have any queries or concerns don't be afraid to get in contact and we will do our best to
              fix any problems you come across.</p>

              <div class="container">
                <form action="/action_page.php">
                  <label style="color:#FFFFFF" for="fname">Club Name:</label>
                  <br>
                  <input type="text" id="contact" name="clubname" placeholder="Your name..">
                  <br>
                  <label style="color:#FFFFFF" for="county">Subject:</label>
                  <br>
                  <input type="text" id="contact" name="subject" placeholder="Enter subject here..">
                  <br>
                  <label style="color:#FFFFFF" for="subject">Content:</label>
                  <br>
                  <textarea id="contact" name="content" placeholder="Write something.." style="height:150px"></textarea>
                  <br>
                  <input type="button" class="btn-light btn" value="Submit">
                </form>
              </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; GAA Ticket Scheduler - Ruairí Begley</p>
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

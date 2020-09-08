<?php
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Customers of Wirmon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include "common.php"?>

    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">
  <style>
    @media only screen and (max-width: 521px)
{
  #h_wirmon
  {

    margin-top: 2px !important;
    height: 50px !important;
    width: 150px !important;
  }

}
@media only screen and (max-width: 767px)
{
  #h_wirmon
  {
    margin-top: 2px !important;
    height: 50px !important;
    width: 150px !important; 
  }
}
@media only screen and (max-width: 521px)
{
  #h_wirmon
  {

    margin-top: 2px !important;
    height: 50px !important;
    width: 150px !important;
  }

}
@media only screen and (max-width: 767px)
{
  #h_wirmon
  {
    margin-top: 2px !important;
    height: 50px !important;
    width: 150px !important; 
  }
}

    </style>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body id="top">


<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
                             <div class="site-logo col-6"><a href="index.php"><img src="images/wirmon.png" id='h_wirmon' style="height:70px;width: 200px;margin-top:20px;" /></a></div>


          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.php" class="nav-link">Home</a></li>
              <li><a href="about.php" >About</a></li>
              <li><a href="job-listings.php">Jobs</a> </li>
              <li class="has-children">
                <a>Services</a>
                <ul class="dropdown">
                  <li><a href="services.php">Services</a></li>
                  <li><a href="portfolio.php">Portfolio</a></li>
                  <li><a href="faq.php">Frequently Ask Questions</a></li>
                </ul>
              </li>
              <li><a href="contact.php">Contact</a></li>
              <li class="d-lg-none"><a href="login.php"><span class="mr-2">+</span> Post a Job</a></li>
              <li class="d-lg-none"><a href="login.php">Log In</a></li>
            </ul>
          </nav>

          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="login.php" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
              <a href="login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu" id = "navicon" style="height:130px;width:130px;"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_11.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Portfolio</h1>
            <div class="custom-breadcrumbs">
            <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Portfolio</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section block__62272" id="next-section">


      <div class="container">


        <div class="row justify-content-center mb-5" data-aos="fade-up">
          <div id="filters" class="filters text-center button-group col-md-7">
            <button class="btn btn-primary active" data-filter="*">All</button>
            <button class="btn btn-primary" data-filter=".web">Web</button>
            <button class="btn btn-primary" data-filter=".design">Design</button>
            <button class="btn btn-primary" data-filter=".brand">Brand</button>
          </div>
        </div>

        <div id="posts" class="row no-gutter">


        <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="portfolio-single.php" class="item-wrap">
              <span class="icon-add"></span>
              <img class="img-fluid" src="images/chanda.png">
            </a>
          </div>


          <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">

            <a href="portfolio-single.php" class="item-wrap">
              <span class="icon-add"></span>
              <img class="img-fluid" src="images/DesignArrow.png">
            </a>

          </div>

          <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="portfolio-single.php" class="item-wrap">
              <span class="icon-add"></span>
              <img class="img-fluid" src="images/digitalsignzone.png">
            </a>
          </div>
          <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="portfolio-single.php" class="item-wrap">
              <span class="icon-add"></span>
              <img class="img-fluid" src="images/edge.png">
            </a>
          </div>
          <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="portfolio-single.php" class="item-wrap">
              <span class="icon-add"></span>
              <img class="img-fluid" src="images/Seku.png">
            </a>
          </div>


          <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="portfolio-single.php" class="item-wrap">
              <span class="icon-add"></span>
              <img class="img-fluid" src="images/kms.png">
            </a>
          </div>

          <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="portfolio-single.php" class="item-wrap">
              <span class="icon-add"></span>
              <img class="img-fluid" src="images/SNB.png">
            </a>
          </div>

          <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="portfolio-single.php" class="item-wrap">
              <span class="icon-add"></span>
              <img class="img-fluid" src="images/sms.png">
            </a>
          </div>

          <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="portfolio-single.php" class="item-wrap">
              <span class="icon-add"></span>
              <img class="img-fluid" src="images/travels.png">
            </a>
          </div>



        </div>
      </div>

    </section>

  <!--  <section class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3">Happy Candidates Says</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="block__87154 bg-white rounded">
              <blockquote>
                <p>Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <div>
                  <h3>Elisabeth Smith</h3>
                  <span class="position">Creative Director</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="block__87154 bg-white rounded">
              <blockquote>
                <p>Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
                <div>
                  <h3>Chris Peter</h3>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>-->

    <?php include_once 'footer.php'; ?>
  </div>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>

    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/quill.min.js"></script>


    <script src="js/bootstrap-select.min.js"></script>

    <script src="js/custom.js"></script>



  </body>
</html>

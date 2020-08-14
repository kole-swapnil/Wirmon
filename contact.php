<?php
require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
$mail = new PHPMailer();
include_once 'webutils.php';
$utils = new webutils();

$result = $name = $mobile = $email = $subject = $message = "";
$mailSendToAdmin = $mailSendToUser = false;
if(isset($_POST['submit']))
{
    if(isset($_POST['name']) && !empty($_POST['name']))
    {
        if(isset($_POST['mobile']) && !empty($_POST['mobile']))
        {
            if(preg_match('/^[0-9]{10}+$/', $_POST['mobile']))
            {
                if(isset($_POST['email']) && !empty($_POST['email']))
                {
                  if(isset($_POST['subject']) && !empty($_POST['subject']))
                  {
                    if(isset($_POST['message']) && !empty($_POST['message']))
                    {
                        $name = $_POST['name'];
                        $mobile = $_POST['mobile'];
                        $email = $_POST['email'];
                        $subject = $_POST['subject'];
                        $message = $_POST['message'];

                        //adminMail
                        $mailSendToAdmin = $utils->adminContactForm($mail, $name, $mobile, $email, $subject, $message);
                        if($mailSendToAdmin)
                        {
                            //userMail
                            $mailSendToUser = $utils->userContactForm($mail, $name, $email);
                            if($mailSendToUser)
                            {
                                $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Thanks For Contacting Us.We will get back to you soon!</div>";
                            }
                        }

                    }
                    else
                    {
                        $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Your Message.</div>';
                    }
                }
                else
                {
                    $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Your Subject.</div>';
                }

                }
                else
                {
                    $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Email Address.</div>';
                }
            }
            else
            {
                $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Valid Phone Number.</div>';
            }
        }
        else
        {
            $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Phone Number.</div>';
        }
    }
    else
    {
        $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Name.</div>';
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; Contact Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">


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
          <div class="site-logo col-6"><a href="index.php">Wirmon</a></div>

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
              <li><a href="contact.php" class="active">Contact</a></li>
              <li class="d-lg-none"><a href="post-job.php"><span class="mr-2">+</span> Post a Job</a></li>
              <li class="d-lg-none"><a href="login.php">Log In</a></li>
            </ul>
          </nav>

          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="post-job.php" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
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
            <h1 class="text-white font-weight-bold">Contact Us</h1>
            <div class="custom-breadcrumbs">
            <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Contact Us</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="next-section">
      <div class="container">
        <div id="resultOfForm"><?php echo $result; ?></div>
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">

            <form action="<?=($_SERVER['PHP_SELF'])?>" method="post">

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Name</label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Phone Number</label>
                  <input type="text" name="mobile" id="mobile" pattern="[0-9]{10}" class="form-control">
                </div>
              </div>

              <div class="row form-group">

                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">

                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label>
                  <input type="subject" name="subject" id="subject" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label>
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                </div>
              </div>


            </form>
          </div>
          <div class="col-lg-5 ml-auto">

            <div class="p-4 mb-3 bg-white">
            <div id="map">
                <!-- How to change your own map point
                        1. Go to Google Maps
                        2. Click on your location point
                        3. Click "Share" and choose "Embed map" tab
                        4. Copy only URL and paste it within the src="" field below
                -->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.4298528505165!2d77.46912151482103!3d12.880058190915996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3fc926bdb2a5%3A0xd438d62bd310d73c!2sWirmon!5e0!3m2!1sen!2sin!4v1597386700380!5m2!1sen!2sin" width="480vw" height="270vh" style="border:0" allowfullscreen></iframe>
                    </div>
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">6G 405,Kengeri, Bangalore, Karnataka 560060</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+91 9487980784</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">info@wirmon.in</a></p>

            </div>
          </div>
        </div>
      </div>
    </section>

  
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

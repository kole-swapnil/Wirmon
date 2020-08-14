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
    <title>Wirmon &mdash; IT Services</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
              <li><a href="contact.php">Contact</a></li>
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
            <h1 class="text-white font-weight-bold">IT Service</h1>
            <div class="custom-breadcrumbs">
            <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
            <a href="services.php">Services</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>IT Service</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section block__18514" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 mr-auto">
            <div class="border p-4 rounded">
              <ul class="list-unstyled block__47528 mb-0">
              <li><a href="digital_marketing.php">Digital Marketing</a></li>
                <li><a href="hr-services.php">HR Services</a></li>
                <li><span class="active">IT Services</span>
                <ul>
                <li><a href="#">Android Apps</a></li>
                <li><a href="#">Wordpress Dev</a></li>
                <li><a href="#">Drupal Dev</a></li>
                <li><a href="#">E-commerce</a></li>
                <li><a href="#">Saas Development</a></li>
                <li><a href="#">Quality Assurance</a></li>
                <li><a href="#">Bespoke Web Apps</a></li>

              </ul>
            </div>
          </div>
          <div class="col-lg-8">
            <span class="text-primary d-block mb-5"><span class="icon-laptop display-1"></span></span>
            <h2 class="mb-4">IT Services</h2>
            <p>IT services refers to the application of business and technical expertise to enable organizations in the creation, management and optimization of or access to information and business processes.For long term stratigic partnership, <b>Wirmon</b> offers profoundly flexible dedicated
            development teams devoted exclusively to your project</p>
            <p><h4>Web development</h4>Wirmon is a full-stack provider of custom web development for market leaders, growing and emerging businesses with technology at their core.
            We help our customers embrace the mobile-centric web reality and transform legacy systems into modern cross-platform applications. Drawing on their deep front-end expertise, our web developers implement the most demanded web development scenarios.
          We deliver functional, convenient, and visually compelling HTML5/JavaScript websites that offer end users invariably perfect experience across desktops, smartphones, and tablets.
        We can modernize or completely redesign unfriendly and old-fashioned web interfaces in order to align them with the evolving needs of end users and current technologies.</p>
            <p><h4>Mobile App Development</h4>Wirmon provides end-to-end mobile application development for consumer-facing and corporate environments.
            Wirmon got experts on board with the skills required to create the exceptional mobile experience you are looking for.We deliver across all the popular mobile platforms and mobile-enabled technologies along with assisting companies with their mobile app delivery strategies to assure most optimal coverage of all target audiences.
          </p>

                <p>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Hire Us</button></p>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enquiry</h4>
        </div>
        <div class="modal-body">
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
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

          </div>
        </div>
      </div>    </section>

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

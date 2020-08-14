<?php
include "dbconn.php";
 session_start();
 if (($_SESSION['email'] == '') || (!isset($_SESSION['email']))) {
      header("Location: login.php");
}
   $email=$_SESSION['email'];
   $qry = $conn->prepare("select * from jobseeker where email = ?");
   $qry->bindParam(1, $email);
   $qry->execute();
   if($qry->rowCount() > 0)
   {
       $data = $qry->fetchAll();
       foreach($data as $row) {
         $name=$row['name'];
         $contact=$row['contact_no'];
         $location=$row['location'];
         $gender=$row['gender'];
         $aadhar_no=$row['aadhar_no'];
         $skills=$row['skills'];
         $education=$row['education'];
         $exp=$row['exp'];
         $resume=$row['resume'];

         $filename  = 'skills.txt';
            $eachlines = file($filename, FILE_IGNORE_NEW_LINES);
            $select    = '<select multiple class="selectpicker border rounded" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Skills" name="value" id="value" value="' .$row['skills'] .'">';
            foreach($eachlines as $lines)
            {
                $select .= "<option value='{$lines}'>{$lines}</option>";
            }
            $select .= "<option>{$lines}</option>" . "</select>";
       }
     }


?>
<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; Dashboard-Profile</title>
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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/dash.css">
<style>
.bs-placeholder{margin-left:unset !important;border:unset !important;}
.btn{margin-left:unset !important;border:unset !important;}
@media only screen and (max-width: 521px){
  .ml-auto{display:none;}
  .icon-menu{margin-right: -120px;}
  .logout{display: block !important;}
}
</style>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


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
              <li><a href="about.php">About</a></li>
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
            <li class="logout" style="display:none"><a href="logout.php"><i class="icon-sign-out" style="padding-left:5%;"></i>Logout</a></li>

            </ul>
          </nav>

          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <div class="dropdown"><span class="mr-2 icon-lock_outline dropdown-toggle" data-toggle="dropdown" style="color:#fff;">
                  <?php echo $_SESSION['email']; ?></span>
  <ul class="dropdown-menu">
    <li><a href="logout.php"><i class="icon-sign-out" style="padding-left:5%;"></i>Logout</a></li>

  </ul>
</div>
</div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu" id = "navicon" style="height:130px;width:130px;"></span></a>
          </div>

        </div>
      </div>
    </header>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_11.jpg');padding-bottom:unset;" id="home-section">
    </section>

    <section class="site-section">
      <div class="content-container">
<div class="row">
  <div class="col-md-3 LeftNavSideBar" valign="top">
  <div class="col-md-12 " valign="top">
    <!-- Sidebar -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-employerLeftNav-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand navbar-right text-ncspBlue paddingLeft0"><i class="icon-arrow-left" style="padding-right:3%;"></i>Employer Menu</a>
        </div>
        <div id="sidebar-wrapper" class="collapse navbar-collapse navbar-employerLeftNav-collapse paddingLeftRight0" style="padding-left:unset;">
            <nav id="spy">
                <ul class="sidebar-nav nav" style="display:block !important;">
                      <li class="hidden-md hidden-lg">
                        <a  href="index.php">Home</a>
                    </li>
                    <li >
                        <a href="js_dashboard.php">Dashboard</a></li>
                    <li class="active">
                        <a href="js_profile.php">View/Update Profile</a>
                    </li>
                  <li class="enabled">
                        <a href="">Search Jobs</a>
                    </li>
                    <li class="enabled">
                        <a href="">Jobs Applied</a>
                    </li>
                              </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="col-md-9">
      <div class="row align-items-center mb-5" style="margin-left:unset;margin-right:unset;">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <div class="d-flex align-items-center">
            <div>
              <h2>Jobseeker Profile</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-4" style="margin-left:unset;margin-right:unset;">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" method="post" role="form" action="#">
            <h3 class="text-black mb-5 border-bottom pb-2">User Details</h3>

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" value="<?php echo $name;?>" class="form-control" id="email" placeholder="John Doe">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" value="<?php echo $_SESSION['email'];?>" class="form-control" id="email" placeholder="you@gmail.com">
            </div>
            <div class="form-group">
              <label for="job-title">Contact No</label>
              <input type="text" name="contact" value="<?php echo $contact;?>" pattern="[0-9]{10}" class="form-control" id="job-title" placeholder="9897223344">
            </div>
            <div class="form-group">
          <label for="company-name">Gender</label>
          <select class="selectpicker border rounded" name="gender" value="<?php echo $gender;?>" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender" >
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
        </select>
        </div>
            <div class="form-group">
              <label for="job-title">Aadhar Number</label>
              <input type="text" name="aadhar_no" value="<?php echo $aadhar_no;?>"  class="form-control" id="job-title">
            </div>
            <div class="form-group">
              <label for="job-location">Location</label>
              <input type="text" name="location" value="<?php echo $location;?>" class="form-control" id="job-location" placeholder="e.g. Mumbai">
            </div>
            <div class="form-group">
                <label for="job-location">Key Skills</label>
            <?php echo $select; ?>
            </div>
            <div class="form-group">
              <label for="Qualification">Minimum Qualification</label>
              <select class="selectpicker border rounded" name="education" value="<?php echo $education;?>" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Qualification">
                <option value="Upto 8th">Upto 8th</option>
                <option value="Upto 9th">Upto 9th</option>
                <option value="10th">10th</option>
                <option value="12th">12th</option>
                <option value="Diploma">Diploma</option>
                <option value="Graduate">Graduate</option>
                <option value="Post Graduate">Post Graduate</option>
                <option value="Phd">Phd</option>
              </select>
            </div>
            <div class="form-group">
              <label for="experience">Experience</label>
              <select class="selectpicker border rounded" name="exp" value="<?php echo $exp;?>" id="exp" data-style="btn-black" data-width="100%" data-live-search="true" title="Select experience">
                <option value="0-1">0-1</option>
                <option value="1-2">1-2</option>
                <option value="2-3">2-3</option>
                <option value="3-4">3-4</option>
                <option value="4-5">4-5</option>
                <option value="5+">5+</option>
                </select>
            </div>
            <div class="form-group">

              Upload Resume<input type="file" name="resume" value="<?php echo $resume;?>" >

            </div>

            <div class="form-group">
            <center><input type="submit" name="submit" class="btn btn-primary btn-md text-white" value="Update" style="border: 1px solid #157efb;background-color:#157efb;font-size: 20px;">
            </div>
          </form>
        </div>
</div>
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
 <script src="discussionsEditor.js"></script>

  </body>
</html>

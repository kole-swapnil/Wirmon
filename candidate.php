<?php
include "dbconn.php";
 session_start();
 if (($_SESSION['email'] == '') || (!isset($_SESSION['email']))) {
      header("Location: login.php");
}

 $user_id=$_GET['id'];

 if($user_id == ''){
   header("location:search_users.php");
 }

 try{
 $stmt = $conn->prepare("select * from jobseeker where unique_id='$user_id'");
 $stmt->execute();
 if($stmt->rowCount() > 0)
 {


 $data = $stmt->fetchAll();
 foreach($data as $row) {
   $name=$row['name'];
   $js_email=$row['email'];
   $gender=$row['gender'];
   $contact=$row['contact_no'];
   $location=$row['location'];
   $skills=$row['skills'];
   $education=$row['education'];
   $exp=$row['exp'];
   $resume=$row['resume'];
   $Resume_file = str_replace(" ","%20",$resume);
    }

 }


 }
 catch(PDOException $e)
 {
     echo '{"error":{"text":'. $e->getMessage() .'}}';
 }

 $stmt3 = $conn->prepare('select name from employer where email=?');
 $stmt3->bindParam(1,$_SESSION['email']);
 $stmt3->execute();
 if($stmt3->rowCount() > 0)
 {
   $data = $stmt3->fetchAll();
   foreach($data as $row1) {
     $name_emp=$row1['name'];
   }
 }

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; Candidate Info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include "common.php"?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
   <script type="text/javascript" src="JQuery.js"></script>

<link rel="stylesheet" href="css/dash.css">
<style>@media only screen and (max-width: 521px){
  .ml-auto{display:none;}
  .icon-menu{margin-right: -120px;}
  .logout{display: block !important;}
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
          <div class="site-logo col-6"><a href="index.php"><img src="images/logo.png" id="h_wirmon" style="height:70px;width: 200px;margin-top:20px;"></a></div>

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
                <div class="dropdown"><span class="mr-2 icon-user dropdown-toggle" data-toggle="dropdown" style="color:#fff;">
                  <?php
                 if($name_emp == "")
                 {
                  echo $_SESSION['email'];}
                  else{
                    echo $name_emp;
                  } ?></span>
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
                    <li class="enabled">
                        <a href="emp_dashboard.php">Dashboard</a></li>
                    <li class="enabled">
                        <a href="emp_profile.php">View/Update Profile</a>
                    </li>
                    <li class="enabled">
                        <a href="emp_postjob.php">Post New Job</a>
                    </li>
                    <li class="enabled">
                        <a href="search_users.php">Search User</a>
                    </li>
                    <li class="enabled">
                        <a href="jobs&responses.php">Jobs and Responses</a>
                    </li>
                              </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>

    </div>



<div class="col-md-9 LeftNavSideBar">
  <div class="row align-items-center mb-5" style="margin-left:unset;margin-right:unset;">
    <div class="col-lg-8 mb-4 mb-lg-0">
      <div class="d-flex align-items-center">
        <div>
          <h2 class="border-bottom">Jobseeker Info</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-4" style="margin-left:unset;margin-right:unset;">
    <div class="col-lg-12">
      <div class="row">
        <div class="mb-5 col-md-6">
          <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-user mr-3"></span>Name</h3>
          <ul class="list-unstyled m-0 p-0">
            <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $name; ?></span></li>
            </ul>
        </div>
        <div class="mb-5 col-md-6">
          <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-envelope mr-3"></span>Email</h3>
          <ul class="list-unstyled m-0 p-0">
            <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><a href="mailto:<?php echo $js_email; ?>"><?php echo $js_email; ?></a></span></li>
            </ul>
        </div>
        </div>
          <div class="row">
            <div class="mb-5 col-md-6">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-tablet mr-3"></span>Contact Number</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $contact; ?></span></li>
                </ul>
            </div>
            <div class="mb-5 col-md-6">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-group mr-3"></span>Gender</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $gender; ?></span></li>
                </ul>
            </div>
      </div>
      <div class="row">
        <div class="mb-5 col-md-6">
          <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-room mr-2 mr-3"></span>Location</h3>
          <ul class="list-unstyled m-0 p-0">
            <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $location; ?></span></li>
            </ul>
        </div>
        <div class="mb-5 col-md-6">
          <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-briefcase mr-3"></span>Experience</h3>
          <ul class="list-unstyled m-0 p-0">
            <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $exp; ?> yrs</span></li>
            </ul>
        </div>
      </div>
      <div class="row">
        <div class="mb-5 col-md-6">
          <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-list-alt mr-3"></span>Skills</h3>
           <ul class="list-unstyled m-0 p-0">
            <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><?php $skl = (explode(',',$skills)); echo implode('</li><li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span>',$skl); ?></li>
                </ul>
        </div>
        <div class="mb-5 col-md-6">
          <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education</h3>
          <ul class="list-unstyled m-0 p-0">
            <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $education; ?></span></li>
            </ul>
        </div>
        </div>
        <div class="row">
          <div class="mb-5 col-md-6">
            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-file mr-3"></span>Resume</h3>
             <ul class="list-unstyled m-0 p-0">
              <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>
                <?php echo "<a href=\"http://wirmon.in/jobseeker_docs/{$Resume_file}\" target=\"_blank\">";?>
                <?php echo $resume; ?>;</span></li>
                  </ul>
          </div>
        </div>

    </div>
</div>
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



  </body>
</html>

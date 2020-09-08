<?php
include "dbconn.php";
 session_start();
 if (($_SESSION['email'] == '') || (!isset($_SESSION['email']))) {
      header("Location: login.php");
}
$stmt2 = $conn->prepare('select count(*) from applied_jobs where js_email=?');
$stmt2->bindParam(1,$_SESSION['email']);
$stmt2->execute();
if($stmt2->rowCount() > 0)
{  $result = $stmt2->fetchColumn();

}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; Dashboard-Jobs Applied</title>
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
<link rel="stylesheet" href="css/dash.css">
<style>
@media (min-width: 576px){
.d-sm-flex1 {
    display: -webkit-box!important;
    display: -ms-flexbox!important;
    display: flex!important;
}
}
@media only screen and (max-width: 521px){
  .ml-auto{display:none;}
  .icon-menu{margin-right: -120px;}
  .logout{display: block !important;}
}@media only screen and (max-width: 521px)
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
          <div class="site-logo col-6"><a href="index.php"><img src="images/logo.png"id="h_wirmon" style="height:70px;width: 200px;margin-top:20px;"></a></div>

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
    <div class="navbar navbar-default" role="navigation" style="display:block;padding: 10px 20px 20px 20px;
background-color: #216945;
border: 1px solid #ddd;
border-radius: 4px;
padding-right: auto;">

        <div class="navbar-header">
        <button type="button" style="background-color: #ff8800; left:25px;border-color : #ff8800"class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-employerLeftNav-collapse" >
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
            </button>
            <a href="#" class="navbar-brand navbar-right text-ncspBlue paddingLeft0" style="color:white;padding-left:55px"><i class="icon-arrow-left" style="padding-right:3%;"></i>Jobseeker Menu</a>
        </div>
        <div id="sidebar-wrapper" class="collapse navbar-collapse navbar-employerLeftNav-collapse paddingLeftRight0" style="padding-left:unset;">
            <nav id="spy">
                <ul class="sidebar-nav nav" style="display:block !important;">
                      <li class="hidden-md hidden-lg">
                        <a  href="index.php" style="color:white;" >Home</a>
                    </li>
                    <li class="enabled">
                        <a href="js_dashboard.php" style="color:white;">Dashboard</a></li>
                    <li class="enabled">
                        <a href="js_profile.php" style="color:white;">View/Update Profile</a>
                    </li>
                  <li class="enabled">
                        <a href="search_jobs.php" style="color:white;">Search Jobs</a>
                    </li>
                    <li class="acto">
                        <a href="js_jobsApplied.php" style="color:white;">Jobs Applied</a>
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
<div class="panel-heading" style="background:#78d5ef;">
Jobs Applied - <?php echo $result; ?>
    </div>
    <section class="site-section" id="next">
        <ul class="job-listings mb-5">
          <?php
          try{
            $js_email=$_SESSION['email'];
          $statement = $conn->prepare("select * from applied_jobs where js_email='$js_email'");
          $statement->execute();
          if($statement->rowCount() > 0)
          {
            $dataa = $statement->fetchAll();
            foreach($dataa as $ro)
             {
               $job_id=$ro['job_id'];
               $apply_date=$ro['datetime'];
              $stmt1 = $conn->prepare("select * from jobpost where job_id='$job_id'");
          $stmt1->execute();
          if($stmt1->rowCount() > 0)
          {
          $data1 = $stmt1->fetchAll();
          foreach($data1 as $row1) {
            $exp=$row1['exp'];
            $skills=$row1['skills'];
          $title=$row1['title'];
          $location=$row1['location'];
          $type=$row1['type'];
          $comp_name=$row1['company_name'];
          $emp_name=$row1['name'];
          $job_date=$row1['datetime'];

           ?>
          <li class="job-listing d-block d-sm-flex1 pb-3 pb-sm-0 align-items-center">
            <a href="job-single.php?id=<?php echo $job_id; ?>" target="_blank"></a>
            <div class="job-listing-about d-sm-flex1 custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-75 mb-3 mb-sm-0">
                <h2 style="font-size:20px !important;"><?php echo $title; ?> (<?php echo $exp; ?> yrs experience)</h2>
                <strong><?php echo $comp_name; ?></strong>
                <h4 style="margin-top:unset;">Skills : <?php echo $skills; ?></h2>
                <h4>  <span class="icon-room"></span><?php echo $location; ?> <span class="badge badge-danger" style="margin-left:5%;"><?php echo $type; ?></span></h4>

              </div>
              <div class="job-listing-meta mb-3 mb-sm-0 custom-width w-25">
             Applied on : <?php echo $apply_date ?>

              </div>
            </div>
            <div class="job-listing-about d-sm-flex1 custom-width w-100 justify-content-between mx-4">
                <h5 style="margin-left:60% !important;"> Posted by <?php echo $emp_name; ?> on <?php echo $job_date; ?></h4>
            </div>


          </li>
          <?php

        }
                          }

                                    }
                                  }

                                }

                                    catch(PDOException $e)
                                    {
                                        echo '{"error":{"text":'. $e->getMessage() .'}}';
                                    }
                                    ?>
          </ul>

</section>

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

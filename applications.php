<?php
include "dbconn.php";
 session_start();
 if (($_SESSION['email'] == '') || (!isset($_SESSION['email']))) {
      header("Location: login.php");
}
$job_id=$_GET['id'];
if($job_id == ''){
  header("location:job&responses.php");
}
$stmt2 = $conn->prepare('select count(*) from applied_jobs where job_id=?');
$stmt2->bindParam(1,$job_id);
$stmt2->execute();
if($stmt2->rowCount() > 0)
{  $result = $stmt2->fetchColumn();

}

$stmt3 = $conn->prepare('select name from employer where email=?');
$stmt3->bindParam(1,$_SESSION['email']);
$stmt3->execute();
if($stmt3->rowCount() > 0)
{
  $data = $stmt3->fetchAll();
  foreach($data as $row) {
    $name=$row['name'];
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; Jobs & Responses</title>
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
    <link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/dash.css">
<style>
.modal-backdrop {
  bottom:unset;
  z-index:unset;}
@media only screen and (max-width: 521px){
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

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
          <div class="site-logo col-6"><a href="index.php"><img src="images/logo.png" style="height:70px;width: 200px;margin-top:20px;"></a></div>

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
                 if($name == "")
                 {
                  echo $_SESSION['email'];}
                  else{
                    echo $name;
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
            <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-employerLeftNav-collapse" style="margin-right:65px;">
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
                        <a href="">Search User</a>
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
<div class="panel-heading" style="background:#78d5ef">
    Applications received - <?php echo $result; ?>
    </div>
    <section class="site-section" id="next">
        <ul class="job-listings mb-5">
          <?php
          try{
            $emp_email=$_SESSION['email'];
          $statement = $conn->prepare("select * from applied_jobs where job_id='$job_id'");
          $statement->execute();
          if($statement->rowCount() > 0)
          {
            $dataa = $statement->fetchAll();
            foreach($dataa as $ro)
             {
               $js_id=$ro['js_id'];
               $apply_date=$ro['datetime'];
              $stmt1 = $conn->prepare("select * from jobseeker where unique_id='$js_id'");
          $stmt1->execute();
          if($stmt1->rowCount() > 0)
          {
          $data1 = $stmt1->fetchAll();
          foreach($data1 as $row1) {
            $exp=$row1['exp'];
            $skills=$row1['skills'];
          $name=$row1['name'];
          $location=$row1['location'];
          $contact=$row1['contact_no'];
          $education=$row1['education'];
         ?>
         <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
           <a href="candidate.php?id=<?php echo $js_id; ?>" target="_blank"></a>
            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
             <div class="job-listing-position custom-width w-25 mb-3">
               <h2 style="font-size:18px;"><?php echo $name; ?></h2>
               <span class="badge badge-danger"><?php echo $exp; ?> yrs</span>
             </div>
             <div class="job-listing-skills mb-3 custom-width w-25" style="margin-top:20px;">
          <?php   $arr = explode(",",$skills );
                foreach($arr as $asx){
                $skills=$asx;
 ?>

           <span class="icon-user"></span><?php echo $skills; ?><br>
      <?php
           }

           ?></div>
             <div class="job-listing-location mb-3 custom-width w-25" style="margin-top:20px;">
               <span class="icon-room"></span><?php echo $location; ?><br>
 <span class="badge badge-danger"><?php echo $education; ?></span>
             </div>
           <div class="job-listing-meta">
               Applied on: <?php echo $apply_date; ?>
             </div>
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


</div>

    </section>


    <?php include_once 'footer.php'; ?>

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

<?php
include "dbconn.php";
 session_start();
 if (($_SESSION['email'] == '') || (!isset($_SESSION['email']))) {
      header("Location: login.php");
}

$stmt1 = $conn->prepare('select count(*) from jobpost where email=?');
$stmt1->bindParam(1,$_SESSION['email']);
$stmt1->execute();
if($stmt1->rowCount() > 0)
{
    $result = $stmt1->fetchColumn();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<style>@media only screen and (max-width: 521px){
  .ml-auto{display:none;}
  .icon-menu{margin-right: -120px;}
  .logout{display: block !important;}
}</style>
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
                    <li class="active">
                        <a href="">Dashboard</a></li>
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


<div class="col-md-6 LeftNavSideBar">
<input style ="
  font-size: 17px;
  border: 1px solid grey;
  float: left;

  background: #f1f1f1;"class="form-control" type="text" placeholder="Search" name="search" aria-label="Search">
  <button type="submit" style = "float: left;height:52px;width: 10%;padding: 10px; background: #2196F3;color: white;font-size: 17px;border: 1px solid grey;border-left: none; cursor: pointer;}"><i class="fa fa-search"></i></button>


<div class="panel-heading" style="background:#78d5ef;margin-top:55px">
        Recent Job Posted
    </div>
                  <div>
                    <?php
                    $stmt = $conn->prepare('select job_id,datetime,title from jobpost where email=?');
                    $stmt->bindParam(1,$_SESSION['email']);
                    $stmt->execute();
                    if($stmt->rowCount() > 0)
                    {
                        ?>
                  <table class="table table-hover">
    <thead>
      <tr>
        <th>JOB ID</th>
        <th>JOB Title</th>
        <th>Created On</th>

      </tr>
    </thead>
    <?php
    $cnt = 1;
    $data = $stmt->fetchAll();
    foreach($data as $row)
    {
      ?>
    <tbody>
      <tr>
        <td><?php echo $row['job_id']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['datetime']; ?></td>
      </tr>
      <?php

  }
  ?>
        </tbody>
  </table>
  <?php
}
else
{
  echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Info!</strong> There is no job posted yet.</div>";
}
?>

            </div>
                </div>

                <div class="col-md-2 card mr-0" style = "border:0px;">
                <div class="panel-heading" style="background:#78d5ef">
          Jobs Posted <?php echo $result; ?>
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

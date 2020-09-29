<?php
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
include "dbconn.php";
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 7;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = $conn->prepare("select count(*) from jobpost");
$total_pages_sql->execute();
$total_pages_sql->execute();
 if($total_pages_sql->rowCount() > 0)
{
   $total_rows=$total_pages_sql->fetchColumn();
}
$total_pages = ceil($total_rows / $no_of_records_per_page);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Jobs in India | Jobs in Covid19</title>
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
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
  .pagination>li:first-child>a, .pagination>li:first-child>span {
      border-top-right-radius: 0px !important;
    border-bottom-right-radius: 0px !important;
    border-top-left-radius: 50% !important;
    border-bottom-left-radius: 50% !important;
}
.pagination>li:last-child>a, .pagination>li:last-child>span {
    border-top-right-radius: 50% !important;
    border-bottom-right-radius: 50% !important;
    border-top-left-radius: 0px !important;
    border-bottom-left-radius: 0px !important;
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
          <div class="site-logo col-6"><a href="index.php"><img src="images/logo.png"  id="h_wirmon"style="height:70px;width: 200px;margin-top:20px;"></a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.php" class="nav-link">Home</a></li>
              <li><a href="about.php" >About</a></li>
              <li><a href="job-listings.php">Jobs</a> </li>
              <li class="has-children">
                <a data-toggle="collapse" data-target="#collapseItem0">Services</a>
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
  <section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('images/hero_11.jpg');" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold" style="font-size:36px;font-family:Nunito, sans-serif;">The Easiest Way To Get Your Dream Job</h1>
              </div>
            <form method="post" class="search-jobs-form" action="<?=($_SERVER['PHP_SELF'])?>" role="form">
              <div class="row mb-5" style="justify-content: center;">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <input type="text" name="job" class="form-control form-control-lg" placeholder="Job title, Company..." >
                </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Job Type" name="type">
                    <option value="Part time">Part Time</option>
                    <option value="Full time">Full Time</option>
                    <option value="Internship">Internship</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>

      <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
      </a>
    </section>
    <script>
      $(document).ready(function(){
    var form = document.querySelector('form');
    form.onsubmit = function() {
      <?php
      $job=$_POST['job'];
      $type = $_POST["type"];
      $total_pages_sql = $conn->prepare("select count(*) from jobpost WHERE (title LIKE '%$job%' or company_name LIKE '%$job%') and (type LIKE '%$type%')");
      $total_pages_sql->execute();
      $total_pages_sql->execute();
       if($total_pages_sql->rowCount() > 0)
      {
         $total_rows=$total_pages_sql->fetchColumn();
      }
      ?>
      $(".container h2").text("<?php echo $total_rows ?> jobs listed");
       };
       });
    </script>
<?php
if(isset($_GET['title']) && isset($_GET['type']) && isset($_GET['location'])){
  $job=$_GET['title'];
  $type=$_GET['type'];
  $location=$_GET['location'];
  $total_pages_sql = $conn->prepare("select count(*) from jobpost WHERE (title LIKE '%$job%') and (type LIKE '%$type%') and (location LIKE '%$location%')");
  $total_pages_sql->execute();
  $total_pages_sql->execute();
   if($total_pages_sql->rowCount() > 0)
  {
     $total_rows=$total_pages_sql->fetchColumn();
  }
}
?>

    <section class="site-section" id="next">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Total <?php echo $total_rows;?> Job Listed</h2>
          </div>
        </div>

        <ul class="job-listings mb-5">
          <?php

          try{

              if(isset($_GET['title']) && isset($_GET['type']) && isset($_GET['location'])){
                $job=$_GET['title'];
                $type=$_GET['type'];
                $location=$_GET['location'];
           $qry="select * from jobpost WHERE (title LIKE '%$job%') and (type LIKE '%$type%') and (location LIKE '%$location%') LIMIT $offset, $no_of_records_per_page";
            $query = $conn->prepare($qry);
            $query->execute();
            if($query->rowCount() > 0)
            {
            $data = $query->fetchAll();
            foreach($data as $row) {
            $job_id=$row['job_id'];
            $id=$row['unique_id'];
            $title=$row['title'];
            $location=$row['location'];
            $type=$row['type'];
            $logo=$row['logoORphoto'];
            $comp_name=$row['company_name'];
            ?>
            <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.php?id=<?php echo $job_id; ?>" target="_blank"></a>
            <div class="job-listing-logo">
            <img src="Emp_document/<?php echo $logo ?>" alt="Logo" class="img-fluid" style="height:100px !important;width:150px;">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2><?php echo $title ?></h2>
            <strong><?php echo $comp_name ?></strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> <?php echo $location ?>
            </div>
            <div class="job-listing-meta">
            <span class="badge badge-danger"><?php echo $type ?></span>
            </div>
            </div>

            </li><?php
            }

              }
            else{
            echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Info!</strong> No jobs found.</div>";

            }

              }
else{
            if(isset($_POST['submit'])){
              $job=$_POST['job'];
              $type = $_POST["type"];
        $qry="select * from jobpost WHERE (title LIKE '%$job%' or company_name LIKE '%$job%') and (type LIKE '%$type%') LIMIT $offset, $no_of_records_per_page";
       $query = $conn->prepare($qry);
$query->execute();
   if($query->rowCount() > 0)
   {
     $data = $query->fetchAll();
     foreach($data as $row) {
       $job_id=$row['job_id'];
       $id=$row['unique_id'];
       $title=$row['title'];
     $location=$row['location'];
     $type=$row['type'];
     $logo=$row['logoORphoto'];
     $comp_name=$row['company_name'];
     ?>
    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
      <a href="job-single.php?id=<?php echo $job_id; ?>" target="_blank"></a>
      <div class="job-listing-logo">
        <img src="Emp_document/<?php echo $logo ?>" alt="Logo" class="img-fluid" style="height:100px !important;width:150px;">
      </div>

      <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
        <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
          <h2><?php echo $title ?></h2>
          <strong><?php echo $comp_name ?></strong>
        </div>
        <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
          <span class="icon-room"></span> <?php echo $location ?>
        </div>
        <div class="job-listing-meta">
          <span class="badge badge-danger"><?php echo $type ?></span>
        </div>
      </div>

    </li><?php
  }

            }
else{
  echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Info!</strong> No jobs found.</div>";

}

            }

        else{

          $stmt1 = $conn->prepare("select * from jobpost LIMIT $offset, $no_of_records_per_page");
          $stmt1->execute();
          if($stmt1->rowCount() > 0)
          {
          $data1 = $stmt1->fetchAll();
          foreach($data1 as $row1) {
            $job_id=$row1['job_id'];
            $id=$row1['unique_id'];
            $title=$row1['title'];
          $location=$row1['location'];
          $type=$row1['type'];
          $logo=$row1['logoORphoto'];
          $comp_name=$row1['company_name'];

           ?>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.php?id=<?php echo $job_id; ?>" target="_blank"></a>
            <div class="job-listing-logo">
              <img src="Emp_document/<?php echo $logo ?>" alt="Logo" class="img-fluid" style="height:100px !important;width:150px;">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2><?php echo $title ?></h2>
                <strong><?php echo $comp_name ?></strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> <?php echo $location ?>
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-danger"><?php echo $type ?></span>
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

        <div class="row pagination-wrap">
          <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
            <span>Showing <?php echo $pageno; ?> Of <?php echo $total_pages; ?> pages</span>
          </div>
          <div class="col-md-6 text-center text-md-right">
            <div class="custom-pagination ml-auto">
              <ul class="pagination">

               <li><a href="?pageno=1" class="last" style="width:auto;">First</a></li>
               <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>"><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="prev">Prev</a></li>
               <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
          <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="next">Next</a></li>
           <li><a href="?pageno=<?php echo $total_pages; ?>" class="first" style="width:auto;">Last</a></li>
         </ul>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_11.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Looking For A Job?</h2>
            <p class="mb-0 text-white lead">Register Now! We’re in the business of building tomorrow.</p>
          </div>
          <div class="col-md-3 ml-auto">
            <a href="#" class="btn btn-warning btn-block btn-lg">Sign Up</a>
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

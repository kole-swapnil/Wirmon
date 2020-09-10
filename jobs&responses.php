<?php
include "dbconn.php";
 session_start();
 if (($_SESSION['email'] == '') || (!isset($_SESSION['email']))) {
      header("Location: login.php");
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

$email=$_SESSION['email'];
$qry = $conn->prepare("select * from jobpost where email = ?");
$qry->bindParam(1, $email);
$qry->execute();
if($qry->rowCount() > 0)
{
    $data = $qry->fetchAll();
    foreach($data as $row) {
      $name=$row['name'];
      $contact=$row['contact_no'];
      $location=$row['location'];
      $title=$row['title'];
      $skills=$row['skills'];
      $type=$row['type'];
      $job_desc=$row['job_desc'];
      $resp=$row['responsibility'];
      $salary=$row['salary'];
      $education=$row['education'];
      $exp=$row['exp'];
      $perks=$row['perks'];
      $img=$row['feature_img'];
      $datetime=$row['datetime'];
    }
  }

  $qry1 = $conn->prepare("select company_name,comp_desc,logoORphoto from employer where email = ?");
  $qry1->bindParam(1, $email);
  $qry1->execute();
  if($qry1->rowCount() > 0)
  {
      $data1 = $qry1->fetchAll();
      foreach($data1 as $row1) {
        $company_name=$row1['company_name'];
        $comp_desc=$row1['comp_desc'];
        $logo_photo=$row1['logoORphoto'];
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
@media only screen and (max-width: 320px)
{
div{
      width:105%;
      overflow-x:auto;
      
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
    <div class="navbar navbar-default" role="navigation" style="display:block;padding: 10px 20px 20px 20px;
background-color: #216945;
border: 1px solid #ddd;
border-radius: 4px;
padding-right: auto;">

    <div class="navbar-header" >
    <button type="button" style="background-color: #ff8800; left:6%;border-color : #ff8800"class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-employerLeftNav-collapse" >
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
            </button>
            <a href="#" class="navbar-brand navbar-right text-ncspBlue paddingLeft0" style="color:white;padding-left:13%;"><i class="icon-arrow-left" style="padding-right:3%;"></i>Employer Menu</a>
        </div>
        <div id="sidebar-wrapper" class="collapse navbar-collapse navbar-employerLeftNav-collapse paddingLeftRight0" style="padding-left:unset;">
            <nav id="spy">
                <ul class="sidebar-nav nav" style="display:block !important;">
                      <li class="hidden-md hidden-lg">
                        <a  href="index.php" style="color:white;">Home</a>
                    </li>
                    <li class="enabled">
                        <a href="emp_dashboard.php" style="color:white;">Dashboard</a></li>
                    <li class="enabled">
                        <a href="emp_profile.php" style="color:white;">View/Update Profile</a>
                    </li>
                    <li class="enabled">
                        <a href="emp_postjob.php" style="color:white;">Post New Job</a>
                    </li>
                    <li class="enabled">
                        <a href="search_users.php" style="color:white;">Search User</a>
                    </li>
                    <li class="acto">
                        <a href="jobs&responses.php" style="color:white;">Jobs and Responses</a>
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
      Jobs Posted
    </div>
                  <div class="table-responsive">
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
        <th>Applications</th>
        <th>Preview</th>
      </tr>
    </thead>
    <?php
    $data = $stmt->fetchAll();
    foreach($data as $row)
    {  $job_id=$row['job_id'];
      $stmt2 = $conn->prepare('select count(*) from applied_jobs where job_id=?');
      $stmt2->bindParam(1,$job_id);
      $stmt2->execute();
      if($stmt2->rowCount() > 0)
      {
          $result2 = $stmt2->fetchColumn();
      ?>
    <tbody>

      <tr>
        <td><a href="job-single.php?id=<?php echo $row['job_id']; ?>" target="_blank"> <?php echo $row['job_id']; ?></a></td>
        <td><?php echo $row['title']; ?></td>
        <td ><?php echo $row['datetime']; ?></td>
        <td><a href="applications.php?id=<?php echo $job_id ;?>"><?php echo $result2; ?></td></a>
        <td><button type="button" class="btn btn-info btn-block btn-light btn-md btn-lg" data-toggle="modal" data-target="#myModal" style="background-color: rgba(0,0,0,0.4);"><span class="icon-open_in_new mr-2"></span>Preview</button></td>
      </tr>

      <?php
}
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


</div>

</div>
</div>

</div>


</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="width:auto !important;max-width:90% !important;">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        <div class="modal-body">

          <section class="site-section">
            <div class="container">
              <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                  <div class="d-flex align-items-center">
                    <div class="border p-2 d-inline-block mr-3 rounded">
                      <img src="Emp_document/<?php echo $logo_photo; ?>" alt="Logo" width="200px" height="150px">
                    </div>
                    <div>
                      <h2><?php echo $title; ?></h2>
                      <div>
                        <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span><?php echo $company_name; ?></span>
                        <span class="m-2"><span class="icon-room mr-2"></span><?php echo $location; ?></span>
                        <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary"><?php echo $type; ?></span></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8">
                  <div class="mb-5">
                    <figure class="mb-5"><img src="Emp_document/<?php echo $img; ?>" alt="Image" height="400px" width="700px" class="img-fluid rounded"></figure>
                      <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>About <?php echo $company_name; ?></h3>
                      <?php echo $comp_desc; ?>

                    <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Job Description</h3>
                      <?php echo $job_desc; ?>
                      </div>
                  <div class="mb-5">
                    <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Responsibilities</h3>
                    <ul class="list-unstyled m-0 p-0">
                      <li class="d-flex align-items-start mb-2"><span><?php echo $resp; ?></span></li>
                      </ul>
                  </div>
                  <div class="mb-5">
                    <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Skills</h3>
                    <ul class="list-unstyled m-0 p-0">
                      <li class="d-flex align-items-start mb-2"><span><?php $skl = (explode(',',$skills)); echo implode("<br>",$skl); ?></span></li>
                      </ul>
                  </div>

                  <div class="mb-5">
                    <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education</h3>
                    <ul class="list-unstyled m-0 p-0">
                      <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $education; ?></span></li>
                      </ul>
                  </div>
                  <div class="mb-5">
                    <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Experience</h3>
                    <ul class="list-unstyled m-0 p-0">
                      <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $exp; ?> years</span></li>
                      </ul>
                  </div>

                  <div class="mb-5">
                    <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Perks and Other Benifits</h3>
                    <ul class="list-unstyled m-0 p-0">
                      <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $perks; ?></span></li>
                      </ul>
                  </div>

                  <div class="row mb-5">
                    <div class="col-6">
                      <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Save Job</a>
                    </div>
                    <div class="col-6">
                      <a href="#" class="btn btn-block btn-primary btn-md">Apply Now</a>
                    </div>
                  </div>

                </div>
                <div class="col-lg-4">
                  <div class="bg-light p-3 border rounded mb-4">
                    <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                    <ul class="list-unstyled pl-3 mb-0">
                      <li class="mb-2"><strong class="text-black">Published on:</strong><?php echo $datetime; ?></li>
                      <li class="mb-2"><strong class="text-black">Employment Status:</strong><?php echo $type; ?></li>
                      <li class="mb-2"><strong class="text-black">Experience:</strong><?php echo $exp; ?> years</li>
                      <li class="mb-2"><strong class="text-black">Job Location:</strong><?php echo $location; ?></li>
                      <li class="mb-2"><strong class="text-black">Salary:</strong><?php echo $salary; ?> Rs.</li>
                      </ul>
                  </div>

                  <div class="bg-light p-3 border rounded">
                    <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
                    <div class="px-3">
                      <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                      <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                      <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                      <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </section>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

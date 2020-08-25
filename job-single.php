<?php
include "dbconn.php";
$job_id=$_GET['id'];

if($job_id == ''){
  header("location:job-listings.php");
}
try{

$status = true;
$stmt = $conn->prepare("select * from jobpost where job_id='$job_id'");
$stmt->execute();
if($stmt->rowCount() > 0)
{


$data = $stmt->fetchAll();
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
  $company_name=$row['company_name'];
  $logo_photo=$row['logoORphoto'];
}

}


}
catch(PDOException $e)
{
    echo '{"error":{"text":'. $e->getMessage() .'}}';
}

$qry1 = $conn->prepare("select comp_desc from employer where company_name = ?");
$qry1->bindParam(1, $company_name);
$qry1->execute();
if($qry1->rowCount() > 0)
{
    $data1 = $qry1->fetchAll();
    foreach($data1 as $row1) {

      $comp_desc=$row1['comp_desc'];

    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon Jobs &mdash;<?php echo $company_name; ?> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">

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
               <h1 class="text-white font-weight-bold"><?php echo $title; ?></h1>
               <div class="custom-breadcrumbs">
               <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
                 <a href="#">Job</a> <span class="mx-2 slash">/</span>
                 <span class="text-white"><strong><?php echo $title; ?></strong></span>
               </div>
             </div>
           </div>
         </div>
       </section>



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
          <div class="col-lg-4">
              <div class="row">
                <div class="col-6">
                  <a href="login.php" class="btn btn-block btn-primary btn-md">Apply Now</a>
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
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><?php $skl = (explode(',',$skills)); echo implode('</li><li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span>',$skl); ?></li>
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

              </div>
              <div class="col-6">
                <a href="login.php" class="btn btn-block btn-primary btn-md">Apply Now</a>
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
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share <span class="icon-share-alt"></span></h3>
              <div class="px-3">
                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwirmon.in%2Fjob-single.php%3Fid=<?php echo $job_id; ?>&amp;src=sdkpreparse" target= "_blank" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="https://twitter.com/intent/tweet?text=<?php echo $title .' - ' .$company_name; ?> https://wirmon.in/job-single.php?id=<?php echo $job_id;?>" target= "_blank" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fwirmon.in%2Fjob-single.php%3Fid%3D<?php echo $job_id; ?>" target= "_blank" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                <a href="https://api.whatsapp.com/send?text=<?php echo $title .' - ' .$company_name; ?> https://wirmon.in/job-single.php?id=<?php echo $job_id;?>"
        data-action="share/whatsapp/share"  target= "_blank"><span class="icon-whatsapp"></span></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="next">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Related Jobs</h2>
          </div>
        </div>

        <ul class="job-listings mb-5">
          <?php
          try{
        $stmt1 = $conn->prepare("select * from jobpost where (type='$type' or title LIKE '%$title%' or company_name LIKE '%$company_name%' or location LIKE '%$location%' or salary LIKE '%$salary%' or education LIKE '%$education%') and (job_id != '$job_id') LIMIT 7");
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
    else{echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Info!</strong> No Similar Jobs found!</div>";
                        }

                                    }
                                    catch(PDOException $e)
                                    {
                                        echo '{"error":{"text":'. $e->getMessage() .'}}';
                                    }
                                    ?>

        </ul>


      </div>
    </section>


  <!--  <section class="bg-light pt-5 testimony-full">

        <div class="owl-carousel single-carousel">


          <div class="container">
            <div class="row">
              <div class="col-lg-6 align-self-center text-center text-lg-left">
                <blockquote>
                  <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                  <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
                </blockquote>
              </div>
              <div class="col-lg-6 align-self-end text-center text-lg-right">
                <img src="images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-lg-6 align-self-center text-center text-lg-left">
                <blockquote>
                  <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                  <p><cite> &mdash; Chris Peters, @Google</cite></p>
                </blockquote>
              </div>
              <div class="col-lg-6 align-self-end text-center text-lg-right">
                <img src="images/person_transparent.png" alt="Image" class="img-fluid mb-0">
              </div>
            </div>
          </div>

      </div>

    </section>

    <section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_11.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
            <h2 class="text-white">Get The Mobile Apps</h2>
            <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
            <p class="mb-0">
              <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App Store</a>
              <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play Store</a>
            </p>
          </div>
          <div class="col-md-6 ml-auto align-self-end">
            <img src="images/apps.png" alt="Image" class="img-fluid">
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

    <script src="js/bootstrap-select.min.js"></script>

    <script src="js/custom.js"></script>


  </body>
</html>

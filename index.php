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

if(isset($_POST['submit'])){
  $title=$_POST['title'];
  $type=$_POST['type'];
  $location=$_POST['location'];
  header("Location: job-listings.php?title=$title&type=$type&location=$location");
}

$stmt100 = $conn->prepare('select count(*) from jobpost');
$stmt100->execute();
if($stmt100->rowCount() > 0)
{
    $result = $stmt100->fetchColumn();
}
$stmt99 = $conn->prepare('select count(*) from jobseeker where active=1');
$stmt99->execute();
if($stmt99->rowCount() > 0)
{
    $result1 = $stmt99->fetchColumn();

}
   $stmt98 = $conn->prepare('select count(DISTINCT company_name) from employer');
$stmt98->execute();
if($stmt98->rowCount() > 0)
{
    $result2 = $stmt98->fetchColumn();
}
$stmt97 = $conn->prepare('select count(*) from applied_jobs');
$stmt97->execute();
if($stmt97->rowCount() > 0)
{
    $result3 = $stmt97->fetchColumn();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Welcome to Wirmon</title>
    <meta charset="utf-8">

    <?php include "common.php"?>
    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
      <link rel="stylesheet" href="css/flaticon.css">
      <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
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
.pb-3{animation-name: fadeInUp;animation-duration: 2s;}
.collapse{visibility: visible !important;}
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
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/wow.js"></script>
      <script>
    var wow = new WOW(
                          {
                          boxClass:     'wow',      // default
                          animateClass: 'animated', // default
                          offset:       0,          // default
                          mobile:       true,       // default
                          live:         true        // default
                        }
                        )
                        wow.init();
                  </script>
  </head>
  <body id="top" data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">






    <!-- NAVBAR -->
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
                  <li><a href="index.php" class="active">Home</a></li>
                  <li><a href="about.php">About</a></li>
                  <li><a href="job-listings.php">Jobs</a> </li>
                  <li class="has-children">
                    <a data-toggle="collapse" data-target="#collapseItem0">Services</a> 
                     <ul class = "dropdown">
                       <li><a href="Services.php">Services</a></li>
                       <li><a href="Portfolio.php">Portfolio</a></li>
                       <li><a href="Frequently Ask Question.php">Frequently Ask Question</a></li>
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
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_11.jpg');" id="home-section">

      <div class="container">

        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate fadeInUp mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }" style="animation-duration: 1s;margin-top:-10%;">
          	<p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have <span class="number" data-number="<?php echo $result; ?>"> 0</span> great job offers you deserve!</p>
            <h1 class="mb-5" style="opacity: 0.827778;font-weight: 800;transform: translateZ(0px) translateY(-3.22917%);">Your Dream <br><span>Job is Waiting</span></h1>

						<div class="ftco-search">
							<div class="row">
		            <div class="col-md-12 nav-link-wrap">
			            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			            <center style = "margin:auto">  <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true" style="width:200px;">Find a Job</a>

			              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Find a Candidate</a>
                    </center>
			            </div>
			          </div>
			          <div class="col-md-12 tab-wrap">

			            <div class="tab-content p-4" id="v-pills-tabContent">

			              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
			              	<form action="<?=($_SERVER['PHP_SELF'])?>" class="search-job" method="post">
			              		<div class="row">
			              			<div class="col-md">
			              				<div class="form-group">
				              				<div class="form-field">
				              					<div class="icon"><span class="icon-briefcase"></span></div>
								                <input type="text" name="title" class="form-control" placeholder="Garphic. Web Developer">
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="select-wrap">
						                      <div class="icon"><span class="icon-arrow-down"></span></div>
						                      <select name="type" id="" class="form-control" title="Category">
						                       	<option value="Full Time">Full Time</option>
						                        <option value="Part Time">Part Time</option>
						                       <option value="Internship">Internship</option>
						                      </select>
						                    </div>
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="icon"><span class="icon-map-marker"></span></div>
								                <input type="text" name="location" class="form-control" placeholder="Location">
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
								                <input type="submit" name="submit" value="Search" class="form-control btn btn-primary">
								              </div>
							              </div>
			              			</div>
			              		</div>
			              	</form>
			              </div>

			              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
			              	<form action="<?=($_SERVER['PHP_SELF'])?>" class="search-job" method="post">
			              		<div class="row">
			              			<div class="col-md">
			              				<div class="form-group">
				              				<div class="form-field">
				              					<div class="icon"><span class="icon-user"></span></div>
								                <input type="text" name="ctitle" class="form-control" placeholder="eg. Graphic Designer">
								              </div>
							              </div>
			              			</div>

			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="icon"><span class="icon-map-marker"></span></div>
								                <input type="text" name="cloc" class="form-control" placeholder="Location">
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
								                <input type="submit" name="csubmit" value="Search" class="form-control btn btn-primary">
								              </div>
							              </div>
			              			</div>
			              		</div>
			              	</form>
			              </div>
			            </div>
			          </div>
			        </div>

		        </div>

  <?php
if(isset($_POST['csubmit'])){
  $ctitle=$_POST['ctitle'];
  $cloc=$_POST['cloc'];
  $stmt14 = $conn->prepare("select count(*) from jobseeker where active=1 and (skills like '%$ctitle%' and location like '%$cloc%')");
  $stmt14->execute();
  if($stmt14->rowCount() > 0)
  {
      $result14 = $stmt14->fetchColumn();

  }
}

  ?>
            <div class="col-md-12 nav-link-wrap" style="padding : 40px; margin:auto;display:none;" id="xy">
			            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical" >
                  <h2 class="section-title mb-2 fadeInUp wow"  style="animation-duration:1.5s;margin:auto;display:inline-block;background:white;padding:20px;"><a href="login.php" id = "candy"><?php echo $result1;?> Candidates Listed</a></h2>

			            </div>
			          </div>
          </div>

        </div>
      </div>

      <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
      </a>

    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('images/hero_11.jpg');">
      <div class="container wow">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white fadeInUp wow" style="animation-duration:2s;">Wirmon Site Stats</h2>
            <p class="lead text-white fadeInUp wow" style="animation-duration:2s;text-align:center !important;">Our experienced staffing specialists cater to your industry-specific employment challenges.We connect talented professionals with exceptional companies.
</p>
          </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number=" <?php echo $result1; ?>">0</strong>
            </div>
            <span class="caption">Candidates</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number=" <?php echo $result; ?>">0</strong>
            </div>
            <span class="caption">Jobs Posted </span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?php echo $result3; ?>">0</strong>
            </div>
            <span class="caption">Jobs Filled</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?php echo $result2; ?>">0</strong>
            </div>
            <span class="caption">Companies</span>
          </div>


        </div>
      </div>
    </section>
    <section class="site-section">
          <div class="container">

            <div class="row mb-5 justify-content-center">
              <div class="col-md-7 text-center">
                <h2 class="section-title mb-2 fadeInUp wow" style="animation-duration:1.5s;"><a href="login.php"> <?php echo $total_rows;?> Jobs Listed </a></h2>
              </div>
            </div>

            <ul class="job-listings mb-5">
            <?php
              try{
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

             ?>  <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center fadeInUp wow" style="animation-duration:2s;">
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

                   <li><a href="?pageno=1" class="first" style="width:auto;">First</a></li>
                   <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>"><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="prev">Prev</a></li>
                   <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
              <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="next">Next</a></li>
               <li><a href="?pageno=<?php echo $total_pages; ?>" class="last" style="width:auto;">Last</a></li>
             </ul>
                </div>
              </div>
            </div>

          </div>
        </section>


    <section class="py-5 bg-image overlay-primary fixed overlay ftco-animate wow fadeInUp" style="animation-name:fadeInUp !important;animation-duration:1.5s;visibility:visible !important; background-image: url('images/hero_11.jpg');">
      <div class="container ">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Looking For A Job?</h2>
            <p class="mb-0 text-white lead">Register Now!We’re in the business of building tomorrow.</p>
          </div>
          <div class="col-md-3 ml-auto">
            <a href="#" class="btn btn-warning btn-block btn-lg">Sign Up</a>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section services-section bg-light ftco-animate" style="padding: 3em 0;">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch">
            <div class="media block-6 services d-block">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><span class="flaticon-promotions"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3 fadeInUp wow" style="animation-duration:2s;visibility:visible !important;">HR Services</h3>
                <p class="fadeInUp wow" style="important;animation-duration:2.5s;visibility:visible !important; text-align:left;">Help your organisation improve hiring!</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon fadeInUp wow" style="animation-duration:2s;"><span class="flaticon-collaboration"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3 fadeInUp wow" style="animation-duration:2s;">IT Services</h3>
                <p class="fadeInUp wow" style="animation-duration:2.5s; text-align:left;">Custom IT services and solutions built specifically for your business!</p>
              </div>
            </div>
          </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon fadeInUp wow" style="animation-duration:2s;"><span class="flaticon-employee"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3 fadeInUp wow" style="animation-duration:2s;">Digital Marketing</h3>
                <p class="fadeInUp wow" style="animation-duration:2.5s; text-align:left;">Own the Internet! Increase your leads and sales.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon fadeInUp wow" style="animation-duration:2s;"><span class="flaticon-resume"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3 fadeInUp wow" style="animation-duration:2s;">Training and Certification</h3>
                <p class="fadeInUp wow" style="animation-duration:2.5s; text-align:left;">Get Certified.Get Ahead.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>




    <section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_11.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
            <h2 class="text-white">Get The Mobile App</h2>
            <p class="mb-5 lead text-white">Comming Soon....</p>
            <p class="mb-0">
              <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App Store</a>
              <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play Store</a>
            </p>
          </div>
          <div class="col-md-6 ml-auto align-self-end">
            <img src="images/apps.png" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>
        </div>
      </div>
    </section>

<?php include_once 'footer.php'; ?>

</div>

    <!-- SCRIPTS -->
    <script>

    document.getElementById('xy').innerHTML = '<div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical" ><h2 class="section-title mb-2 fadeInUp wow"  style="animation-duration:1.5s;margin:auto;display:inline-block;background:white;padding:20px;"><a href="login.php" id = "candy"><?php echo $result14;?> Candidates Listed</a></h2>';

        i = true;
      $('#v-pills-2-tab').on('click',function(){

        document.getElementById('xy').style.display = 'block';

      });
      $('#v-pills-1-tab').on('click',function(){

        document.getElementById('xy').style.display = 'none';


    });
  <?php  if(isset($_POST['csubmit'])){?>
      $('#v-pills-2-tab').addClass("active");
      $('#v-pills-2').addClass("active show");
      $('#v-pills-1').removeClass("active show");
      $('#v-pills-1-tab').removeClass("active");
    $("#v-pills-2-tab").attr("aria-selected","true");
      $("#v-pills-1-tab").attr("aria-selected","false");

              document.getElementById('xy').style.display = 'block';

      <?php
    }
    ?>

    </script>
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

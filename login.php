             <?php
include "dbconn.php";
session_start();

  require 'PHPMailer/PHPMailerAutoload.php';
  require_once('PHPMailer/class.phpmailer.php');
  require_once('PHPMailer/class.smtp.php');
  $mail = new PHPMailer();

  include_once "webutils.php";
  $utils = new webutils();
if (isset($_SESSION['email'])) {
  $qryy = $conn->prepare("select email from employer where email = ?");
  $qryy->bindParam(1, $_SESSION['email']);
  $qryy->execute();
  $nom=$qryy->rowCount();
  if($nom == 0){
    $qryy1 = $conn->prepare("select email from jobseeker where email = ?");
    $qryy1->bindParam(1, $_SESSION['email'] );
    $qryy1->execute();
    $num4=$qryy1->rowCount();
    if($num4 > 0){
        header("Location: js_dashboard.php");
    }
  }
  else{
      header("Location: emp_dashboard.php");
  }
}



$confirmationMail = false;
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['id']) && !empty($_GET['id'])){

      $email =$_GET['email']; // Set email variable
    $id =$_GET['id']; // Set hash variable
    $stmt = $conn->prepare("select email, unique_id, active from jobseeker where email='$email' and unique_id='$id' and active='0'");
      $stmt->execute();
      if($stmt->rowCount() > 0)
      {
              $stmt1 = $conn->prepare('update jobseeker set active="1" where email=? and unique_id=?');
              $stmt1->bindParam(1, $email);
              $stmt1->bindParam(2, $id);
              $stmt1->execute();
              echo '<script>alert("Account Verified!Login to Continue")</script>';
                $confirmationMail = $utils->confirmationMail($mail, $id, $email);


    }
    if($stmt->rowCount() != True){
      $email =$_GET['email'];
  // Set email variable
  $id =$_GET['id']; // Set hash variable
  $stmt = $conn->prepare("select email, unique_id, active from employer where email='$email' and unique_id='$id' and active='0'");
    $stmt->execute();
    if($stmt->rowCount() > 0)
    {       $stmt1 = $conn->prepare('update employer set active="1" where email=? and unique_id=?');
            $stmt1->bindParam(1, $email);
            $stmt1->bindParam(2, $id);
            $stmt1->execute();
            echo '<script>alert("Account Verified!Login to Continue")</script>';
            $confirmationMail = $utils->confirmationMail($mail, $id, $email);
  }
  else{
    echo '<script>alert("Invalid URl or account already activated!")</script>';
  }
}


}

$result = $email = $pass = $re_pass = $id = "";
 $mailSendToUserJobSeeker = false;
if(isset($_POST['signup_jobseeker'])) {
    if($_POST['email'] != null && !empty($_POST['email']))
    {
        if($_POST['pass'] != null && !empty($_POST['pass']))
        {
            if(($_POST['re_pass'] !=null) && ($_POST['pass'] == $_POST['re_pass']))
            {
                try {
              $email = $_POST['email'];
              $pass = $_POST['pass'];
              $id = uniqid("js");
              $qry = $conn->prepare("select email from jobseeker where email = ?");
              $qry->bindParam(1, $email);
              $qry->execute();
              $no=$qry->rowCount();
              if($no == 0){
                $qry1 = $conn->prepare("select email from employer where email = ?");
                $qry1->bindParam(1, $email);
                $qry1->execute();
                $num=$qry1->rowCount();
                if($num == 0){
              $mailSendToUserJobSeeker = $utils->userMailToJobSeeker($mail, $email,$id);
              if($mailSendToUserJobSeeker)
              {
              $stmt = $conn->prepare('insert into jobseeker (unique_id,email,password) VALUES(?,?,?)');
              $stmt->bindParam(1, $id);
              $stmt->bindParam(2, $email);
              $stmt->bindParam(3, $pass);
              $stmt->execute();
              $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Signup Successfull.Login to continue</div>";
            }
          }
          else{
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong>Email Id already registered!Try Logging in</div>";
                }
        }
          else{
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong>Email Id already registered!Try Logging in</div>";
                }
        }
            catch (PDOException $e) {
                 echo '{"error":{"text":' . $e->getMessage() . '}}';
             }
        }
        else {
          $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Password did not Match!!</div>";
        }
      }
        else
        {
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Password.</div>";
        }
    }
    else
    {
        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Email Address.</div>";
    }
}

if(isset($_POST['signup_employer'])) {
    if($_POST['email'] != null && !empty($_POST['email']))
    {
        if($_POST['pass'] != null && !empty($_POST['pass']))
        {
            if(($_POST['re_pass'] !=null) && ($_POST['pass'] == $_POST['re_pass']))
            {
                try {
              $email = $_POST['email'];
              $pass = $_POST['pass'];
              $id = uniqid("em");
              $qry = $conn->prepare("select email from employer where email = ?");
              $qry->bindParam(1, $email);
              $qry->execute();
              $no=$qry->rowCount();
              if($no == 0){
                $qry1 = $conn->prepare("select email from jobseeker where email = ?");
                $qry1->bindParam(1, $email);
                $qry1->execute();
                $num=$qry1->rowCount();
                if($num == 0){
              $mailSendToUserJobSeeker = $utils->userMailToEmployer($mail, $email,$id);
              if($mailSendToUserJobSeeker)
              {
              $stmt = $conn->prepare('insert into employer (unique_id,email,password) VALUES(?,?,?)');
              $stmt->bindParam(1, $id);
              $stmt->bindParam(2, $email);
              $stmt->bindParam(3, $pass);
              $stmt->execute();
              $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Signup Successfull.Login to continue</div>";
            }
          }
          else{
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong>Email Id already registered!Try Logging in</div>";
                }
          }
          else{
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong>Email Id already registered!Try Logging in</div>";
                }
          }
            catch (PDOException $e) {
                 echo '{"error":{"text":' . $e->getMessage() . '}}';
             }
        }
        else {
          $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Password did not Match!!</div>";
        }
      }
        else
        {
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Password.</div>";
        }
    }
    else
    {
        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Email Address.</div>";
    }
}

if(isset($_POST['login_jobseeker'])) {
  try{

                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $stmt = $conn->prepare("select email,password,active from jobseeker where email = ? and password = ?");
                $stmt->bindParam(1, $email);
                $stmt->bindParam(2, $pass);
                $stmt->execute();
                if($stmt->rowCount() > 0)
                {
                    $data = $stmt->fetchAll();
                    foreach($data as $row) {
                        if($row['active'] == '1')
                        {session_start();
                            $_SESSION['email'] = $_POST['email'];
                            $qry = $conn->prepare("select name from jobseeker where email = ?");
                            $qry->bindParam(1, $email);
                            $qry->execute();
                            if($qry->rowCount() > 0)
                            {
                                $data1 = $qry->fetchAll();
                                foreach($data1 as $row1) {
                                    $name = $row1['name'];
                                    if (is_null($name))
                                    {echo '<script>alert("null")</script>';
                                header("Location: js_profile.php");
                                    }
                                    else{echo '<script>alert("not null")</script>';
                                      header("Location: js_dashboard.php");
                                    }
                                  }
                                }
                              }
                        else
                        {
                            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Your account is inactive.Please verify your email id first.</div>";
                        }
                    }
                }
                else
                {
                    $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Valid Email Address.</div>";
                }
            }
            catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
            }
        }

        if(isset($_POST['login_emp'])) {
          try{

                        $email = $_POST['email'];
                        $pass = $_POST['pass'];
                        $stmt = $conn->prepare("select email,password,active from employer where email = ? and password = ?");
                        $stmt->bindParam(1, $email);
                        $stmt->bindParam(2, $pass);
                        $stmt->execute();
                        if($stmt->rowCount() > 0)
                        {
                            $data = $stmt->fetchAll();
                            foreach($data as $row) {
                                if($row['active'] == '1')
                                {
                                  session_start();
                                  $_SESSION['email'] = $_POST['email'];
                                  $qry = $conn->prepare("select name from employer where email = ?");
                                  $qry->bindParam(1, $email);
                                  $qry->execute();
                                  if($qry->rowCount() > 0)
                                  {
                                      $data1 = $qry->fetchAll();
                                      foreach($data1 as $row1) {
                                          $name = $row1['name'];
                                          if (is_null($name))
                                          {echo '<script>alert("null")</script>';
                                      header("Location: emp_profile.php");
                                          }
                                          else{echo '<script>alert("not null")</script>';
                                            header("Location: emp_dashboard.php");
                                          }
                                        }
                                      }
                                    }
                                else
                                {
                                    $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Your account is inactive.Please verify your email id first.</div>";
                                }
                            }
                        }
                        else
                        {
                            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Valid Email Address/Password.</div>";
                        }
                    }
                    catch(PDOException $e) {
                        echo '{"error":{"text":'. $e->getMessage() .'}}';
                    }
                }
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; Login</title>
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
	<style>
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
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_11.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Sign Up/Login</h1>
            <div class="custom-breadcrumbs">
            <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Log In</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div id="loginResult" style="padding-bottom:4%;"><?php echo $result; ?></div>
      <div class="container">

        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-12 ftcon-animate wow fadeInUp mb-6 pb-6" data-scrollax=" properties: { translateY: '70%' }" style="animation-duration: 1.5s;margin-top:-10%;">

						<div class="ftcon-search" style = "padding-top:10vh">
							<div class="row" style="margin-right:0;margin-left:0; ">

		            <div class="col-md-12 nav-link-wrap">
                <h2 class="mb-4" style="color:#000 !important;font-weight: 400px;font-size:30px;">Sign Up</h2>
			            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Jobseeker</a>

			              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Employer</a>

			            </div>
			          </div>
			          <div class="col-lg-12 tab-wrap">

			            <div class="tab-content" id="v-pills-tabContent">

			              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                      <div class="row">
                        <div class="col-lg-6">
                                <form action="<?=($_SERVER['PHP_SELF'])?>"  method="post" autocomplete="off" class="p-4 border rounded">

                                <div class="row form-group">
                                  <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email address">
                                  </div>
                                </div>
                                <div class="row form-group">
                                  <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">Password</label>
                                    <input type="password" name="pass" minlength="6" class="form-control" placeholder="Password">
                                  </div>
                                </div>
                                <div class="row form-group mb-4">
                                  <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">Re-Type Password</label>
                                    <input type="password" name="re_pass" class="form-control" placeholder="Re-type Password">
                                  </div>
                                </div>

                                <div class="row form-group">
                                  <div class="col-md-12">
                                    <input type="submit" value="Sign Up" name="signup_jobseeker" class="btn px-4 btn-primary text-white">
                                  </div>
                                </div>

                              </form></div>
                                <div class="col-lg-6">
                                <h2 class="mb-4" style="color:#000 !important;font-weight: 400px;font-size:30px;">Log In As Jobseeker</h2>
                                <form action="<?=($_SERVER['PHP_SELF'])?>"  method="post" autocomplete="off" class="p-4 border rounded">

                                  <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                      <label class="text-black" for="fname">Email</label>
                                      <input type="text" name="email" class="form-control" placeholder="Email address">
                                    </div>
                                  </div>
                                  <div class="row form-group mb-4">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                      <label class="text-black" for="fname">Password</label>
                                      <input type="password" name="pass" class="form-control" placeholder="Password">
                                    </div>
                                  </div>

                                  <div class="row form-group">
                                    <div class="col-md-12">
                                      <input type="submit" value="Log In" name="login_jobseeker" class="btn px-4 btn-primary text-white">
                                    </div>
                                  </div>

                                </form></div></div>
			              </div>

			              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                      <div class="row">
                        <div class="col-lg-6">
                              <form action="<?=($_SERVER['PHP_SELF'])?>"  method="post" autocomplete="off" class="p-4 border rounded">

                            <div class="row form-group">
                              <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email address">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Password</label>
                                <input type="password" minlength="6" name="pass" class="form-control" placeholder="Password">
                              </div>
                            </div>
                            <div class="row form-group mb-4">
                              <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Re-Type Password</label>
                                <input type="password" name="re_pass" class="form-control" placeholder="Re-type Password">
                              </div>
                            </div>

                            <div class="row form-group">
                              <div class="col-md-12">
                                <input type="submit" value="Sign Up" name="signup_employer" class="btn px-4 btn-primary text-white">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            </form>
                            <h2 class="mb-4" style="color:#000 !important;font-weight: 400px;font-size:30px;">Log In As Employer </h2>
                            <form action="<?=($_SERVER['PHP_SELF'])?>"  method="post" autocomplete="off" class="p-4 border rounded">

                              <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                  <label class="text-black" for="fname">Email</label>
                                  <input type="text" name="email" class="form-control" placeholder="Email address">
                                </div>
                              </div>
                              <div class="row form-group mb-4">
                                <div class="col-md-12 mb-3 mb-md-0">
                                  <label class="text-black" for="fname">Password</label>
                                  <input type="password" name="pass" class="form-control" placeholder="Password">
                                </div>
                              </div>

                              <div class="row form-group">
                                <div class="col-md-12">
                                  <input type="submit" value="Log In" name="login_emp" class="btn px-4 btn-primary text-white">
                                </div>
                              </div>

                            </form>
                          </div></div>
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

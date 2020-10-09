<?php
include('dbconn.php');
require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
$mail = new PHPMailer();

include_once "webutils.php";
$utils = new webutils();
  $forgotPassword=false;
if (isset($_POST['submit']))
{

  $email=$_POST['email'];
  $query = $conn->prepare("select password,unique_id,name from jobseeker where email = ?");
  $query->bindParam(1, $email);
  $query->execute();
  if($query->rowCount() > 0){
    $data = $query->fetchAll();
    foreach($data as $row) {
      $name=$row['name'];

      $id=$row['unique_id'];
      $password=$row['password'];

    $forgotPassword = $utils->forgotPassword($mail, $email, $name, $id, $password);
   if($forgotPassword){
     echo '<script>alert("Mail sent successfully!!")</script>';
   }
   else{

     echo '<script>alert("Unable to send mail..Please try again later!")</script>';
   }
  }
}
if($query->rowCount() !=True){
  $email=$_POST['email'];
  $query1 = $conn->prepare("select password,unique_id,name from employer where email = ?");
  $query1->bindParam(1, $email);
  $query1->execute();
  if($query1->rowCount() > 0){
    $data1 = $query1->fetchAll();
    foreach($data1 as $row1) {
      $name=$row1['name'];
      $id=$row1['unique_id'];
      $password=$row1['password'];
    $forgotPassword = $utils->forgotPassword($mail, $email, $name, $id, $password);
   if($forgotPassword){
     echo '<script>alert("Mail sent successfully!!")</script>';
   }
   else{
     echo '<script>alert("Unable to send mail..Please try again later!")</script>';
   }
  }
}
else{
  echo '<script>alert("Email id not registered!")</script>';
}
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon | Forgot Password</title>
    <meta charset="utf-8">

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
.header{
    height:100px;
    background-color:#4b79a1;
}
.icon{
  padding:17px;
  background:grey;
  color:white;
  min-width:20px;
  text-align:left;
  margin-top:3%;
  margin-bottom:2%;

}
@media only screen and (max-width:521px)
{
div{
    overflow-x:hidden;
    overflow-y:hidden;
}
  .form{
       width:200%;
     margin-left:-50%;
     margin-top:5%;
     margin-bottom:6%;

  }
  .img{
      text-align:center;
  }
  .form-control{
      width:98%;

  }
  .icon{
      margin-left:1%;

  }

  }

#p{
    text-align:center;
}


    </style>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
     <script src="https://kit.fontawesome.com/dd37b736fa.js" crossorigin="anonymous"></script>

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
    <div class="header">
          <div class="site-logo col-6"><a href="index.php"><img src="images/logo.png" id="h_wirmon" style="height:70px;width: 200px;margin-top:20px;"></a></div>

    </div>

    <!-- HOME -->

    <div class="form"><center>
   <form  method="post" action="<?=($_SERVER['PHP_SELF'])?>" id="p4" style="margin-top:2%;;width:45%;background-image:linear-gradient(to right,#dae2f8,#d6a4a4);">
    <div class="img" >
    <img src="images/fplk.webp" style="width:100px; height:100px;margin-top:2%;margin-bottom:2%;">
    </div>

    <p id="p"><strong> Forgot Password? </strong></p>

    <p id="p">We will help you!!</p>

                                <div class="row form-group" style="width:100%;">
                                  <div class="col-md-12 mb-3 mb-md-0" style=" display:flex;">

                                    <i class="fa fa-envelope-open icon"></i>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email address" style="width:90%; margin-top:3%;margin-bottom:2%;padding:25px;">
                                  </div>

                                </div>
                                <div class="row form-group">
                                  <div class="col-md-12"><center>
                                    <button type="submit" name="submit" class="btn btn-info btn-lg" style="margin-bottom:3%;">Send my password</button>
                                    </div>
                                </div>
                              </form>

     </div>
    </div>






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




    <script src="js/custom.js"></script>



  </body>
</html>

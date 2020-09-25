<?php include_once "Utils.php";
include '../../dbconn.php';
  $utils = new Utils();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Welcome to Wirmon</title>
    <meta charset="utf-8">
    <?php include "../../common.php"?>
    <link rel="stylesheet" href="../../css/custom-bs.css">
    <link rel="stylesheet" href="../../css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../../fonts/line-icons/style.css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/animate.min.css">
      <link rel="stylesheet" href="../../css/flaticon.css">
      <link rel="shortcut icon" type="image/x-icon" href="../../images/fevicon.png">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="all">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet" media="all">
<style>
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

#img{

   margin-left:57px;
   margin-right:20px;

   font-family:sans-serif;
   font-syle:bold;

   border:50px;
}
#top{
    background-color:#4b79a1;
}
#thumbnail:hover{
    width:150px;
    height:auto;
}

h3{
    text-align:center;
}
@media (min-width: 1200px){
.container {
    width: 1160px;
}
}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
    <!-- MAIN CSS -->
    <script src="../../js/main.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/wow.js"></script>
      <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="../../css/dashboard.css">
  </head>
  <body id="top" data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">



<div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;" id="rightMenu">
  <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large" style="padding-right: 3%;">&times;</button>
  <a href="#" class="w3-bar-item w3-button">Jobseeker</a>
  <a href="#" class="w3-bar-item w3-button">Employer</a>
  <a href="#" class="w3-bar-item w3-button">Dashboard</a>
</div>

<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()">&#9776;</button>
</div>
<script>

function openRightMenu() {
  document.getElementById("rightMenu").style.display = "block";
}

function closeRightMenu() {
  document.getElementById("rightMenu").style.display = "none";
}
</script>

    <div class="site-wrap">

              <div class="site-logo col-6"><a href="index.php"><img src="../../images/logo.png" id="h_wirmon" style="height:70px;width: 200px;"></a></div>

     <section style="padding: 4em 0;background-color:#fff;">
      <div class="container">

        <div class="col-md-3 offset-md-2 col-xs-12">
                    <a href="#">
                        <div class="col-md-12 col-xs-12 dashBox bg3">
                            <div class="col-md-3  col-xs-3 padNone">
                                <img src="../../images/users.png" alt="">
                            </div>
                            <div class="col-md-9 col-xs-9 padNone">
                                <h1><?php echo $utils->getTotalJobseekerCnt($conn); ?></h1>
                                <h3>JobSeeker</h3>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 view bor3">
                            <div class="col-md-10 padNone">
                                <p class="col3">View Details</p>
                            </div>
                            <div class="col-md-2 padNone">
                                <span class="circle bor3"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 offset-md-3 col-xs-12">
                    <a href="#">
                        <div class="col-md-12 col-xs-12 dashBox bg1">
                            <div class="col-md-3 col-xs-3 ">
                                <img src="../../images/assistance.png" alt="">
                            </div>
                            <div class="col-md-9 col-xs-9">
                                <h1><?php echo $utils->
                                getTotalinternsCnt($conn); ?></h1>
                                <h3>Employer</h3>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 view bor1">
                            <div class="col-md-10 padNone">
                                <p class="col1">View Details</p>
                            </div>
                            <div class="col-md-2 padNone">
                                <span class="circle bor1"></span>
                            </div>
                        </div>
                    </a>
                </div>
      </div>
    </section>

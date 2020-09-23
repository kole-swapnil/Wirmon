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

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
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

  </head>
  <body id="top" data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">


    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
          <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
              <span class="icon-close2 js-menu-toggle"></span>
            </div>
          </div>
          <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->
      <!-- HOME -->
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">JobSeekar</a>
        <a href="#">Employer</a>
        <a href="#">Dashboard</a>
      </div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Wirmon</span>
      <script>
        function openNav() 
        {
          document.getElementById("mySidenav").style.width = "250px";
        }
        function closeNav()
         {
            document.getElementById("mySidenav").style.width = "0";
          }
      </script>

     <section style="padding: 4em 0;background-color:#fff;">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch">
            <div class="media block-6 services d-block" id="img">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><a href="#"><img src="../../images/admin.webp" id="thumbnail"></a></div>
              <div class="media-body">
                <h3>Job Seeker</h3></p>
              </div>
             </div>
           </div>
           <div class="col-md-3 d-flex align-self-stretch">
            <div class="media block-6 services d-block" id="img">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><a href="#"><img src="../../images/groveHR.webp" id="thumbnail"></a></div>

              <div class="media-body">
                <h3>Job Post</h3></p>
              </div>
             </div>
           </div>
            <div class="col-md-3 d-flex align-self-stretch">
            <div class="media block-6 services d-block" id="img">

              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><a href="#"><img src="../../images/wemail_login.webp" id="thumbnail"></a></div>

              <div class="media-body">
                <h3>Employer</h3></p>
              </div>
             </div>
           </div>
           <div class="col-md-3 d-flex align-self-stretch">
            <div class="media block-6 services d-block" id="img">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><a href="#"><img src="../../images/attendance.webp" id="thumbnail"></a></div>
              <div class="media-body">
                <h3>Dashboard</h3></p>
              </div>
             </div>
           </div>
           



        </div>
      </div>
    </section>

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
h3{
    margin-left:39%;
}
.header{
    height:68px;
    background-color:#4b79a1;
}

@media only screen and (max-width: 521px)
{
 
 .form{
     width:250%;
     margin-left:-69%;
     margin-top:5%;
 }
 #h3{
      margin-top:16%;
      margin-left:30%;
 }

}
 

 
  



</style>
    <!-- MAIN CSS -->
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/wow.js"></script>

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
        <div class="header">
    <div class="site-logo col-6"><a href="index.php"><img src="images/logo.png" id="h_wirmon" style="height:70px;width: 200px;margin-left:30px;"></a></div>
       </div>
    <!-- HOME -->
    <h3 id="h3"> Admin Login </h3>
    <div class="form">
    <form  method="post" autocomplete="off" class="p-4 border rounded"  style="width:35%;  margin-left:30%; background-image:linear-gradient(to right,#f8cdda,#1d2b64);">
                               
                                <div class="row form-group" style="width:98%;">
                                  <div class="col-md-12 mb-3 mb-md-0" style="margin-left:2%;">
                                    <label class="text-black" for="uname">Username</label>
                                    <input type="text" name="uname" class="form-control" placeholder="Username" style="width:108%;  ">
                                  </div>
                                </div>
                                <div class="row form-group" style="width:98%;">
                                  <div class="col-md-12 mb-3 mb-md-0" style="margin-left:2%; ">
                                    <label class="text-black" for="fname">Password</label>
                                    <input type="password" name="pass" minlength="6" class="form-control" placeholder="Password" style="width:108%;" >
                                  </div>
                                </div>
                                <div class="row form-group">
                                  <div class="col-md-12"><center>
                                    <input type="submit"  name="submit" class="btn px-4 btn-primary text-white" style="margin-top:4%;">
                                  </div>
                                </div>
     </div>
   

    
    
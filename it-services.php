<?php
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
$mail = new PHPMailer();
include_once 'webutils.php';
$utils = new webutils();

$result = $name = $mobile = $email = $subject = $message = "";
$mailSendToAdmin = $mailSendToUser = false;
if(isset($_POST['submit']))
{
    if(isset($_POST['name']) && !empty($_POST['name']))
    {
        if(isset($_POST['mobile']) && !empty($_POST['mobile']))
        {
            if(preg_match('/^[0-9]{10}+$/', $_POST['mobile']))
            {
                if(isset($_POST['email']) && !empty($_POST['email']))
                {
                  if(isset($_POST['subject']) && !empty($_POST['subject']))
                  {
                    if(isset($_POST['message']) && !empty($_POST['message']))
                    {
                        $name = $_POST['name'];
                        $mobile = $_POST['mobile'];
                        $email = $_POST['email'];
                        $subject = $_POST['subject'];
                        $message = $_POST['message'];

                        //adminMail
                        $mailSendToAdmin = $utils->adminContactForm($mail, $name, $mobile, $email, $subject, $message);
                        if($mailSendToAdmin)
                        {
                            //userMail
                            $mailSendToUser = $utils->userContactForm($mail, $name, $email);
                            if($mailSendToUser)
                            {
                                $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Thanks For Contacting Us.We will get back to you soon!</div>";
                            }
                        }

                    }
                    else
                    {
                        $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Your Message.</div>';
                    }
                }
                else
                {
                    $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Your Subject.</div>';
                }

                }
                else
                {
                    $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Email Address.</div>';
                }
            }
            else
            {
                $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Valid Phone Number.</div>';
            }
        }
        else
        {
            $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Phone Number.</div>';
        }
    }
    else
    {
        $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Name.</div>';
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; IT Services</title>
    <meta charset="utf-8">

   <?php include "common.php"?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
#img{
    text-align:center;
    margin-right:20px;
    border:50px;
}
 .ser{
      width:450px;
      height:360px;
      border-radius:10%;
      margin-left:30%;
      margin-top:9px;
      margin-bottom:5px;
      
  }
  #p{
      text-align:justify;
      margin-left:2%;
  }
  
  
 @media only screen and (max-width: 521px)
{   .vhide{
   display:none;
 }
  
  #img1{
      margin-left:-235px;
      text-align:center;
  }
   #img2{
       margin-left:20px;
       text-align:center;
   }
   #ul{
       text-align:left;

   }

  .ser{
      width:330px;
      height:300px;
      border-radius:10%;
      margin-left:8%;
      margin-top:9px;
      margin-bottom:4px;
      
  }
  

}
  @media only screen and (max-width: 320px)
{
  .vhide{
   display:none;
 }
 
 .ser{
      width:280px;
      height:200px;
      border-radius:10%;
      margin-left:5%;
      margin-top:30px;
      margin-bottom:3px;
      
  }
 }

  
  
  .pic-ctn {
    height:90vw;
  width:90vw;
  
}
@keyframes display {
  0% {
    transform: translateX(200px);
    opacity: 0;
  }
  10% {
    transform: translateX(0);
    opacity: 1;
  }
  20% {
    transform: translateX(0);
    opacity: 1;
  }
  30% {
    transform: translateX(-200px);
    opacity: 0;
  }
  100% {
    transform: translateX(-200px);
    opacity: 0;
  }
}


.pic-ctn {
  position: relative;
  
  margin-bottom:19%;

 
}


.pic-ctn > img {
  position: absolute;
  top: 0;
  
  opacity: 0;
  animation: display 10s infinite;
  height:90vw;
  width:90vw;
  border-radius:10%;
  
}

img:nth-child(2) {
  animation-delay: 2s;
  height:90vw;
  width:90vw;
  border-radius:10%;
   
}
img:nth-child(3) {
  animation-delay: 4s;
  height:90vw;
  width:90vw; 
  border-radius:10%;

}
img:nth-child(4) {
  animation-delay: 6s;
  height:90vw;
  width:90vw;
  border-radius:10%;
}
img:nth-child(5) {
  animation-delay: 8s;
  height:90vw;
  width:90vw; 
  border-radius:10%;
}
 
 @media only screen and (max-width: 521px)
 {   .vhide{
   display:none;
 }
 .pic-ctn {
  height:90vw;
  width:90vw;
}
     .pic-ctn {
  position: relative;
  height:90vw;
  width:90vw;
  margin-top: 10px;

  
  
}

.pic-ctn > img {
  position: absolute;
  top: 0;

  opacity: 0;
  animation: display 10s infinite;
  height:90vw;
  width:90vw;
  border-radius:20%;
  
}

img:nth-child(2) {
  animation-delay: 2s;
  height:90vw;
  width:90vw;
  border-radius:20%;
}
img:nth-child(3) {
  animation-delay: 4s;
  height:90vw;
  width:90vw;
  border-radius:20%;
}
img:nth-child(4) {
  animation-delay: 6s;
  height:90vw;
  width:90vw;
  border-radius:20%;
}
img:nth-child(5) {
  animation-delay: 8s;
  height:90vw;
  width:90vw;
  border-radius:20%;
}
 }

 @media only screen and (max-width: 320px)
 {   .vhide{
   display:none;
 }
 .pic-ctn {

  height:90vw;
  width:90vw;
  
}
 
     .pic-ctn {
  position: relative;
  height:90vw;
  width:90vw;
  margin-top: 10px;
  
}

.pic-ctn > img {
  position: absolute;
  top: 0;

  opacity: 0;
  animation: display 10s infinite;
  height:90vw;
  width:90vw;
  border-radius:20%;
  
}

img:nth-child(2) {
  animation-delay: 2s;
  height:90vw;
  width:90vw;
   border-radius:20%;
}
img:nth-child(3) {
  animation-delay: 4s;
  height:90vw;
  width:90vw;
  border-radius:20%;
}
img:nth-child(4) {
  animation-delay: 6s;
  height:90vw;
  width:90vw; 
  border-radius:20%;
}
img:nth-child(5) {
  animation-delay: 8s;
  height:90vw;
  width:90vw;
  border-radius:20%;
}
 }
 @media only screen and (max-width: 375px)
 {
  .vhide{
   display:none;
 }
 .pic-ctn {
  width: 280px;
  height:300px;
  
}
 
     .pic-ctn {
  position: relative;
  width: 280px;
  height: 300px;
  margin-top: 10px;
  
}

.pic-ctn > img {
  position: absolute;
  top: 0;
 
  opacity: 0;
  animation: display 10s infinite;
  height:300px;
  width:280px;
  border-radius:20%;
  
}

img:nth-child(2) {
  animation-delay: 2s;
  height:300px;
  width:280px;
  border-radius:20%;
}
img:nth-child(3) {
  animation-delay: 4s;
   height:300px;
  width:280px;
  border-radius:20%;
}
img:nth-child(4) {
  animation-delay: 6s;
  height:300px;
  width:280px;
  border-radius:20%;
}
img:nth-child(5) {
  animation-delay: 8s;
   height:300px;
  width:280px;
  border-radius:20%;
}
 }
 @media only screen and (max-width: 768px) and (min-width:600px)
 { 
 .ser{
     margin-top:9%;
     margin-left:20%;
     margin-bottom:4%;
     width:500px;
     height:400px;
 }
 #h2{
     margin-left:27%;
 }
  .pic-ctn {
  position: relative;
  width: 400px;
  height: 320px;
  margin-top: 20px;


  
}

 }
 @media (min-width:760px){
  .pic-ctn {
  position: relative;
  width: 280px;
  height: 300px;
  margin-top: 10px;

}

.pic-ctn > img {
  position: absolute;
  top: 0;
  margin-left:-64px ;
  opacity: 0;
  animation: display 10s infinite;
  height:300px;
  width:280px;
  border-radius:20%;

}
img:nth-child(2) {
  animation-delay: 2s;
  height:300px;
  width:280px;
  border-radius:20%;
}
img:nth-child(3) {
  animation-delay: 4s;
   height:300px;
  width:280px;
  border-radius:20%;
}
img:nth-child(4) {
  animation-delay: 6s;
  height:300px;
  width:280px;
  border-radius:20%;
}
img:nth-child(5) {
  animation-delay: 8s;
   height:300px;
  width:280px;
  border-radius:20%;
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
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_11.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">IT Service</h1>
            <div class="custom-breadcrumbs">
            <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
            <a href="services.php">Services</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>IT Service</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section block__18514" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 mr-auto">
            <div class="border p-4 rounded">
              <ul class="list-unstyled block__47528 mb-0">
                <li><span class="active">IT Services</span>
                <ul>
                <li><a href="#">Android Apps</a></li>
                <li><a href="#">Wordpress Dev</a></li>
                <li><a href="#">Drupal Dev</a></li>
                <li><a href="#">E-commerce</a></li>
                <li><a href="#">Saas Development</a></li>
                <li><a href="#">Quality Assurance</a></li>
                <li><a href="#">Bespoke Web Apps</a></li>

              </ul>
            </li>
              <li><a href="digital_marketing.php">Digital Marketing</a></li>
                <li><a href="hr-services.php">HR Services</a></li>
                <li><a href="certi.php">Certifications</a></li>
                <li><a href="hr-services.php">Job Portal</a></li>

          </ul>
            </div>
          </div>
          <div class="col-lg-9">
           <div class="pic-ctn" >
            
    <img  src="images/it1.webp"  alt="" class="pic">
    <img  src="images/it3.webp" alt="" class="pic">
    <img  src="images/it4.webp"  alt="" class="pic">
    <img  src="images/it5.webp"  alt="" class="pic">
    <img  src="images/it6.webp"  alt="" class="pic">
    
   
    </div>
            

                
<center>  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Hire Us</button><center></p>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enquiry</h4>
        </div>
        <div class="modal-body">
          <form action="<?=($_SERVER['PHP_SELF'])?>" method="post">

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Name</label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Phone Number</label>
                  <input type="text" name="mobile" id="mobile" pattern="[0-9]{10}" class="form-control">
                </div>
              </div>

              <div class="row form-group">

                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">

                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label>
                  <input type="subject" name="subject" id="subject" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label>
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                </div>
              </div>


            </form>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

          </div>
        </div>
      </div>   
      </section>

       <section style="background-color:#D8BFD8; ">
      <div class="container" >
        <div class="row d-flex">
        <span class="text-primary d-block mb-5"><span class="icon-laptop display-1"></span></span>
            

        <h1 id="h1">IT Services</h1>

     <p id="p"><strong>Wirmon offers you a wide variety of IT managed services. Do you need an expert to manage your employment, IT services and even digital marketing to help you design, maintain, train your client or need additional remote IT support for your in-house department? You have come to the right place! </p>
	
 <p id="p">We at Wirmon have been offering services since 2016 and we are passion-driven and committed to providing you with the premium level of reliability, security and support. </p>
<p id="p" class="vhide">The quality of our support is unparalleled as we tailor our replies to suit your knowledge and expectations.

<p id="p" class="vhide">We welcome and act on your feedback because we are always looking for ways to improve every aspect of our business and stay ahead with the state-of-the-art technology to keep our offered services up to date. </p>

<p id="p" class="vhide">We design, evaluate and justify technology solutions from a thorough understanding of the business benefit of your company.
<p id="p" class="vhide">Our extensive experience managing all types of complex projects means we will handle every detail and coordinate all vendors so you can rest assured that your project will be completed on time and on budget. </p>

<p id="p" class="vhide">And finally we always want you to be completely satisfied with our services. We will do whatever it takes to make you happy. No hassles, no problems. </p>

</strong>





      <div class="col-md-3 col-xs-6 d-flex align-self-stretch">
      <div class="media block-6 services d-block"  id="img">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><img src="images/s1.jpeg" style="height:133px; width:133px; border-radius:50%; margin-top:12%;"></div>
              <div class="media-body">
                <h3>SEO</h3></p>
              </div>
             </div>
             </div>


            <div class="col-md-3 col-xs-6 d-flex align-self-stretch">
           <div class="media block-6 services d-block" id="img">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><img src="images/analytics.jpeg" style="height:133px; width:133px; border-radius:50%; margin-top:12%;"></div>
              <div class="media-body">
                <h3>Google Analytics</h3></p>
              </div>
             </div>
             </div>


             <div class="col-md-3 col-xs-6 d-flex align-self-stretch">
            <div class="media block-6 services d-block" id="img">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><img src="images/cw.jpeg" style="height:133px; width:133px; border-radius:50%; margin-top:12%;"></div>
              <div class="media-body">
                <h3>Content Marketing</h3></p>
                </div>
                </div>
             </div>


              <div class="col-md-3 col-xs-6 d-flex align-self-stretch">
            <div class="media block-6 services d-block" id="img">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><img src="images/ppc.jpeg" style="height:133px; width:133px; border-radius:50%; margin-top:12%;"></div>
              <div class="media-body">
                <h3>Pay per click</h3></p>
                </div>
                </div>
             </div>
             <div class="col-md-3 col-xs-6 d-flex align-self-stretch">
            <div class="media block-6 services d-block" id="img">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><img src="images/smo.jpeg" style="height:133px; width:133px; border-radius:50%; margin-top:12%;"></div>
              <div class="media-body">
                <h3>                <h3>Social Media Optimization</h3></p>
</h3></p>
                </div>
                </div>
             </div>




              <div class="col-md-3 col-xs-6 d-flex align-self-stretch" style="text-align:center;">
             <div class="media block-6 services d-block" id="img2">

              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><img src="images/smm.jpeg" style="height:133px; width:133px; border-radius:50%; margin-top:12%;  "></div>
              <div class="media-body">

                <h3>Social Media Marketing</h3></p>
                </div>
                </div>
             </div>

             <div class="content" style="margin-left:2%;text-align:justify;font-family:sans-serif; ">
            

          <h2>Android Apps:</h2> 
         <p id="p"> We are in the year 2020 and mobile phones have become a part of everyone&#146s life and hence a rise in mobile applications is something that&#1469s growing day by day. Globally nearly 800 million people love android apps. We focus on the latest resources, hence keep us updated with the leading-edge technology so we can create applications that match the expectations of today&#146s mobile users. Our developers ensure creating applications that work flawlessly on Android based phones. 
As there are hundreds of Android devices in the market, it is the utmost necessity to design an app that can be compatible with various screen size devices. We streamline the application development process into 4 phases: </p>
   <ul id="ul" class="vhide"style="text-align:left;margin-top:2%;margin-left:-1%;">
<li>Planning: We take into consideration all the recommendations while keeping the users in mind and create a plan of action. We work on the software and hardware requirements; we maintain the development phase as flexible as possible to avoid any difficulties.</li>
<li> Building: This is the execution phase. This phase ensures that the user will receive updates and suggestions from the team, so they update the user with the latest developments in the app&#146s making. The application is being debugged repeatedly to remove any bugs in the programming. </li>
<li> Deploying: At this stage of the android application development phase, the application is still not ready for the end user. The team host the application on markets and Play Store and only then it can by downloaded by the users. </li>
<li> Maintaining: The application will not remain the same forever and constantly undergoes updates based on market evolution and additional features required by customers. We will maintain an engagement with you and ensure that the investment you have made in software development gives the best value for money.</li>
</ul>

      <div>
   <img src="images/and.webp" class="ser">
</div>

<h2> Wordpress Dev:</h2>
<p id="p">WordPress powers over 31% of the worldwide web. It is a supreme web development platform to manage professional and personal goals while helping you build flexible and scalable solutions. WordPress is a supreme web development platform to manage your professional and personal goals while helping you to build flexible & scalable solutions.</p>
   <ul id="ul" class="vhide" style="text-align:left;margin-top:2%;margin-left:-1%;">
<li>Our services focusses on the agile forefront and our team is well-versed with the modern tools required to fulfill the services.</li>
<li>Our team work to provide fully-functional websites to serve your business and personal needs.</li>
<li>We ensure to maintain a balance between seamless website operations and cost-effectiveness.</li>
<li> We help you stride towards advancements and growth.</li>
<li> Our team is proficient with the tools and hold expertise in providing you with the satisfaction you desire from the functionality and options that you ask for.</li>
</ul>

 <div >
   <img src="images/wordpress.webp" class="ser">
</div>

<h2> Drupal Dev:</h2>
<p id="p"> Drupal is an open source content management platform powering millions of websites and applications around the world. It&#146s built, used, and supported by an active and diverse community of people internationally. 
We help plan an effective, responsive design and turning it into a working theme. We work closely with the customers to ensure an effective, visually appealing, and intuitive implementation. We have expertise in building interesting applications and websites that drive successful outcomes for enterprises like yours. 
At Wirmon, we strive to deliver efficient, effective, and tailor-fit solutions to meet your business&#146s unique needs. </p>
<p id="p">Wirmon&#146s expert team can help you if you&#146re looking to:</p>

   <ul id="ul" class="vhide" style="text-align:left;margin-top:2%;margin-left:-1%;">
   <li>Build an application or website with Drupal</li>
   <li>Maintain an existing Drupal site </li>
   </ul>

    <div >
   <img src="images/drupal.webp" class="ser">
</div>

<h2>E-commerce:</h2>
<p id="p">For the past 4 years Wirmon has delivered best in class eCommerce solutions to fuel business strategies. We provide eCommerce solutions to cater to B2B, B2C and Marketplace businesses. E-commerce has helped businesses establish a wider market presence by providing cheaper and more efficient distribution channels for their products or services. At Wirmon e-commerce operates on all four categories:</p>
  <ul id="ul" class="vhide" style="text-align:left;margin-top:2%;margin-left:-1%;">
     <li> Business to business </li>
     <li>Business to consumer </li>
	 <li>Consumer to consumer </li>
     <li>Consumer to business </li>
   </ul>
<p id="p">Our team of experts will come alongside your business, guiding your strategic road map and establishing goals that help you succeed. </p>

 <div>
   <img src="images/ecom.webp" class="ser">
</div>

<h2> SaaS Development:</h2>
<p id="p">We at Wirmon offer SaaS services that use software to provide customers with a service. These services will help the customers to create, develop, host, and update the product all from one central location. 
Software as a Service is exploding and almost all the businesses today use SaaS for their services. SaaS is changing the way organizations work. At Wirmon, we offer SaaS services that help in distributing data online to be accessible from a browser on any device. </p>
<ul id="ul" class="vhide" style="text-align:left;margin-top:2%;margin-left:-1%;">
<li>We continue to host the software and provide constant IT support.</li>
<li>This allows for stronger network security, greater collaboration, additional features, and straight-forward upfront prices.</li>
<li>We build our SaaS business in three phases: setup, growth, and stabilization.</li>
<li>We focus on customer needs that are specific to business owners and management teams.</li>
<li>Since the products help businesses achieve goals, we are deeply invested in customer success. </li>
</ul>

 <div>
   <img src="images/saas.webp" class="ser">
</div>

<h2>Quality Assurance:</h2>
<p id="p">Our experts at Wirmon have an eye for detail and interpretation we build upon and comply with company quality assurance standards: </p>
<ul id="ul" class="vhide" style="text-align:left;margin-top:2%;margin-left:-1%;">
<li>Carefully maintain complaint and nonconformance processing through records and tracking systems, including root cause and corrective actions. Document quality assurance activities with internal reporting and audits.</li>
<li>Develop new standards for production and design, with improvements as needed, and create testing protocols for implementation across all service lines. Identify training needs and take action to ensure company-wide compliance</li>
<li>Pursue continuing education on alternative solutions, technology, and skills.Plan, execute, and oversee inspection and testing of incoming and outgoing product to confirm quality conformance to specifications and quality deliverables</li>
<li>Assist operations and local quality function in tracking, documenting, and reporting quality, levels and CSR, environmental and health and safety goals/KPIs.</li>
<li>Analyze and investigate product complaints or reported quality issues to ensure closure under company guidelines and external regulatory requirements.</li>
<li>Develop or update company complaint and inspection procedures to ensure capture and investigation, and proper documentation of complaints. Monitor risk-management procedures and maintain and analyze problem logs to identify and report recurring issues to management and product development.</li>
</ul>

 <div>
   <img src="images/quality.webp" class="ser">
</div>

 <h2> Bespoke Web apps:</h2>
<p id="p">Every web application is unique, but a bespoke one refers to a web page which is built based on the requirements mentioned by the clients. At Wirmon we are deeply invested in providing customer satisfaction, hence we make sure the clients seek a few benefits from our services:</p>
<ul id="ul" class="vhide" style="text-align:left;margin-top:2%;margin-left:-1%;">
<li> Scalable application - the app can be scaled up as and when required to accommodate the additional features and functionalities required by the clients. We make the custom website flexible so it can add to these changes.</li>
<li> Highly Secured- All bespoke web apps are developed with a set of uniquely written code. This makes the app highly secured. Since it&#146s a custom application, the details of the code remain only with the developer and the owner.</li>
<li>Unique- Every brand/product/service has its own set of USPs and that should reflect in the layout and page designs. </li>
<li> Lead generation - A custom web app can be tailored in a way that it can help the owner gain data from website traffic and generate new leads.</li>
 </ul>

  <div>
   <img src="images/webapp.webp" class="ser">
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

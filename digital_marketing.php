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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="viewport" content="width=device-width, initial-scale=1">
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


#h2{
    margin-left:400px;
}
#p{
    text-align:center;
}

#ul{
    text-align:center;
}

 @media only screen and (max-width: 521px)
{
  #h2{
  margin-left:85px;
  }
  #p{
      text-align:center;
      margin-left:10px;
      margin-right:10px;
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
      
  .setimg{
      margin-left:-510px;
      margin-top:230px;
      
  }
  
}
  @media only screen and (max-width: 320px)
{
 section{
     width:115%;
 }
 #ul{
     text-align:left;
 }
 .setimg{
     margin-left:-540px;
 }
}
 
  section{
  text-align:center;
  }
  
  .pic-ctn {
  width: 400px;
  height: 300px;
  
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
  
  margin-bottom:10%;
  margin-left:-20%;
 
}

.pic-ctn > img {
  position: absolute;
  top: 0;
  
  opacity: 0;
  animation: display 10s infinite;
}

img:nth-child(2) {
  animation-delay: 2s;
}
img:nth-child(3) {
  animation-delay: 4s;
}
img:nth-child(4) {
  animation-delay: 6s;
}
img:nth-child(5) {
  animation-delay: 8s;
}
 
 @media only screen and (max-width: 521px)
{
.pic-ctn{
    margin-left:-55%;
    margin-top:10%;
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
            <h1 class="text-white font-weight-bold">Digital Marketing</h1>
            <div class="custom-breadcrumbs">
            <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
            <a href="services.php">Services</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Digital Marketing</strong></span>
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
                <li><a href="hr-services.php">IT Services</a></li>
                <li><a href="digital_marketing.php">HR Services</a></li>
                <li><a href="certi.php">Certifications</a></li>
                <li><a href="hr-services.php">Job Portal</a></li>
                <li><span class="active">Digital Marketing</span>
                  <ul><li><a href="#">Social Media Marketing</a></li>
                      <li><a href="#">SEO</a></li>
                      <li><a href="#">Social Media Optimization</a></li>
                      <li><a href="#">Pay Per Click (PPC)</a></li>
                      <li><a href="#">Content Marketing</a></li>
                      <li><a href="#">Google Analytics</a></li></ul></li>

              </ul>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="pic-ctn">
    <img src="images/x3.webp" style="height:300px; width:400px;border-radius:10%;" alt="" class="pic">
    <img src="images/x1.webp" style="height:300px; width:400px; border-radius:10%;" alt="" class="pic">
    <img src="images/x2.webp" style="height:300px; width:400px; border-radius:10%;" alt="" class="pic">
    <img src="images/x4.webp" style="height:300px; width:400px; border-radius:10%;" alt="" class="pic">
    <img src="images/x5.webp" style="height:300px; width:400px;border-radius:10%;" alt="" class="pic">
  </div>
        
        <p>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Hire Us</button></p>
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
     <section style="padding:1em 0;background-color:#D8BFD8; ">
      <div class="container" >
        <div class="row d-flex">
        <h2 id="h2"> Digital Marketing</h2>
       
      <p id="p">Wirmon's digital marketing team encompasses all your marketing efforts to promote your product to take over the industry. We will help with the strategies in promoting your business so that you can connect with current and prospective customers </p>
      <div class="col-md-3 d-flex align-self-stretch">
      <div class="media block-6 services d-block"  id="img">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><img src="images/s1.jpeg" style="height:133px; width:133px; border-radius:50%; margin-top:12%;"></div>
              <div class="media-body">
                <h3>SEO</h3></p>
              </div>
             </div>
             </div>
           
             
            <div class="col-md-3 d-flex align-self-stretch">
           <div class="media block-6 services d-block" id="img">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><img src="images/analytics.jpeg" style="height:133px; width:133px; border-radius:50%; margin-top:12%;"></div>
              <div class="media-body">
                <h3>Google Analytics</h3></p>
              </div>
             </div>
             </div>
           
            
             <div class="col-md-3 d-flex align-self-stretch">
            <div class="media block-6 services d-block" id="img">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><img src="images/cw.jpeg" style="height:133px; width:133px; border-radius:50%; margin-top:12%;"></div>
              <div class="media-body">
                <h3>Content Marketing</h3></p>
                </div>
                </div>
             </div>

              
              <div class="col-md-3 d-flex align-self-stretch">
            <div class="media block-6 services d-block" id="img">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><img src="images/ppc.jpeg" style="height:133px; width:133px; border-radius:50%; margin-top:12%;"></div>
              <div class="media-body">
                <h3>Pay per click</h3></p>
                </div>
                </div>
             </div>

            
           <div class="col-md-3 d-flex align-self-stretch"  style="margin-left:245px; text-align:center;" >
             <div class="media block-6 services d-block" id="img1">
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><img src="images/smm.jpeg" style="height:133px; width:133px; border-radius:50%; margin-top:12%;"></div>
              <div class="media-body">
                <h3 >Social Media Marketing</h3></p>
                </div>
                </div>
             </div>
            
             
           
              <div class="col-md-3 d-flex align-self-stretch" style="text-align:center;">
             <div class="media block-6 services d-block" id="img2">
          
              <div class="icon fadeInUp wow" style="animation-duration:2s;visibility:visible !important;"><img src="images/smo.jpeg" style="height:133px; width:133px; border-radius:50%; margin-top:12%;  "></div>
              <div class="media-body">
              
                <h3>Social Media Optimization</h3></p>
                </div>
                </div>
             </div>
             
             <div class="content" style="text-align:left; margin-left:5%;font-family:sans-serif;line-height:1.7; ">
            <h2> SEO</h2>
            <ul id="ul" style="text-align:left;margin-top:2%;margin-left:-2%;">
<li> Search Engine Optimization (SEO) ensures a user-friendly website.</li>
<li> has engaging content that attracts customers or visitors. </li>
<li>comprises of technical set-up and focus keywords. </li>
<li> helps the page appears at the top of the search. </li>
<li> generate traffic to your website. </li>
<li> involves three procedures on-page,off-page, and technical SEO.</li>    
</ul>

<div class="setimg">
<img   src="images/seoli.webp" style="height:250px; width:330px; border-radius:10%; margin-left:530px; margin-top:-210px;">
 </div> 

<h2>Google Analytics</h2>
        <ul id="ul" style="text-align:left;margin-top:2%;margin-left:-2%;">
        <li>Google Analytics is a strong tool that every business owner should use. </li>
        <li> assists to set up goals and campaign tracking.</li>
        <li> used to blend your business in the right direction. </li>
        <li> helps to make an informed decision.</li>
        <li> grow your business online visibility in its process. </li>
        <li> Tracks and reports website traffic </li>
        </ul>

        <div class="setimg">
<img   src="images/gali.webp" style="height:250px; width:330px; border-radius:10%; margin-left:530px; margin-top:-210px;">
 </div> 
           <h2> Content Marketing</h2>
           <ul id="ul" style="text-align:left;margin-top:2%;margin-left:-2%;">
           <li> Content marketing is the charge that operates your strategies.</li>
           <li> Making videos, blogs will help you to demonstrate industry expertise.</li>
           <li> Creating and promoting assets of content </li>
           <li> To generate traffic growth and customer interaction.</li>
           <li> Creating relevant content helps your audience</li>
           <li> Establish your organization as a valuable source of information.</li>
           </ul>

           <div class="setimg">
<img   src="images/cwli.webp" style="height:250px; width:330px; border-radius:10%; margin-left:530px; margin-top:-210px;">
 </div> 
           <h2>Pay Per Click(PPC)</h2>
           <ul id="ul" style="text-align:left;margin-top:2%;margin-left:-2%;">
         <li> Paid advertising is visible and effective in different organizations.</li>
         <li> Paid search is mentioned to “Sponsored result”</li>
         <li> Result is shown on Search Engine Results Pages(SERP).</li>
         <li> Tailor ads to appear when a specific search is targeted.</li>
         <li>You can publish these ads on social media pages.</li>
         <li> Helps to widen your organizations reach. </li>
         </ul>
          <div class="setimg">
<img   src="images/ppcli.webp" style="height:250px; width:330px; border-radius:10%; margin-left:530px; margin-top:-210px;">
 </div> 

            <h2>Social Media Marketing</h2>
            <ul id="ul" style="text-align:left;margin-top:2%;margin-left:-2%;">
             <li>Social Media Marketing is a platform to connect with your followers </li>
             <li>Either through comments, likes, etc on the information you share</li>
             <li>It promotes your brand and content on media channels </li>
             <li> Increases brand awareness.</li>
             <li> Increases traffic to your website and generates leads.</li>
             <li>fabricates a social element in every aspect of your marketing activities.</li>
             </ul>

              <div class="setimg">
<img   src="images/smmli.webp" style="height:250px; width:330px; border-radius:10%; margin-left:530px; margin-top:-210px;">
 </div> 

           <h2>Social Media Optimization</h2>
            <ul id="ul" style="text-align:left;margin-top:2%;margin-left:-2%;">
             <li>Social Media Optimization and Search Engine Optimization are similar. </li>
             <li> It involves Using social media as an agent </li>
             <li> For sharing the product page of your organization through social media.</li>
             <li>Adding a share button to your content might be useful.</li>
             <li> Helps you to reach a different audience.</li>
             <li>Use keywords and optimization techniques that allow you to engage .</li>
             </ul>


              <div class="setimg">
<img   src="images/smoli.webp" style="height:250px; width:330px; border-radius:10%; margin-left:530px; margin-top:-210px;">
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

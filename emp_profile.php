<?php
include "dbconn.php";
 session_start();
 if (($_SESSION['email'] == '') || (!isset($_SESSION['email']))) {
      header("Location: login.php");
}
$email=$_SESSION['email'];
$qry = $conn->prepare("select * from employer where email = ?");
$qry->bindParam(1, $email);
$qry->execute();
if($qry->rowCount() > 0)
{
    $data = $qry->fetchAll();
    foreach($data as $row) {
      $name=$row['name'];
      $contact=$row['contact_no'];
      $location=$row['location'];
      $company_name=$row['company_name'];
      $comp_email=$row['company_email'];
      $category=$row['category'];
      $comp_desc=$row['comp_desc'];
      $url=$row['website_url'];
      $regis_aadhar=$row['regisORaadhar'];
      $pan_gst=$row['panORgst'];
      $logo_photo=$row['logoORphoto'];
    }
  }
  if(isset($_POST['submit'])) {
$name=$_POST['name'];
$contact=$_POST['contact'];
$location= $_POST['location'];
$company_name=$_POST['company_name'];
$comp_email=$_POST['company_email'];
if($_POST['category'] == "")
{$category=$category;}
else{ $category=$_POST['category'];}
 $url=$_POST['url'];
 $discussionContent = $_POST['discussionContent'];

$filename1 = $_FILES['aadhar']['name'];
if($filename1=="")
{$filename1= $regis_aadhar;}
else{
  $tempname1 = $_FILES['aadhar']['tmp_name'];
  $target_dir1 = "Emp_document/".$filename1;
    move_uploaded_file($tempname1,$target_dir1);}
    $filename2 = $_FILES['PAN']['name'];
if($filename2=="")
{$filename2=$pan_gst;}
else{
  $tempname2 = $_FILES['PAN']['tmp_name'];
  $target_dir2 = "Emp_document/".$filename2;
  move_uploaded_file($tempname2,$target_dir2);}
  $filename3 = $_FILES['logo']['name'];
if($filename3=="")
{$filename3= $logo_photo;}
else{
  $tempname3 = $_FILES['logo']['tmp_name'];
  $target_dir3 = "Emp_document/".$filename3;
  move_uploaded_file($tempname3,$target_dir3);}

  $stmt1 = $conn->prepare("update employer set name='$name',contact_no='$contact',location='$location',company_name='$company_name',company_email='$comp_email',category='$category',comp_desc='$discussionContent',website_url='$url',regisORaadhar='$filename1',panORgst='$filename2',logoORphoto='$filename3' where email=? ");
  $stmt1->bindParam(1, $email);

    $stmt1->execute();
//  echo '<script>alert("success")</script>';
        echo "<script>alert('Your Profile is Updated Successfully')</script>";


}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; Dashboard-Profile</title>
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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/dash.css">
<style>
.bs-placeholder{margin-left:unset !important;border:unset !important;}
.btn{margin-left:unset !important;border:unset !important;}
@media only screen and (max-width: 521px){
  .ml-auto{display:none;}
  .icon-menu{margin-right: -120px;}
  .logout{display: block !important;}
}
.form-group{
    width: 49%;display: inline-block;
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
@media only screen and (max-width: 512px)
{
div{
      width:105%;
      overflow-x:auto;

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
                  <a data-toggle="collapse" data-target="#collapseItem0">Services</a>
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
               if($name == "")
               {
                echo $_SESSION['email'];}
                else{
                  echo $name;
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
                    <li class="acto">
                        <a href="emp_profile.php" style="color:white;">View/Update Profile</a>
                    </li>
                    <li class="enabled">
                        <a href="emp_postjob.php" style="color:white;">Post New Job</a>
                    </li>
                    <li class="enabled">
                        <a href="search_users.php" style="color:white;">Search User</a>
                    </li>
                    <li class="enabled">
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
    <div class="col-md-9">
      <div class="row align-items-center mb-5" style="margin-left:unset;margin-right:unset;">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <div class="d-flex align-items-center">
            <div>
              <h2>Employer Profile</h2>
            </div>
          </div>
        </div>

      <div class="col-lg-4">
            <div class="row">
              <div class="col-6">
                </div>
              <div class="col-6">
                <a href="#" class="btn btn-block btn-primary btn-md" id="edit" style="font-size:18px;"><span class="icon-edit"></span> Edit</a>
              </div>
            </div>
          </div>
          </div>
      <div class="row mb-4" style="margin-left:unset;margin-right:unset;">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" method="post" role="form" action="<?=($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
            <h3 class="text-black mb-5 border-bottom pb-2">User Details</h3>

            <div class="form-group">
              <label for="name"><span class="icon-user mr-3"></span>Name</label>
              <input type="text"  class = "za form-control"  style = "display:none" name="name" value="<?php echo $name;?>"  id="email" placeholder="John Doe" required="required">
              <span class = "zp" style = "padding-left : 10px"><?php echo $name;?></span>
            </div>
            <div class="form-group">
              <label for="email"><span class="icon-envelope mr-3"></span>Email</label>
              <input type="text"  class = "za form-control"   style = "display:none" name="email" value="<?php echo $_SESSION['email'];?>"  id="email" placeholder="you@gmail.com" required="required">
              <span class = "zp" style = "padding-left : 10px"><?php echo $_SESSION['email'];?></span>
            </div>
            <div class="form-group">
              <label for="job-title"><span class="icon-tablet mr-3"></span>Contact No</label>
              <input type="text"  class = "za form-control"   style = "display:none" name="contact" value="<?php echo $contact;?>" pattern="[0-9]{10}" id="job-title" placeholder="9850667788" required="required">
              <span class = "zp" style = "padding-left : 10px"><?php echo $contact;?></span>
            </div>


          <h3 class="text-black my-5 border-bottom pb-2">Company Details</h3>
            <div class="form-group non">
              <label for="company-name" class="email"><span class="icon-building mr-3"></span>Company Name</label>
              <input name="company_name"   style = "display:none"  class = "za form-control" type="text" value="<?php echo $company_name;?>"  id="company-name" placeholder="Mycompany Pvt Ltd">
              <span class = "zp" style = "padding-left : 10px"><?php echo $company_name;?></span>
            </div>
            <div class="form-group non">
              <label for="email" class="email"><span class="icon-envelope mr-3"></span>Company Email</label>
              <input type="email"   style = "display:none"  class = "za form-control" name="company_email" value="<?php echo $comp_email;?>" id="email" placeholder="you@yourdomain.com">
              <span class = "zp" style = "padding-left : 10px"><?php echo $comp_email;?></span>
            </div>
              <div class="form-group">
            <label for="company-name"><span class="icon-users mr-3 "></span>Employer Category</label>
            <div class= "za" style= "display:none">
            <select  class="selectpicker border rounded "   style = "display:none" name="category" value="<?php echo $category;?>" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Category" >
                  <option value="Individual">Individual</option>
                  <option value="Non-Individual">Non-Individual</option>

                    </select>
                 </div>
                    <span class = "zp" style = "padding-left : 10px"><?php echo $category;?></span>
          </div>
          <div class="form-group">
            <label for="job-location"><span class="icon-room mr-2 mr-3"></span>Location</label>
            <input type="text"  class = "za form-control"   style = "display:none" name="location" value="<?php echo $location;?>" id="job-location" placeholder="e.g. Mumbai" required="required">
            <span class = "zp" style = "padding-left : 10px"><?php echo $location;?></span>
          </div>


            <div class="form-group">
              <label for="company-website"><span class="icon-globe mr-3 "></span>Website URL</label>
              <input  class = "za form-control  " type="url"   style = "display:none" name="url" value="<?php echo $url;?>"  id="company-website" placeholder="https://">
                <span class = "zp" style = "padding-left : 10px"><?php echo $url;?></span>
            </div>
            <div class="form-group">
              <!--  <label class="btn btn-primary btn-md btn-file aadhar" style="width: -webkit-fill-available;height: 40px;">-->
              <label for="company-website"><span class="icon-file mr-3 "></span>  Upload  Company registration/ Individual aadhar</label>
              <input  class = "za" type="file"  style = "display:none" name="aadhar" value="<?php echo $regis_aadhar;?>" >

              <span class = "zp" style = "padding-left : 10px"><?php echo $regis_aadhar;?></span>
            <!--  </label>-->
            </div>
            <div class="form-group">
                <label for="company-website">Upload PAN/ GST</label>
                <input type="file"  style = "display:none" name="PAN" class = "za"  value="<?php echo $pan_gst;?>" >
              <span class = "zp" style = "padding-left : 10px"><?php echo $pan_gst;?></span>
            </div>
            <div class="form-group">
                  <label for="company-website">Upload Logo/ Individual photo</label>
                  <input  class = "za"  style = "display:none" type="file" name="logo"  value="<?php echo $logo_photo;?>" >
              <span class = "zp" style = "padding-left : 10px"><?php echo $logo_photo;?></span>
            </div>
            <div class="form-group " style="">
              <label for="job-description" class="email"><span class="icon-book mr-3 "></span>Company Description</label>
               <input  class = "za"   style = "display:none" name="discussionContent" type="hidden" value="<?php echo $comp_desc;?>">
              <div id="editor-2" class = "za" style="height:375px;display:none">
              <?php echo $comp_desc;?>
              </div>
              <span class = "zp" style = "padding-left : 10px"><?php echo $comp_desc;?></span>
            </div><hr>
              <div class="form-group" id = "sub" style="width:100%;text-align:center;display:none">
<center><input type="submit" name="submit" class="btn btn-primary btn-md text-white" value="Update" style="border: 1px solid #157efb;background-color:#157efb;font-size: 20px;">
</div>
          </form>
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
    <script>

    $(document).ready(function(){
      $('.ql-toolbar').addClass("za");
      $('.ql-toolbar').css({display: 'none'})  ;
    //inicialization of select picker
  $('.selectpicker').selectpicker();

  //on change function i need to control selected value
  $('select.selectpicker').on('change', function(){
     var selected = $('.selectpicker option:selected').val();
     //alert(selected);
       if(selected =='Non-Individual'){
         $('.email').prepend("<span class='red' style='color:red;'>*</span>");

           $(".non input").attr('required','requried');

       }
       if(selected =='Individual'){
         $('.red').remove();
           $(".non input").removeAttr('required');

       }

  });
});

var i = true;

$('#edit').on('click',function() {
if(i===true){
$('#sub').css({display : 'inline-block'})
$('.za').css({display: 'block',width:'100%'})  ;

$('.zp').css({display : 'none'})

i = false;
}
else{
$('#sub').css({display : 'none'})
$('.za').css({display: 'none'})  ;

$('.zp').css({display : 'inline-block'})
i=true;
}
});
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
    <script src="js/quill.min.js"></script>


    <script src="js/bootstrap-select.min.js"></script>

    <script src="js/custom.js"></script>

    <script>


    var quill = new Quill('#editor-2', {
                   modules: {
                   toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                   ['bold', 'italic', 'underline', 'strike','link'],
                   [{ 'align': 'left'}, { 'align': 'right' },{ 'align': 'center' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                   [{ list: 'ordered' }, { list: 'bullet' }],
                    ['clean']
                   ]
                   },
                   placeholder: 'Compose an epic...',
                   theme: 'snow'
                   });




           var form = document.querySelector('form');
                   form.onsubmit = function() {
                     // Populate hidden form on submit
                       var discussionContent = document.querySelector('input[name=discussionContent]');
                    //   discussionContent.value = JSON.stringify(quill.getContents());
                    discussionContent.value = document.querySelector(".ql-editor").innerHTML;
                                          document.getElementById("text").value = document.querySelector(".ql-editor").innerHTML;
                       var url ="<?=($_SERVER['PHP_SELF'])?>";
                      // var data = stringify(quill.getContents());
                      var data= document.querySelector(".ql-editor").innerHTML;
                       alert( "the data is " + data);
                           $.ajax({
                           type: "POST",
                           url : url,
                           data : discussionContent,

                           success: function ()
                           {
                               alert("Successfully sent to database");
                           },
                           error: function()
                           {
                           alert("Could not send to database");
                           }
                       });
                       return false;
                   };
               </script>
  </body>
</html>

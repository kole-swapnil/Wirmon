<?php
include "dbconn.php";
 session_start();
 if (($_SESSION['email'] == '') || (!isset($_SESSION['email']))) {
      header("Location: login.php");
}
   $email=$_SESSION['email'];
   $qry = $conn->prepare("select * from jobseeker where email = ?");
   $qry->bindParam(1, $email);
   $qry->execute();
   if($qry->rowCount() > 0)
   {
       $data = $qry->fetchAll();
       foreach($data as $row) {
         $name=$row['name'];
         $contact=$row['contact_no'];
         $location=$row['location'];
         $gender=$row['gender'];
         $aadhar_no=$row['aadhar_no'];
         $skills=$row['skills'];
         $education=$row['education'];
         $exp=$row['exp'];
         $resume=$row['resume'];

         $filename  = 'skills.txt';
            $eachlines = file($filename, FILE_IGNORE_NEW_LINES);
            $select    = '<select multiple class="selectpicker border rounded" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Skills" name="skil[]" id="value" value="' .$row['skills'] .'" required="required">';
            foreach($eachlines as $lines)
            {
                $select .= "<option value='{$lines}'>{$lines}</option>";
            }
            $select .= "<option>{$lines}</option>" . "</select>";
       }
     }
  if(isset($_POST['submit'])) {

     $name=$_POST['name'];
     $contact=$_POST['contact'];
     $location= $_POST['location'];
      if($_POST['gender'] != "")
    { $gender=$_POST['gender'];}
    else{$gender=$gender;}
     $aadhar_no=$_POST['aadhar_no'];
     if(isset($_POST['skil']))
     {$skl = $_POST['skil'];
      $skills = implode(",",$skl);
      }
     else{ $skills=$skills;}
     if($_POST['education'] != "")
    {  $education=$_POST['education'];}
    else{$education=$education;}
     if($_POST['exp'] != "")
    {  $exp = $_POST['exp'];}
else{$exp=$exp;}
     $filename1 = $_FILES['resume']['name'];

      if($filename1 == "")
     {$filename1 = $resume;
     //echo $filename1;
   }
    else{
       $tempname1 = $_FILES['resume']['tmp_name'];
       $target_dir1 = "jobseeker_docs/".$filename1;
         move_uploaded_file($tempname1,$target_dir1);
       //echo $filename1;
     }
     $qry1 = $conn->prepare("select aadhar_no from jobseeker where aadhar_no = ?");
     $qry1->bindParam(1, $aadhar_no);
     $qry1->execute();
     $num=$qry1->rowCount();
     if($num == 0){
       $stmt1 = $conn->prepare("update jobseeker set name='$name',contact_no='$contact',location='$location',gender='$gender',aadhar_no='$aadhar_no',skills='$skills',education='$education',exp='$exp',resume='$filename1' where email=? ");
       $stmt1->bindParam(1, $email);

         $stmt1->execute();
     //  echo '<script>alert("success")</script>';
             echo "<script>alert('Your Profile is Updated Successfully')</script>";
}
else{
  echo "<script>alert('This aadhar number is already registered!')</script>";
}

   }



?>
<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; Dashboard-Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include "common.php"?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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

        <div class="navbar-header">
        <button type="button" style="background-color: #ff8800; left:6%;border-color : #ff8800"class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-employerLeftNav-collapse" >
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
            </button>
            <a href="#" class="navbar-brand navbar-right text-ncspBlue paddingLeft0" style="color:white;padding-left:13%"><i class="icon-arrow-left" style="padding-right:3%;"></i>Jobseeker Menu</a>
           </div>
        <div id="sidebar-wrapper" class="collapse navbar-collapse navbar-employerLeftNav-collapse paddingLeftRight0" style="padding-left:unset;">
            <nav id="spy">
                <ul class="sidebar-nav nav" style="display:block !important;">
                      <li class="hidden-md hidden-lg">
                        <a  href="index.php" style="color:white;" >Home</a>
                    </li>
                    <li class="enabled">
                        <a href="js_dashboard.php" style="color:white;">Dashboard</a></li>
                    <li class="acto">
                        <a href="js_profile.php" style="color:white;">View/Update Profile</a>
                    </li>
                  <li class="enabled">
                        <a href="search_jobs.php" style="color:white;">Search Jobs</a>
                    </li>
                    <li class="enabled">
                        <a href="js_jobsApplied.php" style="color:white;">Jobs Applied</a>
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
              <h2>Jobseeker Profile</h2>
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
              <input class = "za form-control" style = "display:none;" type="text" name="name" value="<?php echo $name;?>"  id="name" placeholder="John Doe" >
              <span class = "zp" style = "padding-left : 10px"><?php echo $name;?></span>
            </div>
            <div class="form-group">
              <label for="email"><span class="icon-envelope mr-3"></span>Email</label>
              <input class = "za form-control" style = "display:none" type="text" name="email" value="<?php echo $_SESSION['email'];?>"  id="email" placeholder="you@gmail.com" required="required" >
              <span class = "zp" style = "padding-left : 10px"><?php echo $_SESSION['email'];?></span>
            </div>
            <div class="form-group">
              <label for="job-title"><span class="icon-tablet mr-3"></span>Contact No</label>
              <input class = "za form-control" style = "display:none" type="text" name="contact" value="<?php echo $contact;?>" pattern="[0-9]{10}"  id="job-contact" placeholder="9897223344" required="required" >
              <span class = "zp" style = "padding-left : 10px"><?php echo $contact;?></span>
            </div>
            <div class="form-group">
          <label for="company-name"><span class="icon-group mr-3"></span>Gender</label>
          <div class = "za " style = "display:none;">
          <select class="selectpicker border rounded za" style = "display:none" name="gender" value="<?php echo $gender;?>" id="job-gen" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender" required="required" >
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
        </select>
        </div>
        <span class = "zp" style = "padding-left : 10px"><?php echo $gender;?></span>
        </div>
            <div class="form-group">
              <label for="job-title"><span class="icon-address-card mr-3"></span>Aadhar Number</label>
              <input class = "za form-control" style = "display:none" type="text" name="aadhar_no" value="<?php echo $aadhar_no;?>" minlength="12" maxlength="12" pattern="[0-9]{12}"  id="job-aad" required="required" >
              <span class = "zp" style = "padding-left : 10px"><?php echo $aadhar_no;?></span>
            </div>

            <div class="form-group">
              <label for="job-location"><span class="icon-room mr-2 mr-3"></span>Location</label>
              <input class = "za form-control" style = "display:none" type="text" name="location" value="<?php echo $location;?>"  id="job-location" placeholder="e.g. Mumbai" required="required" >
              <span  class = "zp" style = "padding-left : 10px"><?php echo $location;?></span>
            </div>
            <div class="form-group">
                <label for="job-location"><span class="icon-list-alt mr-3"></span>Key Skills</label>
            <span class = "za " style = "display:none"><?php echo $select; ?></span>
            <span  class = "zp" style = "padding-left : 10px"><?php echo $skills;?></span>
            </div>
            <div class="form-group">
              <label for="Qualification"><span class="icon-book mr-3"></span>Minimum Qualification</label>
              <div class = "za " style = "display:none;">
              <select class="selectpicker border rounded"  name="education" value="<?php echo $education;?>" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Qualification" required="required">
                <option value="Upto 8th">Upto 8th</option>
                <option value="Upto 9th">Upto 9th</option>
                <option value="10th">10th</option>
                <option value="12th">12th</option>
                <option value="Diploma">Diploma</option>
                <option value="Graduate">Graduate</option>
                <option value="Post Graduate">Post Graduate</option>
                <option value="Phd">Phd</option>
              </select>
             </div>
              <span  class = "zp" style = "padding-left : 10px"><?php echo $education;?></span>
            </div>
            <div class="form-group">
              <label for="experience"><span class="icon-briefcase mr-3"></span>Experience</label>
              <div class = "za " style = "display:none;">
              <select class="selectpicker border rounded sa" style = "display:none" name="exp" value="<?php echo $exp;?>" id="exp" data-style="btn-black" data-width="100%" data-live-search="true" title="Select experience" required="required">
                <option value="0-1">0-1</option>
                <option value="1-2">1-2</option>
                <option value="2-3">2-3</option>
                <option value="3-4">3-4</option>
                <option value="4-5">4-5</option>
                <option value="5+">5+</option>
                </select>
                </div>
                <span  class = "zp" style = "padding-left : 10px"><?php echo $exp;?></span>
            </div>
            <div class="form-group">
            <label for="upload"><span class="icon-file mr-3"></span>Upload Resume</label> <input class = "za" style = "display:none" type="file" name="resume" value="<?php echo $resume;?>" required="required" >
              <span  class = "zp" style = "padding-left : 10px"><?php echo $resume;?></span>
            </div>

            <div class="form-group" id = "sub" style="width:100%;text-align:center;display:none">
            <input type="submit" name="submit" class="btn btn-primary btn-md text-white" value="Update" style="border: 1px solid #157efb;background-color:#157efb;font-size: 20px;margin:auto;">
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
    var i = true;
      $('#edit').on('click',function() {
        if(i===true){
        $('#sub').css({display : 'inline-block'})
      $('.za').css({display: 'block',width:'100%'})  ;
     /* var z = document.getElementsByClassName("za");
      var i;
      for (i = 0; i < z.length; i++) {
      z[i].style.display = 'block';
      z[i].style.width = ;
      }
      */
      $('.zp').css({display : 'none'})
     /* var x = document.getElementsByClassName("zp");
      var j;
      for (j = 0; j < x.length; j++) {
      x[j].style.display = 'none';
*/
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

  </body>
</html>

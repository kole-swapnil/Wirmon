<?php
include "dbconn.php";
 session_start();
 if (($_SESSION['email'] == '') || (!isset($_SESSION['email']))) {
      header("Location: login.php");
}
$filename  = 'skills.txt';
   $eachlines = file($filename, FILE_IGNORE_NEW_LINES);
   $select    = '<select multiple class="selectpicker border rounded" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Skills" name="skil[]" id="value" required="required">';
   foreach($eachlines as $lines)
   {
       $select .= "<option value='{$lines}'>{$lines}</option>";
   }
   $select .= "<option>{$lines}</option>" . "</select>";
   $email=$_SESSION['email'];
   $qry = $conn->prepare("select * from employer where email = ?");
   $qry->bindParam(1, $email);
   $qry->execute();
   if($qry->rowCount() > 0)
   {
       $data = $qry->fetchAll();
       foreach($data as $row) {
         $id=$row['unique_id'];
         $name=$row['name'];
         $contact=$row['contact_no'];
         $location=$row['location'];
         $comp_name=$row['company_name'];
         $logo=$row['logoORphoto'];
         }
     }

     if (isset($_POST['submit'])) {
       $job_id = uniqid("jb");
         $email=$_POST['email'];
         $name=$_POST['name'];
         $contact=$_POST['contact'];
         $location=$_POST['location'];
         $title=$_POST['title'];
         $jobtype=$_POST['jobtype'];
         $resp=$_POST['resp'];
         $perks=$_POST['perks'];
         $salary=$_POST['salary'];
         $education=$_POST['education'];
         $exp=$_POST['exp'];
         $discussionContent = $_POST['discussionContent'];
         $skl = $_POST['skil'];
          $skills = implode(",",$skl);
          $filename1 = $_FILES['feature']['name'];
          if($filename1 == "")
          {$filename1 = "job_single_img_1.jpg";}
          else{
          $tempname1 = $_FILES['feature']['tmp_name'];
          $target_dir1 = "Emp_document/".$filename1;
            move_uploaded_file($tempname1,$target_dir1);}

            $stmt = $conn->prepare('insert into jobpost (name,unique_id,email,contact_no,title,location,skills,type,job_desc,responsibility,salary,education,exp,perks,feature_img,job_id,company_name,logoORphoto) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $id);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $contact);
            $stmt->bindParam(5, $title);
            $stmt->bindParam(6, $location);
            $stmt->bindParam(7, $skills);
            $stmt->bindParam(8, $jobtype);
            $stmt->bindParam(9, $discussionContent);
            $stmt->bindParam(10, $resp);
            $stmt->bindParam(11, $salary);
            $stmt->bindParam(12, $education);
            $stmt->bindParam(13, $exp);
            $stmt->bindParam(14, $perks);
            $stmt->bindParam(15, $filename1);
            $stmt->bindParam(16, $job_id);
            $stmt->bindParam(17, $comp_name);
            $stmt->bindParam(18, $logo);
            $stmt->execute();
              echo '<script>alert("Job Posted Successfully")</script>';
     }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; Post Job</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/dash.css">
<style>

.bs-placeholder{margin-left:unset !important;border:unset !important;}
.btn{margin-left:unset !important;border:unset !important;}
@media only screen and (max-width: 521px){
  .ml-auto{display:none;}
  .icon-menu{margin-right: -120px;}
  .logout{display: block !important;}

  }</style>
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
          <div class="site-logo col-6"><a href="index.php">Wirmon</a></div>

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
              <li class="logout" style="display:none"><a href="logout.php"><i class="icon-sign-out" style="padding-left:5%;"></i>Logout</a></li>

              </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
              <div class="ml-auto">
                <div class="dropdown"><span class="mr-2 icon-lock_outline dropdown-toggle" data-toggle="dropdown" style="color:#fff;">
                    <?php echo $_SESSION['email']; ?></span>
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
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-employerLeftNav-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand navbar-right text-ncspBlue paddingLeft0"><i class="icon-arrow-left" style="padding-right:3%;"></i>Employer Menu</a>
        </div>
        <div id="sidebar-wrapper" class="collapse navbar-collapse navbar-employerLeftNav-collapse paddingLeftRight0" style="padding-left:unset;">
            <nav id="spy">
                <ul class="sidebar-nav nav" style="display:block !important;">
                      <li class="hidden-md hidden-lg">
                        <a  href="index.php">Home</a>
                    </li>
                    <li >
                        <a href="emp_dashboard.php">Dashboard</a></li>
                    <li class="enabled">
                        <a href="emp_profile.php">View/Update Profile</a>
                    </li >
                    <li class="acto">
                        <a href="">Post New Job</a>
                    </li>
                    <li class="enabled">
                        <a href="search_users.php">Search User</a>
                    </li>
                    <li class="enabled">
                        <a href="jobs&responses.php">Jobs and Responses</a>
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
              <h2>Post Job</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-4" style="margin-left:unset;margin-right:unset;">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" role="form" method="post" action="<?=($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
            <h3 class="text-black mb-5 border-bottom pb-2">Job Details</h3>

            <div class="form-group">
              <label for="company-website-tw d-block">Upload Featured Image</label>
              <input type="file" name="feature" accept="image/*">

            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" value="<?php echo $email;?>" class="form-control" id="email" placeholder="you@yourdomain.com" required="required">
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" value="<?php echo $name;?>" class="form-control" id="email" placeholder="John Doe" required="required">
            </div>
            <div class="form-group">
              <label for="job-title">Contact No</label>
              <input type="text" name="contact" value="<?php echo $contact;?>" pattern="[0-9]{10}" class="form-control" id="job-title" placeholder="9850667788" required="required">
            </div>
            <div class="form-group">
              <label for="job-title">Job Title</label>
              <input type="text" name="title" class="form-control" id="job-title" placeholder="Product Designer" required="required">
            </div>
            <div class="form-group">
              <label for="job-location">Location</label>
              <input type="text" name="location" value="<?php echo $location;?>" class="form-control" id="job-location" placeholder="e.g. Mumbai" required>
            </div>

            <div class="form-group">
                <label for="job-location">Key Skills</label>
            <?php echo $select; ?>
            </div>

            <div class="form-group">
              <label for="job-type">Job Type</label>
              <select class="selectpicker border rounded" name="jobtype" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type" required="required">
                <option value="Part Time">Part Time</option>
                <option value="Full Time">Full Time</option>
                <option value="Internship">Internship</option>
              </select>
            </div>
            <div class="form-group">
              <label for="job-description">Job Description</label>
                 <input name="discussionContent" type="hidden">
              <div id="editor-2" style="height: 375px;">

              </div>
            </div>

            <div class="form-group">
              <label for="name">Responsibilities</label>
              <textarea name="resp" class="form-control" required="required" rows="6" cols="50">1)&#10; 2)&#10; 3)&#10; 4)</textarea>

            </div>
            <div class="form-group">
              <label for="Salary">Salary Range</label>
              <input type="text" name="salary" class="form-control" id="email" placeholder="10000-20000" required="required">
            </div>
            <div class="form-group">
              <label for="Qualification">Minimum Qualification</label>
              <select class="selectpicker border rounded" name="education" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Qualification" required="required">
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
            <div class="form-group">
              <label for="experience">Experience</label>
              <select class="selectpicker border rounded" name="exp" id="exp" data-style="btn-black" data-width="100%" data-live-search="true" title="Select experience" required="required">
                <option value="0-1">0-1</option>
                <option value="1-2">1-2</option>
                <option value="2-3">2-3</option>
                <option value="3-4">3-4</option>
                <option value="4-5">4-5</option>
                <option value="5+">5+</option>
                </select>
            </div>
            <div class="form-group">
              <label for="name">Perks and Other Benefits</label>
              <textarea name="perks" class="form-control" required="required" rows="6" cols="50">1)Flexible work hours&#10; 2)5 days a week&#10; 3)&#10; 4)</textarea>
              </div>
            <div class="form-group">

            <center><input type="submit" name="submit" class="btn btn-primary btn-md text-white" value="Submit" style="border: 1px solid #157efb;background-color:#157efb;font-size: 20px;">
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

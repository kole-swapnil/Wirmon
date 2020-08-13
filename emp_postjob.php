<?php
 session_start();
 if (($_SESSION['email'] == '') || (!isset($_SESSION['email']))) {
      header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; Dashboard-Post Job</title>
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
@media only screen and (max-width: 521px){
  .ml-auto{display:none;}
  .icon-menu{margin-right: -120px;}
  .logout{display: block !important;}
}</style>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


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
                    <li class="active">
                        <a href="">Post New Job</a>
                    </li>
                    <li class="enabled">
                        <a href="">Search User</a>
                    </li>
                    <li class="enabled">
                        <a href="">Jobs and Responses</a>
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
          <form class="p-4 p-md-5 border rounded" method="post">
            <h3 class="text-black mb-5 border-bottom pb-2">Job Details</h3>

            <div class="form-group">
              <label for="company-website-tw d-block">Upload Featured Image</label> <br>
              <label class="btn btn-primary btn-md btn-file">
                Browse File<input type="file" hidden>
              </label>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="email" placeholder="you@yourdomain.com">
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" value="" class="form-control" id="email" placeholder="John Doe">
            </div>
            <div class="form-group">
              <label for="job-title">Contact No</label>
              <input type="text" name="contact" value="" pattern="[0-9]{10}" class="form-control" id="job-title" placeholder="9850667788">
            </div>
            <div class="form-group">
              <label for="job-title">Job Title</label>
              <input type="text" name="title" class="form-control" id="job-title" placeholder="Product Designer">
            </div>
            <div class="form-group">
              <label for="job-location">Location</label>
              <input type="text" name="location" class="form-control" id="job-location" placeholder="e.g. New York">
            </div>

            <div class="form-group">
              <label for="key-skills">Key Skills</label>
            <input type="text" name="location" class="form-control" id="job-location" placeholder="e.g. New York">
            </div>

            <div class="form-group">
              <label for="job-type">Job Type</label>
              <select class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                <option>Part Time</option>
                <option>Full Time</option>
                <option>Internship</option>
              </select>
            </div>
            <div class="form-group">
              <label for="job-description">Job Description</label>
                 <input name="discussionContent" type="hidden" value="">
              <div id="editor-2" style="height: 375px;">

              </div>
            </div>

            <div class="form-group">
              <label for="name">Responsibilities</label>
              <textarea name="j_desc" class="form-control" required="required" placeholder="Job Description" rows="6" cols="50">1)&#10;2)&#10;3)&#10;4)</textarea>

            </div>
            <div class="form-group">
              <label for="Salary">Salary Range</label>
              <input type="text" name="name" value="" class="form-control" id="email" placeholder="10000-20000">
            </div>
            <div class="form-group">
              <label for="Qualification">Minimum Qualification</label>
              <select class="selectpicker border rounded" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Qualification">
                <option>Upto 8th</option>
                <option>Upto 9th</option>
                <option>10th</option>
                <option>12th</option>
                <option>Diploma</option>
                <option>Graduate</option>
                <option>Post Graduate</option>
                <option>Phd</option>
              </select>
            </div>
            <div class="form-group">
              <label for="experience">Experience</label>
              <select class="selectpicker border rounded" id="exp" data-style="btn-black" data-width="100%" data-live-search="true" title="Select experience">
                <option>Fresher</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>5+</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Perks and Other Benefits</label>
              <textarea name="j_desc" class="form-control" required="required" rows="6" cols="50">1)Flexible work hours&#10;2)5 days a week&#10;3)&#10;4)</textarea>
              </div>
            <div class="form-group">
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

               </script>

  </body>
</html>

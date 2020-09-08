<?php
include "dbconn.php";
 session_start();
 if (($_SESSION['email'] == '') || (!isset($_SESSION['email']))) {
      header("Location: login.php");
      $search_keyword = $_POST['search'];
    echo "<script> alert('Hello'); </script>";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Wirmon &mdash; Search Job</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include "common.php"?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap- select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
   <script type="text/javascript" src="JQuery.js"></script>
   <script src="js/jquery-1.10.2.min.js"></script>
     <script src="js/jquery-ui.js"></script>

<link rel="stylesheet" href="css/dash.css">
<style>
label{
  font-weight: normal !important;
  }
  @media only screen and (max-width: 521px){
  .ml-auto{display:none;}
  .icon-menu{margin-right: -120px;}
  .logout{display: block !important;}
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
          <div class="site-logo col-6"><a href="index.php"><img src="images/logo.png" style="height:70px;width: 200px;margin-top:20px;"></a></div>

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
                <div class="dropdown"><span class="mr-2 icon-user dropdown-toggle" data-toggle="dropdown" style="color:#fff;">
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
  <div class="col-md-3 LeftNavSideBar" valign="top" style="">
  <div class="col-md-12 " valign="top">
    <!-- Sidebar -->
    <div class="navbar navbar-default" role="navigation" style="display:block;padding: 10px 20px 20px 20px;
background-color: #216945;
border: 1px solid #ddd;
border-radius: 4px;
padding-right: auto;">


        <div class="navbar-header" >
        <button type="button" style="background-color: #ff8800; left:25px;border-color : #ff8800"class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-employerLeftNav-collapse" >
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
            </button>
            <a href="#" class="navbar-brand navbar-right text-ncspBlue paddingLeft0" style="color:white;padding-left:55px"><i class="icon-arrow-left" style="padding-right:3%;"></i>Jobseeker Menu</a>
        </div>
        <div id="sidebar-wrapper" class="collapse navbar-collapse navbar-employerLeftNav-collapse paddingLeftRight0" style="padding-left:unset;">
            <nav id="spy">
                <ul class="sidebar-nav nav" style="display:block !important;">
                      <li class="hidden-md hidden-lg">
                        <a  href="index.php" style="color:white;" >Home</a>
                    </li>
                    <li class="enabled">
                        <a href="js_dashboard.php" style="color:white;">Dashboard</a></li>
                    <li class="enabled">
                        <a href="js_profile.php" style="color:white;">View/Update Profile</a>
                    </li>
                  <li class="acto">
                        <a href="" style="color:white;">Search Jobs</a>
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
        <div class="column col-md-12" valign="top" id = "le">


<div id="filtersection" style="display:block;padding: 10px 20px 20px 20px;
background-color: #216945;
border: 1px solid #ddd;
border-radius: 4px;
padding-right: auto;
max-height:450px;
overflow-y:scroll;
">
<div class="navbar-header" >
            <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-employerLeft2Nav-collapse" style="background-color: #ff8800; left:25px;border-color : #ff8800">
            <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
                <span class="icon-bar" style="background-color: darkgreen;height: 4px;"></span>
            </button>
            <a href="#" class="navbar-brand navbar-right text-ncsp paddingLeft0" style="color:white;padding-left:55px"><i class="icon-arrow-left" style="padding-right:3%;color:white"></i>Search By</a>
        </div>
        <div id="sidebar-wrapper" class="collapse navbar-collapse navbar-employerLeft2Nav-collapse paddingLeftRight0" style="padding-left:unset;">
        <h4 style = "background-color:#ff8000;padding:10px;color:white">Search by</h4><hr>
<div class="list-group">
   <h5 style="font-weight:bold;color:#fff;">Title</h5>
   <div class = "col-12"style="padding-left: 0;padding-right: 0;max-height: 100px;overflow-y: scroll;">
    <?php

            $query1 = "SELECT DISTINCT(type) FROM jobpost where type IS NOT NULL";
            $statement = $conn->prepare($query1);
            $statement->execute();
            $result1 = $statement->fetchAll();
            foreach($result1 as $row1)
            {
            ?>

   <div class="list-group-item" >
       <label><input type="checkbox" class="common_selector type" value="<?php echo $row1['type']; ?>" ><?php echo $row1['type']; ?></label>
   </div>
   <?php
            }

            ?>

</div>
</div>
<div class="list-group">
   <h5 style="font-weight:bold;color:#fff;">Title</h5>
   <div class = "col-12"style="padding-left: 0;padding-right: 0;max-height: 100px;overflow-y: scroll;">
    <?php

            $query1 = "SELECT DISTINCT(title) FROM jobpost where title IS NOT NULL";
            $statement = $conn->prepare($query1);
            $statement->execute();
            $result1 = $statement->fetchAll();
            foreach($result1 as $row1)
            {
            ?>

   <div class="list-group-item ">
       <label><input type="checkbox" class="common_selector title" value="<?php echo $row1['title']; ?>" ><?php echo $row1['title']; ?></label>
   </div>
   <?php
            }

            ?>

</div>
</div>
<div class="list-group">
   <h5 style="font-weight:bold;color:#fff;">Location</h5>
   <div class = "col-12"style="padding-left: 0;padding-right: 0;max-height: 100px;overflow-y: scroll;">
    <?php

            $query = "SELECT DISTINCT location FROM jobpost where location IS NOT NULL";
            $statement = $conn->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
            ?>

   <div class="list-group-item ">
       <label><input type="checkbox" class="common_selector loc" value="<?php echo $row['location']; ?>"  > <?php echo $row['location']; ?></label>
   </div>
   <?php
            }

            ?>

   </div>
</div>

<div class="list-group">
   <h5 style="font-weight:bold;color:#fff;">Experience</h5>
       <div class = "col-12"style="padding-left: 0;padding-right: 0;max-height: 100px;overflow-y: scroll;">
          <?php
           $query2 = "SELECT DISTINCT(exp) FROM jobpost WHERE exp IS NOT NULL";
            $statement = $conn->prepare($query2);
            $statement->execute();
            $result2 = $statement->fetchAll();
            foreach($result2 as $row2)
            {
            ?>

   <div class="list-group-item ">
       <label><input type="checkbox" class="common_selector exp" value="<?php echo $row2['exp']; ?>"  > <?php echo $row2['exp']; ?></label>
   </div>
   <?php
            }
            ?>
</div>
</div>

<div class="list-group">
                 <h5 style="font-weight:bold;color:#fff;">Salary</h5>
                 <div class = "col-12"style="padding-left: 0;padding-right: 0;max-height: 100px;overflow-y: scroll;">
                  <?php
           $query2 = "SELECT DISTINCT(salary) FROM jobpost WHERE salary IS NOT NULL";
            $statement = $conn->prepare($query2);
            $statement->execute();
            $result2 = $statement->fetchAll();
            foreach($result2 as $row2)
            {
            ?>

                 <div class="list-group-item ">
                     <label><input type="checkbox" class="common_selector sal" value="<?php echo $row2['salary']; ?>"  > <?php echo $row2['salary']; ?></label>
                 </div>
                      <?php
            }
            ?>

                 </div>
             </div>
             <div class="list-group">
                     <h5 style="font-weight:bold;color:#fff;">Skills</h5>
                               <div class = "col-12"style="padding-left: 0;padding-right: 0;max-height: 100px;overflow-y: scroll;">
                                <?php
           $query2 = "SELECT DISTINCT(skills) FROM jobpost WHERE skills IS NOT NULL";
            $statement = $conn->prepare($query2);
            $statement->execute();
            $result2 = $statement->fetchAll();
            foreach($result2 as $row2)
            { $arr = explode(",",$row2['skills']);
                foreach($arr as $asx){
            ?>
                               <div class="list-group-item ">
                                   <label><input type="checkbox" class="common_selector skills" value="<?php echo $asx; ?>"  > <?php echo $asx; ?></label>
                               </div>
                        <?php
            }
        }
            ?>
             </div>
          </div>
                           <div class="list-group">
                                             <h5 style="font-weight:bold;color:#fff;">Education</h5>
                                             <div class = "col-12"style="padding-left: 0;padding-right: 0;max-height: 100px;overflow-y: scroll;">
                                              <?php
           $query2 = "SELECT DISTINCT(education) FROM jobpost WHERE education IS NOT NULL";
            $statement = $conn->prepare($query2);
            $statement->execute();
            $result2 = $statement->fetchAll();
            foreach($result2 as $row2)
            {
            ?>
                                             <div class="list-group-item ">
                                                 <label><input type="checkbox" class="common_selector edu" value="<?php echo $row2['education']; ?>"  > <?php echo $row2['education']; ?></label>
                                             </div>
                                          <?php
                                        }

                                          ?>
                                             </div>
                                         </div>
<p id="clearfilter" style="font-weight:bold; color:red;cursor: pointer;"></p>
</div>
</div>
    </div>
</div>

<div class="col-md-9 LeftNavSideBar">

  <input style ="font-size: 17px;  border: 1px solid grey;  float: left;  background: #f1f1f1; margin-bottom: 3%;"
  class="form-control" type="search" id="searchtitle" placeholder="Search" name="search" aria-label="Search">
 <div class="column" id='mi'style = "flex: 50%;max-width:100%;padding: 0 4px;overflow-y: scroll;max-height: 810px;">
    <div class="list-group" style="display:block;box-sizing:border-box;">
                     <div class="filter_data">



        </div>
    </div>

  </div>
                </div>

</div>

</div>
</div>

</div>


</div>


    </section>
    <div class="row align-items-center row-content" >


</div>

    <?php include_once 'footer.php'; ?>
  </div>
<style>
#loading
{
  text-align:center;
  background: url('loader.gif') no-repeat center;
  height: 150px;
}
.searchboox
 {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 1px;
  font-size: 16px;
  background-color: white;
  background-image: url('img/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  transition: width 0.4s ease-in-out;
  height:41px;
}

.searchboox:focus
{
  width: 80%;
}

</style>
<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {

        $('.filter_data').html('<div id="loading" style="" ></div>');

        var action = 'fetch_data';
        var sectitle = $('#searchtitle').val();
       // var maximum_price = $('#hidden_maximum_price').val();
        var loc = get_filter('loc');
        var type = get_filter('type');
        var exp = get_filter('exp');
        var sal = get_filter('sal');
        var skills = get_filter('skills');
        var edu = get_filter('edu');
        $.ajax({
            url:"getjobpostajax.php",
            method:"POST",
            data:{action:action, sectitle:sectitle, loc:loc, type:type, exp:exp, sal:sal, skills:skills, edu:edu},
            success:function(data){

                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
            $('#clearfilter').html('Clear Filter');
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });
$('#searchtitle').keyup(function(){
        filter_data();
    });
$('#filtersectionbtn').click(function() {
    $('#filtersection').toggle();
});
$('#clearfilter').click(function() {
    $(".type").prop("checked", false);
  $(".loc").prop("checked", false);
  $(".exp").prop("checked", false);
  $(".sal").prop("checked", false);
  $(".skills").prop("checked", false);
  $(".edu").prop("checked", false);
   $('#clearfilter').html('');

   $('#searchtitle').val('');

  filter_data();
});
});





        function fillIn(title){
      //      alert(title);
            $.ajax({

                url:"getjobpostajax.php",
                type:"POST",
                async:false,
                data:{
                    "fill":1,
                    "title":title
                },
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }


        function fillInComp(title){
          // alert(title);
            $.ajax({

                url:"getjobpostajax.php",
                type:"POST",
                async:false,
                data:{
                    "fillcomp":1,
                    "comp":title
                },
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }



            function fillInLoc(title){
          //alert(title);
            $.ajax({

                url:"getjobpostajax.php",
                type:"POST",
                async:false,
                data:{
                    "fillloc":1,
                    "loc":title
                },
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }



            function fillInsalary(title){
                var title2 = title.replace(' <i class="fa fa-inr" aria-hidden="true"></i>', "");
         //  alert(title2);
            $.ajax({

                url:"getjobpostajax.php",
                type:"POST",
                async:false,
                data:{
                    "fillsal":1,
                    "sal":title2
                },
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }

                function fillIntype(title){
                var title2 = title.replace('<i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;', "");
        //   alert(title2);
            $.ajax({

                url:"getjobpostajax.php",
                type:"POST",
                async:false,
                data:{
                    "filltype":1,
                    "type":title2
                },
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }



                    function fillInedu(title){
                var title2 = title.replace('<i class="fa fa-user" aria-hidden="true"></i>', "");
       //    alert(title2);
            $.ajax({

                url:"getjobpostajax.php",
                type:"POST",
                async:false,
                data:{
                    "filledu":1,
                    "edu":title2
                },
                success:function(data){
                     $('.filter_data').html(data);

                }
            });
        }
 $('#btn_search').click(function(){
          let search_val = $('#search').val();
          window.location.href="search_jobs.php?search="+search_val;
        });

</script>

    <!-- SCRIPTS -->


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

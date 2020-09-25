<?php
//$pass="admin@Wirmon";
//$pass = password_hash($pass, PASSWORD_DEFAULT);
//echo $pass;
$username = $password = "";
if(isset($_POST['submit'])) {
    if($_POST['uname'] != null && !empty($_POST['uname']))
    {
        if($_POST['pass'] != null && !empty($_POST['pass']))
        {
            try{
                include "../../dbconn.php";

                $username = trim($_POST['uname']);
                $password = trim($_POST['pass']);
                //echo $password;
               $stmt = $conn->prepare("select password from admin where username = ?");
                $stmt->bindParam(1, $username);
                $stmt->execute();
                if($stmt->rowCount() > 0)
                {
                    $data = $stmt->fetchAll();
                    foreach($data as $row) {
                        $dbpassword = $row['password'];
                        //echo $dbpassword;
                      if(password_verify($password, $dbpassword))
                        {
                            session_start();

                            $_SESSION['user'] = 'Admin';

                            header("Location: admin_dashboard.php");
                        }
                        else
                        {  echo '<script>alert("Invalid Password!Try again..")</script>';

                            }
                    }
                }
                else
                {
                      echo '<script>alert("Invalid Username!Try again..")</script>';
                }
            }
            catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
            }
        }
        else
        {
              echo '<script>alert("Please enter password!")</script>';
        }
    }
    else
    {
          echo '<script>alert("Please enter username!")</script>';
    }
}
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
    margin-left:41%;
}
.header{
    height:68px;
    background-color:#4b79a1;
}

@media only screen and (max-width: 521px)
{

 .form{
     width:200%;
     margin-left:-50%;
     margin-top:5%;
 }
 #h3{
      margin-top:10%;
      margin-left:29%;
 }

}


.icon{
  padding:15px;
  background:black;
  color:white;
  min-width:10px;
  text-align:left;

}





</style>
    <!-- MAIN CSS -->
    <script src="../../js/main.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/wow.js"></script>
    <script src="https://kit.fontawesome.com/dd37b736fa.js" crossorigin="anonymous"></script>


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
    <div class="site-logo col-6" style="padding-bottom: 1%;"><a href="../../index.php"><img src="../../images/logo.png" id="h_wirmon" style="height:70px;width: 200px;margin-left:30px;"></a></div>
       </div>
    <!-- HOME -->
    <h3 id="h3"> Admin Login </h3>
    <div class="form"><center>
    <form  method="post" autocomplete="off" class="p-4 border rounded" style="width:40%;  background-image:linear-gradient(to right,#f8cdda,#1d2b64);">

                                <div class="row form-group" style="width:98%;">
                                  <div class="col-md-12 mb-3 mb-md-0" style="margin-left:-1%; display:flex;">

                                    <i class="fa fa-user icon"></i>
                                    <input type="text" name="uname" class="form-control" placeholder="Username" style="width:108%; padding:15px;">
                                  </div>
                                </div>
                                <div class="row form-group" style="width:98%;">
                                  <div class="col-md-12 mb-3 mb-md-0" style="margin-left:-1%; display:flex;">
                                   <i class="fa fa-lock icon"></i>
                                    <input type="password" name="pass" minlength="6" class="form-control" placeholder="Password" style="width:108%; padding:15px;" >
                                  </div>
                                </div>
                                <div class="row form-group">
                                  <div class="col-md-12"><center>
                                    <input type="submit"  name="submit" class="btn px-4 btn-primary text-white" style="margin-top:4%;">
                                  </div>
                                </div>
                              </form>
     </div>
   </body>
   </html>

<?php
session_start();
include_once "Utils.php";
include '../../dbconn.php';
  $utils = new Utils();
  if (($_SESSION['user'] == '') || (!isset($_SESSION['user']))) {
       header("Location: adminlogin.php");
     }
  ?>
   <!DOCTYPE html>
<html lang="en">

<head>
<?php include "../../common.php"?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin - Dashboard</title>
<link rel="shortcut icon" type="image/x-icon" href="../../images/fevicon.png">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="css/jobseeker.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="js/menu.js"></script>
    <script type="text/javascript" src="js/jobseeker.js"></script>
<link rel="stylesheet" href="../../fonts/icomoon/style.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_dashboard.php">
        <div class="sidebar-brand-icon">
          <i class="icon-podcast"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> Admin </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="admin_dashboard.php">
          <i class="icon-tachometer"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Users
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="jobseeker.php">
          <i class="icon-users"></i>
          <span>Jobseeker</span>
        </a>
      <!--  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>-->
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#">
          <i class="icon-briefcase"></i>
          <span>Employer</span>
        </a>
      <!--  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>-->
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle icon-angle-left border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="icon-navicon"></i>
          </button>

          <!-- Topbar Search -->

        <!--  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>-->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">




            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="../../images/fevicon.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="icon-power-off mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <div style="overflow-x:auto;">
         <section id="enquiries">
        <div class="container-fluid">
            <div id="enquiryDataResult"></div>
            <?php
            include_once '../../dbconn.php';
            $stmt = $conn->prepare('select * from employer');
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                ?>
                <table class="tbl" >
                    <thead>
                    <tr>
                          <th style="width:7%;">Sr. No.</th>
                        <th style="width:2%;">Name</th>
                        <th style="width:7%;">City</th>
                        <th style="width:10%;">Company Name</th>
                        <th style="width:10%;">Email</th>
                        <th style="width:10%;">Company Email</th>
                        <th style="width:10%;">Category</th>
                        <th style="width:10%;">Mobile Number</th>
                        <th style="width:7%;">Company Descibtion</th>
                        <th style="width:10%;">Website Url</th>
                        <th style="width:3%;">Aadhar Card</th>
                        <th style="width:3%;">Pan Card</th>
                        <th style="width:3%;">Logo </th>
                        <th style="width:10%;">Delete</th>
                        <th style="width:3%;">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cnt = 1;
                    $data = $stmt->fetchAll();
                    foreach($data as $row)
                    {
                      $dbStatus = $row['status'];
                      $Resume_file_raw = $row['regisORaadhar'];
                      $Resume_file = str_replace(" ","%20",$Resume_file_raw);
                      $pan_file_raw = $row['panORgst'];
                      $pan_file = str_replace(" ","%20",$pan_file_raw);
                      $logo_file_raw = $row['logoORphoto'];
                      $logo_file = str_replace(" ","%20",$logo_file_raw);
                          // 12-05-2020
                          $hx = $row['company_name'];
                      ?>




                        <tr id="<?php echo $row['sr_no']; ?>">
                            <td><?php echo $cnt; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><a href='jobpost.php?compa_name=<?php echo $hx ?>'><?php echo $row['company_name']; ?></a></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['company_email']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['contact_no']; ?></td>
                            <td><?php echo $row['comp_desc']; ?></td>
                            <td><?php echo $row['website_url']; ?></td>
                           <td><?php echo "<a href=\"https://wirmon.in/Emp_document/{$Resume_file}\">";?>
                            <?php echo  $row['regisORaadhar']; ?>
                                </a>
                            </td>
                            <td><?php echo "<a href=\"https://wirmon.in/Emp_document/{$pan_file}\">";?>
                            <?php echo  $row['panORgst']; ?>;
                                </a>
                            </td>
                            <td><?php echo "<a href=\"https://wirmon.in/Emp_document/{$logo_file}\">";?>
                            <?php echo  $row['logoORphoto']; ?>;
                                </a>
                            </td>
                            <td><button type="button" class="deleteBtn" onclick="return deleteEmployer(<?php echo $row['sr_no']; ?>)">Delete</button></td>
                            <td id="changeStausButton-<?php echo $cnt; ?>"><button type="button" class="deleteBtn" style = "width:115%" id="statusBtn" onclick="return changeStatus(<?php echo $cnt; ?>, <?php echo $row['sr_no']; ?>, <?php echo $dbStatus; ?>)"><?php if($dbStatus == true){echo "PENDING";}else{echo "ACTIVE";} ?></button></td>


                        </tr>
                        <?php
                        $cnt++;
                    }
                    ?>
                    </tbody>
                </table>
                <?php
            }
            else
            {
                echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Info!</strong> There is no Enquiries available yet.</div>";
            }
            ?>

        </div>
    </section>


     </div>



       <!-- Scroll to Top Button-->
       <a class="scroll-to-top rounded" href="#page-top">
         <i class="icon-angle-up"></i>
       </a>

       <!-- Logout Modal-->
       <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span>
               </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               <a class="btn btn-primary" href="logout.php">Logout</a>
             </div>
           </div>
         </div>
       </div>
      <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>
</html>

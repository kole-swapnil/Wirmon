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
if (isset($_POST['submit'])) {
    $email=$_POST['email'];
    $job=$_POST['job'];
    $Location=$_POST['Location'];
    $skill=$_POST['skill'];
    $jobtype=$_POST['jobtype'];
    $companyname=$_POST['companyname'];
    $tagline=$_POST['tagline'];
    $website=$_POST['website'];
    $facebook=$_POST['facebook'];
    $twitter=$_POST['twitter'];
    $linkedin=$_POST['linkedin'];
    $logo=$_POST['logo'];
    $sql="INSERT INTO `postjob`(`email`, `job`, `Location`, `skill`, `jobtype`, `companyname`, `tagline`, `website`, `facebook`, `twitter`, `linkedin`, `logo`) VALUES ($email,$job,$Location,$skill,$jobtype,$companyname,$tagline,$website,$facebook,$twitter,$linkedin,$logo)";
    $query=mysqli_connect($conn,$sql);
    if($query)
    {
        echo "<script>alert('Record Save !')</script>";
    }
    else
    {
        echo "<script>alert('Record Save !')</script>";
    }
}
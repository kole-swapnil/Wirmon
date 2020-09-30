<?php

include '../../../dbconn.php';
$id = $_GET['id'];
$stmt = $conn->prepare("delete from jobseeker where sr_no = ?");
$stmt->bindParam(1, $id);
$stmt->execute();

?>
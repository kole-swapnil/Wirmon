<?php

include '../../../dbconn.php';
$id = $_GET['id'];
$stat = $_GET['status'];
$cnt = $_GET['cnt'];
if($stat){
    $stat = 0;    
}
else $stat = 1;

$stmt = $conn->prepare("update employer SET status = ? WHERE employer.sr_no = ? ");
$stmt->bindParam(1, $stat);
$stmt->bindParam(2, $id);
$stmt->execute();
if($stat == true)
                {
                    $text = "PENDING";
                    $result = '<button type="button" class="deleteBtn" id="statusBtn" onclick="return changeStatus('.$cnt.', '.$id.', '.$stat.')" >'.$text.'</button>';
                }
                else if($stat == false)
                {
                    $text = "ACTIVE";
                    $result = '<button type="button" class="deleteBtn" id="statusBtn" onclick="return changeStatus('.$cnt.', '.$id.', '.$stat.')" >'.$text.'</button>';
                }
        echo $result;

?>
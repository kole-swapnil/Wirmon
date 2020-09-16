<?php

class checkprofile
{
  public function checkJSprofile($conn, $js)
  {
      try{
          $statment1 = $conn->prepare("select * from jobseeker where email=? and password is not NULL");
          $statment1->bindParam(1,$js);
          $statment1->execute();
          if($statment1->rowCount() > 0)
          {
            $data100 = $statment1->fetchAll();
            foreach($data100 as $row100) {
              $js_name=$row100['name'];
              $js_contact=$row100['contact_no'];
              $js_location=$row100['location'];
              $js_gender=$row100['gender'];
              $js_skills=$row100['skills'];
              $js_edu=$row100['education'];
              $js_exp=$row100['exp'];
              $js_resume=$row100['resume'];
if($js_name =='' or $js_contact=='' or $js_location=='' or $js_gender=='' or $js_skills=='' or $js_edu=='' or $js_exp=='' or $js_resume=='')
{
  return 0;
}
else{
  return 1;
}
            }
          }
      }
      catch(PDOException $e)
      {
          echo '{"error":{"text":'. $e->getMessage() .'}}';
      }
  }
}

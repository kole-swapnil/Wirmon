<?php

//fetch_data.php
 include_once 'dbconn.php';

if(isset($_POST["action"]))
{
       $qry="select * from jobseeker where active=1";

	  // if(isset($_POST["loc"]) && !empty($_POST["loc"]) )
    if(isset($_POST["sectitle"]) && !empty($_POST["sectitle"]))
{$name=$_POST['sectitle'];
  $qry .= "
   AND name LIKE '%$name%' or location LIKE '%$name%' or education LIKE '%$name%' or skills LIKE '%$name%' or exp LIKE '%$name%'
  ";
}
if(isset($_POST["loc"]))
{
$loc_filter = implode("','", $_POST["loc"]);
$qry .= "
AND location IN('".$loc_filter."')
";

}
		   if(isset($_POST["edu"]))
	{
		$edu_filter = implode("','", $_POST["edu"]);
		$qry .= "
		  AND education IN('".$edu_filter."')
		";

	}

	 if(isset($_POST["exp"]))
	{
		$exp_filter = implode("','", $_POST["exp"]);
		$qry .= "
		  AND exp IN('".$exp_filter."')
		";

	}
  if(isset($_POST["skills"]))
 {
   $skills_filter = implode(",", $_POST["skills"]);
   $qry .= "
     AND skills LIKE '%$skills_filter%'
   ";

 }
        $query = $conn->prepare($qry);
		 $query->execute();
        if($query->rowCount() > 0)
        {


        $data = $query->fetchAll();
		 $output ='';

        foreach($data as $row) {

          $output .= '
            <ul class="job-listings mb-5">
            <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
              <a href="candidate.php?id='. $row['unique_id'] .'" target="_blank"></a>

              <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                <div class="job-listing-position custom-width w-25 mb-3">
                  <h2 style="font-size:18px;">'. $row['name'] .'</h2>
                  <strong>'. $row['contact_no'] .'</strong><br>
                  <span class="badge badge-danger">'. $row['exp'] .' yrs</span>
                </div>
                <div class="job-listing-skills mb-3 custom-width w-25" style="margin-top:20px;">';
                $arr = explode(",",$row['skills']);
                   foreach($arr as $asx){
                   $row['skills']=$asx;

              $output .='
              <span class="icon-user"></span> '. $row['skills'] .'<br>
             ';
              }

              $output .=' </div>
                <div class="job-listing-location mb-3 custom-width w-25" style="margin-top:20px;">
                  <span class="icon-room"></span> '. $row['location'] .'
                </div>
                <div class="job-listing-meta" style="margin-top:20px;">
                  <span class="badge badge-danger">'. $row['education'] .'</span>
                </div>
              </div>


            </li>
              </ul>

			';
		}
	}
	else
	{
		$output = '<h4>No Job Seeker Found</h4>';
	}
	//echo '<pre>'; print_r($_POST["loc"]); echo '</pre>';
	echo $output;
}

?>

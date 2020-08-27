<?php

//fetch_data.php
 include_once 'dbconn.php';

if(isset($_POST["action"]))
{
       $qry="select * from jobpost";

	  // if(isset($_POST["loc"]) && !empty($_POST["loc"]) )
		  if(isset($_POST["sectitle"]) && !empty($_POST["sectitle"]))
	{$name=$_POST['sectitle'];
		$qry .= "
		 WHERE title LIKE '%$name%' or location LIKE '%$name%' or type LIKE '%$name%' or education LIKE '%$name%' or salary LIKE '%$name%' or skills LIKE '%$name%' or exp LIKE '%$name%' or company_name LIKE '%$name%'
		";
	}
		   if(isset($_POST["loc"]))
	{
		$loc_filter = implode("','", $_POST["loc"]);
		$qry .= "
		  WHERE location IN('".$loc_filter."')
		";

	}
  if(isset($_POST["type"]))
 {
   $type_filter = implode("','", $_POST["type"]);
   $qry .= "
     WHERE type IN('".$type_filter."')
   ";

 }
	 if(isset($_POST["title"]))
	{
		$title_filter = implode("','", $_POST["title"]);
		$qry .= "
		  WHERE title IN('".$title_filter."')
		";

	}
	 if(isset($_POST["exp"]))
	{
		$exp_filter = implode("','", $_POST["exp"]);
		$qry .= "
		  WHERE exp IN('".$exp_filter."')
		";

	}
  if(isset($_POST["edu"]))
 {
   $edu_filter = implode("','", $_POST["edu"]);
   $qry .= "
     WHERE education IN('".$edu_filter."')
   ";

 }
 if(isset($_POST["sal"]))
{
  $sal_filter = implode("','", $_POST["sal"]);
  $qry .= "
    WHERE salary IN('".$sal_filter."')
  ";

}
  if(isset($_POST["skills"]))
 {
   $skills_filter = implode("','", $_POST["skills"]);
   $qry .= "
     WHERE skills LIKE '%$skills_filter%'
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
          <a href="job-single.php?id='. $row['job_id'] .'" target="_blank"></a>
          <div class="job-listing-logo">
            <img src="Emp_document/'. $row['logoORphoto'] .'" alt="Logo" class="img-fluid" style="height:100px !important;width:150px;">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>'. $row['title'] .'</h2>
              <strong>'. $row['company_name'] .'</strong>
            </div>
            <div class="job-listing-skills mb-3 mb-sm-0 custom-width w-25">';
            $arr = explode(",",$row['skills']);
               foreach($arr as $asx){
               $row['skills']=$asx;

          $output .='
          <span class="icon-user"></span> '. $row['skills'] .'<br>
         ';
          }

          $output .=' </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> '. $row['location'] .'
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-danger">'. $row['type'] .'</span>
            </div>
          </div>


        </li>
          </ul>
			';

		}
	}
	else
	{
		$output = '<h4>No Job Found</h4>';
	}
	//echo '<pre>'; print_r($_POST["loc"]); echo '</pre>';
	echo $output;
}

?>

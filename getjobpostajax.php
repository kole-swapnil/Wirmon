<?php

//fetch_data.php
 include_once 'dbconn.php';

if(isset($_POST["action"]))
{
       $qry="select * from jobpost";

	  // if(isset($_POST["loc"]) && !empty($_POST["loc"]) )
		  if(isset($_POST["sectitle"]) && !empty($_POST["sectitle"]))
	{
		$qry .= "
		 AND jobTitle like '%".$_POST["sectitle"]."%'
		";
	}
		   if(isset($_POST["loc"]))
	{
		$loc_filter = implode("','", $_POST["loc"]);
		$qry .= "
		  AND location IN('".$loc_filter."')
		";

	}
	 if(isset($_POST["jtype"]))
	{
		$jtype_filter = implode("','", $_POST["jtype"]);
		$qry .= "
		  AND jobType IN('".$jtype_filter."')
		";

	}
	 if(isset($_POST["exp"]))
	{
		$exp_filter = implode("','", $_POST["exp"]);
		$qry .= "
		  AND exp IN('".$exp_filter."')
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

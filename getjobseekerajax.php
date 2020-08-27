<?php

//fetch_data.php
 include_once 'dbconn.php';

if(isset($_POST["action"]))
{
       $qry="select * from jobseeker where sr_no = sr_no";
	  // if(isset($_POST["loc"]) && !empty($_POST["loc"]) )

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
        $query = $conn->prepare($qry);
		 $query->execute();
        if($query->rowCount() > 0)
        {


        $data = $query->fetchAll();
		 $output ='';
		 
        foreach($data as $row) {		
			
			$output .= '
			<div class="col-md-12">
            <ul class="accordian">
                <a href="#?id='. $row['sr_no'] .'" style="width:100%;"><li id="acco1">'. $row['exp'] .' - '.$row['education'] .'</li>
				<i class="fa fa-user" style="margin-left:5%;"></i> <span>'. $row['exp'] .'</span>
				
                <i class="fa fa-map-marker" style="margin-left:5%;"></i> <span>'. $row['location'] .'</span></a>
			</ul>

        </div>
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
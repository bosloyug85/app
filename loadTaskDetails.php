<?php 

	require 'connect.php';

	$i = 0;
	$currentUserId = $_POST['currentuser'];
	$id = $_POST['taskid'];

	$sql = "SELECT * FROM jobs WHERE job_id = '$id'";

	$result = mysqli_query($conn, $sql);

	


	    while($row = mysqli_fetch_assoc($result)) {
	        $odgovor['TASK_ID']      = $row['job_id'];
	        $odgovor['TASK_STATUS']  = $row['status'];
	        $odgovor['TASK_TITLE']   = $row['job_title'];
	        $odgovor['TASK_TEXT']    = $row['job_text'];
	        $odgovor['TASK_TEXT1']    = $row['job_text1'];
	        $odgovor['TASK_BUDGET']  = $row['job_budget'];
	        $odgovor['TASK_USERID']  = $row['user_id'];
	        $odgovor['TASK_KIND']    = $row['job_kind'];
	        $odgovor['TASK_SUBKIND'] = $row['job_subkind'];
	        $odgovor['TASK_CITY']    = $row['city'];
	        $odgovor['TASK_COUNTRY'] = $row['country'];
	        $odgovor['TASK_LAT']     = $row['latitude'];
	        $odgovor['TASK_LONG']    = $row['longitude'];

	        //is current user creator of this task

	        if( $currentUserId == $row['user_id'] )
	        {
	        	$odgovor['IS_CURRENT_USER_CREATOR'] = 'yes';
	        }
	        else
	        {
	        	$odgovor['IS_CURRENT_USER_CREATOR'] = 'no';
	        }

	        $sql1 = "SELECT * FROM users WHERE userid = '". $row['user_id'] ."'";

			$result1 = mysqli_query($conn, $sql1);

	        while( $row = mysqli_fetch_assoc($result1) ){
	        	$odgovor['TASK_USER_PIC'] = $row['userpic'];
	        	$odgovor['TASK_USERNAME'] = $row['firstname']. ' '.$row['lastname'];
	        }

	        $niz = array();
	        $j = 0;
	        $sql2 = "SELECT * FROM proposals WHERE job_id = '". $odgovor['TASK_ID'] ."' AND approved = 'yes'";
	        $result2 = mysqli_query($conn, $sql2);

	        $odgovor['PROPOSALS_NUMBER'] = mysqli_num_rows($result2);


	        while( $row = mysqli_fetch_assoc($result2) )
	        {
	        	$niz[$j]['PROPOSAL_ID'] = $row['proposal_id'];
	        	$niz[$j]['PROPOSAL_TEXT'] = $row['proposal_text'];
	        	$tempUserId = $row['user_id'];

	        	$sql3 = "SELECT * FROM users WHERE userid = '". $tempUserId ."'";
	        	$result3 = mysqli_query($conn, $sql3);

	        	while( $row = mysqli_fetch_assoc($result3) )
	        	{
	        		$niz[$j]['PROPOSAL_USERPIC'] = $row['userpic'];
	        		$niz[$j]['PROPOSAL_USER_ID'] = $row['userid'];
	        		$niz[$j]['PROPOSAL_USERFULLNAME'] = $row['firstname']. ' '. $row['lastname'];
	        	}

	        	$j++;


	        }

	        //array_push($odgovor, $niz);
	        $odgovor['PROPOSALS_ARRAY'] = $niz;

	        

	        $i++;
	    }


	echo json_encode($odgovor);


	mysqli_close($conn);



?>
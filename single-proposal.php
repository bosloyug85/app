<?php 
	
	require 'connect.php';



	

	$proposalID = $_GET['id'];


	$checkSeen = "SELECT * FROM proposals WHERE proposal_id = '$proposalID'";
	$resSeen = mysqli_query($conn, $checkSeen);

	while($row = mysqli_fetch_assoc($resSeen)){
		$proposalSeen = $row['seen'];
		$youtube = $row['youtube'];
		$user = $row['user_id'];
		$jobid = $row['job_id'];
		$approved = $row['approved'];

		if( $proposalSeen == 'no' ){
			$updateSeen = "UPDATE proposals SET seen = 'yes' WHERE proposal_id = '$proposalID'"; 

			if (mysqli_query($conn, $updateSeen)) {
			
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}
		}
	}


	$getUserMail = "SELECT * FROM users WHERE userid = '".$user."'";
    $resultGet = mysqli_query($conn, $getUserMail);

    while($row = mysqli_fetch_assoc($resultGet)){
    	$email2 = $row['paypal_mail'];
    }
    



	// do transaction with paypal on button click

	if( isset($_POST['submitPay']) )
	{
	//passing email1 and email2
	    $email1 = 'slobodan.perusinovic-facilitator@gmail.com';

	   
	    $emailReciept = $email2;
	    

	    

	    //calculating percent of web app fee
	    $totalAmount = $_POST['amount1'];
	    $fee = $totalAmount/100*5;  // 5% tasker fee

	    $difference = $totalAmount - $fee;
	    


	define('PAYPAL_API_USER', 'slobodan.perusinovic-facilitator_api1.gmail.com');
	define('PAYPAL_API_PWD', '346WQ8GD2GGZHN2X');
	define('PAYPAL_API_SIGNATURE', 'AUwc69NmbCMwP.M3PIYp32n9IYt5A97XWbeIgZiPWnmuZk0rKup.7Gy4');
	define('PAYPAL_API_APPLICATION_ID', 'APP-80W284485P519543T');

	$url = 'https://svcs.sandbox.paypal.com/AdaptivePayments/Pay';
	$headers = array(
	    'X-PAYPAL-SECURITY-USERID: ' . PAYPAL_API_USER,
	    'X-PAYPAL-SECURITY-PASSWORD: ' . PAYPAL_API_PWD,
	    'X-PAYPAL-SECURITY-SIGNATURE: ' . PAYPAL_API_SIGNATURE,

	    'X-PAYPAL-REQUEST-DATA-FORMAT: ' . 'JSON',
	    'X-PAYPAL-RESPONSE-DATA-FORMAT: ' . 'JSON',

	    'X-PAYPAL-APPLICATION-ID: ' . PAYPAL_API_APPLICATION_ID
	    
	);
	$body =  '{
	  "actionType":"PAY",                              
	  "currencyCode":"USD", 
	  "feesPayer":"SECONDARYONLY",                   
	  "receiverList":{
	    "receiver":[
	    {
	      "amount":'.$difference.',                              
	      "email":"'.$emailReciept.'", 
	      "primary":false   
	    },
	    {
	      "amount":'.$totalAmount.',                              
	      "email":"'.$email1.'",
	      "primary":true
	    }
	    ]
	  },
	  "returnUrl":"https://www.isotech.rs/taskeroop/singleProposal.php?payment=success&id='.$proposalID.'&amount='.$difference.'&total='.$totalAmount.'", 
	  "cancelUrl":"https://www.isotech.rs/taskeroop/singleProposal.php?payment=false&od='.$proposalID.'&amount='.$difference.'&total='.$totalAmount.'",  
	  "requestEnvelope":{
	  "errorLanguage":"en_US",                          
	  "detailLevel":"ReturnAll"                         
	  }
	}';

	// alex-buyer@yahoo.com  =  9924.57 USD -- 10016.51 // 91.94 USD ( Paypal fee is 2.9% + 30 cent )
	// slobodan.perusinovic-facilitator@gmail.com =  265.43 USD  -- 270.43 USD // 4.55 USD ( Paypal fee is 2.9% + 30 cent )

	//katewilliams@gmail.com  = 10010.75 USD -- 10021.50 USD 10.75 USD / 12$ - 0.648 $ - 0.6 $ = 

	//milankragulj-buyer@gmail.com = 19988.00 USD -- 19976.00 USD


 




	

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response  = curl_exec($ch);
	curl_close($ch);


		
	$response = json_decode($response, true);

	//echo $response['payKey']; // Ovde izdvajamo payKey koji je najbitniji za redirect na paypal i izvrsenje procesa placanja


	header('Location: https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_ap-payment&paykey='.$response['payKey']);

	}



 
	mysqli_close($conn);


?>

<?php require 'header.php'; ?>
	<?php if( isset($_SESSION['userid']) )
		{
			$user = $_SESSION['login_username'];
			$pass = $_SESSION['login_password'];
			$sql = "SELECT * FROM users WHERE userid = ".$_SESSION['userid'];

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			    	$verified = $row['verified'];
			    	$userID = $row['userid'];
			    	$email = $row['email'];
			    	$city = $row['city'];
                    $country = $row['country'];
			        $userEmail = $row['email'];
			        $firstname = $row['firstname'];
			        $lastname = $row['lastname'];
			        $userPic = $row['userpic'];
			        $account = $row['account_balance'];      
			      
			    }
			} else {
			    $message = 'No such user.';
			}

			echo $message;
		}
		else
		{
			header('Location: index.php');
		} ?>

		<div id="load" style="display: none;"></div>
		


			<?php 

	$userID = $_SESSION['userid'];

	$proposalID = $_GET['id'];


	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$userInfo = "SELECT * FROM users WHERE userid = '$userID'";
	$resInfo = mysqli_query($conn, $userInfo);

	while($row = mysqli_fetch_assoc($resInfo))
	{
		$info['USER'] = $row['firstname']. ' ' .$row['lastname'];
	}




	$singleProposal = "SELECT * FROM proposals WHERE proposal_id = '$proposalID'";
	$result = mysqli_query($conn, $singleProposal);

	while($row = mysqli_fetch_assoc($result))
	{
		$single['ID'] = $row['id'];
		$single['USERID'] = $row['user_id'];
		$single['JOB_ID'] = $row['job_id'];
		$single['PROPOSAL_ID'] = $row['proposal_id'];
		$single['YOUTUBE'] = $row['youtube'];
		$single['PROPOSAL_TEXT'] = $row['proposal_text'];
		$single['USERFULLNAME'] = $row['userfullname'];
		$single['PAYPAL_MAIL'] = $row['paypal_mail'];

		$picture = "SELECT * FROM users WHERE userid = '".$single['USERID']."'";
		$resPicture = mysqli_query($conn, $picture);

		while($row = mysqli_fetch_assoc($resPicture)){
			$single['USERPIC'] = $row['userpic'];
			$single['USERMINIFIED'] = $row['firstname'] .' '. substr($row['lastname'], 0, 1) . '.';
			$single['CITY'] = $row['city'];
			$single['COUNTRY'] = $row['country'];
		}
		
		if( isset($single['YOUTUBE']) && $single['YOUTUBE'] != '' )
		{
			$images = '<img class="img img-responsive img-thumbnail" style="width: 300px;height: auto;" src="https://img.youtube.com/vi/'.$single['YOUTUBE'].'/0.jpg" />';
		}
		
		$images1 = glob("proposals/".$proposalID."/*.jpg");
		$images2 = glob("proposals/".$proposalID."/*.png");
		$images3 = glob("proposals/".$proposalID."/*.JPG");
		$documents1 = glob("proposals/".$proposalID."/*.doc");
		$documents2 = glob("proposals/".$proposalID."/*.docx");
		$documents3 = glob("proposals/".$proposalID."/*.xls");
		$documents4 = glob("proposals/".$proposalID."/*.xlsx");
		$zip1 = glob("proposals/".$proposalID."/*.zip");
		$videos = glob("proposals/".$proposalID."/*.mp4");
		

		
		$jobID = $single['JOB_ID'];

		
		
	}

	$checkBudget = "SELECT * FROM jobs WHERE job_id = '$jobID'";
	$resBudget = mysqli_query($conn, $checkBudget);

		while($row = mysqli_fetch_assoc($resBudget))
		{
			$budget = $row['job_budget'];
		}



	

	

?>


		<?php 
					$_SESSION['temporary_proposal_id'] = $_GET['id'];
					

					$userID = $_SESSION['userid'];

					$userInfo = "SELECT * FROM users WHERE userid = '".$_SESSION['userid']."'";
					$resInfo = mysqli_query($conn, $userInfo);

					while($row = mysqli_fetch_assoc($resInfo))
					{
						$verified = $row['verified'];
						$userID = $row['userid'];
				        $userEmail = $row['email'];
				        $firstname = $row['firstname'];
				        $lastname = $row['lastname'];
				        $userPic = $row['userpic'];
				        $account = $row['account_balance'];      
					}


					include 'showNotifications.php';

					
			?>

<script type="text/javascript">
	      //define global variable verify paypal
	      var verified = '<?php echo $verified ?>';

	    </script>

<script type="text/javascript">
	var data = new Array();
    <?php foreach($images1 as $item){ ?>
        data.push('<?php echo $item; ?>');
    <?php } ?>
    
</script>
		

		<div class="container" style="padding-top: 80px;">
			<div class="container-fluid" style="background-color: white;border-radius: 6px;padding: 20px 40px;">
				<?php echo $button1 ?>
				<div class="kw-entry-info">
				<div class="col-lg-3" style="text-align: center;">
					<img class="avatar" style="height: 100px;width: 100px;border-radius: 50%;" src="<?php echo $single['USERPIC'] ?>" />
					<p class="text-center" style="font-size: 12px;margin-bottom: 10px;color: grey;"><?php echo $single['USERMINIFIED'] ?></p>
				</div>

				<div class="col-lg-12">
					<div class="location" style="color: grey;font-size: 14px;font-weight: normal;"><span style="font-size: 14px;" class="lnr icon-map-marker"></span>User location: <span style="color: #484848;"><?php echo $single['CITY'] . ', ' . $single['COUNTRY'] ?></span></div>

					<h4 style="color: grey;margin-top: 30px;font-size: 14px;">Proposal text </h4>
					<div disabled class="" style="border-radius: 3px;margin-bottom: 20px;color: grey;height: auto !important;" ><?php echo $single['PROPOSAL_TEXT'] ?></div>

						<?php 
							if( $youtube == '' )
							{
															
								echo '<h4 style="color: grey;margin-top: 30px;font-size: 14px;">Attachment</h4>';
								foreach($images1 as $image)
								{
									echo '<a target="_blank" href="showimage.php?id='.$proposalID.'&data='.base64_encode($image).'"><img style="height: 50px;width: auto;" src="images/jpg.png"></a>';
								}
								foreach($images2 as $image)
								{
									echo '<a target="_blank" href="showimage.php?id='.$proposalID.'&data='.base64_encode($image).'"><img style="height: 50px;width: auto;" src="images/jpg.png"></a>';
								}
								foreach($images3 as $image)
								{
									echo '<a target="_blank" href="showimage.php?id='.$proposalID.'&data='.base64_encode($image).'"><img style="height: 50px;width: auto;" src="images/jpg.png"></a>';
								}
								foreach($documents1 as $document)
								{
									echo '<a target="_blank" href="'.$document.'"><img style="height: 50px;width: auto;" src="images/doc.png"></a>';
								}
								foreach($documents2 as $document)
								{
									echo '<a target="_blank" href="'.$document.'"><img style="height: 50px;width: auto;" src="images/docx.png"></a>';
								}
								foreach($documents3 as $document)
								{
									echo '<a target="_blank" href="'.$document.'"><img style="height: 50px;width: auto;" src="images/xls.png"></a>';
								}
								foreach($documents4 as $document)
								{
									echo '<a target="_blank" href="'.$document.'"><img style="height: 50px;width: auto;" src="images/xlsx.png"></a>';
								}
								foreach($zip1 as $zip)
								{
									echo '<a target="_blank" href="'.$document.'"><img style="height: 50px;width: auto;" src="images/zip.png"></a>';
								}
							}
							else
							{
								echo '<h4 style="color: grey;margin-top: 30px;color: white;">Attachment</h4>';
								echo '<a target="_blank" href="image.php?id='.$_GET['id'].'&num=0"><img style="height: 50px;width: auto;" src="images/jpg.png"></a>';
								echo '<a target="_blank" href="image.php?id='.$_GET['id'].'&num=1"><img style="height: 50px;width: auto;" src="images/jpg.png"></a>';
								echo '<a target="_blank" href="image.php?id='.$_GET['id'].'&num=3"><img style="height: 50px;width: auto;" src="images/jpg.png"></a>';
															
							}				 
							?>

							<div id="pay-button"></div>

							<?php if( $approved == 'yes' )
							{
								echo '<div id="payment-div">
										<button class="payment login-btn" style="margin-top: 50px;background-color: #8b91dd;margin-left: 0px;" data-toggle="modal" data-target="#paymentConfirmation">
											<i class="fa fa-paypal" aria-hidden="true"></i> Pay Proposal
										</button>
										<p class="payment-notice" style="font-size: 12px;margin-top: 15px;color: grey;">
											Click this button to make a payment.
										</p>
									  </div>';
							} 
							else 
							{
								echo '<div id="approve-buttons-div"><button class="kw-btn-medium kw-blue" style="margin: 15px 5px;" onclick="approve('.$proposalID.')"><img style="height: 14px;width: auto;" src="images/checked.png" /> Approve</button>
								<button class="kw-btn-medium kw-blue" style="margin: 15px 0px;" onclick="discard('.$proposalID.')"><img style="height: 14px;width: auto;" src="images/cross.png" /> Discard</button></div>';
							}
						?>
													

					</div>
					<p><?php echo $jobtext ?></p>
		    </div>
		</div>
		

		<!-- Modal -->
		<div style="padding-top: 120px;" class="modal bs-example-modal-md animated bounceIn" id="paymentConfirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-md" role="document">
		    <div class="modal-content">
		    	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;right: 15px;top: 10px;"><span aria-hidden="true">&times;</span></button>
		    	<div>
					<div style="background-color: white;border-radius: 50%;height: 110px;width: 110px;position: relative;margin-top: -55px;left: 50%;margin-left: -55px;">
						<img src="<?php echo $single['USERPIC'] ?>" style="position: relative;top: 5px;left: 5px;width: 100px;height: 100px;border-radius: 50%;" />
						<p class="text-center" style="font-size: 12px;"><?php echo $single['USERMINIFIED'] ?></p>
					</div>
				</div>
				<div class="text-center" style="padding: 10px 10px;">
					<h3 class="text-center" style="font-weight: bolder;margin-top: 20px;">You're about to award this user!</h3>
					<p class="text-center" style="">This user do what i asked for.</p>
					<form id="payForm" method="POST">
						<input type="hidden" name="proposal-id" value="<?php echo $single['PROPOSAL_ID'] ?>" />
						<input type="hidden" name="userid" value="<?php echo $single['USERID'] ?>" />
						<input type="hidden" readonly name="amount1" value="<?php echo $budget ?>" />
					</form>
				
					<hr>
					<button class="modal-button" type="submit" name="submitPay" form="payForm" style="font-weight: bold;margin: 0 auto;text-transform: uppercase;background-color: #6DBD3F;color: white;width: 100%;height: 50px;border-radius: 3px;border: none;text-align: center;">Proceed to Paypal</button>
				</div>

				
			</div>
		  </div>
		</div>

		<script type="text/javascript">
			var accountIncrease = '<?php echo $_GET["amount"] ?>';

				if( accountIncrease != undefined && accountIncrease != 0 )
				{
					
					//increase user account_balance 
					$.post('increaseAccount.php', { amount : accountIncrease, user : '<?php echo $single["USERID"] ?>', current : '<?php echo $_SESSION["userid"] ?>', totalAmount : '<?php echo $_GET["total"] ?>', jobid : '<?php echo $jobid ?>' }, function(data){
						
					});
					
				}

			var payment = '<?php echo $_GET["payment"] ?>';

				if( payment != undefined )
				{
					if( payment == 'success' )
					{
						$('#load').css('display','block');
						//ceil payment and task 
						$.post('finishTask.php', { job_id : '<?php echo $jobID ?>', winnerid: '<?php echo $single["USERID"] ?>', proposal_id: '<?php echo $_GET["ID"] ?>' }, function(data){
							window.location = 'listing.php';
							
						});
					}
					if( payment == 'false' )
					{
						$('#load').css('display','none');
						alert('Sorry, something went wrong with your payment.');
					}
				}

			


				function saveJob(){
				var jobid = Math.floor(Math.pow(10, 9-1) + Math.random() * 9 * Math.pow(10, 9-1));
				var jobtitle = $('#job-title').val();
				var jobtext = $('#job-text').val();
				var jobbudget = $('#job-budget').val();
				var userId = '<?php echo $_SESSION["userid"] ?>';
				var userName = '<?php echo $info["USER"] ?>';

				$.post('saveJob.php', { job_id : jobid, user_id : userId, user_name : userName, job_title : jobtitle, job_text : jobtext, job_budget : jobbudget }, function(data){
					$('#myModal').modal('hide');
					$('.modal').on('hidden.bs.modal', function(){
					    $(this).find('form')[0].reset();
					});
					


				});

			}



		</script>

		<script type="text/javascript">
			if( localStorage.getItem('city') == null )
			{
				$('.kw-current-location b').html('Not determined');
			}
			else
			{
				$('.kw-current-location b').html(localStorage.getItem('city'));
			}
			
		</script>

		<script type="text/javascript">
			function approve(id){
				$.post('approveProposal.php', { id: id }, function(data){
					if( data == 'approved' )
					{
						$('#approve-buttons-div').replaceWith('<div id="payment-div"><button class="payment kw-btn-medium kw-blue" style="margin-top: 50px;background-color: #8b91dd;" data-toggle="modal" data-target="#paymentConfirmation"><i class="fa fa-paypal" aria-hidden="true"></i> Pay Proposal</button><p class="payment-notice" style="font-size: 12px;margin-top: 15px;">Click this button to make a payment.</p></div>');
						pendingProposals();
						console.log('Proposal approved successfully.');
					}
					if( data == 'error' )
					{
						console.log('Error occured');
					}
					
				});
			}

			function discard(id){
				$.post('deleteProposal.php', { id: id, user: '<?php echo $_SESSION["userid"] ?>' }, function(data){
					if( data == 'deleted' )
					{
						pendingProposals();
						console.log('Proposal deleted successfully.');
						window.location = 'listing.php';
					}
					if( data == 'error' )
					{
						console.log('Error occured');
					}
					
				});
			}
		</script>

		<script type="text/javascript">
			var userRating = $('#rating').attr('data-rating');

			if( userRating == '0.0' )
			{
				$('#rating').html('Not rated yet');
			}
		</script>

		<script type="text/javascript">
	      if( verified == 'no' )
	        {
	          $('.verification-status').html('Paypal not verified! Click on button below to verify your account.');

	        }
	        if( verified == 'yes' ) 
	        { 
	          $('#verified-div').html('<div class="verified" data-toggle="tooltip" data-placement="top" title="Your paypal account is verified"><i style="color: white;" class="fa fa-check"></i></div>');
	          $('.kw-profile-nav').append('<div class="verified-small-navbar" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Your paypal account is verified"><i style="color: white;" class="fa fa-check"></i></div>');
	          $('#update-status').remove();
	        }
	    </script> 

	    

		

<?php require 'footer.php'; ?>
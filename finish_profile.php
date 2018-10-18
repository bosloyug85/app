<?php session_start(); ?>
<?php require 'header.php'; ?>
	<style type="text/css">
		body {
			background-color: #FAFAFA;
		}

		.no-padding-top {
			padding-top: 50px;
		}

		.padding {
			padding: 30px 80px;
		}

		@media screen and (max-width: 727px){
			.no-padding-top {
				padding-top: 15px;
			}
			.padding {
				padding: 15px;
			}
		}
	</style>

	<div class="container">
		<div class="col-lg-1 hidden-xs"></div>

		<div class="col-lg-10 no-padding-top">
			<div class="container-fluid padding" style="background-color: white;border-radius: 6px;border: 1px solid #f0f0f0;">
				<p class="text-center" style="margin-top: 30px;"><img style="height: 40px;" src="images/logo.svg" /></p>
				<h2 class="text-center" style="font-family: 'Gotham Bold';">You're almost done!</h2>
				<p class="text-center" style="font-family: 'Gotham Book';">Finish creating your account to see jobs<br>that match your skills, interests, and experience.</p>
				<div class="row" style="margin-top: 20px;">
					<form method="POST" action="finish.php">
						<div class="col-lg-6">
							<label>Firstname *</label>
							<input class="form-control" style="border-radius: 0px;height: 49px;" type="text" name="firstname" id="firstname">
							<input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['userid'] ?>">
						</div>
						<div class="col-lg-6">
							<label>Lastname *</label>
							<input class="form-control" style="border-radius: 0px;height: 49px;" type="text" name="lastname" id="lastname">
						</div>
						<div class="col-lg-6">
							<label style="margin-top: 20px;">Paypal Email *</label>
							<input class="form-control" style="border-radius: 0px;height: 49px;" type="email" name="paypal_mail" id="paypal_mail">
						</div>

						<div class="col-lg-12">
							<button type="submit" class="btn button next" style="font-weight: bold;margin-top: 40px;width: 100%;" disabled="disabled">Sign Up</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-lg-1 hidden-xs"></div>
	</div>

	<script type="text/javascript">
		function checkFields(){
			let firstname = $('#firstname').val();
			let lastname  = $('#lastname').val();
			let paypal    = $('#paypal_mail').val();

			if( firstname.length == 0 || lastname.length == 0 || paypal.length == 0 )
			{
				$('.next').addClass('btn');
				$('.next').attr('disabled', 'disabled');
				$('.next').removeClass('green');
			}
			else
			{
				$('.next').attr('disabled', false);
				$('.next').removeClass('btn');
				$('.next').addClass('green');
			}
		}

		$('#firstname, #lastname, #paypal_mail').on('keyup paste input', function(){
			checkFields();
		});
	</script>
	<script src="js/loginGoogle.js"></script>
	<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>
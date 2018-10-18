        <script type="text/javascript">
            function callRegister() {
                $('#registerModal').modal('show');
            }
            function callLogin() {
                $('#loginModal').modal('show');
            }
        </script>
    </div>
    <footer style="background-color: white;padding: 125px 0;padding: 60px 0px;position: relative;margin-top: 30px;">
		<div class="container">
			<div class="col-lg-12">
				<p class="text-center" style="color: #484848;font-weight: bold;line-height: 60px;margin-bottom: 0px;">Powered by<br><img style="height: 60px;" src="images/paypal.png">   <img style="height: 60px;" src="images/youtube.png"></p>
			</div>

			<div class="col-lg-12">
				<p style="padding-left: 0px;">
					
				</p>
			</div>

			<div class="col-lg-5" style="margin-bottom: 30px;">
				<p style="color: #484848;font-weight: normal;">
					Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi.
				</p>
			</div>

			<div class="col-lg-2"></div>

			<div class="col-lg-5" style="margin-bottom: 60px;">
				<div class="row">
					<div class="col-lg-6">
						<ul class="footer-list">
							<li style="margin-bottom: 15px;">
								<a style="cursor: default;font-weight: bold;text-decoration: none;">Company</a>
							</li>
							<li>
								<a href="#">About Us</a>
							</li>
							<li>
								<a href="#">Help Center</a>
							</li>
							<li>
								<a href="#">Blog</a>
							</li>
							<li>
								<a href="#">Careers</a>
							</li>
							<li>
								<a href="#">Contact Us</a>
							</li>
						</ul>
					</div>
					<div class="col-lg-6">
						<ul class="footer-list">
							<li style="margin-bottom: 15px;">
								<a style="cursor: default;font-weight: bold;text-decoration: none;">Quick Links</a>
							</li>
							<li>
								<a href="#">How It Works</a>
							</li>
							<li>
								<a href="#">Add Listing</a>
							</li>
							<li>
								<a href="#">Popular Categories</a>
							</li>
							<li>
								<a href="#">Popular Places</a>
							</li>
							<li>
								<a href="#">FAQ</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-lg-12" style="margin-bottom: 0px;">
				<p class="text-center copyright" style="color: #484848;font-size: 12px;">Copyright Tasker © 2018. All Rights Reserved</p>
			</div>
		</div>
	</footer> 
    <div id="overlay1">
		<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>

    <script type="text/javascript">
		function onLoad() {
		    gapi.load('auth2', function() {
		      gapi.auth2.init({
		           client_id: '33966815831-sd2a4ujfqqk0b3tvrrt9tgaped7e7guq.apps.googleusercontent.com'
		      });
		    });
		  }
	</script>
	<script>
		function signOut() {
			var auth2 = gapi.auth2.getAuthInstance();
			auth2.signOut().then(function () {
				console.log('User signed out.');
			});
		}
        
	</script>
    <script async defer src="https://apis.google.com/js/platform.js?onload=onLoad">
    </script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
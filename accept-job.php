<?php require 'header.php'; ?>
<?php 
    

    require 'connect.php';

    $userID = $_SESSION['userid'];
    $jobID = $_GET['id'];
    $_SESSION['job_id'] = $jobID;

    //echo $_SESSION['userfullname'];

    $jobDetails = "SELECT * FROM jobs WHERE job_id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $jobDetails);

    while($row = mysqli_fetch_array($result)){
        $details['JOB_ID'] = $row['job_id'];
        $details['USERNAME'] = $row['username'];
        $details['JOB_TITLE'] = $row['job_title'];
        $details['JOB_TEXT'] = $row['job_text'];
        $details['JOB_BUDGET'] = $row['job_budget'];
        $details['JOB_KIND'] = $row['job_kind'];
    }

    $_SESSION['proposal_id'] = mt_rand(100000000,999999999);

    $proposalID = $_SESSION['proposal_id'];



    //echo $details['JOB_KIND'];
    //echo $_SERVER["DOCUMENT_ROOT"].'/dbs/proposals/'.$jobID.'/';

    if( isset($_SESSION['userid']) )
        {

            $sql = "SELECT * FROM users WHERE userid = '".$_SESSION['userid']."'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
             
                while($row = mysqli_fetch_assoc($result)) {
                    //$_SESSION['user_id'] = $row['userid'];
                    $verified = $row['verified'];
                    $email = $row['email'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $userPic = $row['userpic'];
                    $account = $row['account_balance'];      
                }
            } else {
                
            }
            //
            //echo $message;
        }
        else
        {
            header('index.php');
        }

        //echo $proposalID;

 
?>

    <link href="css/upload_video.css" rel="stylesheet">


  <div id="load1" style="background-color: white;position: fixed;height: 100%;width: 100%;z-index: 100000;display: none;">
    <div class="loading" style="position: relative;left: 50%;margin-left: -30px;top: 50%;margin-top: -30px;"></div>
    <p style="text-align: center;position: relative;top: 51%;font-size: 20px;">Uploading pictures...</p>
  </div>

   <div id="load2" style="background-color: white;position: fixed;height: 100%;width: 100%;z-index: 100000;display: none;">
      <div class="loading" style="position: relative;left: 50%;margin-left: -30px;top: 50%;margin-top: -30px;"></div>
      <p style="text-align: center;position: relative;top: 51%;font-size: 20px;">Preparing image for upload...</p>
    </div>

  <div id="load" style="background-color: white;position: fixed;height: 100%;width: 100%;z-index: 100000;display: none;">
    <div class="loading" style="position: relative;left: 50%;margin-left: -30px;top: 50%;margin-top: -30px;"></div>
    <p style="text-align: center;position: relative;top: 51%;font-size: 20px;">Please wait while youtube process your video...<br/>This process can last longer than 10 minutes depending on your video length.</p>
  </div>
  <script type="text/javascript">
      //define global variable verify paypal
      var verified = '<?php echo $verified ?>';

    </script>
  
    <div class="container" style="padding-top: 80px;">
        <div class="container-fluid" style="background-color: white;border-radius: 6px;">
            <div class="col-sm-12">
              <div class="kw-box clearfix">
                <div class="kw-alert-intermediate">
                  <div class="kw-alert-inner" style="background-color: transparent;padding-left: 0;">
                    <div class="kw-sm-table-row kw-xs-small-offset">
                      <div class="col-sm-9" style="color: grey;">
                        You are currently signed in as <b style=""><?php echo $email ?>.</b>
                      </div>
                      <div class="col-sm-3 kw-right-edge">
                        <a class="kw-btn-small kw-blue" onclick="signOut();window.location= 'logout.php'">Sign Out</a>
                      </div>
                    </div><!--/ .kw-sm-table-row -->
                  </div><!--/ .kw-alert-inner -->
                </div><!--/ .kw-alert-intermediate -->
                
                <h3 style="color: grey;">Create Proposal</h3>
                
                
                  <!-- action="upload.php" -->
                  <label style="color: grey;">Proposal Message</label> 
                  <textarea name="proposal_text" id="proposal-text" style="margin-bottom: 15px;width: 100%;border-radius: 4px !important;height: 120px !important;"></textarea> <!-- Upload image section -->
                                              <?php if( $details['JOB_KIND'] == 'pics' ) 
                                                      { 
                                                          echo '
                                                              <label style="color: grey;">Uploaded images</label>
                                                              <div class="kw-input-wrapper">
                                                                <div  class="kw-uploaded-images" id="selectedFiles">
                                                                	                           

                                                                  <div class="kw-file-input-field" style="background-color: white !important;border: 1px solid grey;color: #ccc !important;" data-input-field="#files">
                                                                    <div class="kw-file-input-inner" style="color: grey;">
                                                                      <span class="lnr icon-picture kw-lead-icon" style="color: grey;"></span>
                                                                      <span class="lnr icon-plus" style="color: grey;"></span> Add Image
                                                                    </div><!--/ .kw-file-input-inner -->
                                                                  </div><!--/ .kw-input-wrapper -->
                                                                  <form id="myForm" method="post">
                                                                    <input multiple="" accept="image/*" type="file" id="files" name="files">
                                                                    
                                                                  </form>
                                                                </div>
                                                              </div><!--/ .kw-input-wrap -->
                                                            ';
                                                          }
                                                  

                                                          elseif( $details['JOB_KIND'] == 'videos' )
                                                          {
                                                              echo '<span style="margin-top: 20px;" id="signinButton" class="pre-sign-in">
                                                            <span
                                                              class="g-signin"
                                                              data-callback="signinCallback"
                                                              data-clientid="368570750934-pg5c9ius2cpvsbiidvn7598eul5hdgh7.apps.googleusercontent.com"
                                                              data-cookiepolicy="single_host_origin"
                                                              data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/youtube.upload https://www.googleapis.com/auth/youtube https://www.googleapis.com/auth/youtube.force-ssl">
                                                            </span>
                                                          </span>

                                                          <div class="post-sign-in" style="">
                                                            <div class="col-sm-2 text-center">
                                                              <img id="channel-thumbnail">
                                                              <p style="font-size: 12px;color: white;" id="channel-name"></p>

                                                              <input input type="file" style="display: block;margin-top: 20px;width: 100%;" id="file" class="button btn btn-default" accept="video/*">
                                                              <button class="kw-btn-medium kw-blue" id="button" style="margin: 15px 0px;display: none;"><i class="fa fa-download"></i> Upload Video</button>
                                                            </div>

                                                            <div style="margin-top: 15px;display: none;">
                                                              <label for="title">Title:</label>
                                                              <input class="form-control" id="title" style="font-size: 14px;" type="text" value="Default Title">
                                                            </div>
                                                            <div style="display: none;">
                                                              <label for="description">Description:</label>
                                                              <textarea class="form-control" id="description">Default description</textarea>
                                                            </div>
                                                            <div style="margin-top: 15px;display: none;">
                                                              <label for="privacy-status">Privacy Status:</label>
                                                              <select class="form-control" style="width: 200px;margin-bottom: 15px;" id="privacy-status">
                                                                <option>public</option>
                                                                
                                                              </select>
                                                            </div>

                                                            
                                                              
                                                            <div class="during-upload">
                                                              <p><span id="percent-transferred"></span>% done (<span id="bytes-transferred"></span>/<span id="total-bytes"></span> bytes)</p>
                                                              <progress style="width: 100%;" id="upload-progress" max="1" value="0"></progress>
                                                            </div>

                                                            <div class="kw-alert-warning">

                                                              <div class="kw-alert-inner" style="margin-top: 20px;color: white;font-family: \'Open Sans\';background-color: transparent;border: 1px solid rgba(250,250,250,.3);">
                                                            
                                                                  By uploading a video, you certify that you own all rights to the content or that you are authorized by the owner to make the content publicly available on YouTube, and that it otherwise complies with the YouTube Terms of Service located at <a href="http://www.youtube.com/t/terms" target="_blank" style="color: white;">http://www.youtube.com/t/terms</a>
                                                              
                                                              </div>

                                                              <button class="kw-close" type="button"></button>

                                                            </div>

                                                            <div id="player" style="margin: 20px;"></div>

                                                            <div class="post-upload">
                                                            	<input type="hidden" id="error-message" />
                                                              <p>Uploaded video with id <span id="video-id"></span>. Polling for status...</p>
                                                              <ul id="post-upload-status"></ul>
                                                            </div>


                                                            
                                                          </div>'; 
                                                          }

                                                          ?> <!-- end of upload image section -->
                   <input name="job_id" type="hidden" value="<?php echo $jobID ?>"> <input name="user_id" type="hidden" value="<?php echo $userID ?>">
                   <?php if( $details['JOB_KIND'] == 'pics' )
                                                    {
                                                        echo '<div id="create-button-div" class="pull-right"></div>';
                                                    }
                                                    /*elseif( $details['JOB_KIND'] == 'man' ){
                                                      echo '<div class="pull-right"><button type="submit" form="myForm1" class="kw-btn-medium kw-blue create-proposal-btn" style="padding: 10px 35px;margin-top: 30px;" data-loading-text="<i class=\'fa fa-spinner fa-spin \'></i> Uploading..."><i class="fa fa-2x fa-check" aria-hidden="true"></i></button></div>';

                                                    }*/  ?>
                                                   <input id="statusUpload" name="" type="hidden"> <!-- End of form -->
                
                <script type="text/javascript">
               
                  function readURL1(input) {

                        
                        $('#preview').append('<img id="image-preview1" class="kw-file-input-field" />');
                        if (input.files && input.files[0]) {
                          
                        
                        var reader = new FileReader();

                        reader.onload = function (e) {
                          $('#image-preview1').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                            
                            
                        }
                      
                      
                  }

                  function readURL2(input) {

                   
                        $('#preview').append('<img id="image-preview2" class="kw-file-input-field" />');
                        if (input.files && input.files[0]) {
                          
                        
                        var reader = new FileReader();

                        reader.onload = function (e) {
                          $('#image-preview2').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                            
                            
                        }
                      
                      
                  }

                  $("#file-input-1").change(function(){
                      readURL1(this);
                      
                  });
                </script>
                
              </div><!--/ .kw-box -->
            </div><!-- - - - - - - - - - - - - - End of Main Content Column - - - - - - - - - - - - - - - - -->
          </div><!--/ .row -->
        </div><!-- - - - - - - - - - - - - - End of Content Section - - - - - - - - - - - - - - - - -->
      </div><!--/ .container -->
    </div><!-- - - - - - - - - - - - - - End of Page Content - - - - - - - - - - - - - - - - -->
    
  </div><!-- - - - - - - - - - - - - - End of Layout - - - - - - - - - - - - - - - - -->

  <div aria-labelledby="myModalLabel" class="modal fade bs-example-modal-md" id="createChannel" role="dialog" tabindex="-1" style="">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content" style="border: none">
				<div class="kw-modal kw-login-modal" style="width: 100%; padding: 50px 40px;">
					<button class="arcticmodal-close kw-modal-close" data-dismiss="modal" type="button"></button> <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
					<header class="kw-modal-header">
						<h3>One more step</h3>
					</header><!-- - - - - - - - - - - - - - End of Header - - - - - - - - - - - - - - - - -->
					<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
					<div class="kw-modal-content">
						
						<p>You have to create youtube channel for uploading videos.</p>
            <p>To create youtube channel, click <a target="_blank" href="//youtube.com/create_channel">here</a></p>
						
					</div><!-- - - - - - - - - - - - - - End of Content - - - - - - - - - - - - - - - - -->
				</div>
			</div>
		</div>
	</div>
    
  <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);

        window.location = 'login-process.php?mail='+profile.getEmail();
      };
    </script>
  <script>
              

              function onLoad() {
            gapi.load('auth2', function() {
              gapi.auth2.init({
                   client_id: '368570750934-pg5c9ius2cpvsbiidvn7598eul5hdgh7.apps.googleusercontent.com'
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
  <script type="text/javascript">
    //function for creating proposal before uploading pictures
    function createProposal(){
        if( $('#youtube-link').length )
        {
            var proposalID = '<?php echo $proposalID ?>';
            var proposalTEXT = $('#proposal-text').val();
            var jobID = '<?php echo $jobID ?>';
            var youtube = $('#youtube-link').val();
            var userID = '<?php echo $userID ?>';
            var paypalMAIL = '<?php echo $_SESSION["paypal_mail"] ?>';
            var userFULLNAME = '<?php echo $_SESSION["userfullname"] ?>';

            //alert(youtube.substr(32,11));

            //$('body').append('<img id="slika" src="https://i1.ytimg.com/vi/'+youtube.substr(32,11)+'/sddefault.jpg" />');
            //var string = 'https://i1.ytimg.com/vi/'+youtube.substr(32,11)+'/sddefault.jpg';


        
            
            /*
            $.post('createProposal1.php', { proposal : proposalID, jobid : jobID, userid : userID, userfullname : userFULLNAME, paypalmail : paypalMAIL, proposalText : proposalTEXT, link : youtube }, function(data){
                //alert(data);
                window.location = 'thank-you.php';
            });
            */
        }
        else
        {
            if( $('.kw-uploaded-image').length != 0 )
            {
                
                var proposalID = '<?php echo $proposalID ?>';
                var proposalTEXT = $('#proposal-text').val();
                var jobID = '<?php echo $jobID ?>';
                var userID = '<?php echo $userID ?>';
                var paypalMAIL = '<?php echo $_SESSION["paypal_mail"] ?>';
                var userFULLNAME = '<?php echo $_SESSION["userfullname"] ?>';
                //console.log(proposalID+'<br/>'+proposalTEXT+'<br/>'+jobID+'<br/>'+userID+'<br/>'+paypalMAIL+'<br/>'+userFULLNAME);
                $.post('createProposal.php', { proposal : proposalID, jobid : jobID, userid : userID, userfullname : userFULLNAME, paypalmail : paypalMAIL, proposalText : proposalTEXT }, function(data){
                    
                    window.location = 'thank-you.php';
                });
                
                //alert('All ok');
            }
            else
            {
                alert('You must upload at least one file to make proposal.');
            }
            
        }
        
    }

    function createProposal1(){
        
                
                var proposalID = '<?php echo $proposalID ?>';
                var proposalTEXT = $('#proposal-text').val();
                var jobID = '<?php echo $jobID ?>';
                var userID = '<?php echo $userID ?>';
                var paypalMAIL = '<?php echo $_SESSION["paypal_mail"] ?>';
                var userFULLNAME = '<?php echo $_SESSION["userfullname"] ?>';
                //console.log(proposalID+'<br/>'+proposalTEXT+'<br/>'+jobID+'<br/>'+userID+'<br/>'+paypalMAIL+'<br/>'+userFULLNAME);
                $.post('createProposal.php', { proposal : proposalID, jobid : jobID, userid : userID, userfullname : userFULLNAME, paypalmail : paypalMAIL, proposalText : proposalTEXT }, function(data){
                    
                    window.location = 'thank-you.php';
                });
                
               
        
    }

    /*$('#uploadVideo').bind('change', function() {

              
              alert(this.files[0].size);

            });*/

    /*$('#uploadVideo').fileupload({
        change : function (e, data) {
            if(data.files.length>=1){
                alert("Max 1 file are allowed")
                return false;
            }
        },
        maxFileSize: 20000000,
        acceptFileTypes: /(\.|\/)(jpe?g|png)$/i,
    });*/

    function createProposalVideo(){
            if( !$('#statusUpload').val() )
            {
                alert('You must upload video file first.');
            }
            else
            {
                //var fajl = $('#statusUpload').val();
                
                //localStorage.setItem("fileName",fajl);
                var proposalID = '<?php echo $proposalID ?>';
                var proposalTEXT = $('#proposal-text').val();
                var jobID = '<?php echo $jobID ?>';
                var youtube = $('#statusUpload').val();
                var userID = '<?php echo $userID ?>';
                var paypalMAIL = '<?php echo $_SESSION["paypal_mail"] ?>';
                var userFULLNAME = '<?php echo $_SESSION["userfullname"] ?>';

                //alert('Go to next page.');
                //alert( $('#uploadVideo').val() );


                //alert(youtube.substr(32,11));

                //$('body').append('<img id="slika" src="https://i1.ytimg.com/vi/'+youtube.substr(32,11)+'/sddefault.jpg" />');
                //var string = 'https://i1.ytimg.com/vi/'+youtube.substr(32,11)+'/sddefault.jpg';


            
                
                
                $.post('createProposal1.php', { proposal : proposalID, jobid : jobID, userid : userID, userfullname : userFULLNAME, paypalmail : paypalMAIL, proposalText : proposalTEXT , link : youtube }, function(data){
                    //alert(data);
                    window.location = 'thank-you.php';
                });
                
            
                //window.location = 'ytupload.php?id=<?php echo $jobID ?>';
            }
            
    }
  </script>
  <script type = "text/javascript">
    function changeHashOnLoad() {
        window.location.href += "#";
        setTimeout("changeHashAgain()", "50");
    }

    function changeHashAgain() 
    {          
        window.location.href += "1";
    }

    var storedHash = window.location.hash;
    window.setInterval(function () {
        if (window.location.hash != storedHash) {
            window.location.hash = storedHash;
        }
    }, 50);

    </script> <!-- JS Libs & Plugins
        ============================================ -->

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

    <script type="text/javascript">
      //adding images to client side to "Uploaded images area"
        var selDiv = "";
      var storedFiles = [];
    
    $(document).ready(function() {
        $("#files").on("change", handleFileSelect);
        
        selDiv = $("#selectedFiles"); 
        $('#myForm').on("submit", handleForm);
        
        $("body").on("click", ".kw-close", removeFile);
    });


        
    function handleFileSelect(e) {
    	$('#load2').css('display','block');
    	setTimeout(function(){
    		$('#load2').css('display','none');
    	}, 1500);
    	
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function(f) {          

            if(!f.type.match("image.*")) {
                return;
            }
            storedFiles.push(f);
            
            var reader = new FileReader();
            reader.onload = function (e) {
            	
              var html = '<div class="kw-uploaded-image"><img data-file="'+f.name+'" class="image-upload" style="height: 200px;" src="'+e.target.result+'" alt=""><button type="button" class="kw-close"><span class="lnr icon-trash2"></span></button></div>';
                //var html = "<div><img src=\"" + e.target.result + "\" data-file='"+f.name+"' class='selFile' title='Click to remove'>" + f.name + "<br clear=\"left\"/></div>";
                selDiv.prepend(html);
               checkUpload();
                
            }
            reader.readAsDataURL(f); 

        });
        //$('#load2').css('display','none');
    }
        
    function handleForm(e) {
        e.preventDefault();
        var data = new FormData();
        
        for(var i=0, len=storedFiles.length; i<len; i++) {
            data.append('files['+i+']', storedFiles[i]);
        }

        
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'submit.php', true);
        
        
        xhr.onload = function(e) {
            if(this.status == 200) {
                console.log(e.currentTarget.responseText);  
                //alert(e.currentTarget.responseText + ' items uploaded.');
                createProposal();
            }
            else
            {
              alert('Error');
            }
        }
        
        xhr.send(data);
    }
        
    function removeFile(e) {
        var file = $(this).parent().find('.image-upload').data("file");
        //alert(file);
        for(var i=0;i<storedFiles.length;i++) {
            if(storedFiles[i].name === file) {
                storedFiles.splice(i,1);
                break;
            }
        }
        $(this).parent().remove();
        console.log(storedFiles);
    }


    //category man for everything 

        var selDiv1 = "";
      var storedFiles1 = [];
    
    $(document).ready(function() {
        $("#files1").on("change", handleFileSelect1);
        
        selDiv1 = $("#selectedFiles1"); 
        $('#myForm1').on("submit", handleForm1);
        
        $("body").on("click", ".kw-close", removeFile1, checkUpload);
    });

    
        
    function handleFileSelect1(e) {
    	$('#load2').css('display','block');
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function(f) {          

          if( f.type.match("image/jpeg") )
          {
            storedFiles1.push(f);
            $('.kw-uploaded-images').append('<img style="height: 100px;width: auto;" src="images/jpg.png" />');
          }

          if( f.type.match("image/png") )
          {
            storedFiles1.push(f);
            $('.kw-uploaded-images').append('<img style="height: 100px;width: auto;" src="images/png.png" />');
          }

          if( f.type.match("zip") )
          {
            storedFiles1.push(f);
            $('.kw-uploaded-images').append('<img style="height: 100px;width: auto;" src="images/zip.png" />');
          }

          if( f.type.match("doc") )
          {
            storedFiles1.push(f);
            $('.kw-uploaded-images').append('<img style="height: 100px;width: auto;" src="images/doc.png" />');
          }

          if( f.type.match("docx") )
          {
            storedFiles1.push(f);
            $('.kw-uploaded-images').append('<img style="height: 100px;width: auto;" src="images/docx.png" />');
          }
          
          if( !f.type.match("zip") && !f.type.match("image/jpeg") && !f.type.match("image/png") && !f.type.match("doc") && !f.type.match("docx") )
          {
            alert('Application accepts only jpeg, png, doc, docx or zip files.');
          }

          
            

          /*
          if(!f.type.match("text.*")) {
            alert('Nije textualni fajl');
          }
          else
          {
            storedFiles1.push(f);
          }
          */
            $('#load2').css('display','none');
            
        });

        console.log(storedFiles1);
        
    }
        
    function handleForm1(e) {
        e.preventDefault();
        var data = new FormData();
        
        for(var i=0, len=storedFiles1.length; i<len; i++) {
            data.append('files['+i+']', storedFiles1[i]);
        }

        
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'submit.php', true);
        
        
        xhr.onload = function(e) {
            if(this.status == 200) {
                console.log(e.currentTarget.responseText);  
                //alert(e.currentTarget.responseText + ' items uploaded.');
                createProposal1();
            }
            else
            {
              alert('Error');
            }
        }
        
        xhr.send(data);
    }
        
    function removeFile1(e) {
        var file = $(this).parent().find('.image-upload').data("file");
        //alert(file);
        for(var i=0;i<storedFiles.length;i++) {
            if(storedFiles[i].name === file) {
                storedFiles.splice(i,1);
                break;
            }
        }
        $(this).parent().remove();
        console.log(storedFiles);
    }

    /*
    var $this = $('.create-proposal-btn');
          $this.button('loading');
            setTimeout(function() {
               $this.button('reset');
           }, 8000);
    */

    </script>

    <script type="text/javascript">
    	$('.create-proposal-btn-pics').click(function(){
    		$('#load1').css('display','block');
    	});
      //$(".create-proposal-btn").button('loading');
      /*
         $(document).on({
             ajaxStart: function() { $('#load1').css('display','block');    },//loading animation
             ajaxStop: function() { $('#load1').css('display','none'); }    
         });
         */
    </script> 

    <script type="text/javascript">
      function checkUpload(){
        //setTimeout(function(){
          if( $('.image-upload')[0] ){
            $('#create-button-div').html('<button type="submit" form="myForm" class="kw-btn-medium kw-blue create-proposal-btn-pics" style="padding: 5px 25px;margin-top: 30px;background-color: #8b91dd;width: auto;" data-loading-text="<i class=\'fa fa-spinner fa-spin \'></i> Uploading..."><img style="height: 8px;" src="images/check.png"> Create</button>');
          
          }
          else
          {
            $('#create-button-div').html('');
        
          }
        //}, 1300);
      }

   

      //$('#files').on('change', function(){
       // checkUpload();
      //});

    </script>

    

   
 
  <script src="js/cors_upload.js">
  </script> 
  <script src="js/upload_video.js">
  </script> 
  <!--<script src="js/angular-file-upload.min.js">
  </script>-->
  
  <script type="text/javascript" src="js/jquery-fileupload.min.js"></script>
  <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCfDGtblcFfIprtSRCNM3vlCgcETkf_PDs&language=en&libraries=places&callback=getLocation">
    </script>-->
</body>
</html>
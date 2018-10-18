<nav id="menu" class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Tasker App</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <?php if( !isset( $_SESSION['userid'] ) ) { ?>

            <li><a style="cursor: pointer;" onclick="callRegister()">Register</a></li>
            <li><a style="cursor: pointer;" onclick="callLogin()">Login</a></li>

        <?php } else { ?>

            <li><a href="tasks.php" class="link">Explore tasks</a></li>
            <li><a style="cursor: pointer;" id="create-task" class="create-task">Create task</a></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="avatar" alt="avatar" src="<?php echo $_SESSION['userpic'] ?>" /> <?php echo $_SESSION['firstname'] ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">Profile</a></li>
                <li role="separator" class="divider"></li>
                <li><a style="cursor: pointer;" onclick="signOut();window.location='logout.php'">Logout</a></li>
            </ul>
            </li>

        <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="login-wrapper">
        <div class="login-div">
          <div class="login-header">

            <h2 class="login-header-title">Log in</h2>

          </div>

          <div class="login-body">

            
              
              <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">User email</label> <input id="email" type="email" name="email" autocomplete="off" required="" placeholder="Enter email"></p>

              <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">Password</label> <input id="password" type="password" name="password" autocomplete="off" required="" placeholder="Enter password"></p>

              <p style="color: red;visibility: hidden;" class="text-center" id="message-login">Email and password are required fields.</p>

              <p class="contain" style="position: relative;margin-left: 118px;"><span class="checkmark"></span> <span style="margin-left: 10px;" class="checkmark-text">Remember me</span> <input class="checkbox" type="checkbox" name="rememberme"> <a href="#"><span style="float: right;margin-right: 25px;position: relative;top: 2px;">Forgot password?</span></a></p>

              <button style="cursor: pointer;" id="login" class="login-btn logmein">Login</button>

              <button class="button connect"><img style="height: 18px;" src="images/google_icon.png" /></button>
					    <?php if( !isset( $_SESSION['userid'] ) ) { ?>
                <a class="g-signin2" data-onsuccess="onSignUp" data-theme="dark">Connect with Google</a>
              <?php } else { ?>
                <a class="g-signin2" data-theme="dark">Connect with Google</a>
              <?php } ?>

              <a style="position: relative;margin-left: 60px;cursor: pointer;"><img style="height: 50px;width: 50px;" src="images/fb.png" /></a>
            

          </div>

        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="login-wrapper">
      <div class="login-div">
      <div class="login-header">
        
      <h2 class="login-header-title">Register</h2>
        
      </div>
      <div class="login-body clearfix">
          
        <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">Firstname</label><input id="registerFirstname" type="text" placeholder="Firstname" name="registerFirstname" /></p>
        <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">Lastname</label><input id="registerLastname" type="text" placeholder="Lastname" name="registerLastname" /></p>
        <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">Email</label><input id="registerEmail" type="email" placeholder="Email" name="registerEmail" /></p>
        <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">Password</label><input id="registerPassword" type="password" placeholder="Password" name="registerPassword" /></p>
        <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">City</label><input id="registerCity" type="text" placeholder="City" name="registerCity" /></p>
        <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">Country</label><input id="registerCountry" type="text" placeholder="Country" name="registerCountry" /></p>
        <button type="button" id="register" class="login-btn">Register</button>
      </div>
      </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--
<div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="login-wrapper">
      <div class="login-div">
      <div class="login-header">
        
      <h2 class="login-header-title">Create new Task</h2>
        
      </div>
      <div class="login-body clearfix">
          
        <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">Firstname</label><input id="registerFirstname" type="text" placeholder="Firstname" name="registerFirstname" /></p>
        <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">Lastname</label><input id="registerLastname" type="text" placeholder="Lastname" name="registerLastname" /></p>
        <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">Email</label><input id="registerEmail" type="email" placeholder="Email" name="registerEmail" /></p>
        <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">Password</label><input id="registerPassword" type="password" placeholder="Password" name="registerPassword" /></p>
        <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">City</label><input id="registerCity" type="text" placeholder="City" name="registerCity" /></p>
        <p><label style="width: 100px;display: inline-block;text-align: right;margin-right: 15px;">Country</label><input id="registerCountry" type="text" placeholder="Country" name="registerCountry" /></p>
        <button type="button" id="register" class="login-btn">Register</button>
      </div>
      </div>
    </div>
    </div>
  </div>
</div>
              -->

<!-- sidebar -->

<div class="col-lg-12" id="sidebar-container">
  <div class="sidebar-left" style="">
    <div style="width: 100%;height: auto;background-color: #57ba46;padding: 15px;max-height: 50px;">
      <p style="color: white;font-weight: bold;text-transform: uppercase;">Search filter</p>      
    </div>
    <p style="padding: 15px;">
      <label>Search</label><input placeholder="Search by keyword..." style="width: 100%;" type="text" />
    </p>
    <div style="width: 250px;overflow: hidden;">
      <select style="background-color: white;border: none;border-bottom: 1px solid #b2b2b2;margin-bottom: 15px;width: 270px;height: 40px;margin-left: 15px;" id="category">
          <option value="all">All</option>
          <option value="pics">Pictures</option>
          <option value="videos">Videos</option>
      </select>
    </div>
    <button id="sidebar-btn" style="" class="sidebar-btn">
        <i class="fa fa-search"></i>
    </button>
  </div>
</div>

<!--<div class="kw-current-location" style="position: absolute;top: 70px;right: 0px;backgorund-color: white;">
  <b>Location</b>
</div>-->


<!-- end of sidebar -->

<script type="text/javascript">
/*  $('#pictures-checkbox').change(function(){
    if( $('#pictures-checkbox').prop("checked") == true )
    {
      alert("CHECKED");
    }
  });*/

  $('#category').change(function(){
   $('#result').empty();
    //alert($('#category option:selected').val());
    loadMore($('#category option:selected').val(), 0);
    $('#loadMore').css('display', 'inline');
  });
  

  $('.sidebar-btn').click(() => {
    $('.sidebar-left').toggleClass('open');
  });

  function onSignUp(googleUser) {
	       var profile = googleUser.getBasicProfile();
	       var fullname = profile.getName();
	       var firstname = profile.getGivenName();
	       var lastname = profile.getFamilyName();
	       var googleID = profile.getId();
	       var email = profile.getEmail();
	       var imageURL = profile.getImageUrl();
	       //var userid = getRandom(9);

         $.ajax({
           url: "fetch-google.php",
           type: "POST",
           data: 
            { 
              firstname : firstname, 
              lastname : lastname, 
              email : email, 
              //userid : userid, 
              google_id : googleID 
            }, 
           success: function(data){

	           var rez = $.trim(data);

	           if( rez == 'registered' )
	               {
	                   window.location = "finish_profile.php";
	               }
	           if( rez == 'exist' )
	               {

                  location.reload();
                  
	               }
	            if( rez == 'Fail' )
	            {
	            	alert('Fail');
	            }

	         }});
  }

  

 
</script>



<script type="text/javascript">

    let loginUser = () => {
      document.getElementById('overlay1').style.display = "block";
      //document.getElementById('loginModal').style.webkitFilter = "blur(8px)";
      //document.getElementById('main-container').style.webkitFilter = "blur(8px)";
      //document.getElementById('menu').style.webkitFilter = "blur(8px)";
      document.getElementById('loginModal').style.display = "none";
      document.getElementById('root').style.webkitFilter = "blur(8px)";
      //$('.overlay1').css('display', 'block');
			//$('.modal').css('filter', 'blur(8px)');

      setTimeout(()=>{
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        let params = 'email='+email+'&password='+password;

        let xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "fetch.php",true);

        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
            if (xmlhttp.status == 200) {
                console.log(xmlhttp.responseText);
                location.reload();
            }
            else if (xmlhttp.status == 400) {
                alert('There was an error 400');
            }
            else {
                alert('something else other than 200 was returned');
            }
          }
        };

        xmlhttp.send(params);
      }, 2300);

      
    }
    $('#login').click(function(){ 
      let email = $('#email').val();
      let pass = $('#password').val();
      if( email != null && email.length > 0 && pass != null && pass.length > 0 )
      {
        loginUser();
      }
      else
      {
        $('#message-login').css('visibility', 'visible');
      }
    });

    /*

    let registerUser = () => {
      let firstname = document.getElementById('registerFirstname').value;
      let lastname = document.getElementById('registerLastname').value;
      let email = document.getElementById('registerEmail').value;
      let password = document.getElementById('registerPassword').value;
      let city = document.getElementById('registerCity').value;
      let country = document.getElementById('registerCountry').value;

      let params = 'email='+email+'&password='+password+'&firstname='+firstname+'&lastname='+lastname+'&city='+city+'&country='+country;

      let xmlhttp = new XMLHttpRequest();
      xmlhttp.open("POST", "register.php",true);

      xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
           if (xmlhttp.status == 200) {
              //console.log(xmlhttp.responseText);
              window.location = "congratulations.php";
           }
           else if (xmlhttp.status == 400) {
              alert('There was an error 400');
           }
           else {
               alert('something else other than 200 was returned');
           }
        }
    };

    
    xmlhttp.send(params);
    }
    document.getElementById('register').addEventListener('click', registerUser);
    */
    /*
    $('#login').click(()=>{
      let email = $('#email').val();
      let password = $('#password').val();

      $.ajax({
        url: "fetch.php",
        type: "POST",
        data: {
          email: email,
          password: password
        },
        success: function(data){
          if( data == "true" )
          {}
        }
      });
    });
    */

    let callCreateTaskPage = () => {
      window.location = 'create-task.php'
    };


    $('#create-task').click(function(){
      callCreateTaskPage();
    });
    //document.getElementById('create-task').addEventListener('click', callCreateTaskPage);
</script>

<script type="text/javascript">
  /*
		$('.checkmark, .checkmark-text').click(function(){
			$('.checkmark').toggleClass('filled');
			if( $('.checkmark').hasClass('filled') )
			{
				$('.checkbox').prop('checked', true);
			}
			else
			{
				$('.checkbox').prop('checked', false);
			}
    });
    
    $('.checkmark1, .checkmark-text1').click(function(){
			$('.checkmark1').toggleClass('filled');
			if( $('.checkmark1').hasClass('filled') )
			{
        loadMore('pics');
				//$('#pictures-checkbox').prop('checked', true);
			}
			else
			{
        loadMore();
				//$('#pictures-checkbox').prop('checked', false);
			}
    });
    
    $('.checkmark2, .checkmark-text2').click(function(){
			$('.checkmark2').toggleClass('filled');
			if( $('.checkmark2').hasClass('filled') )
			{
				$('#videos-checkbox').prop('checked', true);
			}
			else
			{
				$('#videos-checkbox').prop('checked', false);
			}
		});
    */

    let handlerIn = () => {
      $('.connect').addClass('box-shadow');
    };

    let handlerOut = () => {
      $('.connect').removeClass('box-shadow');
    };

    $('.g-signin2').mouseenter( handlerIn ).mouseleave( handlerOut );
</script>

<script src="loginGoogle.js"></script>


<?php require 'header.php'; ?>
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  		<script>tinymce.init({ selector:'textarea#job-text' });</script>
<div class="container-fluid" style="position: relative;top: 70px;margin-bottom: 80px;">
		<div class="container" style="background-color: white;border-radius: 6px;margin-top: 15px;margin-bottom: 15px;padding: 40px 25px;">
			<div class="col-lg-12" style="padding: 15px;">
				<h4 style="color: #484848;font-weight: bold">Task creation wizard</h4>
				<p style="margin-bottom: 0px;">You are currently signed in as <strong><?php echo $_SESSION['email']; ?></strong></p>
				<p style="margin-bottom: 0px;">On this page you can add a new task. <span class="required-fields">Required fields are marked *</span></p>

				<div class="progress" style="margin: 15px 0px;">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;background-color: #2aa1c0 !important;">

					</div>
				</div>
			</div>

			<div class="col-lg-12">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" style="visibility: hidden;" id="myTab" role="tablist">
				  <li class="nav-item active">
				    <a class="nav-link active" id="step-one-tab" data-toggle="tab" href="#step-one" role="tab" aria-controls="home" aria-selected="true">Step 1</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="step-two-tab" data-toggle="tab" href="#step-two" role="tab" aria-controls="profile" aria-selected="false">Step 2</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="step-three-tab" data-toggle="tab" href="#step-three" role="tab" aria-controls="messages" aria-selected="false">Step 3</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="step-four-tab" data-toggle="tab" href="#step-four" role="tab" aria-controls="settings" aria-selected="false">Step 4</a>
				  </li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active" id="step-one" role="tabpanel" aria-labelledby="home-tab">
                    <div class="col-lg-5" style="width: 250px;overflow: hidden;">
                        <div class="row">
                           
                            <select class="" style="background-color: white;border: none;border-bottom: 1px solid #b2b2b2;margin-bottom: 15px;width: 270px;height: 40px;font-size: 14px;" id="category1">
                                <option value="0">Please select category</option>
                                <option value="pics">Pictures</option>
                                <option value="videos">Videos</option>
                            </select>
                  
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5" style="width: 250px;overflow: hidden;">
                        <div class="row">
                            <select class="" style="background-color: white;border: none;border-bottom: 1px solid #b2b2b2;margin-bottom: 15px;width: 270px;height: 40px;font-size: 14px;" id="subcategory">
                                <option value="0">Please select subcategory</option>
                                <option value="cities">Cities</option>
                                <option value="beaches">Beaches</option>
                                <option value="accommodation">Accommodation</option>
                                <option value="hotels">Hotels</option>
                                <option value="sport">Sport</option>
                                <option value="music">Music</option>
                                <option value="museums">Museums</option>
                                <option value="sights">Sights</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6" style="width: 100%;overflow: hidden;display: block;float: none;">
                        <div class="row">
                            <label>Task title *</label>
                            <input style="background-color: white;border: none;border-bottom: 1px solid #b2b2b2;margin-bottom: 15px;width: calc(100% + 40px);font-size: 14px;" type="text" name="" id="task-title" placeholder="Your task title" />
                            
                            <button id="go-to-step-2" style="margin-left: 0px;" disabled="" class="button grey btnNext disabled">Next</button>
                        </div>
                    </div>
				  	
				  </div>
				  <div class="tab-pane" id="step-two" role="tabpanel" aria-labelledby="profile-tab">

				  	<textarea id="job-text" rows="7" required></textarea>
						<label for="text-input-4" style="margin-top: 15px;">Listing Price ($)</label>

						<input type="text" style="display: block;margin-bottom: 15px;background-color: white;width: 160px;font-size: 14px;border: none;border-bottom: 1px solid #b2b2b2;" id="job-budget" class="custom-input">

       	 		<button id="back-to-step-2" class="button green btnPrevious">Previous</button>
       	 		<button id="go-to-step-3" disabled="" class="button grey btnNext disabled">Next</button>
				  </div>
				  <div class="tab-pane" id="step-three" role="tabpanel" aria-labelledby="messages-tab">
				  	<div class="col-xs-12">
						<h3>Please define task location.</h3>
						<input type="text" id="address" class="controls" placeholder="Type city name" />

						<div id="map_canvas" style="height: 400px;width: 500px;"></div>
						<input id="lat" type="hidden" name="lat" val="" />
				    	<input id="long" type="hidden" name="long" val="" />
					</div>
					<div class="col-xs-12">
						<div id="message" style="visibility: hidden;color: red;font-family: 'Open Sans';margin: 10px 0px;">You must create marker at location of your task.</div>
						<button id="back-to-step-3" class="button green btnPrevious">Previous</button>
						<button type="submit" id="saveandcreate" onclick="saveJob()" class="button btnNext green" style="width: auto !important;margin: 20px 0px;"><i class="fa fa-check" aria-hidden="true"></i> Save & Create Task</button>
					</div>

				  </div>
				  <div class="tab-pane" id="step-four" role="tabpanel" aria-labelledby="settings-tab">
        			<button class="button green btnPrevious">Previous</button>
				  </div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	document.querySelector("#job-budget").addEventListener("keypress", function (evt) {
    if (evt.which < 48 || evt.which > 57)
    {
        evt.preventDefault();
				alert('Must be a number');
    }
});


	$('#go-to-step-2').click(function(){
		progressIncreaseMore();

		if( $('#category1 option:selected').val() == '' || $('#subcategory option:selected').val() == '' || $.trim($('#task-title').val()) == ''  )
		{
			$('.required-fields').css('color','red');
			checkFieldsStep1();
		}
		else
		{
			checkFieldsStep1();
			$('.nav-tabs > .active').next('li').find('a').trigger('click');

		}
																		
	});

	$('#go-to-step-3').click(function(){ 

		progressIncreaseMore();

		if( tinyMCE.get('job-text').getContent() == '' || $('#job-budget').val() == '' )
		{
			checkFieldsStep2();
		}
		else
		{
			checkFieldsStep2();
			$('.nav-tabs > .active').next('li').find('a').trigger('click');
		}

	});

	function checkFieldsStep1() {

		if( $('#category1 option:selected').val() == '0' || $('#subcategory option:selected').val() == '0' || $.trim($('#task-title').val()) == ''  )
		{
			$('#go-to-step-2').attr('disabled', true);
			$('#go-to-step-2').addClass('disabled');
			$('#go-to-step-2').addClass('grey');
			$('#go-to-step-2').removeClass('green');
		}
		else
		{
			$('#go-to-step-2').removeClass('grey');
			$('#go-to-step-2').attr('disabled', false);
			$('#go-to-step-2').removeClass('disabled');
			$('#go-to-step-2').addClass('green');
		}

	}

	function checkFieldsStep2() {
		if( tinyMCE.get('job-text').getContent() == '' || $('#job-budget').val() == '' )
		{
			$('#go-to-step-3').attr('disabled', true);
			$('#go-to-step-3').addClass('disabled');
			$('#go-to-step-3').addClass('grey');
			$('#go-to-step-3').removeClass('green');
		}
		else
		{
			$('#go-to-step-3').removeClass('grey');
			$('#go-to-step-3').attr('disabled', false);
			$('#go-to-step-3').removeClass('disabled');
			$('#go-to-step-3').addClass('green');
		}
	}

	function progressIncrease() {
		let progress = $('.progress-bar').css('width');
		let progressStriped = parseInt(progress.substring(0, progress.length-2));
		let progressIncrease = progressStriped+40;

		$('.progress-bar').css('width', progressIncrease + 'px');
	};

	function progressIncreaseMore() {
		let progress = $('.progress-bar').css('width');
		let progressStriped = parseInt(progress.substring(0, progress.length-2));
		let progressIncrease = 2 * progressStriped+40;

		$('.progress-bar').css('width', progressIncrease + 'px');
	};

	$('#back-to-step-2').click(function(){
		$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});

	$('#category1').on('change', checkFieldsStep1, progressIncrease);
	$('#subcategory').on('change', checkFieldsStep1, progressIncrease);
	$('#task-title').on('paste input keyup', checkFieldsStep1);

	$('.mce-content-body p').on('change', checkFieldsStep2);
	$('#job-budget').on('paste input keyup', checkFieldsStep2);
	</script>

	<script type="text/javascript">
		 /*$('.btnNext').click(function(){
		  $('.nav-tabs > .active').next('li').find('a').trigger('click');
		});

		  $('.btnPrevious').click(function(){
		  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
		});*/
	</script>

		<script type="text/javascript">
				var message;
			
			function saveJob(){

				
				var taskid = Math.floor(Math.pow(10, 9-1) + Math.random() * 9 * Math.pow(10, 9-1));
				var tasktitle = $('#task-title').val();
				
				var tasktextFormated = tinyMCE.get('job-text').getContent();
				var tasktextUnformated = tinyMCE.get('job-text').getContent({ format: 'text' });
				var taskbudget = $('#job-budget').val().replace(/\./g, '');
				var userId = '<?php echo $_SESSION["userid"] ?>';
				var userName = '<?php echo $_SESSION["firstname"]." ".$_SESSION["lastname"] ?>';
				var kind = $('#category1 option:selected').val();
				var subkind = $('#subcategory option:selected').val();
				var lat = $('#lat').val();
				var long = $('#long').val();
				

				if( tinyMCE.get('job-text').getContent() != '' && tasktitle != '' )
				{
					if( taskbudget != '' && taskbudget > 1 )
					{
						if( kind == '' || subkind == '' )
						{
							alert('Please select one of the options from the top.');
						}
						else
						{
							if( $('#lat').val() == '' || $('#long').val() == '' )
							{
								message = 'You must create marker at location of your task.';
								$('#message').html(message);
								$('#message').css('visibility', 'visible');
							}
							else
							{
								
								$.post('saveJob.php', { task_id : taskid, user_id : userId, user_name : userName, task_title : tasktitle, task_text : tasktextFormated, task_text1 : tasktextUnformated, task_budget : taskbudget, kind : kind, subkind : subkind, lat: lat, long: long, city: grad, country: zemlja }, function(data){
								
									alert(data);
									//$("body").addClass("loading");
									
									//window.location = 'thanks.php';
								});
							}
						}
					}
					else
					{
						message = "Job budget can\'t be less then 1$ or empty.";
						$('#message').html(message);
						$('#message').css('visibility', 'visible');
					}
				}
				else
				{
					
						alert('You have to type in task title and task description.');
					
					
				}

				
			}
		</script>

		<script type="text/javascript">
			function initAutocomplete() {
		        var map = new google.maps.Map(document.getElementById('map_canvas'), {
		          center: {lat: -33.8688, lng: 151.2195},
		          zoom: 13,
		          mapTypeId: 'roadmap'
		        });

		        // Create the search box and link it to the UI element.
		        var input = document.getElementById('address');
		        var searchBox = new google.maps.places.SearchBox(input);
		        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

		        // Bias the SearchBox results towards current map's viewport.
		        map.addListener('bounds_changed', function() {
		          searchBox.setBounds(map.getBounds());
		        });

		        var markers = [];
		        // Listen for the event fired when the user selects a prediction and retrieve
		        // more details for that place.
		        searchBox.addListener('places_changed', function() {
		          var places = searchBox.getPlaces();

		          if (places.length == 0) {
		            return;
		          }

		          // Clear out the old markers.
		          markers.forEach(function(marker) {
		            marker.setMap(null);
		          });
		          markers = [];

		          // For each place, get the icon, name and location.
		          var bounds = new google.maps.LatLngBounds();
		          places.forEach(function(place) {
		            if (!place.geometry) {
		              console.log("Returned place contains no geometry");
		              return;
		            }
		            var icon = {
		              url: place.icon,
		              size: new google.maps.Size(71, 71),
		              origin: new google.maps.Point(0, 0),
		              anchor: new google.maps.Point(17, 34),
		              scaledSize: new google.maps.Size(25, 25)
		            };

		            // Create a marker for each place.
		            markers.push(new google.maps.Marker({
		              map: map,
		              icon: icon,
		              title: place.name,
		              position: place.geometry.location
		            }));

		           
		            //get city and country from marker position

				            var latlng;


					       latlng = new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng()); 

					       $('#lat').val(place.geometry.location.lat());
					       $('#long').val(place.geometry.location.lng());

					       new google.maps.Geocoder().geocode({'latLng' : latlng}, function(results, status) {
					           if (status == google.maps.GeocoderStatus.OK) {
					               if (results[1]) {
					                   var country = null, countryCode = null, city = null, cityAlt = null;
					                   var c, lc, component;
					                   for (var r = 0, rl = results.length; r < rl; r += 1) {
					                       var result = results[r];

					                       if (!city && result.types[0] === 'locality') {
					                           for (c = 0, lc = result.address_components.length; c < lc; c += 1) {
					                               component = result.address_components[c];

					                               if (component.types[0] === 'locality') {
					                                   city = component.long_name;
					                                   break;
					                               }
					                           }
					                       }
					                       else if (!city && !cityAlt && result.types[0] === 'administrative_area_level_1') {
					                           for (c = 0, lc = result.address_components.length; c < lc; c += 1) {
					                               component = result.address_components[c];

					                               if (component.types[0] === 'administrative_area_level_1') {
					                                   cityAlt = component.long_name;
					                                   break;
					                               }
					                           }
					                       } else if (!country && result.types[0] === 'country') {
					                           country = result.address_components[0].long_name;
					                           countryCode = result.address_components[0].short_name;
					                       }

					                       if (city && country) {
					                           break;
					                       }
					                   }

					                   $('#saveandcreate').addClass('border-button border-button-animate');
														 $('.progress-bar').css('width', '97%');
					                  
					                   grad = city;
					                   zemlja = result.address_components[0].long_name;
					               }
					           }});

				            // end of geting city and country from marker

		            if (place.geometry.viewport) {
		              // Only geocodes have viewport.
		              bounds.union(place.geometry.viewport);
		            } else {
		              bounds.extend(place.geometry.location);
		            }
		          });
		          map.fitBounds(bounds);
		        });
		      }


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDg-L2qUd-BL2E16N31kzyUZccvnxPvZIA&libraries=places&types=(regions)&language=en&callback=initAutocomplete" async defer></script>

<?php require 'footer.php'; ?>
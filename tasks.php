<?php require "header.php"; ?>

    <style>
    @media screen and (max-width: 729px)
    {
        #result {
            padding: 0px;
        }
        .container-wrapper {
            padding: 0px !important;
        }
        a {
            text-decoration: none !important;
        }
    }
    </style>

    <div class="container">
					<div class="col-lg-12 container-wrapper"  style="padding-right: 15px;padding-top: 120px;">
						<div class="col-lg-12">
							<h1 class="text-center" style="color: #484848;font-weight: bolder;">Explore tasks</h1>
							<h4 style="font-weight: bold;color: #484848;margin-left: 15px;margin-top: 100px;margin-bottom: 30px;">
								Displaying <span class="displaying"></span> of <span class="total"></span> results
							</h4>
						</div>

						<div class="col-lg-12" id="result">
                            <!-- loading  -->
                            <div id="loading">
                            <div class="col-lg-4 task">
                                <div class="col-lg-12 card" style="background-color: white;border-radius: 6px;padding: 15px;padding-top: 0;">
                                    <div class="row">
                                        <div class="card__image" style="animation-play-state: paused;"><img class="js-image" alt="" src=""></div>
                                    </div>
                                    <div class="card__content" style="padding: 20px 0px;">
                                        <h1 class="card__heading js-heading"></h1>
                                        <p style="margin-bottom: 5px;" class="card__paragraph js-paragraph"></p>
                                        <p class="card__paragraph js-paragraph" style="width: 75%;"></p>
                                        <div class="col-lg-12">
                                            <hr style="width: 80%;">
                                        </div>
                                        <div class="col-lg-12" style="padding: 0;">
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <p class="card__paragraph js-paragraph" style="width: 60%;background: #484848;margin: 0;"></p>
                                                </div>
                                                <div class="col-xs-4">
                                                    <p class="card__paragraph js-paragraph" style="width: 40%;background: #d8d8d8;margin: 0;float: right;"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 task">
                                <div class="col-lg-12 card" style="background-color: white;border-radius: 6px;padding: 15px;padding-top: 0;">
                                    <div class="row">
                                        <div class="card__image" style="animation-play-state: paused;"><img class="js-image" alt="" src=""></div>
                                    </div>
                                    <div class="card__content" style="padding: 20px 0px;">
                                        <h1 class="card__heading js-heading"></h1>
                                        <p style="margin-bottom: 5px;" class="card__paragraph js-paragraph"></p>
                                        <p class="card__paragraph js-paragraph" style="width: 75%;"></p>
                                        <div class="col-lg-12">
                                            <hr style="width: 80%;">
                                        </div>
                                        <div class="col-lg-12" style="padding: 0;">
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <p class="card__paragraph js-paragraph" style="width: 60%;background: #484848;margin: 0;"></p>
                                                </div>
                                                <div class="col-xs-4">
                                                    <p class="card__paragraph js-paragraph" style="width: 40%;background: #d8d8d8;margin: 0;float: right;"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 task">
                                <div class="col-lg-12 card" style="background-color: white;border-radius: 6px;padding: 15px;padding-top: 0;">
                                    <div class="row">
                                        <div class="card__image" style="animation-play-state: paused;"><img class="js-image" alt="" src=""></div>
                                    </div>
                                    <div class="card__content" style="padding: 20px 0px;">
                                        <h1 class="card__heading js-heading"></h1>
                                        <p style="margin-bottom: 5px;" class="card__paragraph js-paragraph"></p>
                                        <p class="card__paragraph js-paragraph" style="width: 75%;"></p>
                                        <div class="col-lg-12">
                                            <hr style="width: 80%;">
                                        </div>
                                        <div class="col-lg-12" style="padding: 0;">
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <p class="card__paragraph js-paragraph" style="width: 60%;background: #484848;margin: 0;"></p>
                                                </div>
                                                <div class="col-xs-4">
                                                    <p class="card__paragraph js-paragraph" style="width: 40%;background: #d8d8d8;margin: 0;float: right;"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 task">
                                <div class="col-lg-12 card" style="background-color: white;border-radius: 6px;padding: 15px;padding-top: 0;">
                                    <div class="row">
                                        <div class="card__image" style="animation-play-state: paused;"><img class="js-image" alt="" src=""></div>
                                    </div>
                                    <div class="card__content" style="padding: 20px 0px;">
                                        <h1 class="card__heading js-heading"></h1>
                                        <p style="margin-bottom: 5px;" class="card__paragraph js-paragraph"></p>
                                        <p class="card__paragraph js-paragraph" style="width: 75%;"></p>
                                        <div class="col-lg-12">
                                            <hr style="width: 80%;">
                                        </div>
                                        <div class="col-lg-12" style="padding: 0;">
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <p class="card__paragraph js-paragraph" style="width: 60%;background: #484848;margin: 0;"></p>
                                                </div>
                                                <div class="col-xs-4">
                                                    <p class="card__paragraph js-paragraph" style="width: 40%;background: #d8d8d8;margin: 0;float: right;"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 task">
                                <div class="col-lg-12 card" style="background-color: white;border-radius: 6px;padding: 15px;padding-top: 0;">
                                    <div class="row">
                                        <div class="card__image" style="animation-play-state: paused;"><img class="js-image" alt="" src=""></div>
                                    </div>
                                    <div class="card__content" style="padding: 20px 0px;">
                                        <h1 class="card__heading js-heading"></h1>
                                        <p style="margin-bottom: 5px;" class="card__paragraph js-paragraph"></p>
                                        <p class="card__paragraph js-paragraph" style="width: 75%;"></p>
                                        <div class="col-lg-12">
                                            <hr style="width: 80%;">
                                        </div>
                                        <div class="col-lg-12" style="padding: 0;">
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <p class="card__paragraph js-paragraph" style="width: 60%;background: #484848;margin: 0;"></p>
                                                </div>
                                                <div class="col-xs-4">
                                                    <p class="card__paragraph js-paragraph" style="width: 40%;background: #d8d8d8;margin: 0;float: right;"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 task">
                                <div class="col-lg-12 card" style="background-color: white;border-radius: 6px;padding: 15px;padding-top: 0;">
                                    <div class="row">
                                        <div class="card__image" style="animation-play-state: paused;"><img class="js-image" alt="" src=""></div>
                                    </div>
                                    <div class="card__content" style="padding: 20px 0px;">
                                        <h1 class="card__heading js-heading"></h1>
                                        <p style="margin-bottom: 5px;" class="card__paragraph js-paragraph"></p>
                                        <p class="card__paragraph js-paragraph" style="width: 75%;"></p>
                                        <div class="col-lg-12">
                                            <hr style="width: 80%;">
                                        </div>
                                        <div class="col-lg-12" style="padding: 0;">
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <p class="card__paragraph js-paragraph" style="width: 60%;background: #484848;margin: 0;"></p>
                                                </div>
                                                <div class="col-xs-4">
                                                    <p class="card__paragraph js-paragraph" style="width: 40%;background: #d8d8d8;margin: 0;float: right;"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- end of loading -->
                        </div>

						<div class="col-lg-12 text-center">
							<svg class="spinner loading" height="65px" style="display: block;margin: 0 auto;margin-top: 20px;" viewbox="0 0 66 66" width="65px" xmlns="http://www.w3.org/2000/svg"><circle class="path" cx="33" cy="33" fill="none" r="30" stroke-linecap="round" stroke-width="6"></circle></svg> 
						</div>
				
						<div class="col-lg-12 text-right">
							<div class="container-fluid loadMoreContainer">
								<button id="loadMore" class="button green loadmore login-btn">LOAD MORE</button>
							</div>
						</div>

					</div>
    </div>

    <!-- Task details modal -->

      <div style="padding-top: 40px;" class="modal bs-example-modal-md animated bounceIn" id="taskDetailsModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-close" data-dismiss="modal" style="background-color: #6dbd3f;height: 40px;width: 40px;border-radius: 50%;position: absolute;right: -20px;top: -20px;cursor: pointer;z-index: 10;display: table;text-align: center;">
              <i style="display: table-cell;vertical-align: middle;color: white;font-size: 22px;" class="fa fa-close"></i>
            </div>
            <div>
              <div style="background-color: white;border-radius: 50%;height: 110px;width: 110px;position: absolute;margin-top: -55px;left: 50%;margin-left: -55px;z-index: 100;">
                <img id="task-userpic" src="images/ajax_loader2.gif" style="position: relative;top: 5px;left: 5px;width: 100px;height: 100px;border-radius: 50%;" />
                <!--<p id="task-username" class="text-center" style="font-size: 12px;"></p>-->
              </div>
          </div>
          <div class="text-left" style="padding: 5px;">
            <div class="kw-gmap" data-gmap-type="AppleMaps-esque" id="gmap-1" style="position: relative; overflow: hidden;"></div>
            <div id="task-status" style="position: absolute;right: 15px;top: 15px;"></div>
            <h3 id="task-title" class="text-left" style="font-weight: bolder;margin-top: 20px;padding-left: 15px;"></h3>
            <h4 id="task-budget" class="text-left" style="font-weight: bolder;margin-top: 20px;padding-left: 15px;"></h4>
            <div class="kw-stats" style="margin-left: 15px;">

                            <div class="kw-stats-inner">

                              <dl class="kw-stats-item">

                                <dt class="kw-caption">Price:</dt>
                                <dd class="kw-value"><span class="price-task"></span> $</dd>

                              </dl><!--/ .kw-stats-item -->

                              <dl class="kw-stats-item">

                                <dt class="kw-caption">Tasker fee:</dt>
                                <dd class="kw-value">5%</dd>

                              </dl><!--/ .kw-stats-item -->

                              <dl class="kw-stats-item">

                                <dt class="kw-caption">Paypal fee</dt>
                                <dd class="kw-value"><a href="http://www.paypal.com" style="color: white;">check</a></dd>

                              </dl><!--/ .kw-stats-item -->

                            </div><!--/ .kw-stats-inner -->

            </div>

            <div class="alert alert-danger" style="width: 400px;margin-left: 15px;margin-top: 15px;;font-size: 12px;">
              Note: You will earn difference between overall price and fee's.
            </div>

            <div id="task-location" style="margin-top: 15px;padding-left: 15px;">
            	No task location
            </div>
            <p id="task-text" class="text-left" style="margin-top: 15px;padding-left: 15px;">Here goes task data.</p>
            <div class="list-of-proposals">
              
            </div>
            <!--<button class="modal-button" style="font-family: 'Quicksand';font-weight: bold;margin: 0 auto;text-transform: uppercase;background-color: #6DBD3F;color: white;width: 100%;height: 50px;border-radius: 3px;border: none;text-align: center;">Proceed to Paypal</button>-->
          </div>
          </div>
        </div>
      </div>

      <!-- End of Task details modal -->
    
    <script type="text/javascript">
        var flag = 0;
        function loadMore(category, flag)
        {
            //$('#result').empty();
            $('.spinner').css('display', 'block');
            $.ajax({
                type: "POST",
                url: "get-tasks.php",
                data: {
                    offset: flag,
                    limit: 12,
                    cat: category
                },
                success: function(data){
                    let tasks = JSON.parse(data);
                    console.log(tasks);
                    //$('#result').empty();
                    if( tasks != null )
                    {
                        if( tasks.length > 0 )
                        {
                            for( i=0; i<tasks.length; i++ )
                            {

                                let task = $('<div class="col-lg-4 task task-new"><a style="cursor: pointer;" onclick="openModal('+ tasks[i]['TASK_ID'] +')"><div class="col-lg-12 box" style="background-color: white;border-radius: 6px;padding: 15px;margin-bottom: 30px;padding-top: 0;"><div class="row"><div class="col-lg-12 text-center" style="border-top-right-radius: 5px;border-top-left-radius: 5px;padding: 0;display: table;height: 180px;width: 100%;position: relative;-webkit-transition: all .2s linear;-o-transition: all .2s linear;transition: all .2s linear;"><div style="display: table-cell;vertical-align: middle;background-color: '+ tasks[i]['TASK_CATEGORY_COLOR'] +';border-top-left-radius: 6px;border-top-right-radius: 6px;"><img alt="user_avatar" style="width: 120px;height: 120px;border-radius: 50%;margin-top: 20px;" src="'+ tasks[i]['TASK_CATEGORY_IMAGE'] +'" /><p style="color: white;font-weight: bolder;font-size: 12px;text-transform: uppercase;margin-top: 5px;">'+ tasks[i]['TASK_SUBCATEGORY'] +'</p></div></div><div class="col-lg-12"><p class="text-left" style="color: #484848;font-weight: bold;margin-top: 14px;">'+ tasks[i]['TASK_TITLE'] +'</p><p class="text-left" style="margin: 0;font-size: 12px;color: #b7b7b7;font-weight: normal;text-transform: uppercase;">AT <strong>'+ tasks[i]['TASK_CITY'] +'</strong>, ' + tasks[i]['TASK_COUNTRY'] +'</span></p></div></div><div class="row"><div class="col-lg-12" style=""><p class="text-left" style="color: #b7b7b7;font-size: 12px;margin-bottom: 0px;text-transform: uppercase;font-weight: normal;"><i class="fa fa-clock-o"></i> POSTED '+ tasks[i]['TASK_TIME_POSTED'] +'</p></div><div class="col-lg-12"><hr style="width: 80%;"></div><div class="col-lg-8"><p style="color: #484848;font-size: 12px;margin-bottom: 0;text-transform: uppercase;font-weight: bold;">PRICE $'+ tasks[i]['TASK_BUDGET'] +' - 2 responses</p></div><div class="col-lg-4 text-right"><a onclick="details()" style="cursor: pointer;color: #b7b7b7;font-size: 12px;font-weight: bold;text-decoration: none;">READ MORE</a></div></div></div></a></div>');

                                $('#result').append(task);
                            }
                            $('.spinner').css('display', 'none');
                            flag = parseInt(flag) + 12;
                            $('#loadMore').attr('flag', flag);
                            /*$('.displaying').html(flag);
                            let total = $('.task').length;
                                $('.total').html(total);*/

                            /*
                            if( data.length > 0 )
                            {
                                
                                $('#result').append(data);
                                //$('.task-new').animate({opacity: "1"}, 1000);
                                flag+=12;
                                $('.spinner').css('display', 'none');
                                $('.displaying').html(flag);
                                let total = $('.task').length;
                                $('.total').html(total);
                            }
                            else
                            {
                                let total = $('.task').length;
                                $('.total').html(total);
                                $('.spinner').css('display', 'none');
                                $('#loadMore').css('display', 'none');
                            }
                            */
                        }
                    }
                    else
                    {
                        /*
                        let total = $('.task').length;
                        $('.total').html(total);*/
                        $('.spinner').css('display', 'none');
                        $('#loadMore').css('display', 'none');
                    }
                    
                }
            });
            setTimeout(function(){
                $('#loading').hide();
            }, 1300);
        };

        $('#loadMore').click(function(){
            loadMore( $('#category option:selected').val(), $(this).attr('flag') );
        });

        loadMore('all', 0);
        
        $('#root').click(() => {
            $('.sidebar-left').removeClass('open');
        });


        function openModal(id){
        $('#gmap-1').empty();
        $.post('loadTaskDetails.php', { taskid : id, currentuser : '<?php echo $_SESSION["userid"] ?>' }, function(data){
          var taskData = JSON.parse(data);
          
          var arr = taskData['PROPOSALS_ARRAY'];

          $('#task-userpic').attr('src',taskData['TASK_USER_PIC']);

          if( taskData['PROPOSALS_NUMBER'] < 5 )
          {
            var status = '<span class="job-status closed pull-right" style="cursor: normal;">Task is open</span>';
          }

          $('#task-title').html('<h3 style="color: #484848;font-weight: bold;">Task title: '+taskData['TASK_TITLE']+ '</h3>');
          $('#task-text').html('<p><span style="color: black;">Task description:</span> <div style="">'+taskData['TASK_TEXT1']+'</div></p>');
          $('#task-budget').html('Budget: '+taskData['TASK_BUDGET']+'$');
          $('.price-task').html(taskData['TASK_BUDGET']);
          $('#task-status').empty();
          $('#task-status').append(status);

          if( taskData['TASK_CITY'] == null || taskData['TASK_COUNTRY'] == null || taskData['TASK_CITY'] == undefined || taskData['TASK_COUNTRY'] == undefined || taskData['TASK_CITY'] == '' || taskData['TASK_COUNTRY'] == '' )
          {
          	$('#task-location').html('User didn\'t set exact location for this task.');
          }
          else
          {
          	$('#task-location').html('<p class="text-left"><span style="color: black;">Task location:</span> <span style="color: #fb236a;" class="lnr icon-map-marker"></span> <span style="color: #fb236a;">'+taskData['TASK_CITY']+', '+taskData['TASK_COUNTRY'])+'</span></p>';
          }

          

          
          //$('#task-username').html(taskData['TASK_USERNAME']);
          initMap(taskData['TASK_LAT'], taskData['TASK_LONG'], taskData['TASK_SUBKIND']);

          if( taskData['IS_CURRENT_USER_CREATOR'] == 'yes' )
          {
            if( taskData['PROPOSALS_ARRAY'].length == 0 ){
              $('.list-of-proposals').empty();
              $('.list-of-proposals').prepend('<p class="text-left" style="color: black;padding-left: 15px;margin-bottom: 15px;">You dont have any proposals yet.</p>');
            }
            else
            {
              for( count=0; count<taskData['PROPOSALS_ARRAY'].length; count++ )
              {
              	//alert(taskData['PROPOSALS_ARRAY'][count]['PROPOSAL_TEXT']);
              	var proposal = '<a data-toggle="tooltip" data-placement="top" data-original-title="'+taskData['PROPOSALS_ARRAY'][count]['PROPOSAL_USERFULLNAME']+'" title="'+taskData['PROPOSALS_ARRAY'][count]['PROPOSAL_USERFULLNAME']+'" href="single-proposal.php?id='+taskData['PROPOSALS_ARRAY'][count]['PROPOSAL_ID']+'"><li><img style="height: 50px;width: 50px;border-radius: 50%;" src="'+taskData['PROPOSALS_ARRAY'][count]['PROPOSAL_USERPIC']+'" /></li></a>';
              	$('.list-of-proposals').append(proposal);
              }
              $('.list-of-proposals').prepend('<p class="text-left" style="color: black;padding-left: 15px;">You have proposals for this task <span style="font-size: 10px;">(Click on user image to see proposal details)</span>: </p>');
              //alert('Curent user is creator of this task.');
            }
          }
          else
          {
          	var num = '<?php echo $_SESSION["userid"] ?>';
          	
          	if( userExists(num.toString()) == true ){
                $('.list-of-proposals').empty();
          		$('.list-of-proposals').append('<button disabled class="modal-button" style="font-weight: bold;margin: 0 auto;text-transform: uppercase;background-color: #E74C3A;color: white;width: 100%;height: 50px;border-radius: 3px;border: none;text-align: center;"><i class="fa fa-check"></i> You already placed proposal</button>');
          	}
          	else
          	{
          		if( taskData['PROPOSALS_NUMBER'] < 5 )
          		{
                    $('.list-of-proposals').empty();
          			$('.list-of-proposals').append('<button class="modal-button place-proposal" onclick="placeProposal('+id+')" style="font-weight: bold;margin: 0 auto;text-transform: uppercase;background-color: #6DBD3F;color: white;width: 100%;height: 50px;border-radius: 3px;border: none;text-align: center;"><i class="fa fa-plus"></i> Place Proposal</button>');
          		}
          		else
          		{
                    $('.list-of-proposals').empty();
          			$('.list-of-proposals').append('<button disabled class="modal-button" style="font-weight: bold;margin: 0 auto;text-transform: uppercase;background-color: #E74C3A;color: white;width: 100%;height: 50px;border-radius: 3px;border: none;text-align: center;"><i class="fa fa-warning"></i> Maximum number of proposals reached!</button>');
          		}
          		
          	}


          	function userExists(username) {
			  return arr.some(function(el) {
			    return el.PROPOSAL_USER_ID === username;
			  }); 
			}

          	
          }

          console.log(taskData);
        });


        $('#taskDetailsModal').modal('show');

        
      }


      function initMap(lat,long,subcategory)
          {
              var latlng = new google.maps.LatLng(lat, long);
              var myOptions = {
                  zoom: 10,
                  center: latlng,
                  navigationControl: false,
                  mapTypeControl: false,
                  scrollwheel: false,
                  draggable: false,
                  scaleControl: false,
                  mapTypeId: google.maps.MapTypeId.ROADMAP,
                  styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"hue":"#ffe500"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"},{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.landcover","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.attraction","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.station","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"transit.station.airport","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#9bdffb"},{"visibility":"on"}]}]
              };
              map = new google.maps.Map(document.getElementById("gmap-1"), myOptions);

            
              // place a marker
              placeMarker(lat, long, subcategory);

          }    
                  
           
          function placeMarker(lat, long, subcategory) {
              // first remove all markers if there are any
              var location = new google.maps.LatLng(lat, long);
              //deleteOverlays();

              var category = subcategory;
              switch( category )
                {
                    case 'cities':
                    var iconMarker = 'images/map-marker-point.png';
                    break;
                    case 'beaches':
                    var iconMarker = 'images/map-marker-point.png';
                    break;
                    case 'accommodation':
                    var iconMarker = 'images/map-marker-point.png';
                    break;
                    case 'hotels':
                    var iconMarker = 'images/map-marker-point.png';
                    break;
                    case 'sport':
                    var iconMarker = 'images/map-marker-point.png';
                    break;
                    case 'music':
                    var iconMarker = 'images/map-marker-point.png';
                    break;
                    case 'museums':
                    var iconMarker = 'images/map-marker-point.png';
                    break;
                    case 'sights':
                    var iconMarker = 'images/map-marker-point.png';
                    break;
                    case 'other':
                    var iconMarker = 'images/map-marker-point.png';
                    break;
                }

              var marker = new google.maps.Marker({
                  position: location, 
                  icon: iconMarker,
                  map: map
              });

          }
        
    </script>

    <script type="text/javascript">
    	function placeProposal(id){
    		window.location = "accept-job.php?id="+id;
    	}
    </script>

    
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDe0Jbcnve8wjMa7p4ZzFpKSxCU8pNUjaw&amp;libraries=geometry&amp;v=3.27"></script>
<?php require "footer.php"; ?>
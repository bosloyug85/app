<?php require "header.php"; ?>
    <style>
        #sidebar-container {
            display: none;
        }

        footer {
            margin-top: 0px !important;
        }
    </style>

    <div id="demo"></div>

    <div id="main-container" class="container-fluid" style="height: 100vh;background: url(images/background-home.jpg);background-size: cover;width: 100%;background-position: center;position: relative;padding: 0px;">
        <div id="overlay-mask" class="overlay-mask" style="display: table;">
            <div class="text-center" style="display: table-cell;vertical-align: middle;">
                <h1 style="color: white;text-align: center;font-weight: bolder;font-size: 3em;">POST YOUR WISH AND MAKE IT HAPPEN!</h1>
                <button class="login-btn" style="margin-left: 0;">Photo and Video</button>
                <p style="color: white;margin-top: 30px;">A social network for people who want to make their job done.</p>
            </div>
        </div>
    </div>

    <div class="testimonials container-fluid" style="padding: 60px 0px;background: -webkit-linear-gradient(50.08deg,#9561ee,#1db6ef);background: -o-linear-gradient(50.08deg,#9561ee 0,#1db6ef 100%);background: linear-gradient(39.92deg,#9561ee,#1db6ef);">
        <div class="container">
            <div class="col-lg-6 text-center">
                <img style="height: 100px;width: 100px;border-radius: 50%;margin-bottom: 50px;" src="images/bjorn.jpg">
                <p style="text-transform: uppercase;color: white;font-size: 16px;font-weight: bold;letter-spacing: 3px;">Björn Lapakko</p>
                <p style="font-size: 12px;color: white;margin-bottom: 50px;">From Minnesota to Tallinn, Estonia</p>
                <p class="text-justify" style="color: white;font-size: 15px;line-height: 2em;">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
            </div>
            <div class="col-lg-6 text-center">
                <img style="height: 100px;width: 100px;border-radius: 50%;margin-bottom: 50px;" src="images/lauren_proc.jpg">
                <p style="text-transform: uppercase;color: white;font-size: 16px;font-weight: bold;letter-spacing: 3px;">Lauren Proctor</p>
                <p style="font-size: 12px;color: white;margin-bottom: 50px;">From New York, NY to Tallinn, Estonia</p>
                <p class="text-justify" style="color: white;font-size: 15px;line-height: 2em;">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
            </div>

            <div class="col-lg-12 text-center" style="margin-top: 60px;">
                <p class="text-center" style="color: white;font-size: 18px;">START YOUR JOURNEY</p>
                <p class="text-center" style="color: white;line-height: 2em;">Sign up or log in to Tasker to see tasks that match your skills, interests, and experience.</p>
                <button onclick="" style="width: 120px;" class="button blue login-btn">JOIN</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">



        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            x.innerHTML = "<input id='a' type='hidden' value='"+position.coords.latitude+"'>"+
        "<input id='b' type='hidden' value='"+position.coords.longitude+"'>";
            getCity();
        }


            function getCity(){
            var a = $('#a').val();
            var b = $('#b').val();
            
            var latlng;

            latlng = new google.maps.LatLng(a, b); 

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

                        $('.kw-current-location b').html(city);
                        $('#registerCity').val(city);
                        $('#registerCountry').val(country);
                        localStorage.setItem('city', city);
                        localStorage.setItem('country', country);
            
                    }
                }
            });
            }

            






</script> 

<?php require "footer.php"; ?>
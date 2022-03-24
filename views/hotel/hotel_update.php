<?php
// session_start();
if (isset($_SESSION['username'])) {
    //   include '../../db/db_connection.php';
    //   $temp = $_SESSION['username'];
    //   $sqlForSession = "SELECT hotelID FROM hotels WHERE email = '$temp'";
    //   $resultForSession = mysqli_query($con, $sqlForSession);
    if (mysqli_num_rows($this->isHotel) === 1) {
        ?>
        <!DOCTYPE html>
        <html lang="en" dir="ltr">
        <head>
            <meta charset="utf-8">
            <title>UPDATE</title>
            <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
            <style> <?php include_once APPROOT.'/public/css/hotel/hotel_update.css'; ?> </style>
            <style> <?php include_once APPROOT.'/public/css/css/hotel/hotel_repeating_css.css'; ?> </style>
            <?php include APPROOT . '/views/repeatable_contents/font.php'; ?>
            <!-- <?php
            // $result = require '../../db/hotel/hotel_updateprofile.php';
            ?> -->
        </head>
        <body>
        <section class="sign_up-traveler">
            <?php include_once APPROOT . '/views/repeatable_contents/nav_bar_hotel.php';?>
            <style>
                <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_hotel.css'; ?>
            </style>
            <script type="text/javascript"
                    src="<?php echo APPROOT ?>/public/script/repeatable_contents/nav_bar_hotel.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

            <div class="box-sign_up-traveler">

                <form class="form-sign_up-traveler" id="sign_up_form-hotel" name="sign_up_form-hotel"
                      action="updateHotel" method="post" enctype="multipart/form-data">

                    <?php while ($rows = mysqli_fetch_array($this->isHotel)){ ?>

                    <div class="form-control">
                        <label for="name">Hotel Name</label> <input class="text-form-sign_up-traveler" type="text"
                                                                    name="name" id="name" value=""
                                                                    placeholder="<?php echo $rows['name']; ?>"><br>
                        <br>
                        <span class="error-msg"></span>
                    </div>

                    <div class="form-control">
                        <?php if ($rows['hotel_type'] == "Deluxe") {
                            $select1 = "selected";
                            $select2 = " ";
                            $select3 = " ";
                            $select4 = " ";
                        }
                        if ($rows['hotel_type'] == "Luxury") {
                            $select1 = " ";
                            $select2 = "selected";
                            $select3 = " ";
                            $select4 = " ";
                        }
                        if ($rows['hotel_type'] == "Superior") {
                            $select1 = " ";
                            $select2 = " ";
                            $select3 = "selected";
                            $select4 = " ";
                        }
                        if ($rows['hotel_type'] == "Standard") {
                            $select1 = " ";
                            $select2 = " ";
                            $select3 = " ";
                            $select4 = "selected";
                        }
                        ?>
                        <label for="hotel_type">Hotel Type</label><select class="drop-down-form-sign_up-traveler"
                                                                          name="hotel_type-type" id="hotel_type-type">
                            <option value="Deluxe" <?php echo $select1; ?>>Deluxe</option>
                            <option value="Luxury" <?php echo $select2; ?>>Luxury</option>
                            <option value="Superior" <?php echo $select3; ?>>Superior</option>
                            <option value="Standard" <?php echo $select4; ?>>Standard</option>
                        </select><br>
                        <br>
                        <span class="error-msg"></span>
                    </div>

                    <label for="regNO">Registration Number</label> <input class="text-form-sign_up-traveler" type="text"
                                                                          name="regNO" id="regNO" value=""
                                                                          placeholder="<?php echo $rows['regNo']; ?>"><br>
                    <br>

                    <label for="licenceNo">Licence Number</label> <input class="text-form-sign_up-traveler" type="text"
                                                                         name="licenceNo" id="licenceNo" value=""
                                                                         placeholder="<?php echo $rows['licenceNo']; ?>"><br>
                    <br>

                    <div class="form-control">
                        <label for="adress">Address</label>
                        <input class="text-form-sign_up-traveler" type="text" name="address-line1" id="address-line1"
                               placeholder="<?php echo $rows['address_line1']; ?>"></br>
                        <br>
                        <input class="text-form-sign_up-traveler" type="text" name="address-line2" id="address-line2"
                               placeholder="<?php echo $rows['address_line2']; ?>"></br>
                        <br>
                        <input class="text-form-sign_up-traveler" type="text" name="city" id="city"
                               placeholder="<?php echo $rows['city']; ?>"></br>
                        <br>
                        <span class="error-msg"></span>
                    </div>

                    <!--      <div class="form-control">-->
                    <!--      <label for="location">Location</label>-->
                    <!--      <div class="tooltip">-->
                    <!--      <span class="tooltiptext">*Please get the google map URL of your location and paste it here</span>-->
                    <!--      <input class="text-form-sign_up-traveler" type="url" name="location" id="location" placeholder="-->
                    <?php //echo $rows['location']; ?><!--"></br>-->
                    <!--      </div>-->
                    <!--      <br>-->
                    <!--        <span class="error-msg"></span>-->
                    <!--      </div>-->
                    <!--                                                -------------------------location input map ------------------------------------------>
                    <div class="form-control">
                        <label for="location">Location</label>
                        <div class="mapform">
                            <div class="row">
                                <div class="col-5">
                                    <input type="hidden" class="form-control text-form-sign_up-traveler"
                                           placeholder="<?php echo $rows['latitude']; ?>" name="lat"
                                           id="lat">
                                </div>
                                <div class="col-5">
                                    <input type="hidden" class="form-control" placeholder="<?php echo $rows['longitude']; ?>" name="lng"
                                           id="lng">
                                </div>
                            </div>

                            <button class="get-location-btn" onclick="getLocation(event)">Get Current Location
                            </button>
                            <label class="label-for-map">drag the marker for your location</label>
                            <div id="map" style="height:400px; width: 90%; margin: 0 auto; border-radius: 1rem;"
                                 class="my-3"></div>

                            <script>
                                var x = document.getElementById("demo");

                                function getLocation(event) {
                                    event.preventDefault();
                                    if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(showPosition);
                                    } else {
                                        x.innerHTML = "Geolocation is not supported by this browser.";
                                    }
                                }

                                function showPosition(position) {
                                    initMap(position.coords.latitude, position.coords.longitude);
                                }

                                let map;

                                function initMap(lat, lng) {
                                    let initialLat = <?php echo $rows['latitude']; ?>;
                                    let initialLng = <?php echo $rows['longitude']; ?>;
                                    if (lat === undefined) {
                                        lat = initialLat;
                                        lng = initialLng;
                                    }
                                    $('#lat').val(lat)
                                    $('#lng').val(lng)
                                    map = new google.maps.Map(document.getElementById("map"), {
                                        center: {lat: lat, lng: lng},
                                        zoom: 8,
                                        scrollwheel: true,
                                    });
                                    const position = {lat: lat, lng: lng};
                                    let marker = new google.maps.Marker({
                                        position: position,
                                        map: map,
                                        draggable: true
                                    });
                                    google.maps.event.addListener(marker, 'position_changed',
                                        function () {
                                            let lat = marker.position.lat()
                                            let lng = marker.position.lng()
                                            $('#lat').val(lat)
                                            $('#lng').val(lng)
                                        })
                                    google.maps.event.addListener(map, 'click',
                                        function (event) {
                                            pos = event.latLng
                                            marker.setPosition(pos)
                                        })
                                }
                            </script>
                            <script async defer
                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD3nYBp26uWK_F_-K4mKLfQpVKAGRHgz0&callback=initMap"
                                    type="text/javascript"></script>
                        </div>
                        <br>
                        <span class="error-msg"></span>
                    </div>
                    <!--                                                ------------------------------end of location input map------------------------------------------------------>

                    <div class="form-control">
                        <label for="contact">Contact Number</label>
                        <input class="text-small-form-sign_up-traveler" type="text" name="contact2" id="contact2"
                               value="" placeholder="<?php echo $rows['contact2']; ?>">
                        <input class="text-small-form-sign_up-traveler" type="text" name="contact1" id="contact1"
                               value="" placeholder="<?php echo $rows['contact1']; ?>"></br>
                        <br>
                        <span class="error-msg"></span>
                    </div>

                    <div class="form-control">
                        <label for="email">Email Address</label>
                        <input class="text-form-sign_up-traveler" type="text" name="email" id="email" value=""
                               placeholder="<?php echo $rows['email']; ?>"></br>
                        <br>
                        <span class="error-msg"></span>
                    </div>

                    <div class="form-control">
                        <label for="password">Password</label>
                        <input class="text-small-form-sign_up-traveler" type="password" name="retype-password"
                               id="retype-password" value="" placeholder=" Confirm Password">
                        <div class="tooltip">
                            <span class="tooltiptext">*Please enter a password between 8 to 15 characters which contains at least one uppercase letter and one special character</span>
                            <input class="text-small-form-sign_up-traveler" type="password" name="password"
                                   id="password" value=""><br><br>
                        </div>
                        <span class="error-msg"></span>
                    </div>

                    <div class="form-control">
                        <label for="description">Description</label>
                        <textarea class="description-form-hotel" id="description" name="description" rows="8" cols="80"
                                  maxlength="500" placeholder="<?php echo $rows['description']; ?>"></textarea></br>
                        <br><br><br>
                        <span class="error-msg"></span>
                    </div>

                    <div class="form-control">
                        <label for="web">Website URL</label>
                        <div class="tooltip">
                            <span class="tooltiptext">*Please enter your website URL if a website is available</span>
                            <input class="text-form-sign_up-traveler" type="text" name="web" id="web" value=""
                                   placeholder="<?php echo $rows['webUrl']; ?>"></br>
                            <br>
                        </div>
                        <span class="error-msg"></span>
                    </div>

                    <!-- <div class="form-control">
                    <label for="images">Input Images</label>
                    <input type="file" class="images-small-form-sign_up-traveler" name="hotel_image" id="images" multiple="" ></br>
                    <br>
                      <span class="error-msg"></span>
                    </div> -->


                    <div class="form-control">
                        <label for="rep_name">Representative's Name</label>
                        <input class="text-form-sign_up-traveler" type="text" name="rep_name" id="rep_name" value=""
                               placeholder="<?php echo $rows['rep_name']; ?>"></br>
                        <br>
                        <span class="error-msg"></span>
                    </div>


                    <div class="form-control">
                        <label for="rep_email">Email Address</label>
                        <input class="text-form-sign_up-traveler" type="text" name="rep_email" id="rep_email" value=""
                               placeholder="<?php echo $rows['rep_email']; ?>"></br>
                        <br>
                        <span class="error-msg"></span>
                    </div>

                    <div class="form-control">
                        <label for="rep_contact">Contact Number</label>
                        <input class="text-small-form-sign_up-traveler" type="text" name="rep_contact2"
                               id="rep_contact2" value="" placeholder="<?php echo $rows['rep_contact2']; ?>">
                        <input class="text-small-form-sign_up-traveler" type="text" name="rep_contact1"
                               id="rep_contact1" value="" placeholder="<?php echo $rows['rep_contact1']; ?>"></br>
                        <br>
                        <span class="error-msg"></span>
                    </div>


                    <!-- <table class="room_details-form-sign_up-hotel">
                             <tr>
                                 <th id="first_column_room_details-form-sign_up-hotel">Room type</th>
                                 <th>Persons</th>
                                 <th>Rooms</th>
                                 <th>Minibar</th>
                                 <th>Food include</th>
                                 <th>A/C</th>
                                 <th>Price</th>
                               </tr>
                              <tr>
                                  <td id="first_column_room_details-form-sign_up-hotel">Single Room </td>
                                  <td>1</td>
                                  <td><input class="number-form-sign_up-traveler" type="number" id="single_room_count" name="single_room_count" ></td>
                                  <td>
                                    <input type="hidden" name="single_room_minibar" value="no" />
                                    <input type="checkbox" id="single_room_minibar" name="single_room_minibar" value="yes"> <span></span>
                                  </td>
                                  <td>
                                    <input type="hidden" name="single_room_food" value="no" />
                                    <input type="checkbox" id="single_room_food" name="single_room_food" value="yes"> <span></span>
                                  </td>
                                  <td>
                                    <input type="hidden" name="single_room_ac" value="no" />
                                    <input type="checkbox" id="single_room_ac" name="single_room_ac" value="yes"> <span></span>
                                  </td>
                                  <td><input class="price-form-sign_up-traveler"  type="text" id="single_room_price" name="single_room_price" placeholder="0.00" ></td>
                                </tr>
                                <tr>
                                  <td id="first_column_room_details-form-sign_up-hotel">Double Room </td>
                                  <td>2</td>
                                  <td><input class="number-form-sign_up-traveler" type="number" id="double_room_count" name="double_room_count" ></td>
                                  <td>
                                    <input type="hidden" name="double_room_minibar" value="no" />
                                    <input type="checkbox" id="double_room_minibar" name="double_room_minibar" value="yes"> <span></span>
                                  </td>
                                  <td>
                                    <input type="hidden" name="double_room_food" value="no" />
                                    <input type="checkbox" id="double_room_food" name="double_room_food" value="yes"> <span></span>
                                  </td>
                                  <td>
                                    <input type="hidden" name="double_room_ac" value="no" />
                                    <input type="checkbox" id="double_room_ac" name="double_room_ac" value="yes"> <span></span>
                                  </td>
                                  <td><input class="price-form-sign_up-traveler" type="text" id="double_room_price" name="double_room_price" placeholder="0.00" ></td>
                                </tr>
                                <tr>
                                  <td id="first_column_room_details-form-sign_up-hotel">Family Room </td>
                                  <td>4</td>
                                  <td><input class="number-form-sign_up-traveler" type="number" id="family_room_count" name="family_room_count" ></td>
                                  <td>
                                    <input type="hidden" name="family_room_minibar" value="no" />
                                    <input type="checkbox" id="family_room_minibar" name="family_room_minibar" value="yes"> <span></span>
                                  </td>
                                  <td>
                                    <input type="hidden" name="family_room_food" value="no" />
                                    <input type="checkbox" id="family_room_food" name="family_room_food" value="yes"> <span></span>
                                  </td>
                                  <td>
                                    <input type="hidden" name="family_room_ac" value="no" />
                                    <input type="checkbox" id="family_room_ac" name="family_room_ac" value="yes"> <span></span>
                                  </td>
                                  <td><input class="price-form-sign_up-traveler"  type="text" id="family_room_price" name="family_room_price" placeholder="0.00" ></td>
                                </tr>
                                <tr>
                                  <td id="first_column_room_details-form-sign_up-hotel">Massive Room </td>
                                  <td><input class="number-form-sign_up-traveler" type="number" id="massive_room_capacity" name="massive_room_capacity" ></td>
                                  <td><input class="number-form-sign_up-traveler" type="number" id="massive_room_count" name="massive_room_count" ></td>
                                  <td>
                                    <input type="hidden" name="massive_room_minibar" value="no" />
                                    <input type="checkbox" id="massive_room_minibar" name="massive_room_minibar" value="yes"> <span></span>
                                  </td>
                                  <td>
                                    <input type="hidden" name="massive_room_food" value="no" />
                                    <input type="checkbox" id="massive_room_food" name="massive_room_food" value="yes"> <span></span>
                                  </td>
                                  <td>
                                    <input type="hidden" name="massive_room_ac" value="no" />
                                    <input type="checkbox" id="massive_room_ac" name="massive_room_ac" value="yes"> <span></span>
                                  </td>
                                  <td><input class="price-form-sign_up-traveler"  type="text" id="massive_room_price" name="massive_room_price" placeholder="0.00" ></td>
                                </tr>
                             </tr>
                           </table> -->
                    <br>
                    <!-- <div class="tc_div_form_signup_traveler">
                       <input class="tc-checkbox-form-sign_up-traveler" type="checkbox" name="tc" id="tc" value="" required>
                        <label id="tc-label-form-sign_up-traveler" for="tc">I agree to all the <a href="http://localhost/TRAVO/unregistered/termsAndConditions">Terms & Conditions</a> of travo.lk</label>
          </div> -->
            </div>
            </form>
            <?php } ?>
            </div>
            <div class="buttons-sign_up-traveler">
                <input type="button" class="refreshbtn" value="REFRESH" onclick="window.location.reload();">
                <input name="submit" id="submit" type="submit" class="submitbtn" value="UPDATE" onclick=""
                       form="sign_up_form-hotel">
            </div>
        </section>
        <section id="contact_us-section">
            <?php include_once APPROOT . '/views/repeatable_contents/footer.php'; ?>
            <style> <?php include_once APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
        </section>

        </body>
        </html>
        <?php
    } else {
        echo '<script type="text/javascript">javascript:history.go(-1)</script>';
        exit();
    }

} else {
    header("location: http://localhost/TRAVO");
    exit();
}
?>

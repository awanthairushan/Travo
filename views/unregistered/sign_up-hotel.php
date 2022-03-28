<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>SIGNUP</title>
    <style> <?php include APPROOT . '/public/css/unregistered/sign_up-hotel.css'; ?> </style>
    <style> <?php include APPROOT . '/public/css/unregistered/repeating_css.css'; ?> </style>
    <link rel="icon" href="<?php echo URLROOT ?>/public/images/icons/favicon.ico">
    <?php include APPROOT . '/views/repeatable_contents/font.php'; ?>
    <!-- This code will run after the body tag  -->
</head>
<body>

<?php
if (isset($_SESSION['value'])) {
    if ($_SESSION['value'] === "username_exist") {
        echo '<div class="username_exist_modal">
        <div class="username_exist_confirm_box">
              <h3>Username Exist.!</h3>
              <hr>
              <p>Someone already has that username. Try another..!</p>
              <hr>
              <button type="button" name="okay_btn" class="username_exist_okay_btn" id="username_exist_okay_btn">Okay...!</button>
        </div>
        </div>';
    }
}
?>

<section class="sign_up-traveler">
    <?php include APPROOT . '/views/repeatable_contents/nav_bar.php'; ?>
    <style> <?php include APPROOT . '/public/css/repeatable_contents/nav_bar.css'; ?>  </style>
    <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <div class="box-sign_up-traveler">

        <form class="form-sign_up-traveler" id="sign_up_form-hotel" name="sign_up_form-hotel" action="addNewHotel"
              method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['error'])) { ?>
                <p class="error-log_in"><?php echo $_GET['error']; ?></p>
            <?php }
            ?>

            <div class="form-control">
                <label for="name">Hotel Name</label> <input class="text-form-sign_up-traveler" type="text" name="name"
                                                            id="name" value=""><br>
                <br>
                <span class="error-msg"></span>
            </div>

            <div class="form-control">
                <label for="hotel_type">Hotel Type</label><select class="drop-down-form-sign_up-traveler"
                                                                  name="hotel_type-type" id="hotel_type-type">
                    <option value="Deluxe">Deluxe</option>
                    <option value="Luxury">Luxury</option>
                    <option value="Superior">Superior</option>
                    <option value="Standard">Standard</option>
                </select><br>
                <br>
                <span class="error-msg"></span>
            </div>

            <label for="regNO">Registration Number</label> <input class="text-form-sign_up-traveler" type="text"
                                                                  name="regNO" id="regNO" value=""><br>
            <br>

            <label for="licenceNo">Licence Number</label> <input class="text-form-sign_up-traveler" type="text"
                                                                 name="licenceNo" id="licenceNo" value=""><br>
            <br>

            <div class="form-control ">
                <label for="adress">Address</label>
                <input class="text-form-sign_up-traveler" type="text" name="address-line1" id="address-line1"
                       placeholder=" Address Line 1"></br>
                <br>
                <input class="text-form-sign_up-traveler" type="text" name="address-line2" id="address-line2"
                       placeholder=" Address Line 2"></br>
                <br>
                <select class="text-form-sign_up-traveler select-form-sign_up-traveler  drop-down-form-sign_up-traveler"
                        name="city" id="city">
                    <option value="">Sri Lanka</option>
                    <option value="Ampara">Ampara</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Galle">Galle</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Hambantota">Hambantota</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kalutara">Kalutara</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Kegalle">Kegalle</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Matale">Matale</option>
                    <option value="Matara">Matara</option>
                    <option value="Monaragala">Monaragala</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Puttalam">Puttalam</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Trincomalee">Trincomalee</option>
                    <option value="Vavuniya">Vavuniya</option>
                </select></br>
                <br>
                <span class="error-msg"></span>
            </div>
<!-- -------------------------location input map ------------------------------------------>
            <div class="form-control">
            <label for="location">Location</label>
                <div class="mapform">
                    <div class="row">
                        <div class="col-5">
                            <input type="hidden" class="form-control text-form-sign_up-traveler" placeholder="lat" name="lat"
                                   id="lat">
                        </div>
                        <div class="col-5">
                            <input type="hidden" class="form-control" placeholder="lng" name="lng"
                                   id="lng">
                        </div>
                    </div>

                    <button class="get-location-btn" onclick="getLocation(event)">Set Current Location
                    </button>
                    <label class="label-for-map">or drag the marker for your location</label>
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
                            let initialLat = 6.902206909028085;
                            let initialLng = 79.86114263534546;
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
<!--------------------------------end of location input map------------------------------------------------------>



            <div class="form-control">
                <label for="contact">Contact Number</label>
                <input class="text-small-form-sign_up-traveler" type="text" name="contact2" id="contact2" value=""
                       placeholder=" Contact Number 2">
                <input class="text-small-form-sign_up-traveler" type="text" name="contact1" id="contact1" value=""
                       placeholder=" Contact Number 1"></br>
                <br>
                <span class="error-msg"></span>
            </div>

            <div class="form-control">
                <label for="email">Email Address</label>
                <input class="text-form-sign_up-traveler" type="text" name="email" id="email" value=""></br>
                <br>
                <span class="error-msg"></span>
            </div>

            <div class="form-control">
                <label for="password">Password</label>
                <input class="text-small-form-sign_up-traveler" type="password" name="retype-password"
                       id="retype-password" value="" placeholder=" Confirm Password">
                <div class="tooltip">
                    <span class="tooltiptext">*Please enter a password between 8 to 15 characters which contains at least one uppercase letter and one special character</span>
                    <input class="text-small-form-sign_up-traveler" type="password" name="password" id="password"
                           value=""><br><br>
                </div>
                <span class="error-msg"></span>
            </div>

            <div class="form-control">
                <label for="description">Description</label>
                <textarea class="description-form-hotel" id="description" name="description" rows="8" cols="80"
                          maxlength="500"></textarea></br>
                <br><br><br>
                <span class="error-msg"></span>
            </div>

            <div class="form-control">
                <label for="web">Website URL</label>
                <div class="tooltip">
                    <span class="tooltiptext">*Please enter your website URL if a website is available</span>
                    <input class="text-form-sign_up-traveler" type="text" name="web" id="web" value=""></br>
                    <br>
                </div>
                <span class="error-msg"></span>
            </div>

            <div class="form-control">
                <label for="images">Input Images</label>
                <input type="file" class="images-small-form-sign_up-traveler" name="hotel_image[]" id="images"
                       multiple=""></br>
                <br>
                <span class="error-msg"></span>
            </div>


            <div class="form-control">
                <label for="rep_name">Representative's Name</label>
                <input class="text-form-sign_up-traveler" type="text" name="rep_name" id="rep_name" value=""></br>
                <br>
                <span class="error-msg"></span>
            </div>


            <div class="form-control">
                <label for="rep_email">Email Address</label>
                <input class="text-form-sign_up-traveler" type="text" name="rep_email" id="rep_email" value=""></br>
                <br>
                <span class="error-msg"></span>
            </div>

            <div class="form-control">
                <label for="rep_contact">Contact Number</label>
                <input class="text-small-form-sign_up-traveler" type="text" name="rep_contact2" id="rep_contact2"
                       value="" placeholder=" Contact Number 2">
                <input class="text-small-form-sign_up-traveler" type="text" name="rep_contact1" id="rep_contact1"
                       value="" placeholder=" Contact Number 1"></br>
                <br>
                <span class="error-msg"></span>
            </div>


            <table class="room_details-form-sign_up-hotel">
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
                    <td id="first_column_room_details-form-sign_up-hotel">Single Room</td>
                    <td>1</td>
                    <td><input class="number-form-sign_up-traveler" type="number" id="single_room_count"
                               name="single_room_count"></td>
                    <td>
                        <input type="hidden" name="single_room_minibar" value="no"/>
                        <input type="checkbox" id="single_room_minibar" name="single_room_minibar" value="yes">
                        <span></span>
                    </td>
                    <td>
                        <input type="hidden" name="single_room_food" value="no"/>
                        <input type="checkbox" id="single_room_food" name="single_room_food" value="yes"> <span></span>
                    </td>
                    <td>
                        <input type="hidden" name="single_room_ac" value="no"/>
                        <input type="checkbox" id="single_room_ac" name="single_room_ac" value="yes"> <span></span>
                    </td>
                    <td><input class="price-form-sign_up-traveler" type="text" id="single_room_price"
                               name="single_room_price" placeholder="0.00"></td>
                </tr>
                <tr>
                    <td id="first_column_room_details-form-sign_up-hotel">Double Room</td>
                    <td>2</td>
                    <td><input class="number-form-sign_up-traveler" type="number" id="double_room_count"
                               name="double_room_count"></td>
                    <td>
                        <input type="hidden" name="double_room_minibar" value="no"/>
                        <input type="checkbox" id="double_room_minibar" name="double_room_minibar" value="yes">
                        <span></span>
                    </td>
                    <td>
                        <input type="hidden" name="double_room_food" value="no"/>
                        <input type="checkbox" id="double_room_food" name="double_room_food" value="yes"> <span></span>
                    </td>
                    <td>
                        <input type="hidden" name="double_room_ac" value="no"/>
                        <input type="checkbox" id="double_room_ac" name="double_room_ac" value="yes"> <span></span>
                    </td>
                    <td><input class="price-form-sign_up-traveler" type="text" id="double_room_price"
                               name="double_room_price" placeholder="0.00"></td>
                </tr>
                <tr>
                    <td id="first_column_room_details-form-sign_up-hotel">Family Room</td>
                    <td>4</td>
                    <td><input class="number-form-sign_up-traveler" type="number" id="family_room_count"
                               name="family_room_count"></td>
                    <td>
                        <input type="hidden" name="family_room_minibar" value="no"/>
                        <input type="checkbox" id="family_room_minibar" name="family_room_minibar" value="yes">
                        <span></span>
                    </td>
                    <td>
                        <input type="hidden" name="family_room_food" value="no"/>
                        <input type="checkbox" id="family_room_food" name="family_room_food" value="yes"> <span></span>
                    </td>
                    <td>
                        <input type="hidden" name="family_room_ac" value="no"/>
                        <input type="checkbox" id="family_room_ac" name="family_room_ac" value="yes"> <span></span>
                    </td>
                    <td><input class="price-form-sign_up-traveler" type="text" id="family_room_price"
                               name="family_room_price" placeholder="0.00"></td>
                </tr>
                <tr>
                    <td id="first_column_room_details-form-sign_up-hotel">Massive Room</td>
                    <td><input class="number-form-sign_up-traveler" type="number" id="massive_room_capacity"
                               name="massive_room_capacity"></td>
                    <td><input class="number-form-sign_up-traveler" type="number" id="massive_room_count"
                               name="massive_room_count"></td>
                    <td>
                        <input type="hidden" name="massive_room_minibar" value="no"/>
                        <input type="checkbox" id="massive_room_minibar" name="massive_room_minibar" value="yes">
                        <span></span>
                    </td>
                    <td>
                        <input type="hidden" name="massive_room_food" value="no"/>
                        <input type="checkbox" id="massive_room_food" name="massive_room_food" value="yes">
                        <span></span>
                    </td>
                    <td>
                        <input type="hidden" name="massive_room_ac" value="no"/>
                        <input type="checkbox" id="massive_room_ac" name="massive_room_ac" value="yes"> <span></span>
                    </td>
                    <td><input class="price-form-sign_up-traveler" type="text" id="massive_room_price"
                               name="massive_room_price" placeholder="0.00"></td>
                </tr>
                </tr>
            </table>
            <br>
            <div class="tc_div_form_signup_traveler">
                <input class="tc-checkbox-form-sign_up-traveler" type="checkbox" name="tc" id="tc" value="" required>
                <label id="tc-label-form-sign_up-traveler" for="tc">I agree to all the <a
                            href="<?php echo URLROOT ?>/unregistered/termsAndConditions">Terms & Conditions</a> of
                    travo.lk</label>
            </div>
    </div>
    </form>
    </div>
    <?php
    $_SESSION['value'] = "good";
    ?>
    <div class="buttons-sign_up-traveler">
        <input type="button" class="refreshbtn" value="REFRESH" onclick="window.location.reload();">
        <input type="submit" form="sign_up_form-hotel" class="submitbtn" value="SUBMIT" name="submitbtn" id="submitbtn">
    </div>
</section>

<!--__________________contact_us________________-->

<section id="contact_us-section">
    <?php include APPROOT . '/views/repeatable_contents/footer.php'; ?>
    <style> <?php include APPROOT . '/public/css/repeatable_contents/footer.css'; ?>  </style>
</section>

<!--__________________END contact_us________________-->

<script src="<?php echo URLROOT ?>/public/script/unregistered/sign_up_hotel.js"></script>
</body>
</html>

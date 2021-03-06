<?php
if (isset($_SESSION['username'])) {
    if (mysqli_num_rows($this->isAdmin) === 1) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>HOTELS</title>
            <style> <?php include APPROOT . '/public/css/admin/admin_hotels_more.css"'; ?> </style>
            <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
            <script src="http://localhost/TRAVO/public/script/traveler/traveler_hotel_booking.js"></script>
        </head>
        <body>
        <section class="uppersection">
            <!--Start Navigation bar-->
            <?php include_once APPROOT . '/views/repeatable_contents/nav_bar_admin.php'; ?>
            <style> <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_admin.css'; ?>  </style>
            <script type="text/javascript"
                    src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_admin.js"></script>
            <!--End Navigation bar-->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
            <!-- .................image gallery.................. -->
            <div class="image_gallery_hotel">
                <table>
                    <tr>
                        <?php while ($images = mysqli_fetch_array($this->hotel_images)) {
                            echo '<td><img src="' . URLROOT . '/public/images/assets/hotel/' . $images['image'] . '"
                                     class="images_image_gallery_hotel" alt="HOTEL SAMPLE IMAGES"></td>';
                        } ?>
                    </tr>
                </table>
            </div>
            <!-- .................end of image gallery.................. -->

            <!-- ..................hotel details and representattive details........................ -->
            <div class="hotel_account">
                <?php
                while ($rows = mysqli_fetch_array($this->hotel_details)) {
                    $name = $rows['name'];
                    $email = $rows['email'];
                    $contact1 = $rows['contact1'];
                    $contact2 = $rows['contact2'];
                    $type = $rows['hotel_type'];
                    $regNo = $rows['regNo'];
                    $licenceNo = $rows['licenceNo'];
                    $city = $rows['city'];
                    $address1 = $rows['address_line1'];
                    $address2 = $rows['address_line2'];
                    $latitude = $rows['latitude'];
                    $longitude = $rows['longitude'];
                    $repName = $rows['rep_name'];
                    $repEmail = $rows['rep_email'];
                    $repContact1 = $rows['rep_contact1'];
                    $repContact2 = $rows['rep_contact2'];
                    $website = $rows['webUrl'];
                    $description = $rows['description'];
                }

                while ($rows = mysqli_fetch_array($this->family_room_details)) {
                    $f_room_count = $rows['no_of_rooms'];
                    $f_capacity = $rows['capacity'];
                    $f_food = $rows['food'];
                    $f_check_food = ($f_food == 'yes' ? "checked" : "");
                    $f_minibar = $rows['minibar'];
                    $f_check_minibar = ($f_minibar == 'yes' ? "checked" : "");
                    $f_ac = $rows['a/c'];
                    $f_check_ac = ($f_ac == 'yes' ? "checked" : "");
                    $f_price = $rows['price'];
                }

                while ($rows = mysqli_fetch_array($this->double_room_details)) {
                    $d_room_count = $rows['no_of_rooms'];
                    $d_capacity = $rows['capacity'];
                    $d_food = $rows['food'];
                    $d_check_food = ($d_food == 'yes' ? "checked" : "");
                    $d_minibar = $rows['minibar'];
                    $d_check_minibar = ($d_minibar == 'yes' ? "checked" : "");
                    $d_ac = $rows['a/c'];
                    $d_check_ac = ($d_ac == 'yes' ? "checked" : "");
                    $d_price = $rows['price'];
                }

                while ($rows = mysqli_fetch_array($this->single_room_details)) {
                    $s_room_count = $rows['no_of_rooms'];
                    $s_capacity = $rows['capacity'];
                    $s_food = $rows['food'];
                    $s_check_food = ($s_food == 'yes' ? "checked" : "");
                    $s_minibar = $rows['minibar'];
                    $s_check_minibar = ($s_minibar == 'yes' ? "checked" : "");
                    $s_ac = $rows['a/c'];
                    $s_check_ac = ($s_ac == 'yes' ? "checked" : "");
                    $s_price = $rows['price'];
                }

                while ($rows = mysqli_fetch_array($this->massive_room_details)) {
                    $m_room_count = $rows['no_of_rooms'];
                    $m_capacity = $rows['capacity'];
                    $m_food = $rows['food'];
                    $m_check_food = ($m_food == 'yes' ? "checked" : "");
                    $m_minibar = $rows['minibar'];
                    $m_check_minibar = ($m_minibar == 'yes' ? "checked" : "");
                    $m_ac = $rows['a/c'];
                    $m_check_ac = ($m_ac == 'yes' ? "checked" : "");
                    $m_price = $rows['price'];
                }

                ?>
                <table>
                    <tr>
                        <td>Hotel name</td>
                        <td><?php echo $name; ?></td>
                        <td rowspan="2">
                            <div class="checkbtn">
                                <button id="checkbtn"
                                        onclick="window.location.href='https://www.srilanka.travel/index.php?route=travel/tostay&hotel_type=4&hotel_district=&hotel_star=5'"
                                        ;>CHECK VALIDITY
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td><?php echo $contact1 . ",  " . $contact2; ?></td>
                        <td rowspan="7">
                            <?php
                                while($hotelPayment = mysqli_fetch_array($this->hotelPaymentDetails)){
                                    echo '<div class="hotel_account_payment"><p>LKR '.$hotelPayment['price'].'</p></div>' ;
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td><?php echo $type; ?></td>
                    </tr>
                    <tr>
                        <td>Registration No</td>
                        <td><?php echo $regNo; ?></td>
                    </tr>
                    <tr>
                        <td>License No</td>
                        <td><?php echo $licenceNo; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo $address1 . ",  " . $address2 . ", " . $city; ?></td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td><a href="#location-and-description">Click here to view location</a></td>
                    </tr>
                    <tr>
                        <td>Official Website</td>
                        <td><a href="<?php echo $website; ?>">Click here to view website</a></td>
                    </tr>
                    <tr>
                        <td>Representative name</td>
                        <td><?php echo $repName; ?></td>
                        <!-- <form method="post" id="payForm" name="payForm" class="payForm" action="https://sandbox.payhere.lk/pay/checkout">
                      <input type="text" name="merchant_id" value="1218929">
                      <input type="text" name="return_url" value="http://localhost/Travo/pages/traveler/traveler_trip_to_go.php">
                      <input type="text" name="cancel_url" value="https://localhost/Travo/pages/traveler/traveler_budget.php">
                      <input type="text" name="notify_url" value="https://localhost/Travo/php/traveler/traveler_payment.php">
                      <input type="text" name="order_id" value="1">
                      <input type="text" name="items" value="Trip"><br>
                      <input type="text" name="currency" value="LKR">
                      <input type="text" name="amount" value="1000">
                      <input type="text" name="first_name" value="Saman">
                      <input type="text" name="last_name" value="Perera"><br>
                      <input type="text" name="email" value="samanp@gmail.com">
                      <input type="text" name="phone" value="0771234567"><br>
                      <input type="text" name="address" value="No.1, Galle Road">
                      <input type="text" name="city" value="Colombo">
                      <input type="text" name="country" value="Sri Lanka"><br><br>
                  </form>  -->
                        <td rowspan="1">
                            <!--                            <div class="paybtn">-->
                            <!--                                <button id="paybtn" form="payForm">PAY NOW</button>-->
                            <!--                            </div>-->
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $repEmail; ?></td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td><?php echo $repContact1 . ",  " . $repContact2; ?></td>
                    </tr>

                </table>


            </div>
            <!-- ..................end of hotel details and representattive details........................ -->

            <!-- ........................room details table....................... -->
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
                    <td>10</td>
                    <td><input type="checkbox" id="single_room_minibar"
                               name="single_room_minibar" <?php echo $s_check_minibar; ?> ></td>
                    <td><input type="checkbox" id="single_room_food"
                               name="single_room_food" <?php echo $s_check_food; ?>></td>
                    <td><input type="checkbox" id="single_room_food" name="single_room_food" <?php echo $s_check_ac; ?>>
                    </td>
                    <td><?php echo $s_price; ?></td>
                </tr>
                <tr>
                    <td id="first_column_room_details-form-sign_up-hotel">Double Room</td>
                    <td><?php echo $d_capacity; ?></td>
                    <td><?php echo $d_room_count; ?></td>
                    <td><input type="checkbox" id="double_room_minibar"
                               name="double_room_minibar" <?php echo $d_check_minibar; ?>></td>
                    <td><input type="checkbox" id="double_room_food"
                               name="double_room_food" <?php echo $d_check_food; ?>></td>
                    <td><input type="checkbox" id="double_room_ac" name="double_room_ac" <?php echo $d_check_ac; ?>>
                    </td>
                    <td><?php echo $d_price; ?></td>
                </tr>
                <tr>
                    <td id="first_column_room_details-form-sign_up-hotel">Family Room</td>
                    <td><?php echo $f_capacity; ?></td>
                    <td><?php echo $f_room_count; ?></td>
                    <td><input type="checkbox" id="family_room_minibar"
                               name="family_room_minibar" <?php echo $f_check_minibar; ?>></td>
                    <td><input type="checkbox" id="family_room_food"
                               name="family_room_food" <?php echo $f_check_food; ?>></td>
                    <td><input type="checkbox" id="family_room_ac" name="family_room_ac" <?php echo $f_check_ac; ?>>
                    </td>
                    <td><?php echo $f_price; ?></td>
                </tr>
                <tr>
                    <td id="first_column_room_details-form-sign_up-hotel">Massive Room</td>
                    <!-- <td><input class="number-form-sign_up-traveler" type="number" id="massive_room_capacity" name="massive_room_capacity" ></td> -->
                    <td><?php echo $m_capacity; ?></td>
                    <td><?php echo $m_room_count; ?></td>
                    <td><input type="checkbox" id="massive_room_minibar"
                               name="massive_room_minibar" <?php echo $m_check_minibar; ?>></td>
                    <td><input type="checkbox" id="massive_room_food"
                               name="massive_room_food" <?php echo $m_check_food; ?>>
                    </td>
                    <td><input type="checkbox" id="massive_room_ac" name="massive_room_ac" <?php echo $m_check_ac; ?>>
                    </td>
                    <td><?php echo $m_price; ?></td>
                </tr>
                </tr>
            </table>
            <!-- ........................end of room details table....................... -->

            <!-- ..................hotel description and location........................ -->
            <table class="hoteldetails" id="location-and-description">
                <tr>
                    <th>Location</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td>
                        <div id="map" style="height:250px; width: 90%; margin: 0 auto; border-radius: 1rem;"
                             class="my-3"></div>
                        </div>
                    </td>
                    <td>
                        <p><?php echo $description; ?></p>
                    </td>
                </tr>
            </table>
            <script>
                function initMap(lat, lng) {
                    let initialLat = <?php echo $latitude; ?>;
                    let initialLng = <?php echo $longitude; ?>;
                    if (lat === undefined) {
                        lat = initialLat;
                        lng = initialLng;
                    }
                    map = new google.maps.Map(document.getElementById("map"), {
                        center: {lat: lat, lng: lng},
                        zoom: 8,
                        scrollwheel: true,
                    });
                    const position = {lat: lat, lng: lng};
                    let marker = new google.maps.Marker({
                        position: position,
                        map: map,
                    });
                }
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD3nYBp26uWK_F_-K4mKLfQpVKAGRHgz0&callback=initMap"
                    type="text/javascript"></script>
            <!-- ..................end of hotel description and location........................ -->

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

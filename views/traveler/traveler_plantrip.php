<?php
if (isset($_SESSION['username'])) {
    if (mysqli_num_rows($this->isTraveler) === 1) {
        ?>
        <html>
        <head>
            <title>PLAN</title>
            <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
            <style> <?php include APPROOT.'/public/css/traveler/traveler_plantrip.css'; ?> </style>
            <style> <?php include APPROOT.'/public/css/traveler/traveler_repeating_css.css'; ?> </style>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <?php include APPROOT . '/views/repeatable_contents/font.php'; ?>
        </head>

        <body>
        <section class="uppersection">
            <?php include APPROOT . '/views/repeatable_contents/nav_bar_traveler.php'; ?>
            <style> <?php include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; ?>  </style>
            <script type="text/javascript"
                    src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>
            <!-- use for map -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
            <div class="pageheading plan-head">PLAN</div>
            <div class="pageheading hotel-head">HOTELS</div>
            <div class="content">
                <div class="container">
                    <div class="details">
                        <br>
                        <form id="form_plan" action="<?php echo URLROOT; ?>/traveler/pendingTrip" method="post">
                            <?php
                            echo '<input type="hidden" name="trip_id" value="' . $_SESSION['trip_id'] . '">
                            <input type="hidden" name="peoplecount" value="' . $_SESSION['traveler_count'] . '">
                            <input type="hidden" name="startdate" value="' . $_SESSION['start_date'] . '">
                            <input type="hidden" name="enddate" value="' . $_SESSION['end_date'] . '">
                            <input type="hidden" name="category" value="' . $_SESSION['trip_cat'] . '">
                            <input type="hidden" name="difference" id="limit" value="' . $_SESSION['difference'] . '">';
                            $width = 100 / ($_SESSION['difference'] + 1);
                            ?>

                            <div class="location_div">
                                <label for="location">LOCATION:</label>
                                <div class="mapform">
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="hidden" class="form-control" placeholder="lat" name="lat"
                                                   id="lat">
                                        </div>
                                        <div class="col-5">
                                            <input type="hidden" class="form-control" placeholder="lng" name="lng"
                                                   id="lng">
                                        </div>
                                    </div>

                                    <button class="get-location-btn" onclick="getLocation(event)">Get Current Location
                                    </button>

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
                                <div id="displaydiv" class="displaydiv"> Select up
                                    to <?php echo $_SESSION['difference'] + 1; ?> destinations
                                </div>
                                <label for="destination">SELECT DESTINATIONS: </label>
                                <select id="choices" name="destinations" onchange="getSelectedValue()"
                                        placeholder="Select up to 3 destinations">
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
                                </select>
                            </div>
                            <!-- store hotel data -->
                            <input type="hidden" name="hotel1" value="<?php echo $_SESSION['hotel_1'] ?>">
                            <input type="hidden" name="hotel2" value="<?php echo $_SESSION['hotel_2'] ?>">
                            <input type="hidden" name="hotel3" value="<?php echo $_SESSION['hotel_3'] ?>">
                            <br>
                            <?php for ($i = 1; $i <= $_SESSION['difference'] + 1; $i++) {

                                if ($i == 1) {
                                    $hotel = "FIRST";
                                }
                                if ($i == 2) {
                                    $hotel = "SECOND";
                                }
                                if ($i == 3) {
                                    $hotel = "THIRD";
                                }

                                ?>
                                <style>
                                    #destinations {
                                        width: <?php echo $width;?>%;
                                    }

                                    @media screen and (max-width: 950px) {
                                        #destinations {
                                            width: 100%;
                                        }
                                    }

                                </style>
                                <div id="destinations">
                                    <table class="tableday">
                                        <tr>
                                            <td class="tdata"><label for="destination1">DESTINATION <?php echo $i; ?></label></td>
                                        </tr>

                                        <tr>
                                            <td class="tdata">
                                                <button type="button" class="selecthotelpopupbtn"> <?php echo $hotel; ?>
                                                    NIGHT HOTEL
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tdata">
                                                <div id="sights" class="sights">
                                                    <input type="checkbox" id="sight1" name="anu[]" value="anu_1"><label
                                                            for="sight1">Ruwanweliseya</label><br/>
                                                    <input type="checkbox" id="sight2" name="anu[]" value="anu_2"><label
                                                            for="sight2">Jetavanaramaya</label><br/>
                                                    <input type="checkbox" id="sight3" name="anu[]" value="anu_3"><label
                                                            for="sight3">Rathna Prasada</label><br/>
                                                    <input type="checkbox" id="sight3" name="anu[]" value="anu_4"><label
                                                            for="sight3">Isurumuniya </label><br/>
                                                    <input type="checkbox" id="sight3" name="anu[]" value="anu_5"><label
                                                            for="sight3">Jaya Sri Maha Bodhi</label><br/>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <?php } ?>
                            <br>
                            <!-- destination 2 -->
                            <!-- <div id="destinations">
                                <table class="tableday">
                                    <tr><td class="tdata"><label for="destination2">DESTINATION 2</label></td></tr>
                                    <tr><td class="tdata"><button type="button" class="selecthotelpopupbtn"> SECOND NIGHT HOTEL</button></td></tr>
                                    <tr>
                                        <td class="tdata">
                                            <div id="sights" class="sights">
                                          <input type="checkbox" id="sight1" name="galle[]" value="galle_1"><label for="sight1">Galle Dutch Fort</label><br/>
                                            <input type="checkbox" id="sight2" name="galle[]" value="galle_2"><label for="sight2">Dutch Reformed Church</label><br/>
                                            <input type="checkbox" id="sight3" name="galle[]" value="galle_3"><label for="sight3">The National Museum</label><br/>
                                            <input type="checkbox" id="sight3" name="galle[]" value="galle_4"><label for="sight3">Jungle Beach</label><br/>
                                            <input type="checkbox" id="sight3" name="galle[]" value="galle_5"><label for="sight3">Japanese Peace Pagoda</label><br/>
                                        </div>
                                        </td>
                                    </tr>
                                </table>
                            </div> -->
                            <!-- destination 3 -->
                            <!-- <div id="destinations">
                                <table class="tableday">
                                    <tr><td class="tdata"><label for="destination3">DESTINATION 3</label></td></tr>
                                    <tr><td class="tdata"><button type="button" class="selecthotelpopupbtn"> THIRD NIGHT HOTEL</button></td></tr>
                                    <tr>
                                        <td class="tdata">
                                            <div id="sights" class="sights">
                                            <input type="checkbox" id="sight1" name="col[]" value="col_1"><label for="sight1">Lotus Tower</label><br/>
                                            <input type="checkbox" id="sight2" name="col[]" value="col_2"><label for="sight2">National Museum</label><br/>
                                            <input type="checkbox" id="sight3" name="col[]" value="col_3"><label for="sight3">Sri Lanka Planetarium</label><br/>
                                            <input type="checkbox" id="sight3" name="col[]" value="col_4"><label for="sight3">Viharamahadevi Park</label><br/>
                                            <input type="checkbox" id="sight3" name="col[]" value="col_5"><label for="sight3">Mount Lavinia Beach</label><br/>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div> -->
                            <br><br>
                            <input type="hidden" name="mileage" value="350">


                            <input type="hidden" name="hotelacc1" value="3500.00">
                            <input type="hidden" name="hotelacc2" value="4500.00">
                            <input type="hidden" name="hotelacc3" value="5000.00">
                            <input type="hidden" name="servicecharges" value="1000.00">
                            <input type="hidden" name="ticketfees" value="500.00">


                        </form>
                    </div>
                    <input type="submit" form="form_plan" name="saveSubmit" id="nextbtn" form="" class="nextbtn"
                           value="NEXT">
                </div>
            </div>
            <!-- .................................popup.................................. -->

            <div class="hotel_names_popup">
                <table>
                    <tr>
                        <td><a onclick="plusSlides(-1)">
                                <div class="prev"></div>
                            </a></td>
                        <td class="hotels">
                            <div class="slide hotels1">
                                <div class="cols1">
                                    <div>
                                        <button onclick="window.location.href='hotelBooking';" id="selecthotelbtn">
                                            Cinnamon Grand Colombo<br><br>Luxury<br><br>Rs.5,500 - Rs.12,000
                                        </button>
                                    </div>
                                    <div>
                                        <button onclick="window.location.href='hotelBooking';" id="selecthotelbtn">
                                            Occidental Eden <br><br>Deluxe<br><br>Rs.10,000 - Rs.45,000
                                        </button>
                                    </div>
                                </div>
                                <div class="cols2">
                                    <div>
                                        <button onclick="window.location.href='hotelBooking';" id="selecthotelbtn">
                                            Lavinia Hotel<br><br> Standard<br><br>Rs.1,500 - Rs.10,000
                                        </button>
                                    </div>
                                    <div>
                                        <button onclick="window.location.href='hotelBooking';" id="selecthotelbtn">
                                            Nelly Marine <br><br> Luxury<br><br>Rs.3,500 - Rs.15,000
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="slide hotels2">
                                <div class="cols1">
                                    <div>
                                        <button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> The
                                            Glamp - Kelaniya <br><br> Deluxe <br><br> Rs.7,500 - Rs.20,000
                                        </button>
                                    </div>
                                    <div>
                                        <button onclick="window.location.href='hotelBooking';" id="selecthotelbtn">
                                            Sigiriya Resort - Sigiriya <br><br> Luxury <br><br> Rs.4,000 - Rs.15,000
                                        </button>
                                    </div>
                                </div>
                                <div class="cols2">
                                    <div>
                                        <button onclick="window.location.href='hotelBooking';" id="selecthotelbtn">
                                            Amaya Lake - Pasikuda <br><br> Superior <br><br> Rs.3,500 - Rs.12,000
                                        </button>
                                    </div>
                                    <div>
                                        <button onclick="window.location.href='hotelBooking';" id="selecthotelbtn">
                                            Amaara Forest - Kandy <br><br> Standard <br><br> Rs.1,500 - Rs.5,000
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="slide hotels3">
                                <div class="cols1">
                                    <div>
                                        <button onclick="window.location.href='hotelBooking';" id="selecthotelbtn">
                                            Shanaya Mansion <br><br> Superior <br><br> Rs.2,000 - Rs.8,000
                                        </button>
                                    </div>
                                    <div>
                                        <button onclick="window.location.href='hotelBooking';" id="selecthotelbtn">
                                            Marriott resort <br><br> Luxury <br><br> Rs.2,500 - Rs.12,500
                                        </button>
                                    </div>
                                </div>
                                <div class="cols2">
                                    <div>
                                        <button onclick="window.location.href='hotelBooking';" id="selecthotelbtn">
                                            Tamarind Hill <br><br> Deluxe <br><br> Rs.3000 - Rs.20,000
                                        </button>
                                    </div>
                                    <div>
                                        <button onclick="window.location.href='hotelBooking';" id="selecthotelbtn">
                                            Shangri-La Hambantota <br><br> Deuluxe <br><br> Rs.4,000 - Rs.20,000
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <!-- <div class="slide hotels4">
                                <div class="cols1">
                                    <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Hotel Name <br/> 00-5000</button></div>
                                    <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Hotel Name <br/> 00-5000</button></div>
                                </div>
                                <div class="cols2">
                                    <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Hotel Name <br/> 00-5000</button></div>
                                    <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Hotel Name <br/> 00-5000</button></div>
                                </div>
                            </div> -->
                        </td>
                        <td><a onclick="plusSlides(1)">
                                <div class="next"></div>
                            </a></td>
                    </tr>
                    <tr class="cancel">
                        <td colspan="3">
                            <button id="cancelbtn">CANCEL</button>
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <script type="text/javascript"
                src="http://localhost/TRAVO/public/script/traveler/traveler_plantrip.js"></script>

        <section id="contact_us-section">
            <?php include APPROOT . '/views/repeatable_contents/footer.php'; ?>
            <style> <?php include APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
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

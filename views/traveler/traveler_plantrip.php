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
            <div class="content">
                <div class="container">
                    <div class="details">
                        <br>
                        <form id="form_plan" action="<?php echo URLROOT; ?>/traveler/planTripSights" method="post">
                            <?php
                            echo '<input type="hidden" name="trip_id" value="' . $_SESSION['trip_id'] . '">
                            <input type="hidden" name="difference" id="limit" value="' . $_SESSION['difference'] . '">';
                            $width = 100 / ($_SESSION['difference'] + 1);
                            ?>

                            <div class="location_div">

                                <!--                                -------------------------location input map ------------------------------------------>

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

                                <!--                                ------------------------------end of location input map------------------------------------------------------>

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
                        </form>
                    </div>
                    <input type="submit" form="form_plan" name="saveSubmit" id="nextbtn" form="" class="nextbtn" value="NEXT">
                </div>
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

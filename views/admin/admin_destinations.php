<?php
if (isset($_SESSION['username'])) {
    if (mysqli_num_rows($this->isAdmin) === 1) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>DESTINATIONS</title>
            <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
            <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_destinations.css">
            <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_repeating_css.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Montserrat:wght@300&display=swap"
                  rel="stylesheet">

        </head>
        <body>
        <section class="admin-destinations">
            <!--Start Navigation bar-->
            <?php include_once APPROOT . '/views/repeatable_contents/nav_bar_admin.php'; ?>
            <style> <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_admin.css'; ?>  </style>
            <script type="text/javascript"
                    src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_admin.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

            <div class="main">
                <h1 class="heading-one">MANAGE DESTINATIONS & VISITING PLACES</h1>
                <!--Start "Destinations & visiting places" table-->
                <div class="table">
                    <table class="content_table" id="conn_table">
                        <thead>
                        <tr>
                            <th>DESTINATION</th>
                            <th>VISITING PLACES</th>
                            <th>TICKET PRICE</th>
                            <th>Category</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $i = 0;
                        while ($rows = mysqli_fetch_array($this->destinations)) {

                            $count = 0;

                            echo "<tr>
                        <td>" . $rows['destination'] . "</td><td>";

                            while ($rows = mysqli_fetch_array($this->sightsall[$i])) {
                                echo $rows['sight'] . "<br />";
                                $count++;
                            }

                            echo "</td>
                        <td>";

                            while ($rows = mysqli_fetch_array($this->ticketsall[$i])) {
                                echo "Rs. " . $rows['ticket_price'] . "<br />";
                            }

                            echo "</td>

                        <td>";

                            while ($rows = mysqli_fetch_array($this->categoryall[$i])) {
                                echo $rows['category'] . "<br />";
                            }

                            echo "</td>

                        <td>";
                            for ($j = 0; $j < $count; $j++) {
                                while ($rows = mysqli_fetch_array($this->sightIdAll[$i])) {
                                    $sightId = $rows['sight_id'];
                                }
                                echo "
                            <form method='post' action='removeSight'>
                              <input type='hidden' value='$sightId' name=sightID>                    
                              <input type='submit' id='removebtn' name ='acceptbtn' class='removebtn' value='REMOVE SIGHT'>
                            </form>";
                            }
                            echo "</td>


                    </tr>";
                            $i++;
                            ?>


                            <!-- <script>
                                document.getElementById('addbtn').addEventListener('click', (e) => {
                                    e.preventDefault();
                                    let addDestination = document.getElementById('add-new-destinations');
                                    let editDestination = document.getElementById('edit-destinations');
                                    addDestination.style.display = "none";
                                    editDestination.style.display = "block";
                                })
                            </script> -->

                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!--End "Registered vehicle" table-->

                <!--Start form of adding new destination-->
                <div class="form-container add-new-destinations" id="add-new-destinations">
                    <form class="form_add_destination" id="form_add_destination" action="addDestinationsAndSights"
                          method="POST">
                        <!-- Enter destination-->
                        <label for="fdestination" class="fdes">DESTINATION</label>
                        <select id="fdestination" name="destination">
                            <option value="">Select Destination</option>
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
                        <!-- Enter visiting places-->
                        <div class="site_details_div">
                            <div class="visiting-places-input-feilds">
                                <input type="text" id="fvp" name="visitingPlace[]" placeholder="  Sight">
                                <input type="text" id="fprice" name="ticketPrice[]" placeholder="  Ticket price LKR">
                                <!-- <input type="text" id="ftime" name="ftime" placeholder="  Time"> -->
                                <select id="fcategory" name="tripCategory[]">
                                    <option value="">Select Category :</option>
                                    <option value="Cultural">Cultural</option>
                                    <option value="Pilgrimage">Pilgrimage</option>
                                    <option value="Leisure">Leisure</option>
                                </select>
                                <input type="text" class="form-control text-form-sign_up-traveler" placeholder="latitude" name="latitude" id="lat">
                                <input type="text" class="form-control" placeholder="lng" name="longitude" id="lng">
                                <img src="http://localhost/TRAVO/public/images/icons/placeholder.png" id="location"
                                     onclick="document.location.href = 'destinationsMap'">
                                <label class="label-for-map">drag the marker for sight location</label>
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
                                <!--                                ------------------------------end of location input map------------------------------------------------------>
                            </div>
                        </div>
                    </form>
<!--                    <input type="button" id="addvpbtn" name="addvpbtn" value="ADD NEW PLACE" onclick="addPlace()">-->
                    <div class="destination-submit-div">
                        <input type="submit" form="form_add_destination" id="submitvpbtn" name="submitvpbtn" value="SUBMIT">
                    </div>
                </div>
                <!--JS to get new row when click on "Add new place" -->

                <script type="text/javascript"
                        src="http://localhost/TRAVO/public/script/admin/admin_destinations.js"></script>
                <!--JS to get new row when click on "Add new place" -->


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

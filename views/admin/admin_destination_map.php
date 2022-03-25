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

    <!--End Navigation bar-->

    <div class="main">
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
                    <!--------------------------------end of location input map------------------------------------------------------>
                </div>
            </form>
            <input type="submit" form="" id="locationSubmit" class="location-submit" name="locationSubmit" value="SUBMIT">
        </div>
        <script type="text/javascript" src="http://localhost/TRAVO/public/script/admin/admin_destinations.js"></script>
        <!--JS to get new row when click on "Add new place" -->


</section>
</body>
</html>

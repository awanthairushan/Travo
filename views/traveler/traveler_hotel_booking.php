<?php
  session_start();
  if(isset($_SESSION['username'])) {
    include '../../db/db_connection.php';
    $temp = $_SESSION['username'];
    $sqlForSession = "SELECT travelerID FROM travelers WHERE email = '$temp'";
    $resultForSession = mysqli_query($con, $sqlForSession);
    if (mysqli_num_rows($resultForSession) === 1) {
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>HOTEL</title>
      <link rel="icon" href="../../images/icons/favicon.ico">
        <style> <?php include '../../css/traveler/traveler_hotel_booking.css'; ?> </style>
        <style> <?php include '../../css/traveler/traveler_repeating_css.css'; ?> </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../../script/traveler/traveler_hotel_booking.js"></script>
        <?php include '../../repeatable_contents/font.php'; ?>
    </head>
    <body>
        <section class="uppersection">
            <?php include '../../repeatable_contents/nav_bar_traveler.php';?>
            <style> <?php include '../../repeatable_contents/nav_bar_traveler.css'; ?>  </style>
            <script type="text/javascript" src="../../repeatable_contents/nav_bar_traveler.js"></script>
            <div class="image_gallery_hotel">
                <table>
                  <tr>
                    <td> <img src="../../images/sample_images/for_hotels/1.jpg" class="images_image_gallery_hotel" alt="HOTEL SAMPLE IMAGES"> </td>
                    <td> <img src="../../images/sample_images/for_hotels/2.jpg" class="images_image_gallery_hotel" alt="HOTEL SAMPLE IMAGES"></td>
                    <td><img src="../../images/sample_images/for_hotels/3.jpg" class="images_image_gallery_hotel" alt="HOTEL SAMPLE IMAGES"></td>
                    <td><img src="../../images/sample_images/for_hotels/4.jpg" class="images_image_gallery_hotel" alt="HOTEL SAMPLE IMAGES"></td>
                    <td><img src="../../images/sample_images/for_hotels/5.jpg" class="images_image_gallery_hotel" alt="HOTEL SAMPLE IMAGES"></td>
                  </tr>
                </table>
            </div>

            <div>
                <form action="traveler_plantrip.php">
                <div class="rooms">
                    <div class="slide">
                        <div class="rname">Single Room</div>
                          <div class="roomtype r1">
                            <dl class="">
                              <dt>1 Person</dt>
                              <br>
                              <dt>Breakfast included</dt>
                              <dt>Mini Bar</dt>
                              <dt>A/C</dt>
                              <br>
                              <dt class="price">LKR 6500.00</dt>
                              <dt class="left">Only 2 left..!</dt>
                            </dl>
                          </div>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseSValue()" value="Decrease Value">-</div>
                            <input type="number" id="Snumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseSValue()" value="Increase Value">+</div>
                        </div>
                    </div>

                    <div class="slide">
                        <div class="rname">Double Room</div>
                        <div class="roomtype r2">
                          <dl class="">
                            <dt>2 Person</dt>
                            <br>
                            <dt>Breakfast included</dt>
                            <dt>Mini Bar</dt>
                            <dt>A/C</dt>
                            <br>
                            <dt class="price">LKR 12000.00</dt>
                            <dt class="left">Only 5 left..!</dt>
                          </dl>
                        </div>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseDValue()" value="Decrease Value">-</div>
                            <input type="number" id="Dnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseDValue()" value="Increase Value">+</div>
                        </div>
                    </div>

                    <div class="slide">
                        <div class="rname">Family Room</div>
                        <div class="roomtype r3">
                          <dl class="">
                            <dt>4 Person</dt>
                            <br>
                            <dt>Breakfast included</dt>
                            <dt>Mini Bar</dt>
                            <dt>A/C</dt>
                            <br>
                            <dt class="price">LKR 15000.00</dt>
                            <dt class="left">Only 4 left..!</dt>
                          </dl>
                        </div>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseFValue()" value="Decrease Value">-</div>
                            <input type="number" id="Fnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseFValue()" value="Increase Value">+</div>
                        </div>
                    </div>

                    <div class="slide">
                        <div class="rname">Massive Room</div>
                        <div class="roomtype r4">
                          <dl class="">
                            <dt>6 Person</dt>
                            <br>
                            <dt>Breakfast included</dt>
                            <dt>Mini Bar</dt>
                            <dt>A/C</dt>
                            <br>
                            <dt class="price">LKR 20000.00</dt>
                            <dt class="left">Only 3 left..!</dt>
                          </dl>
                        </div>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseMValue()" value="Decrease Value">-</div>
                            <input type="number" id="Mnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseMValue()" value="Increase Value">+</div>
                        </div>
                    </div>
                </div>
                <div class="confirm"><button id="confirmbtn" class="confirmbtn" onclick="window.location.href='traveler_plantrip.php'">CONFIRM</button></div>
            </form>

            <table class="hoteldetails">
                <tr>
                    <th>Location</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7921.539473306047!2d79.84874!3d6.918109!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb0658168859e3c0e!2sCinnamon%20Grand%20Colombo!5e0!3m2!1sen!2slk!4v1629560069244!5m2!1sen!2slk" width="95%" height="92%"  allowfullscreen="" loading="lazy"></iframe>
                    </td>
                    <td>
                      <p>
                        Set 1 km from both the Slave Island Railway Station and Galle Face Green, a seaside urban park, this grand resort hotel is also 2 km from Gangaramaya Buddhist Temple.
                        Featuring picture windows, the polished rooms come with minibars, free Wi-Fi and flat-screen TVs. Suites add living rooms and dining areas, and some offer kitchenettes, wet bars or butler service.
                        </p>
                    </td>
                </tr>
            </table>
            </div>
        </section>

    <section id="contact_us-section">
      <?php include '../../repeatable_contents/footer.php';?>
      <style> <?php include '../../repeatable_contents/footer.css'; ?>  </style>
    </section>
    </body>
</html>
<?php
  } else{
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
}else{
  header("location: ../../index.html");
  exit();
}
 ?>

<?php
  session_start();
  if(isset($_SESSION['username'])) {
    include '../../db/db_connection.php';
    $temp = $_SESSION['username'];
    $sqlForSession = "SELECT username FROM admin WHERE username = '$temp'";
    $resultForSession = mysqli_query($con, $sqlForSession);
    if (mysqli_num_rows($resultForSession) === 1) {
 ?>
<html>
    <head>
      <style> <?php include '../../css/admin/admin_trip_details.css'; ?> </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TRIPS</title>
        <link rel="icon" href="../../images/icons/favicon.ico">
    </head>
    <body>
        <section class="uppersection">
            <?php include '../../repeatable_contents/nav_bar_admin.php';?>
            <style> <?php include '../../repeatable_contents/nav_bar_admin.css'; ?>  </style>
            <script type="text/javascript" src="../../repeatable_contents/nav_bar_admin.js"></script>
            <br>
            <div class="content">
                <div class="trip">
                    <div class="tripmenu"><a class="link" href="#container_details">TRIP</a></div>
                    <div class="tripmenu"><a class="link" href="#container_budget">BUDGET</div>
                    <div class="tripmenu"><a class="link" href="#container_route">ROUTE</a></div>
                </div>
<!-- ....................trip details.................... -->
                <div class="container_details" id="container_details">
                    <div class="details">
                        <table class="main">
                            <tr>
                                <td>Date : </td>
                                <td>2021-10-25 To 2021-10-27</td>
                            </tr>
                            <tr>
                                <td>Number of Travelers : </td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Category : </td>
                                <td>Cultural</td>
                            </tr>
                            <tr>
                                <td>Mileage : </td>
                                <td>358km</td>
                            </tr>
                        </table>

                        <table class="days" rules=none>
                            <tr>
                                <th class="trow"></th>
                                <th class="trow">Day 1</th>
                                <th class="trow">Day 2</th>
                                <th class="trow">Day 3</th>
                            </tr>
                            <tr>
                                <th class="row">Destination</th>
                                <td class="trow">Anuradhapura</td>
                                <td class="trow">Polonnaruwa</td>
                                <td class="trow">Kegalle</td>
                            </tr>
                            <tr>
                                <th class="row">Hotel</th>
                                <td class="trow">Araliya Resort</td>
                                <td class="trow">Tamarind</td>
                                <td class="trow">Alakamandawa</td>
                            </tr>
                            <tr>
                                <th class="row">Sights</th>
                                <td class="trow">Thuparamaya<br/>Isurumuniya<br/>Ruwanweliseya</td>
                                <td class="trow">Nelum Pokuna<br/>Gal Viharaya<br/>Hatadage</td>
                                <td class="trow">Maha Viharaya<br/>Maligawa<br/>Ashokaramaya</td>
                            </tr>
                        </table>
                    </div>
                </div>
<!-- ............................end of trip details................... -->

<!-- .............................trip budget.......................... -->
<div class="container_budget" id="container_budget">
            <div class="details">
              <br>
                <table class="main">
                    <tr>
                        <td>Hotel 1</td>
                        <td>=</td>
                        <td>RS 3500.00</td>
                    </tr>
                    <tr>
                        <td>Hotel 2</td>
                        <td>=</td>
                        <td>RS 4500.00</td>
                    </tr>
                    <tr>
                        <td>hotel 3</td>
                        <td>=</td>
                        <td>RS 5000.00</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Accomodations</td>
                        <td>=</td>
                        <td>RS 13000.00</td>
                    </tr>
                    <tr>
                        <td>Service Charges</td>
                        <td>=</td>
                        <td>RS 1000.00</td>
                    </tr>
                    <tr>
                        <td>Ticket fees</td>
                        <td>=</td>
                        <td>(Rs 500.00)</td>
                    </tr>
                    <tr>
                        <th class="row" style="font-weight:bold;">Total Budget</th>
                        <th class="row">=</th>
                        <th class="row">RS 14000.00</th>
                    </tr>
                </table>
            </div>
        </div>
<!-- .............................end of trip budget.......................... -->

<!-- .............................trip route.......................... -->
<div class="container_route" id="container_route">
            <div class="details">
              <br>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7936.595061707961!2d80.5334359!3d5.953681200000001!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slk!4v1629276519410!5m2!1sen!2slk" width="1000" height="360" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

<!-- .............................end of trip route.......................... -->
            </div>
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

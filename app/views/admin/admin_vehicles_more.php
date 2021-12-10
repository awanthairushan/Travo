<?php
  /*session_start();
  if(isset($_SESSION['username'])) {
    include '../../db/db_connection.php';
    $temp = $_SESSION['username'];
    $sqlForSession = "SELECT username FROM admin WHERE username = '$temp'";
    $resultForSession = mysqli_query($con, $sqlForSession);
    if (mysqli_num_rows($resultForSession) === 1) {*/
 ?>

<html>
    <head>
        <style> <?php include '../../../public/css/admin/admin_vehicles_more.css'; ?> </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VEHICLES</title>
        <link rel="icon" href="../../../public/images/icons/favicon.ico">
    </head>
    <body>
        <section class="uppersection">
    <!--Start Navigation bar-->
    <?php include '../repeatable_contents/nav_bar_admin.php';?>
      <style> <?php include '../../../public/css/repeatable_contents/nav_bar_admin.css'; ?>  </style>
      <script type="text/javascript" src="../../../public/script/repeatable_contents/nav_bar_admin.js"></script>
    <!--End Navigation bar-->
            <br>
            <div class="vehicle_and_owner_details">
                <table class="vehicledetails">
                    <!-- vehicle 1 -->
                    <tr>
                        <th colspan="2" class="vehicleType">Toyota Prius 4th Generation</th>
                    </tr>
                    <tr class="detail">
                        <td>Car</td>
                        <td rowspan = "6"><img class="vimg" src="../../../public/images/Sample_images/toyota-2010-prius-wallpaper-01.jpg"></td>
                    </tr>
                    <tr>
                    <td>With A/C</td>
                    </tr>
                    <tr>
                    <td>5 Seats</td>
                    </tr>
                    <tr>
                    <td>With Driver</td>
                    </tr>
                    <tr>
                    <td>50 per km</td>
                    </tr>
                    <tr>
                    <td>1000 per day</td>
                    </tr>
                </table>
                <table class="driver_details">
                    <tr>
                        <th class="vehicleType">Mr.kmal</th>
                    </tr>
                    <tr>
                        <td>Kamal Sumudu Nagodaarachchi</td>
                    </tr>
                    <tr>
                        <td>kamal@gmail.com </td>
                    </tr>
                    <tr>
                        <td>0332255654 0716663769</td>
                    </tr>
                    <tr>
                        <td>Gampaha</td>
                    </tr>
                    <tr>
                        <td>LKR.1200.00 per day</td>
                    </tr>
                </table>
                <h3>Other vehicles of this driver</h3>
            </div>
        </section>

    </body>
</html>
<?php
 /* } else{
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
}else{
  header("location: ../../index.html");
  exit();
}*/
 ?>

<?php
  session_start();
  if(isset($_SESSION['username'])) {
    include '../../db/db_connection.php';
    $temp = $_SESSION['username'];
    $sqlForSession = "SELECT owner_id FROM vehicle_owners WHERE email = '$temp'";
    $resultForSession = mysqli_query($con, $sqlForSession);
    if (mysqli_num_rows($resultForSession) === 1) {
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="icon" href="../../images/icons/favicon.ico">
    <style> <?php include '../../css/vehicle/vehicle_home.css'; ?> </style>
    <style> <?php include '../../css/vehicle/vehicle_repeating_css.css'; ?> </style>
    <?php include '../../repeatable_contents/font.php'; ?>
    </script>
  </head>
  <body>

    <section class = "home-watermark_and_started-section">
      <?php include '../../repeatable_contents/nav_bar_vehicle.php';?>
      <style> <?php include '../../repeatable_contents/nav_bar_vehicle.css'; ?>  </style>
      <script type="text/javascript" src="../../repeatable_contents/nav_bar_vehicle.js"></script>
      <br>
      <div class="home-watermark_and_started-div">
      <div class = "watermark">TRAVO.lk</div><br>
      <br>
      <button type="button" name="button" class="get_started-btn" onclick="window.location.href='../../pages/vehicle/vehicle_view_vehicle.php'">GET STARTED</button>
      </div>
    </section>

<!--__________________about_us________________-->
    <section id="about_us-section">
      <?php include '../../repeatable_contents/about_us.php';?>
      <style> <?php include '../../repeatable_contents/about_us.css'; ?>  </style>
      <script type="text/javascript" src="../../repeatable_contents/about_us.js"></script>
      <br>
    </section>
<!--__________________END about_us________________-->

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

<?php
  if(isset($_SESSION['username'])) {
    if (mysqli_num_rows($this->isVehicle)===1) {
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <style> <?php include APPROOT . '/public/css/vehicle/vehicle_home.css'; ?> </style>
    <style> <?php include APPROOT . '/public/css/unregistered/repeating_css.css'; ?> </style>
    <link rel="icon" href="<?php echo URLROOT ?>/public/images/icons/favicon.ico">
    <?php include APPROOT . '/views/repeatable_contents/font.php'; ?> 

    </script>
  </head>
  <body>

    <section class = "home-watermark_and_started-section">
      <?php include APPROOT . '/views/repeatable_contents/nav_bar_vehicle.php';?>
      <style> <?php include APPROOT . '/public/css/repeatable_contents/nav_bar_vehicle.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_vehicle.js"></script>

      <div class="home-watermark_and_started-div">
      <div class = "watermark">TRAVO.lk</div><br>
      <br>
      <button type="button" name="button" class="get_started-btn" onclick="window.location.href='VEHICLE/myVehicle'">GET STARTED</button>
      </div>
    </section>

    <!--__________________about_us________________-->
    <section id="about_us-section">
      <?php include APPROOT . '/views/repeatable_contents/about_us.php';?>
      <style> <?php include APPROOT . '/public/css/repeatable_contents/about_us.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/about_us.js"></script>
      <br>
    </section>
<!--__________________END about_us________________-->


<!--__________________contact_us________________-->
  
<section id="contact_us-section">
      <?php include APPROOT . '/views/repeatable_contents/footer.php';?>
      <style> <?php include APPROOT . '/public/css/repeatable_contents/footer.css'; ?>  </style>
   </section>

<!--__________________END contact_us________________-->

  </body>
</html>
<?php
  } else{
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
}else{
  header("location: http://localhost/TRAVO");
  exit();
}
 ?>

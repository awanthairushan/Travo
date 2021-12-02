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
    <title>UPDATE</title>
    <link rel="icon" href="../../images/icons/favicon.ico">
    <style> <?php include '../../css/vehicle/vehicle_update.css'; ?> </style>
    <style> <?php include '../../css/vehicle/vehicle_repeating_css.css'; ?> </style>
    <?php
      $result = require '../../db/vehicle/vehicle_update_profile.php';
      include '../../repeatable_contents/font.php';
    ?>
  </head>
  <body>
    <section class="sign_up-traveler">
      <?php include '../../repeatable_contents/nav_bar_vehicle.php';?>
      <style> <?php include '../../repeatable_contents/nav_bar_vehicle.css'; ?>  </style>
      <script type="text/javascript" src="../../repeatable_contents/nav_bar_vehicle.js"></script>
      <div class="box-sign_up-traveler">
        <br>
        <form class="form-sign_up-traveler" id="signup_form_vehicle" action="../../php/vehicle/vehicle_update_profile.php" method="POST">
          <label for="name">Name</label>
            <input class="text-form-sign_up-traveler" type="text" name="owner_name" id="owner_name" placeholder=" <?php echo $name ?>"><br><br>
          <br>
          <label for="email">Email Address</label>
            <input class="text-form-sign_up-traveler" type="text" name="email" id="email" placeholder=" <?php echo $email ?>"><br><br>
          <br>
          <label for="contact">Contact Number</label>
            <input class="text-small-form-sign_up-traveler" type="text" name="contact2" id="contact2" placeholder=" <?php echo $contact2 ?>">
            <input class="text-small-form-sign_up-traveler" type="text" name="contact1" id="contact1" placeholder=" <?php echo $contact1 ?>"><br><br>
          <br>
          <label for="password">Password</label>
            <input class="text-small-form-sign_up-traveler" type="password" name="password2" id="password2" placeholder=" Confirm Password">
            <input class="text-small-form-sign_up-traveler" type="password" name="password1" id="password1" placeholder=" New Password"><br>
          <br>
        <!--  <label for="city">Location</label>
            <input class="text-form-sign_up-traveler" type="text" name="city" id="city" placeholder="city"><br>
          <br>
          <label for="vehicle-no">Vehicle Number</label>
            <input class="text-form-sign_up-traveler" type="text" name="vehicle_no" id="vehicle_no" placeholder=""><br>
          <br>
          <label for="vehicle">Vehicle</label>
            <input class="text-small-form-sign_up-traveler" type="text" name="no_of_passengers" id="no_of_passengers" placeholder="no of passengers">
            <input class="text-small-form-sign_up-traveler" type="text" name="type" id="type" placeholder="type"><br>
          <br>
          <label for="price">Price</label>
            <input class="text-small-form-sign_up-traveler" type="text" name="price_for_day" id="price_for_day" placeholder="price for day">
            <input class="text-small-form-sign_up-traveler" type="text" name="price_for_1km" id="price_for_1km" placeholder="price for 1km"><br>
          <br>
          <label for="driver">Driver</label> <input class="text-small-form-sign_up-traveler" type="text" name="driver_charge" id="driver_charge" placeholder="driver charges for a day">
          <select class="drop-down-form-sign_up-traveler" type="driver-type" name="driver_type" id="driver_type">
              <option value="with-driver">With Driver</option>
              <option value="without-driver">Without Driver</option>
              <option value="with-without-driver">With or Without Driver</option>
          </select><br>
          <br>
          <label for="ac">A/C</label><input class="ac-checkbox-form-sign_up-traveler" type="checkbox" name="ac" id="ac" value="yes"> <span></span> <br> -->
           </form>
      </div>
      <div class="buttons-sign_up-traveler">
          <input type="button" class="refreshbtn" value="REFRESH" onclick="window.location.reload();">
          <input type="submit" form="signup_form_vehicle" class="submitbtn" name="submitbtn" id="submitbtn" value="UPDATE">
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

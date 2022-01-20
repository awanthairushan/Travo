<?php
if (isset($_SESSION['username'])) {
  if (mysqli_num_rows($this->isVehicle) === 1) {
?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>UPDATE</title>
      <style>
        <?php include APPROOT . '/public/css/vehicle/vehicle_update.css'; ?>
      </style>
      <style>
        <?php include APPROOT . '/public/css/unregistered/repeating_css.css'; ?>
      </style>
      <link rel="icon" href="<?php echo URLROOT ?>/public/images/icons/favicon.ico">
      <?php include APPROOT . '/views/repeatable_contents/font.php'; ?>
    </head>

    <body>
      <section class="sign_up-traveler">
        <?php include APPROOT . '/views/repeatable_contents/nav_bar_vehicle.php'; ?>
        <style>
          <?php include APPROOT . '/public/css/repeatable_contents/nav_bar_vehicle.css'; ?>
        </style>
        <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_vehicle.js"></script>

        <div class="box-sign_up-traveler">
          <br>
          <?php
          while ($rows = mysqli_fetch_array($this->profileDetails)) {
            $name = $rows['owner_name'];
            $email = $rows['email'];
            $contact1 = $rows['contact1'];
            $contact2 = $rows['contact2'];
          }
          ?>
          <form class="form-sign_up-traveler" id="signup_form_vehicle" action="updateProfile" method="POST">
            <?php
            while ($rows = mysqli_fetch_array($this->ownerId)) {
              $owner_id = $rows['owner_id'];
            }
            ?>
            <input type="hidden" class="ownerId_class" name="ownerId" id="ownerId" value="<?php echo $owner_id; ?>">  

            <div class="form-control">
              <label for="name">Name</label>
              <input class="text-form-sign_up-traveler" type="text" name="owner_name" id="owner_name" placeholder=" <?php echo $name ?>"><br>
            </div>

            <div class="form-control">
              <label for="email">Email Address</label>
              <input class="text-form-sign_up-traveler" type="text" name="email" id="email" placeholder=" <?php echo $email ?>"><br>
            </div>

            <div class="form-control">
              <label for="contact">Contact Number</label>
              <input class="text-small-form-sign_up-traveler" type="text" name="contact2" id="contact2" placeholder=" <?php echo $contact2 ?>">
              <input class="text-small-form-sign_up-traveler" type="text" name="contact1" id="contact1" placeholder=" <?php echo $contact1 ?>"><br>
            </div>

            <div class="form-control">
              <label for="password">Password</label>
              <input class="text-small-form-sign_up-traveler" type="password" name="password2" id="password2" placeholder=" Confirm Password">
              <div class="tooltip">
                <span class="tooltiptext">*Please enter a password between 8 to 15 characters which contains at least one uppercase letter and one special character</span>
                <input class="text-small-form-sign_up-traveler" type="password" name="password1" id="password1" placeholder=" New Password"><br>
              </div>
            </div>
          </form>
        </div>
        <div class="buttons-sign_up-traveler">
          <input type="button" class="refreshbtn" value="REFRESH" onclick="window.location.reload();">
          <input type="submit" form="signup_form_vehicle" class="submitbtn" name="submitbtn" id="submitbtn" value="UPDATE">
        </div>
      </section>

      <!--__________________contact_us________________-->

      <section id="contact_us-section">
        <?php include APPROOT . '/views/repeatable_contents/footer.php'; ?>
        <style>
          <?php include APPROOT . '/public/css/repeatable_contents/footer.css'; ?>
        </style>
      </section>

      <!--__________________END contact_us________________-->

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
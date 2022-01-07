<?php
  session_start();
  if(isset($_SESSION['username'])) {
  //   include '../../db/db_connection.php';
  //   $temp = $_SESSION['username'];
  //   $sqlForSession = "SELECT travelerID FROM travelers WHERE email = '$temp'";
  //   $resultForSession = mysqli_query($con, $sqlForSession);
  //   if (mysqli_num_rows($resultForSession) === 1) {
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <style> <?php include APPROOT.'/public/css/traveler/traveler_update.css'; ?> </style>
    <style> <?php include APPROOT.'/public/css/traveler/traveler_repeating_css.css'; ?> </style>
    <!-- defer indicate that script is executed after the document has been parsed -->
    <?php
      // $result = require '../../db/traveler/traveler_updateprofile.php';
      include APPROOT.'/views/repeatable_contents/font.php';      
    ?>
  </head>
  <body>
    <section class="sign_up-traveler">
      <?php include APPROOT.'/views/repeatable_contents/nav_bar_traveler.php';?>
      <style> <?php include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; ?>  </style>
      <script type="text/javascript" src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>
      <br>
      <div class="pageheading">UPDATE</div>
    <div class="box-sign_up-traveler">
      <br>
      <form class="form-sign_up-traveler" id="form-sign_up-traveler" action="../../php/traveler/traveler_updateprofile.php" method="post">
      <br>
        <label for="name">Name</label>
        <input class="text-form-sign_up-traveler" type="text" name="name" id="name" value="" placeholder="<?php echo $name ?>"><br>
        <br>
        <label for="email">Email Address</label>
        <input class="text-form-sign_up-traveler" type="email" name="email" id="email" value="" placeholder="<?php echo $email ?>" ><br>
        <br>
        <label for="contact">Contact Number</label>
        <input class="text-small-form-sign_up-traveler" type="text" name="contact2" id="contact2" value="" placeholder="<?php echo $contact1 ?>">
        <input class="text-small-form-sign_up-traveler" type="text" name="contact1" id="contact1" value="" placeholder="<?php echo $contact2 ?>"><br>
        <br>

        <label for="password">Password</label>
        <input class="text-small-form-sign_up-traveler" type="password" name="retype-password" id="retype-password" value="" placeholder=" Confirm new password" >
        <div class="tooltip">
        <span class="tooltiptext">*Please enter a password between 8 to 15 characters which contains at least one uppercase letter and one special character</span>
        <input class="text-small-form-sign_up-traveler" type="password" name="password" id="password" value="" placeholder=" New password"><br>
        <br>
        </div>
        

      <label for="adress">Address</label>
      <input class="text-form-sign_up-traveler" type="text" name="address-line1" id="address-line1" placeholder="<?php echo $address1 ?>" value=""  ><br>
      <br>
      <input class="text-form-sign_up-traveler" type="text" name="address-line2" id="address-line2" placeholder="<?php echo $address2 ?>" value=""  ><br>
      <br>
      <input class="text-form-sign_up-traveler" type="text" name="city" id="city" placeholder="<?php echo $city ?>" value=""  ><br>
      <br>

    </form>
    </div>
    <div class="buttons-sign_up-traveler">
      <input type="button" class="refreshbtn" value="REFRESH" onclick="window.location.reload();">
      <input type="submit" form="form-sign_up-traveler" class="submitbtn" value="UPDATE" name="submitbtn" id="submitbtn">
    </div>
    </section>
    <section id="contact_us-section">
      <?php include APPROOT.'/views/repeatable_contents/footer.php';?>
      <style> <?php include APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
    </section>
    <!--<script src="../../script/unregistered/sign_up-traveler.js"></script>-->
  </body>
</html>
<?php
//   } else{
//     echo '<script type="text/javascript">javascript:history.go(-1)</script>';
//     exit();
//   }
}else{
  header("location: http://localhost/TRAVO");
  exit();
}
 ?>

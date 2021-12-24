<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>SIGNUP</title>
    <style> <?php include APPROOT . '/public/css/unregistered/sign_up-traveler.css'; ?> </style>
    <style> <?php include APPROOT . '/public/css/unregistered/repeating_css.css'; ?> </style>
    <link rel="icon" href="<?php echo URLROOT ?>/public/images/icons/favicon.ico">
    <?php include APPROOT . '/views/repeatable_contents/font.php'; ?> 
    <!-- defer indicate that script is executed after the document has been parsed -->
  </head>
  <body>

  <?php 
    if (isset($_SESSION['value'])) {
      if($_SESSION['value']==="username_exist"){
        echo '<div class="username_exist_modal">
        <div class="username_exist_confirm_box">
              <h3>Username Exist.!</h3>
              <hr>
              <p>Someone already has that username. Try another..!</p>
              <hr>
              <button type="button" name="okay_btn" class="username_exist_okay_btn" id="username_exist_okay_btn">Okay...!</button>
        </div>
        </div>';
      }
    }
  ?>

  <section class="sign_up-traveler">
    <?php include APPROOT . '/views/repeatable_contents/nav_bar.php';?>
    <style> <?php include APPROOT . '/public/css/repeatable_contents/nav_bar.css'; ?>  </style>
    <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar.js"></script>

    <div class="heading">TRAVELER</div>
    <div class="box-sign_up-traveler">
      <form class="form-sign_up-traveler" id="form-sign_up-traveler" action="../../php/unregistered/traveler_sign_up.php" method="post">
        <div class="form-control">
          <label for="name">Name</label>
          <input class="text-form-sign_up-traveler" type="text" name="name" id="name" value=""><br>
          <span class="error-msg"></span>
        </div>

        <div class="form-control">
          <label for="email">Email Address</label>
          <input class="text-form-sign_up-traveler" type="email" name="email" id="email" value=""  ><br>
          <span class="error-msg"></span>
        </div>

        <div class="form-control">
          <label for="contact">Contact Number</label>
          <input class="text-small-form-sign_up-traveler" type="number" name="contact2" id="contact2" value="" placeholder=" Contact Number 2">
          <input class="text-small-form-sign_up-traveler" type="number" name="contact1" id="contact1" value="" placeholder=" Contact Number 1"><br>
          <span class="error-msg"></span>
        </div>

        <div class="form-control">
          <label for="password">Password</label>
          <input class="text-small-form-sign_up-traveler" type="password" name="retype-password" id="retype-password" value="" placeholder=" Confirm password" >
          <div class="tooltip">
            <span class="tooltiptext">*Please enter a password between 8 to 15 characters which contains at least one uppercase letter and one special character</span>
            <input class="text-small-form-sign_up-traveler" type="password" name="password" id="password" value=""><br>
          </div>
          <span class="error-msg"></span>
        </div>

        <div class="form-control">
          <label for="adress">Address</label>
          <input class="text-form-sign_up-traveler" type="text" name="address-line1" id="address-line1" placeholder=" Address Line 1" value=""  ><br>
          <input class="text-form-sign_up-traveler" type="text" name="address-line2" id="address-line2" placeholder=" Adress Line 2" value=""  ><br>
          <input class="text-form-sign_up-traveler" type="text" name="city" id="city" placeholder=" City" value=""  ><br>
          <span class="error-msg"></span>
        </div>

        <div class="tc_div_form_signup_traveler">
          <input class="tc-checkbox-form-sign_up-traveler" type="checkbox" name="tc" id="tc" value="" required><label id="tc-label-form-sign_up-traveler" for="tc">I agree to all the <a href="../../pages/unregistered/tc.php">Terms & Conditions</a> of travo.lk</label>
          <br>
        </div>

      </form>
    </div>

    <?php 
      $_SESSION['value'] = "good";
    ?>
    <div class="buttons-sign_up-traveler">
          <input type="button" class="refreshbtn" value="REFRESH" onclick="window.location.reload();">
          <input type="submit" form="form-sign_up-traveler" class="submitbtn" name="submitbtn" id="submitbtn" value="SUBMIT">
    </div>

    </section>

  <!--__________________contact_us________________-->
  
  <section id="contact_us-section">
      <?php include APPROOT . '/views/repeatable_contents/footer.php';?>
      <style> <?php include APPROOT . '/public/css/repeatable_contents/footer.css'; ?>  </style>
   </section>

<!--__________________END contact_us________________-->

    <script src="../../../public/script/unregistered/sign_up-traveler.js"></script>
  </body>
</html>

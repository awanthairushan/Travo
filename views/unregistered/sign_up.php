<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>SIGNUP</title>
    <style> <?php include APPROOT . '/public/css/unregistered/sign_up.css'; ?> </style>
    <style> <?php include APPROOT . '/public/css/unregistered/repeating_css.css'; ?> </style>
    <link rel="icon" href="<?php echo URLROOT ?>/public/images/icons/favicon.ico">
    <?php include APPROOT . '/views/repeatable_contents/font.php'; ?> 
  </head>
  <body>
    <section class="sign_up">
      <?php include APPROOT . '/views/repeatable_contents/nav_bar.php';?>
      <style> <?php include APPROOT . '/public/css/repeatable_contents/nav_bar.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar.js"></script>


      <div class="box-sign_up">
        <br>
        <div class="border-img-sign_up">
            <img class="img-sign_up"src="<?php echo URLROOT ?>/public/images/icons/sign_up.png" alt="SIGN UP">
        </div>
        <div class="description-sign_up">
          <h2>Welcome to Travo.lk...</h2>
          <h3>Get Started Your Journey With Travo.lk...</h3>
          <button type="button" name="button" onclick="window.location.href = 'signupTraveler';">TRAVELER</button><br>
          <button type="button" name="button" onclick="window.location.href = 'signupVehicle';">VEHICLE</button><br>
          <button type="button" name="button" onclick="window.location.href = 'signupHotel';">HOTEL</button><br>
          <h3><a href="<?php echo URLROOT ?>/unregistered/login">Already have an account ?</a></h3>
        </div>
      </div>
    </section>

  <!--__________________contact_us________________-->
  
  <section id="contact_us-section">
      <?php include APPROOT . '/views/repeatable_contents/footer.php';?>
      <style> <?php include APPROOT . '/public/css/repeatable_contents/footer.css'; ?>  </style>
   </section>

<!--__________________END contact_us________________-->

  </body>
</html>

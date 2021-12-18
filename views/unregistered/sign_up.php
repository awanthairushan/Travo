<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>SIGNUP</title>
    <style> <?php include '../../../public/css/unregistered/sign_up.css'; ?> </style>
    <style> <?php include '../../../public/css/unregistered/repeating_css.css'; ?> </style>
    <link rel="icon" href="../../../public/images/icons/favicon.ico">
    <?php include '../repeatable_contents/font.php'; ?>
  </head>
  <body>
    <section class="sign_up">
      <?php include '../repeatable_contents/nav_bar.php';?>
      <style> <?php include '../../../public/css/repeatable_contents/nav_bar.css'; ?>  </style>
      <script type="text/javascript" src="../../../public/script/repeatable_contents/nav_bar.js"></script>
      <br>
    <div class="box-sign_up">
      <br>
      <div class="border-img-sign_up">
          <img class="img-sign_up"src="../../../public/images/icons/sign_up.png" alt="SIGN UP">
      </div>
      <div class="description-sign_up">
        <h2>Welcome to Travo.lk...</h2>
        <h3>Get Started Your Journey With Travo.lk...</h3>
        <button type="button" name="button" onclick="window.location.href = '../unregistered/sign_up-traveler.php';">TRAVELER</button><br>
        <button type="button" name="button" onclick="window.location.href = '../unregistered/sign_up-vehicle.php';">VEHICLE</button><br>
        <button type="button" name="button" onclick="window.location.href = '../unregistered/sign_up-hotel.php';">HOTEL</button><br>
        <h3><a href="../unregistered/log_in.php">Already have an account ?</a></h3>
      </div>
    </div>
    </section>
  </body>
</html>

<?php
session_start();
if (isset($_SESSION['username'])) {
  session_unset();
  session_destroy();
  header("location: ../../pages/unregistered/log_in.php");
  exit();
} else {
?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title></title>
    <style><?php include '../../../public/css/unregistered/forgot_pw.css'; ?></style>
    <?php include '../repeatable_contents/font.php'; ?>
    <style> <?php include '../../../public/css/unregistered/repeating_css.css'; ?> </style>
</head>

  <body>
    <section class="forgot_pw">
      <?php include '../repeatable_contents/nav_bar.php'; ?>
      <style>
        <?php include '../../../public/css/repeatable_contents/nav_bar.css'; ?>
      </style>

      <div class="box_forgot_pw"><br>
        <div class="description_forgot_pw">
          <h3>Forgot Password</h3>
          <p>Enter Email For OTP</p>
          <form class="" id="send_otp_form" action="../../php/unregistered/forgotpw.php" method="post">

            <div class="username_div_fogot_pw">
              <img class="img-username_div_fogot_pw" src="../../../public/images/icons/user.png" alt="">
              <input class="text-log_in" type="text" name="username_fogot_pw" id="username_fogot_pw" placeholder="Username">
            </div>

            <?php
            if (isset($_GET['error'])) { ?>
              <p class="error-log_in"><?php echo $_GET['error']; ?></p>
            <?php }   ?>

            <input type="submit" value="SEND OTP" name="otp_send_btn" class="otp_send_btn" id="otp_send_btn"><br>
          </form>
        </div>
      </div>
    </section>
  </body>

  </html>
<?php } ?>
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
    <title>LOGIN</title>
    <style><?php include APPROOT . '/public/css/unregistered/forgot_pw.css'; ?></style>
    <style> <?php include APPROOT . '/public/css/unregistered/repeating_css.css'; ?> </style>
    <link rel="icon" href="<?php echo URLROOT ?>/public/images/icons/favicon.ico">
    <?php include APPROOT . '/views/repeatable_contents/font.php'; ?> 
  </head>

  <body>
    <section class="forgot_pw">
      <?php include APPROOT . '/views/repeatable_contents/nav_bar.php';?>
      <style> <?php include APPROOT . '/public/css/repeatable_contents/nav_bar.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar.js"></script>


      <div class="box_forgot_pw"><br>
        <div class="description_forgot_pw">
          <h3>Forgot Password</h3>
          <p>Check Email For OTP</p>
          <form class="" id="send_otp_form" action="fogotPassword3" method="post">
            <div class="username_div_fogot_pw">
              <img class="img-username_div_fogot_pw" src="../../../public/images/icons/user.png" alt="">
              <input class="text-log_in" type="text" name="otp_fogot_pw" id="otp" placeholder="Enter OTP">              
              <?php
              if (isset($_GET['user_email'])) { ?>
                <input  type="hidden" name="sentEmail" value="<?php echo $_GET['user_email']; ?>">
              <?php }   ?>
            </div>
            <?php
            if (isset($_GET['error'])) { ?>
              <p class="error-log_in"><?php echo $_GET['error']; ?></p>
            <?php }   ?>

            <input type="submit" value="SUBMIT OTP" name="enter_otp_btn" class="otp_send_btn" id="otp_send_btn" onclick="window.location.href='fogotPassword3'"><br>
          </form>
        </div>
      </div>
    </section>
  </body>

  </html>
<?php } ?>
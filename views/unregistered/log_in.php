<?php
session_start();
if (isset($_SESSION['username'])) {
  session_unset();
  session_destroy();
  header("location: login");
  exit();
} else {
?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>LOGIN</title>
    <style> <?php include APPROOT . '/public/css/unregistered/log_in.css'; ?> </style>
    <style> <?php include APPROOT . '/public/css/unregistered/repeating_css.css'; ?> </style>
    <link rel="icon" href="<?php echo URLROOT ?>/public/images/icons/favicon.ico">
    <?php include APPROOT . '/views/repeatable_contents/font.php'; ?> 
  </head>

  <body>
    <section class="log_in">
      <?php include APPROOT . '/views/repeatable_contents/nav_bar.php';?>
      <style> <?php include APPROOT . '/public/css/repeatable_contents/nav_bar.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar.js"></script>
     
      <div class="box-log_in">
        <br>
        <div class="border-img-log_in">
          <img class="img-log_in" src="<?php echo URLROOT ?>/public/images/icons/log_in.png" alt="SIGN UP">
        </div>
        <div class="description-log_in">
          <form class="" id="log_in_form" action="<?php echo "logincheck" ?>" method="post">
            <div class="username-div-log_in">
              <img class="img-username-div-log_in" src="<?php echo URLROOT ?>/public/images/icons/user.png" alt="">
              <input class="text-log_in" type="text" name="username" id="username" placeholder="Username...">
            </div>
            <div class="username-div-log_in">
              <img class="img-username-div-log_in" src="<?php echo URLROOT ?>/public/images/icons/password.png" alt="">
              <input class="text-log_in" type="password" name="password" id="password" placeholder="Password">
            </div>
            <?php
            if (isset($_GET['error'])) { ?>
              <p class="error-log_in"><?php echo $_GET['error']; ?></p>
            <?php }   ?>
            <input type="submit" value="LOG IN"><br>
          </form>
          <h3><a href="fogotPassword">Forgot Password...?</a></h3>
          <h3><a href="signup">New to Travo.lk...?</a></h3>
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
<?php } ?>
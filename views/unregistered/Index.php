<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <style> <?php include APPROOT . '/public/css/unregistered/index.css' ?> </style>
    <style> <?php include APPROOT . '/public/css/unregistered/repeating_css.css' ?> </style>
    <link rel="icon" href="<?php echo URLROOT ?>/public/images/icons/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600&family=Mali&family=Poppins&family=Roboto+Condensed&family=Zen+Kaku+Gothic+New&display=swap" rel="stylesheet">
    <?php
      // $result = require '../../db/all/all_faq.php';
      include APPROOT . '/views/repeatable_contents/font.php';
    ?>
    <body>

    <section class = "home-watermark_and_started-section">
      
      <?php include APPROOT . '/views/repeatable_contents/nav_bar.php';?>
      <style> <?php include APPROOT . '/public/css/repeatable_contents/nav_bar.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar.js"></script>

      <div class="home-watermark_and_started-div">
        <div class = "watermark">TRAVO.lk</div>
        <br>
        <button type="button" name="button" class="get_started-btn" onclick="window.location.href='<?php echo URLROOT.'/unregistered/login'?>'">GET STARTED</button>
      </div>

    </section>


    
    <!--__________________about_us________________-->
    <section id="about_us-section">
      <?php include APPROOT . '/views/repeatable_contents/about_us.php';?>
      <style> <?php include URLROOT . '/public/css/repeatable_contents/about_us.css'; ?>  </style>
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

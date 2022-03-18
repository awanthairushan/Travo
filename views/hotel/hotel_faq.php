<?php
  // session_start();
  if(isset($_SESSION['username'])) {
  //   include '../../db/db_connection.php';
  //   $temp = $_SESSION['username'];
  //   $sqlForSession = "SELECT hotelID FROM hotels WHERE email = '$temp'";
  //   $resultForSession = mysqli_query($con, $sqlForSession);
  if (mysqli_num_rows($this->isHotel) === 1) {
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FAQ</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <style> <?php include_once APPROOT.'/public/css/hotel/hotel_faq.css'; ?> </style>
    <style> <?php include_once APPROOT.'/public/css/hotel/hotel_repeating_css.css'; ?> </style>
    <?php include APPROOT.'/views/repeatable_contents/font.php'; ?>
    <?php
      // $result = require '../../db/all/all_faq.php';
    ?>
  </head>
  <body>
    <section class="faq">
      <?php include_once APPROOT.'/views/repeatable_contents/nav_bar_hotel.php';?>
      <style> 
      <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_hotel.css'; ?>  
      </style>
      <script type="text/javascript" src="<?php echo APPROOT ?>/public/script/repeatable_contents/nav_bar_hotel.js">
    </script>
      <br>
      <div class="question_and_answers-faq">
      <br>
      <table class="faq_table-faq">
        <?php
          while ($rows = mysqli_fetch_array($this->faq)){
              echo "<tr>
                      <td class='question-faq'>".$rows['question']."</td>
                    </tr>
                    <tr>
                      <td class='answer-faq'>".$rows['answer']."</td>
                    </tr>";
          }
        ?>
      </table>
      <script type="text/javascript" src="http://localhost/TRAVO/public/script/hotel/hotel_faq.js"></script>
    </div>
    </section>
    <section id="contact_us-section">
      <?php include_once APPROOT.'/views/repeatable_contents/footer.php';?>
      <style> <?php include_once APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
        </section>
  </body>
</html>
<?php
  } else{
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
}else{
  header("location: http://localhost/TRAVO");
  exit();
}
 ?>

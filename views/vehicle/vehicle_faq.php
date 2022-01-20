<?php
  if(isset($_SESSION['username'])) {
    if (mysqli_num_rows($this->isVehicle)===1) {
 ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>FAQ</title>
      <style><?php include APPROOT . '/public/css/vehicle/vehicle_faq.css'; ?></style>
      <style><?php include APPROOT . '/public/css/unregistered/repeating_css.css'; ?> </style>
      <link rel="icon" href="<?php echo URLROOT ?>/public/images/icons/favicon.ico"> 
      <?php include APPROOT . '/views/repeatable_contents/font.php'; ?>  
      <?php
        // $result = require '../../db/all/all_faq.php';
      ?>
    </head>

    <body>
      <section class="faq">
        <?php include APPROOT . '/views/repeatable_contents/nav_bar_vehicle.php';?>
        <style> <?php include APPROOT . '/public/css/repeatable_contents/nav_bar_vehicle.css'; ?>  </style>
        <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_vehicle.js"></script>
  
        <div class="heading">FAQ</div>
        <div class="question_and_answers-faq">
          <br>
          <table class="faq_table-faq">
            <?php
            while ($rows = mysqli_fetch_array($this->faq)) {
              echo "<tr>
                <td class='question-faq'>" . $rows['question'] . "</td>
              </tr>
            <tr>
              <td class='answer-faq'>" . $rows['answer'] . "</td>
            </tr>";
            }
            ?>
          </table>
        </div>
        <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/vehicle/vehicle_faq.js"></script>
      </section>

<!--__________________contact_us________________-->
  
  <section id="contact_us-section">
        <?php include APPROOT . '/views/repeatable_contents/footer.php';?>
        <style> <?php include APPROOT . '/public/css/repeatable_contents/footer.css'; ?>  </style>
  </section>

<!--__________________END contact_us________________-->

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
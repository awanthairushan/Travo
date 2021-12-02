<?php
session_start();
if (isset($_SESSION['username'])) {
  include '../../db/db_connection.php';
  $temp = $_SESSION['username'];
  $sqlForSession = "SELECT owner_id FROM vehicle_owners WHERE email = '$temp'";
  $resultForSession = mysqli_query($con, $sqlForSession);
  if (mysqli_num_rows($resultForSession) === 1) {
?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>FAQ</title>
      <link rel="icon" href="../../images/icons/favicon.ico">
      <style>
        <?php include '../../css/vehicle/vehicle_faq.css'; ?>
      </style>
        <style> <?php include '../../css/vehicle/vehicle_repeating_css.css'; ?> </style>
      <?php
      $result = require '../../db/all/all_faq.php';
      include '../../repeatable_contents/font.php';
      ?>
    </head>

    <body>
      <section class="faq">
        <?php include '../../repeatable_contents/nav_bar_vehicle.php'; ?>
        <style>
          <?php include '../../repeatable_contents/nav_bar_vehicle.css'; ?>
        </style>
        <script type="text/javascript" src="../../repeatable_contents/nav_bar_vehicle.js"></script>
        <div class="heading">FAQ</div>
        <div class="question_and_answers-faq">
          <br>
          <table class="faq_table-faq">
            <?php
            while ($rows = mysqli_fetch_array($result)) {
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
        <script type="text/javascript" src="../../script/vehicle/vehicle_faq.js"></script>
      </section>
      <section id="contact_us-section">
        <?php include '../../repeatable_contents/footer.php'; ?>
        <style>
          <?php include '../../repeatable_contents/footer.css'; ?>
        </style>
      </section>
    </body>

    </html>
<?php
  } else {
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
} else {
  header("location: ../../index.html");
  exit();
}
?>
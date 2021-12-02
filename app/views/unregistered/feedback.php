<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>FEEDBACK</title>
    <style> <?php include '../../../public/css/unregistered/feedback.css'; ?> </style>
    <style> <?php include '../../../public/css/unregistered/repeating_css.css'; ?> </style>
    <?php
      // $result = require '../../db/traveler/traveler_feedbacklist.php';
      include '../repeatable_contents/font.php';
    ?>
        <link rel="icon" href="../../../public/images/icons/favicon.ico">
        
  </head>
  <body>
    <section class="feedback">
      <?php include '../repeatable_contents/nav_bar.php';?>
      <style> <?php include '../../../public/css/repeatable_contents/nav_bar.css'; ?>  </style>
      <script type="text/javascript" src="../../../public/script/repeatable_contents/nav_bar.js"></script>
      <br>

    <div class="box-feedback">
      <table class="feedback_table-feedback">
        <thead class="feedback_thead-feedback">
          <tr>
            <td class="date-feedback">DATE</td>
            <td class="feedback-feedback">FEEDBACK</td>
          </tr>
        </thead>
        <tbody class="feedback_tbody-feedback">
        <tbody class="feedback_tbody-feedback">
          
          <?php
            // while ($rows = mysqli_fetch_array($result)){
            //   echo "<tr>
            //     <td class='date-feedback'>".$rows['date']."</td>
            //     <td class='feedback-feedback'>".$rows['feedback']."</td>
            //   </tr>";
            // }
          ?>
        </tbody>
      </table>
    </div>
    </section>

    <section id="contact_us-section">
      <?php include '../repeatable_contents/footer.php';?>
      <style> <?php include '../../../public/css/repeatable_contents/footer.css'; ?>  </style>
    </section>

  </body>
</html>

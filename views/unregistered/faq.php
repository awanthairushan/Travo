<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <title>FAQ</title>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style> <?php include '../../../public/css/unregistered/faq.css'; ?> </style>
    <style> <?php include '../../../public/css/unregistered/repeating_css.css'; ?> </style>
    <link rel="icon" href="../../../public/images/icons/favicon.ico">

    <?php
      // $result = require '../../db/all/all_faq.php';
      include '../repeatable_contents/font.php';
    ?>
  </head>
  <body>
    <section class="faq">
      <?php include '../repeatable_contents/nav_bar.php';?>
      <style> <?php include '../../../public/css/repeatable_contents/nav_bar.css'; ?>  </style>
      <script type="text/javascript" src="../../../public/script/repeatable_contents/nav_bar.js"></script>
      <div class="heading">FAQ</div>
    <div class="question_and_answers-faq">
      <br>
      <table class="faq_table-faq">
      <?php
          // while ($rows = mysqli_fetch_array($result)){
          //     echo "<tr>
          //       <td class='question-faq'>".$rows['question']."</td>
          //     </tr>
          //   <tr>
          //     <td class='answer-faq'>".$rows['answer']."</td>
          //   </tr>";
          // }
        ?>
      </table>
    </div>
    <script type="text/javascript" src="../../../public/script/traveler/traveler_faq.js"></script>
    </section>
    <section id="contact_us-section">
      <?php include '../repeatable_contents/footer.php';?>
      <style> <?php include '../../../public/css/repeatable_contents/footer.css'; ?>  </style>
    </section>
  </body>
</html>

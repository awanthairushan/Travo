<?php
  session_start();
  if(isset($_SESSION['username'])) {
    $count=0;
    while($travelers = mysqli_fetch_array($this->isTraveler)){
      if($travelers['email']===$_SESSION['username']){
        $count=$count+1;
      }
    }
    if ($count === 1) {
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <style> <?php include APPROOT.'/public/css/traveler/traveler_faq.css'; ?> </style>
    <style> <?php include APPROOT.'/public/css/traveler/traveler_repeating_css.css'; ?> </style>
    <?php
      // $result = require '../../db/all/all_faq.php';
      include APPROOT.'/views/repeatable_contents/font.php';
    ?>
  </head>
  <body>
    <section class="faq">
      <?php include APPROOT.'/views/repeatable_contents/nav_bar_traveler.php';?>
      <style> <?php include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; ?>  </style>
      <script type="text/javascript" src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>
      <div class="pageheading">FAQ</div>
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
      <script type="text/javascript" src="http://localhost/TRAVO/public/script/traveler/traveler_faq.js"></script>
    </div>
    </section>
    <section id="contact_us-section">
      <?php include APPROOT.'/views/repeatable_contents/footer.php';?>
      <style> <?php include APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
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

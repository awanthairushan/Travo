<?php
  session_start();
  if(isset($_SESSION['username'])) {
    include '../../db/db_connection.php';
    $temp = $_SESSION['username'];
    $sqlForSession = "SELECT travelerID FROM travelers WHERE email = '$temp'";
    $resultForSession = mysqli_query($con, $sqlForSession);
    if (mysqli_num_rows($resultForSession) === 1) {
 ?>
<html>
    <head>
      <title>FEEDBACK</title>
      <link rel="icon" href="../../images/icons/favicon.ico">
        <style> <?php include '../../css/traveler/traveler_feedback.css'; ?> </style>
        <style> <?php include '../../css/traveler/traveler_repeating_css.css'; ?> </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include '../../repeatable_contents/font.php'; ?>
    </head>
    <body>
        <section class="uppersection">
            <?php include '../../repeatable_contents/nav_bar_traveler.php';?>
            <style> <?php include '../../repeatable_contents/nav_bar_traveler.css'; ?>  </style>
            <script type="text/javascript" src="../../repeatable_contents/nav_bar_traveler.js"></script>
            <div class="content">
                <div class="container">
                <div class="details">
                      <div class="heading">LEAVE YOUR LOVING RESPONSE !</div>
                      <div class="feedback">
                        <form action="../../php/traveler/traveler_givefeedback.php" method="POST">
                              <textarea name="response" class="response" required></textarea>
                              <!--<input type="image" name="submit" src="../../images/icons/send.png" alt="Submit"  id="Submit" class="Submit">-->
                              <button type="submit" name="submitbtn"  class="submitbtn" >
                                  <img src="../../images/icons/send.png" id="Submit" class="Submit" alt="Submit"/>
                              </button>
                          </form>
                      </div>
                  </div>
              </div>
            </div>
        </section>
    <section id="contact_us-section">
      <?php include '../../repeatable_contents/footer.php';?>
      <style> <?php include '../../repeatable_contents/footer.css'; ?>  </style>
    </section>
    </body>
</html>
<?php
  } else{
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
}else{
  header("location: ../../index.html");
  exit();
}
 ?>

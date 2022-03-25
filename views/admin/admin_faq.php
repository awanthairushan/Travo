<?php
if (isset($_SESSION['username'])) {
  if (mysqli_num_rows($this->isAdmin) === 1) {
?>

 <?php
  // $fquestion=$this->content[0]['fquestion'];
  // $fanswer=$this->content[0]['fanswer'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
     // $result = require '../../db/all/all_faq.php';
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_faq.css">
    <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_repeating_css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>        
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">


</head>
<body>


<section class="admin-destinations">
    <!--Start Navigation bar-->
    <?php include_once  APPROOT.'/views/repeatable_contents/nav_bar_admin.php';?>
      <style> <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_admin.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_admin.js"></script>
    <!--End Navigation bar-->

  <div class="main">
    <!--End form of adding new destination-->

<h1 class="heading-one">FAQ</h1>

<!--Start "FAQ" table-->
<div class="table">
    <table class="content_table" id="faq_table" >
        <thead>
            <tr>
                <th>QUESTION</th>
                <th>ANSWER</th>
                <th colspan = "2">CHANGES</th>
            </tr>
        </thead>
        <tbody>
        <?php
           while ($rows = mysqli_fetch_array($this->faq)){
                echo "<tr>
                    <td>".$rows['question']."</td>
                    <td>".$rows['answer']."</td>
                    <td>
                    <form method='post' >
                        <input type='hidden' value='$rows[0]' name=faq_id>
                        <input type='submit' id='removebtn' name ='removebtn' class='removebtn' value='EDIT'>
                    </form>
                    </td>
                    <td class='tdbtn'>
                    <form method='post' action='deleteFaq'>
                        <input type='hidden' value='$rows[0]' name=faq_id>
                        <input type='submit' id='removebtn' name ='removebtn' class='removebtn' value='REMOVE'>
                    </form>
                    </td>
                </tr>";
            }
          ?>
        </tbody>
    </table>
</div>
<!--End "FAQ" table-->

<!--Start form of adding new FAQ-->
<h1 class="heading-one">ADD NEW FAQ</h1>
<div class="form-container">
    <form action="addNewFaq" method="POST">
        <label for="fquestion" class="fques">QUESTION</label>
            <input type="text" id="fquestion" name="fquestion" required><br />
        <label for="fanswer" class="fans">ANSWER</label>
            <input type="text" id="fanswer" name="fanswer" required><br />
        <input type="submit" id="addbtn" value="SUBMIT" name="submit">
    </form>
  <!--End form of adding new FAQ-->


</div>


</div>

  <!--<script src="../../JS/filter.js"></script>-->
</section>
</body>
</html>
<?php
  } else {
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
} else {
  header("location: http://localhost/TRAVO");
  exit();
}
?>



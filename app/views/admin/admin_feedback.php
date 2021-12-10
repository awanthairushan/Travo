<?php
  /*session_start();
  if(isset($_SESSION['username'])) {
    include '../../db/db_connection.php';
    $temp = $_SESSION['username'];
    $sqlForSession = "SELECT username FROM admin WHERE username = '$temp'";
    $resultForSession = mysqli_query($con, $sqlForSession);
    if (mysqli_num_rows($resultForSession) === 1) {*/
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
   /* $result = require '../../db/admin/admin_feedback.php';*/
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEEDBACK</title>
    <link rel="icon" href="../../../public/images/icons/favicon.ico">
    <link rel="stylesheet" href="../../../public/css/admin/admin_feedback.css">
    <link rel="stylesheet" href="../../../public/css/admin/admin_repeating_css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>        
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">

</head>
<body>
<section class="admin-travelers">
    <!--Start Navigation bar-->
    <?php include '../repeatable_contents/nav_bar_admin.php';?>
      <style> <?php include '../../../public/css/repeatable_contents/nav_bar_admin.css'; ?>  </style>
      <script type="text/javascript" src="../../../public/script/repeatable_contents/nav_bar_admin.js"></script>
    <!--End Navigation bar-->
<div class="main">

    <h1 class="heading-one">FEEDBACKS</h1>
        <!--Start search option-->
        <div class="search_div">
        <label for="filter" class="filter-labels">SEARCH BY :</label>
            <select name="filter" id="filter" class="filter-input">
                <option value="fdate">DATE</option>
                <option value="feedback">FEEDBACK</option>
            </select>
            <input type="text" name="search" id="search" class="search-input" placeholder="Enter Value"><br>
      </div>      
            <!--End search option-->

<!--Start "Registered vehicle" table-->
<div class="table">
    <table class="content_table" id="feedback_table" >
        <thead>
            <tr>
                <th>DATE</th>
                <th>FEEDBACK</th>
                <th>REMOVE</th>
            </tr>
        </thead>
        <tbody>
        <?php
          /*  while ($rows = mysqli_fetch_array($result)){
                echo "<tr>
                    <td>".$rows['date']."</td>
                    <td>".$rows['feedback']."</td>
                    <td>
                    <form method='post' action='../../db/admin/admin_delete_feedback.php'>
                        <input type='hidden' value='$rows[0]' name=feedback_id>
                        <input type='submit' id='removebtn' name ='removebtn' class='removebtn' value='REMOVE'>
                    </form>
                    </td>
                </tr>";
            }*/
          ?>
        </tbody>
    </table>
</div>
<!--End "Registered vehicle" table-->

  <!--<script src="../../JS/filter.js"></script>-->
</section>
 <!--JS file for search & filter-->
    <script src="../../script/admin/admin_filter_feedback.js"></script>
</body>
</html>
<?php
 /* } else{
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
}else{
  header("location: ../../index.html");
  exit();
}*/
 ?>

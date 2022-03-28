<?php
  if(isset($_SESSION['username'])) {
    if (mysqli_num_rows($this->isTraveler) === 1) {
 ?>
<html>
<head>
    <title>PLAN</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <style> <?php include APPROOT.'/public/css/traveler/traveler_plantripHotels.css'; ?> </style>
    <style> <?php include APPROOT.'/public/css/traveler/traveler_repeating_css.css'; ?> </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://localhost/TRAVO/public/script/traveler/traveler_hotel_booking.js"></script>
    <?php include APPROOT.'/views/repeatable_contents/font.php'; ?>
</head>

<body>
    <section class="uppersection">
        <?php include APPROOT.'/views/repeatable_contents/nav_bar_traveler.php';?>
        <style> <?php include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; ?>  </style>
        <script type="text/javascript" src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>
        <div class="pageheading">SELECT <?php echo $this->count; ?> NIGHT HOTEL FROM <?php echo $this->des; ?></div>
    <div class="hotel_names_popup_main">
                <table>
                    <tr>
                        <td class="hotels">
                            <div class="slide hotels1">
                            <?php while($showHotels=mysqli_fetch_array($this->hotel)){?>
                                <div>
                                    <button onclick="window.location.href='hotelBooking?count=<?php echo $this->counter; ?>&htlId=<?php echo $showHotels['hotelID']; ?>&date=<?php echo $this->date ?>';" id="selecthotelbtn">
                                            <?php echo $showHotels['name']; ?><br><br><?php echo $showHotels['hotel_type']; ?><br><br><?php //echo 'Rs.'.$showHotels['single_price'].' - Rs.'.$showHotels['massive_price']; ?>
                                    </button>
                                </div>
                                <?php } ?>
                            </div>
                    </tr>
                </table>
            </div>
            <!-- <button class="nextbtn">NEXT</button> -->
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

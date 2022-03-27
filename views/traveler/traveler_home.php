<?php
if (isset($_SESSION['username'])) {
    // $count=0;
    // while($travelers = mysqli_fetch_array($this->isTraveler)){
    //   if($travelers['email']===$_SESSION['username']){
    //     $count=$count+1;
    //   }
    // }
    if (mysqli_num_rows($this->isTraveler) === 1) {
        ?>
        <!DOCTYPE html>
        <html lang="en" dir="ltr">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>HOME</title>
            <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
            <style> <?php include APPROOT.'/public/css/traveler/traveler_home.css'; ?> </style>
            <style> <?php include APPROOT.'/public/css/traveler/traveler_repeating_css.css'; ?> </style>
            <?php include APPROOT . '/views/repeatable_contents/font.php'; ?>
        </head>
        <body>

        <section class="home-watermark_and_started-section">
            <?php include APPROOT . '/views/repeatable_contents/nav_bar_traveler.php'; ?>
            <style> <?php include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; ?>  </style>
            <script type="text/javascript"
                    src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>
            <br>
            <p class="watermark">TRAVO.lk</p>
            </div>


            <div class="container" id="containerstart">
                <div class="details">

                    <!-- toogle -->
                    <input type="checkbox" id="switch">
                    <div class="app">
                        <div class="selecttype">
                            <label for="switch">
                                <div class="toggle_select">
                                </div>
                                <div class="names">
                                    <div class="planning"
                                        onclick="handleOnPlanningBtn()">                          
                                        PLAN</div>
                                    <div class="upcoming"
                                        onclick="handleOnupcomingBtn()">
                                        UPCOMING</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <!-- end of the toggle -->
                   <script>
                    function handleOnPlanningBtn(){
                        const tripPlanBeginForm = document.getElementById("tripPlanBegin");
                        const upcomingTableForm = document.getElementById("upcoming-table");
                        tripPlanBeginForm.style.display = "block";
                        upcomingTableForm.style.display = "none";
                    }
                    function handleOnupcomingBtn(){
                        const tripPlanBeginForm = document.getElementById("tripPlanBegin");
                        const upcomingTableForm = document.getElementById("upcoming-table");
                        upcomingTableForm.style.display = "block";
                        tripPlanBeginForm.style.display = "none";                        }
                    </script>

                    <form id="tripPlanBegin" class="tripPlanBegin" action="<?php echo URLROOT ?>/traveler/tripPlanBegin"
                          method="post">
                        <table class="main">
                            <tr>
                                <th class="trow heading">PEOPLE COUNT</th>
                                <th class="trow heading">DATE</th>
                                <th class="trow heading">CATEGORY</th>
                            </tr>
                            <tr>
                                <td class="trow"><input type="number" id="peoplecount" class="tripbegin"
                                                        name="peoplecount"></td>
                                <?php
                                $NewDate = Date('Y-m-d', strtotime('+7 days'));
                                ?>
                                <td class="trow to"><input type="date" id="startdate" name="startdate" class="tripbegin"
                                                           min="<?php echo $NewDate; ?>"><span
                                            class="select-to">to</span><input type="date" id="enddate" name="enddate"
                                                                              class="tripbegin"
                                                                              min="<?php echo $NewDate; ?>"></td>
                                <td class="trow"><select name="category" id="category" class="tripbegincat">
                                        <option selected value="">Select Category</option>
                                        <option value="pilgrimage">Pilgrimage</option>
                                        <option value="cultural">Cultural</option>
                                        <option value="leisure">Leisure</option>
                                    </select>
                                </td>
                        </table>
                        <br>
                        <center><span class="error" id="error"> &nbsp </span></center>
                        <input type="submit" id="nextbtn" class="nextbtn" value="NEXT" name="submitbtn">
                        <!-- <button id="nextbtn" class="nextbtn" onclick="window.location.href='traveler/planTrip'">NEXT</button> -->
                    </form>
                    <?php while($upcomingTrip = mysqli_fetch_array($this->upcomingTrip)){ ?>
                    <table class="upcoming-table" id="upcoming-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Hotel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $upcomingTrip['start_date']; ?>
                                </td>
                                <td>
                                <?php echo $upcomingTrip['destination_id']; ?>
                                </td>
                                <td>
                                <?php echo $upcomingTrip['start_date']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php break; } ?>
                </div>
            </div>
        </section>

        <!--__________________about_us________________-->
        <section id="about_us-section">
            <?php include APPROOT . '/views/repeatable_contents/about_us.php'; ?>
            <style> <?php include APPROOT.'/public/css/repeatable_contents/about_us.css'; ?>  </style>
            <script type="text/javascript"
                    src="http://localhost/TRAVO/public/script/repeatable_contents/about_us.js"></script>
            <br>
        </section>
        <!--__________________END about_us________________-->

        <section id="contact_us-section">
            <?php include APPROOT . '/views/repeatable_contents/footer.php'; ?>
            <style> <?php include APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
        </section>

        <script src="<?php echo URLROOT ?>/public/script/traveler/traveler_home.js"></script>
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

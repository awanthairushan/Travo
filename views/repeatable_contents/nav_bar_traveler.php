
    <?php
    echo
    '<div class="nav_bar-div">
    <br>
      <nav class = "nav_bar">
        <div class="nav_bar_logo">
            <img class="nav_bar_logo_img" src="http://localhost/TRAVO/public/images//Logo/travo.png" alt="LOGO">
        </div>
        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav_bar_links">
        <li></li>
        <li></li>
        <li class="navigations_name drop_content_mini">',$_SESSION['name'],'</li>
        <li class="navigations_name"><a href="'.URLROOT.'/traveler">HOME</a></li>
        <li class="navigations_name"><a href="'.URLROOT.'/traveler/faq">FAQ</a></li>
        <li class="navigations_name"><a href="'.URLROOT.'/traveler#about_us-section">ABOUT</a></li>
        <li class="navigations_name"><a href="#contact_us-section">CONTACT</a></li>
        <li class="navigations_name"><a href="'.URLROOT.'/traveler/feedbacks">FEEDBACK</a></li>
        <li class="navigations_name"><a href="'.URLROOT.'/traveler/tripToGo">MY TRIPS</a></li>
        <li class="navigations_name"><a href="'.URLROOT.'/traveler/vehicleDetails">VEHICLES </a></li>
        <li class = "dropdown_li">
            <div class="dropdown">
                <img class="nav_bar-img" src="http://localhost/TRAVO/public/images//icons/user.png">
                <div class="dropdown-content">
                    <div class="drop-title">',$_SESSION['name'],'</div>
                    <div class="drop-box"><a class="drop-nav" href="'.URLROOT.'/traveler/travelerUpdate">UPDATE</a></div>
                    <div class="drop-box"><button class="deleteAccount_btn" id="deleteAccount_btn">DELETE ACCOUNT</button></div>                    
                    <div class="drop-box"><a class="drop-nav" href="'.URLROOT.'/traveler/feedbacks">GIVE FEEDBACKS</a></div>
                    <div class="drop-box"><a class="drop-nav" href="'.URLROOT.'/traveler/logout">LOG OUT</a></div>
                </div>
            </div>
        </li>
        <li class="navigations_name drop_content_mini"><button class="deleteAccount_btn" id="deleteAccount_btn">DELETE ACCOUNT</button></li>
        <li class="navigations_name drop_content_mini"><a class="drop-nav" href="'.URLROOT.'/traveler/travelerUpdate">UPDATE</a></li>
        <li class="navigations_name drop_content_mini"><a class="drop-nav" href="'.URLROOT.'/traveler/logout">LOG OUT</a></li> 
        </ul>
    <div class="delete_modal">
      <div class="deleteAccount_confirm_box">
            <h3>Delete Account</h3>
            <hr>
            <p>There is no recovery option. Are you sure you want to delete this account ?</p>
            <hr>
            <form action="'.URLROOT.'/traveler/deleteTraveler" method="post">
            <input type="hidden" name="travelerDelete" value="'.$_SESSION['travelerID'].'">
            <button type="submit" name="delete_confirm_btn" class="delete_confirm_btn" id="delete_confirm_btn">DELETE ACCOUNT</button>
            <button type="button" name="delete_cancel_btn" class="delete_cancel_btn" id="delete_cancel_btn">CANCEL</button>
            </form>
        </div>
      </div>
  </div>
'; ?>

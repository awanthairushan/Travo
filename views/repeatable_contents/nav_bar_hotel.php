<?php
    echo
    '<div class="nav_bar-div">
      <br>
      <nav class = "nav_bar">
        <div class="nav_bar_logo">
            <img class="nav_bar_logo_img" src="' . URLROOT . '/public/images/Logo/travo.png" alt="LOGO">
        </div>
        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav_bar_links">
          <li class="navigations_name"></li>
          <li class="navigations_name"></li>
          <li class="navigations_name"><a href="'.URLROOT.'/hotel">HOME</a></li>
          <li class="navigations_name"><a href="'.URLROOT.'/hotel/faq">FAQ</a></li>
          <li class="navigations_name"><a href="'.URLROOT.'/hotel#about_us-section">ABOUT</a></li>
          <li class="navigations_name"><a href="#contact_us-section">CONTACT</a></li>
          <li class="navigations_name"><a href="'.URLROOT.'/hotel/hotelBooking">BOOKINGS</a></li>
          <li class="navigations_name"><a href="'.URLROOT.'/hotel/availability">UPDATE AVAILABILITY</a></li>
          <li class = "dropdown_li"> 
            <div class="dropdown">
              <img class="nav_bar-img" src="' . URLROOT . '/public/images/icons/user.png">
              <div class="dropdown-content">
                  <div class="drop-title">',$_SESSION['name'],'</div>
                  <div class="drop-box"><a class="drop-nav" href="'.URLROOT.'/hotel/hotelUpdate">UPDATE</a></div>
                  <div class="drop-box"><a class="drop-nav" href="'.URLROOT.'/hotel/logout">LOG OUT</a></div>
              </div>
            </div>
          </li>
        <li class="navigations_name drop_content_mini">',$_SESSION['name'],'</li>
        <li class="navigations_name drop_content_mini"><button class="deleteAccount_btn" id="deleteAccount_btn" >DELETE ACCOUNT</button></li>
        <li class="navigations_name drop_content_mini"><a class="drop-nav" href="'.URLROOT.'/hotel/hotelUpdate">UPDATE</a></li>
        <li class="navigations_name drop_content_mini"><a class="drop-nav" href="'.URLROOT.'/hotel/logout">LOG OUT</a></li> 
       
          </ul>
      </nav>
    '; ?>

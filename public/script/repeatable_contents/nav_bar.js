const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav_bar_links");
const links = document.querySelectorAll(".nav_bar_links li");

hamburger.addEventListener('click', ()=>{
   //Animate Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Hamburger Animation
    hamburger.classList.toggle("toggle");
});



var title = document.getElementsByTagName("title")[0];
var navigation = document.querySelectorAll(".navigations_name");
if(title.textContent == "FAQ"){
    navigation[3].classList.add("navigations_bold_style");
}else if(title.textContent == "FEEDBACK"){
    navigation[6].classList.add("navigations_bold_style");
}else if(title.textContent == "LOGIN"){
    navigation[7].classList.add("navigations_bold_style");
}else if(title.textContent == "SIGNUP"){
    navigation[8].classList.add("navigations_bold_style");
}

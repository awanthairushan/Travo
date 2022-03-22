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
if(title.textContent == "HOME"){
    navigation[1].classList.add("navigations_bold_style");
}else if(title.textContent == "FAQ"){
  navigation[2].classList.add("navigations_bold_style");
}else if(title.textContent == "FEEDBACK"){
    navigation[5].classList.add("navigations_bold_style");
}else if(title.textContent == "MY TRIPS"){
    navigation[6].classList.add("navigations_bold_style");
}else if(title.textContent == "VEHICLES"){
    navigation[7].classList.add("navigations_bold_style");
}

var modal = document.querySelector(".delete_modal");
var deleteAccount_btn = document.querySelector(".deleteAccount_btn");
var acc_cancelBtn = document.querySelector("#delete_cancel_btn");

deleteAccount_btn.addEventListener("click", function(e){
  modal.style.display = "block";
});

window.onclick = function(e) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
acc_cancelBtn.addEventListener("click", function(){
   modal.style.display = "none";
 });

 
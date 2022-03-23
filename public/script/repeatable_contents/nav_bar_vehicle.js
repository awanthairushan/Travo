const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav_bar_links");
const links = document.querySelectorAll(".nav_bar_links li");

hamburger.addEventListener('click', () => {
    //Animate Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Hamburger Animation
    hamburger.classList.toggle("toggle");
});


let title = document.getElementsByTagName("title")[0];
let navigation = document.querySelectorAll(".navigations_name");
if (title.textContent == "HOME") {
    navigation[2].classList.add("navigations_bold_style");
} else if (title.textContent == "FAQ") {
    navigation[3].classList.add("navigations_bold_style");
} else if (title.textContent == "VIEW") {
    navigation[6].classList.add("navigations_bold_style");
} else if (title.textContent == "ADD NEW") {
    navigation[7].classList.add("navigations_bold_style");
}



let modal = document.querySelector(".delete_modal");
let deleteAccount_btn = document.querySelector(".deleteAccount_btn");
let acc_cancelBtn = document.querySelector("#delete_cancel_btn");

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
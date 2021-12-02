var modal = document.querySelector(".more_traveler_details_modal");
var remove_btns = document.querySelectorAll(".morebtn_traveler_details");
var cancelBtn = document.querySelector("#more_traveler_cancel_btn");

for(var i = 0; i < remove_btns.length; i++){
    remove_btns[i].addEventListener("click", function(e) {
        modal.style.display = "block";
        event.preventDefault();
    });
}

window.onclick = function(e) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
cancelBtn.addEventListener("click", function() {
    modal.style.display = "none";
});

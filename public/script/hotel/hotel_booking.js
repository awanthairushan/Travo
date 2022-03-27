let customer_modal = document.querySelector(".more_traveler_details_modal");
let more_btns = document.querySelectorAll(".morebtn");
let doneBtn = document.querySelector("#more_traveler_cancel_btn");

for(let i = 0; i < more_btns.length; i++){
    more_btns[i].addEventListener("click", function(e) {
        customer_modal.style.display = "block";
        event.preventDefault();
    });
}

window.onclick = function(e) {
    if (event.target == customer_modal) {
        customer_modal.style.display = "none";
    }
}
doneBtn.addEventListener("click", function() {
    customer_modal.style.display = "none";
});
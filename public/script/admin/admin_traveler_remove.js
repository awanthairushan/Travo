var modal = document.querySelector(".delete_modal");
var deleteAccount_btn = document.querySelector("#removebtn");
var acc_cancelBtn = document.querySelector("#delete_cancel_btn");

let deleteBtn = document.getElementsByClassName('delete_confirm_btn');
let table = document.getElementById('traveler_table');

deleteAccount_btn.addEventListener("click", function(e) {
    modal.style.display = "block";
    event.preventDefault();
});

window.onclick = function(e) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
acc_cancelBtn.addEventListener("click", function() {
    modal.style.display = "none";
});
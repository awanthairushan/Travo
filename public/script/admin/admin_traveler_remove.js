console.log("thisuri");

let modal = document.querySelector(".delete_modal");
let deleteAccount_btn = document.querySelector(".removebtn");
let acc_cancelBtn = document.querySelector("#delete_cancel_btn");
let deleteBtn = document.querySelector('.delete_confirm_btn');
//let table = document.getElementById('traveler_table');

deleteAccount_btn.addEventListener("click", function(e) {
    document.getElementById("traveler_id").value=deleteAccount_btn.id;
    modal.style.display = "block";
});

window.onclick = function(e) {
    if (event.target == modal) {
        deleteAccount_btn.value=
        modal.style.display = "none";
    }
}
acc_cancelBtn.addEventListener("click", function() {
    modal.style.display = "none";
});

// function deleteTravelerid(id){
//     document.getElementById("traveler_id").value=id;
// }


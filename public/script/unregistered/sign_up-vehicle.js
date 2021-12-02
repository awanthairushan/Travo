//Create an array to get all inputs with the class name = "text-small-form-sign_up-traveler"
const fields = document.getElementsByClassName("text-small-form-sign_up-traveler");

//Create an array to get all inputs with the class name = "text-form-sign_up-traveler"
const fields2 = document.getElementsByClassName("text-form-sign_up-traveler");

//Get form submit button
submitbtn = document.getElementById("submitbtn");

let validity = true;

const form = document.getElementById("signup_form_vehicle");

form.addEventListener("submit", (event) => {
    validity = true;

    //Check empty fields
    for (let i = 0; i < fields.length; i++) {
        if (fields[i].value == "") {
            fields[i].style.border = "2px solid rgb(228, 29, 22)";
            fields[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
            //fields[i].placeholder = "This Field is Compulsory!";
            validity = false;
        }
    }

    for (let i = 0; i < fields2.length; i++) {
        if (fields2[i].value == "") {
            fields2[i].style.border = "2px solid rgb(228, 29, 22)";
            fields2[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
            //fields2[i].placeholder = "This Field is Compulsory!";
            validity = false;
        }
    }

    // Check contact numbers
    let con_format = /^[0-9]{10}$/;
    for (let i = 0; i < 2; i++) {
        if (fields[i].value != "" && fields[i].value.match(con_format) == null) {
            fields[i].style.border = "2px solid rgba(250, 39, 39, 0.801)";
            fields[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
            fields[i].value = "";
            fields[i].placeholder = "Wrong Contact Number Format !";
            validity = false;
        }
    }

    //Check email
    let mail_format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (fields2[1].value != "" && fields2[1].value.match(mail_format) == null) {
        fields2[1].style.border = "2px solid rgba(250, 39, 39, 0.801)";
        fields2[1].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        fields2[1].value = "";
        fields2[1].placeholder = "Invalid Email !";
        validity = false;
    }

    //Check password strong
    let password_format = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    if (fields[3].value != "" && fields[3].value.match(password_format) == null) {
        fields[3].style.border = "2px solid rgba(250, 39, 39, 0.801)";
        fields[3].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        fields[3].value = "";
        fields[3].placeholder = "Weak Password. Try Again !";
        validity = false;
    }

    //Check password
    if (fields[2].value != fields[3].value) {
        fields[2].style.border = "2px solid rgba(250, 39, 39, 0.801)";
        fields[2].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        fields[2].value = "";
        fields[2].placeholder = "Password Did Not Match. Try Again !";
        validity = false;
    }


    if (validity == false) event.preventDefault();

    return validity;
});

var username_modal = document.querySelector(".username_exist_modal");
var username_ok_Btn = document.querySelector("#username_exist_okay_btn");

window.onclick = function(e) {
    if (event.target == username_modal) {
        username_modal.style.display = "none";
    }
}
username_ok_Btn.addEventListener("click", function() {
    username_modal.style.display = "none";
});
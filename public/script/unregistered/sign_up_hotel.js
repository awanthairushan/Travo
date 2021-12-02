//Create an array to get all inputs with the class name = "text-small-form-sign_up-traveler"
const fields = document.getElementsByClassName("text-small-form-sign_up-traveler");

//Create an array to get all inputs with the class name = "text-form-sign_up-traveler"
const fields2 = document.getElementsByClassName("text-form-sign_up-traveler");

//get the input of hotel description
const fields3 = document.getElementById("description");

//get the input of hotel type
const fields4 = document.getElementById("hotel_type-type");

//Create an array to get all inputs with the class name = "number-form-sign_up-traveler"
const fields5 = document.getElementsByClassName("number-form-sign_up-traveler");

//Create an array to get all inputs with the class name = "number-form-sign_up-traveler"
const fields6 = document.getElementsByClassName("price-form-sign_up-traveler");

//Get form submit button
submitbtn = document.getElementById("submitbtn");

let validity = true;

const form = document.getElementById("sign_up_form-hotel");

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

    if (fields3.value == "") {
        fields3.style.border = "2px solid rgb(228, 29, 22)";
        fields3.style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        //fields3.placeholder = "This Field is Compulsory!";
        validity = false;
    }

    if (fields4.value == "") {
        fields4.style.border = "2px solid rgb(228, 29, 22)";
        fields4.style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        //fields3.placeholder = "This Field is Compulsory!";
        validity = false;
    }

    for (let i = 0; i < fields5.length; i++) {
        if (fields5[i].value == "") {
            fields5[i].style.border = "2px solid rgb(228, 29, 22)";
            fields5[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
            //fields5[i].placeholder = "This Field is Compulsory!";
            validity = false;
        }
    }

    for (let i = 0; i < fields6.length; i++) {
        if (fields6[i].value == "") {
            fields6[i].style.border = "2px solid rgb(228, 29, 22)";
            fields6[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
            //fields6[i].placeholder = "This Field is Compulsory!";
            validity = false;
        }
    }

    // Check contact numbers
    let con_format = /^[0-9]{10}$/;
    for (let i = 0; i < 6; i++) {
        if (fields[i].value != "" && fields[i].value.match(con_format) == null) {
            fields[i].style.border = "2px solid rgba(250, 39, 39, 0.801)";
            fields[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
            fields[i].value = "";
            fields[i].placeholder = "Wrong Contact Number Format !";
            validity = false;
        }

        if (i == 1) {
            i = 3;
        }
    }

    //Check email
    let mail_format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (fields2[7].value != "" && fields2[7].value.match(mail_format) == null) {
        fields2[7].style.border = "2px solid rgba(250, 39, 39, 0.801)";
        fields2[7].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        fields2[7].value = "";
        fields2[7].placeholder = "Invalid Email !";
        validity = false;
    }
    if (fields2[10].value != "" && fields2[10].value.match(mail_format) == null) {
        fields2[10].style.border = "2px solid rgba(250, 39, 39, 0.801)";
        fields2[10].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        fields2[10].value = "";
        fields2[10].placeholder = "Invalid Email !";
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
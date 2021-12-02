var title = document.getElementsByTagName("title")[0];
var navigation = document.querySelectorAll(".navigations_name");
if(title.textContent == "TRIPS"){
    navigation[1].classList.add("navigations_bold_style");
}else if(title.textContent == "TRAVELERS"){
    navigation[2].classList.add("navigations_bold_style");
}else if(title.textContent == "HOTELS"){
    navigation[3].classList.add("navigations_bold_style");
}else if(title.textContent == "VEHICLES"){
    navigation[4].classList.add("navigations_bold_style");
}else if(title.textContent == "FAQ"){
    navigation[5].classList.add("navigations_bold_style");
}else if(title.textContent == "FEEDBACK"){
    navigation[6].classList.add("navigations_bold_style");
}else if(title.textContent == "DESTINATIONS"){
    navigation[7].classList.add("navigations_bold_style");
}else if(title.textContent == "LOGOUT"){
    navigation[8].classList.add("navigations_bold_style");
}

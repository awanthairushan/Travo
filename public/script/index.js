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




function prev(){
		document.getElementById('gallary').scrollLeft -= 400;
}
function next()
{
		document.getElementById('gallary').scrollLeft += 400;
}

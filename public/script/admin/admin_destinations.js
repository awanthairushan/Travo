function addPlace() {
  var mainForm = document.getElementById("form_add_destination");
  console.log(mainForm);
  var siteDiv = document.getElementsByClassName("site_details_div");
  var lengthSiteDiv = siteDiv.length;
  console.log(lengthSiteDiv);
  var cln = siteDiv[lengthSiteDiv-1].cloneNode(true);
  mainForm.appendChild(cln);
}












// function myFunction() {
//   document.getElementById("demo").innerHTML =  document.getElementById("myP").innerHTML;
//
// }

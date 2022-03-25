function addPlace() {
  let mainForm = document.getElementById("form_add_destination");
  let siteDiv = document.getElementsByClassName("site_details_div");
  let lengthSiteDiv = siteDiv.length;
  let cln = siteDiv[lengthSiteDiv-1].cloneNode(true);
  mainForm.appendChild(cln);
}
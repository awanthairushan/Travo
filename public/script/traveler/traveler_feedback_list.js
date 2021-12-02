var addBtn = document.getElementById("addfeedback");
var feedbackForm = document.getElementById("form_div");
var feedbacksubmit = document.getElementById("SubmitFeedback");
var tHeight = document.getElementById("feedback_tbody-feedback");

addBtn.addEventListener("click", function(e){
    feedbackForm.style.display = "block";
    tHeight.style.maxHeight = "30vh";
    addBtn.style.display = "none";
});

feedbacksubmit.addEventListener("click", function(e){
    feedbackForm.style.display = "none";
    tHeight.style.maxHeight = "58vh";
    addBtn.style.display = "block";
  });
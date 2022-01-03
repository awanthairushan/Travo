var addBtn = document.getElementById("addfeedback");
var feedbackForm = document.getElementById("form_div");
var feedbacksubmit = document.getElementById("SubmitFeedback");
var tHeight = document.getElementById("feedback_tbody-feedback");

addBtn.addEventListener("click", function(e){
    feedbackForm.style.display = "block";

    // if (window.matchMedia("(max-width: 500px)").matches) {
    //     tHeight.style.display="none";

    //   } else {
        tHeight.style.maxHeight = "26vh";
    //   }
    // if(screen.width<"500px"){
    //     tHeight.style.display="none";
    // }else{
    //     tHeight.style.maxHeight = "26vh";
    // }
    addBtn.style.display = "none";
});

feedbacksubmit.addEventListener("click", function(e){
    feedbackForm.style.display = "none";
    tHeight.style.maxHeight = "54vh";
    addBtn.style.display = "block";
  });


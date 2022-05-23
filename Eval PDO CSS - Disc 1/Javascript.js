
var submit = document.getElementById("formulairecontact");

var boutonsubmit1 = document.getElementById("outersubmit1");
var boutonsubmit2 = document.getElementById("outersubmit2");

boutonsubmit1.addEventListener("focus", clic1);
boutonsubmit2.addEventListener("click", timeout);
// boutonsubm1it.addEventListener("Focus", timeout);
// boutonsubmit.addEventListener("Mouseover", timeout);
// boutonsubmit.addEventListener("Blur", timeout);

function clic1(){
    console.log("BTN1");
}


function timeout(){
    console.log("succes");
    console.log("BTN2");

    boutonsubmit1.focus();

    // boutonsubmit2.style.z-index : "-1";

    setTimeout(submitcontact, 3000);
    

}

function submitcontact(){
    submit.submit();
}
    
        

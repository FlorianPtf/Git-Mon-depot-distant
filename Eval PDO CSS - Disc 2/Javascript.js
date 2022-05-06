var submit = document.getElementById("formulairecontact");

var boutonsubmit1 = document.getElementById("outersubmit1");
var boutonsubmit2 = document.getElementById("outersubmit2");

boutonsubmit1.addEventListener("focus", clic1);
boutonsubmit2.addEventListener("click", timeout);

function clic1(){
    console.log("BTN1");
}


function timeout(){
    console.log("succes");
    console.log("BTN2");

    boutonsubmit1.focus();

    setTimeout(submitcontact, 3000);

}

function submitcontact(){
    submit.submit();
}
    










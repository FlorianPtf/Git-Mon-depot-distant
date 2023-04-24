// *****************************************************************************************************
// *****************************************    TIMER    ***********************************************
// *****************************************************************************************************

const timerElement = document.getElementById("timer")

const boutonstart = document.getElementById("boutonstart");

const boutonstop = document.getElementById("boutonstop");
boutonstop.addEventListener('click', closer);


boutonstart.onclick = function() {
  const tempsDonnee = document.getElementById("timerchoix").value;
  let temps = tempsDonnee * 60;
  console.log(tempsDonnee);
  boutonstop.style.display = "flex";
  boutonstart.style.display = "none";
  timerElement.style.color = "white"


  let getValue = document.getElementById("timerchoix");
        if (getValue.value != "") {
            getValue.value = "";
        }

  timerID = setInterval(() => {
  console.log(temps);
  let minutes = parseInt(temps / 60, 10);
  let secondes = parseInt(temps % 60, 10);

  minutes = minutes < 10 ? "0" + minutes : minutes;
  secondes = secondes < 10 ? "0" + secondes : secondes;

  timerElement.innerText = `${minutes}:${secondes}`
  temps = temps <= 0 ? 0 : temps - 1;
  if (temps <= 0) {
      clearInterval(timerID);
      timerElement.innerText = "00 : 00";
      timerElement.style.color = "#f68084"
      boutonstart.style.display = "flex";
      boutonstop.style.display = "none";
  };
  }, 1000);
}

function closer(){
  clearInterval(timerID);
  timerElement.innerText = "00 : 00";
  boutonstart.style.display = "flex";
  boutonstop.style.display = "none";
};


// *****************************************************************************************************
// **************************************    CHRONOMETRE    ********************************************
// *****************************************************************************************************

let chrono = document.getElementById("chrono");
let resetBtn = document.getElementById("boutonreset");
let stopBtn = document.getElementById("boutonstop2");
let startBtn = document.getElementById("boutonstart2");

let heures2 = 0;
let minutes2 = 0;
let secondes2 = 0;

let timeout;

let estArrete = true;

const demarrer = () => {
  if(estArrete){
    estArrete = false;
    defilerTemps();
  }
};

const arreter = () => {
  if(!estArrete){
    estArrete = true;
    clearTimeout(timeout);
  }
}

const defilerTemps = () => {
  if(estArrete) return;

  secondes2 = parseInt(secondes2);
  minutes2 = parseInt(minutes2);
  heures2 = parseInt(heures2);

  secondes2++;

  if(secondes2 == 60){
    minutes2++;
    secondes2 = 0;
  }

  if(minutes2 == 60){
    heures2++;
    minutes2 = 0;
  }

  if(secondes2 < 10){
    secondes2 = "0" + secondes2;
  }

  if(minutes2 < 10){
    minutes2 = "0" + minutes2;
  }

  if(heures2 < 10){
    heures2 = "0" + heures2;
  }

  chrono.textContent  = `${heures2}:${minutes2}:${secondes2}`;

  timeout = setTimeout(defilerTemps, 1000);
};

const reset = () => {

  chrono.textContent = "00:00:00";
  estArrete = true;
  heures2 = 0;
  minutes2 = 0;
  secondes2 = 0;
  clearTimeout(timeout);
};

startBtn.addEventListener("click", demarrer);
stopBtn.addEventListener("click", arreter);
resetBtn.addEventListener("click", reset);
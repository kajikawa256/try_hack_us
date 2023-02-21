const timer = document.querySelector("#timer");
const Min = document.querySelector("#Min");
const Sec = document.querySelector("#Sec");

var start = new Date();

let count = 0;
let minutue = 10;
let second = 60;

setInterval(() => {

  const now = new Date();
  const target = start; //ターゲット日時を取得
  const remainTime = target - now ; //差分を取る（ミリ秒で返ってくる

  //差分の日・時・分・秒を取得
  const difMin  = Math.floor(remainTime / 1000 / 60) % 60
  const difSec  = Math.floor(remainTime / 1000) % 60

  Min.innerHTML = minutue + difMin;
  if(difSec == 0){
    Sec.innerHTML = 0
  }else{
    Sec.innerHTML = second + difSec;
  }

},10);
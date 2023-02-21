// const timer = document.querySelector("#timer");
const Min = document.querySelector("#Min");
const Sec = document.querySelector("#Sec");

var starts = window.localStorage.getItem('start');

if(starts == null){
  //定義されていなければ
  var start = new Date();
  window.localStorage.setItem('start',start);
}else{
  //存在すれば
  var start = new Date(starts);
}

let count = 0;
let minutue = 10;
let second = 60;


setInterval(() => {

  const now = new Date();
  const target = start; //ターゲット日時を取得
  const remainTime = target - now ; //差分を取る（ミリ秒で返ってくる

  //差分の日・時・分・秒を取得
  var difMin  = Math.floor(remainTime / 1000 / 60) % 60
  var difSec  = Math.floor(remainTime / 1000) % 60

  if(difSec == 0){
    difSec = -60;
  }

  if(difMin < -10){
    difMin = -10;
    difSec = -60;
  }

  Min.innerHTML = minutue + difMin;
  Sec.innerHTML = second + difSec;

},100);
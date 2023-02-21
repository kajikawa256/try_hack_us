// const timer = document.querySelector("#timer");
const Min = document.querySelector("#Min");
const Sec = document.querySelector("#Sec");

var starts = sessionStorage.getItem('start');

if(starts === undefined){
  //定義されていなければ
  var start = new Date();
  sessionStorage.setItem('start',start);
}else{
  //存在すれば
  var start = sessionStorage.getItem('start');
  start = new Date(start);
}

let count = 0;
let minutue = 10;
let second = 60;


setInterval(() => {

  const now = new Date();
  const target = start; //ターゲット日時を取得
  const remainTime = target - now ; //差分を取る（ミリ秒で返ってくる

  //差分の日・時・分・秒を取得
  const difMin  = Math.floor(remainTime / 1000 / 60) % 60
  var difSec  = Math.floor(remainTime / 1000) % 60

  if(difSec == 0){
    difSec = 0;
  }

  Min.innerHTML = minutue + difMin;
  Sec.innerHTML = second + difSec;

},100);
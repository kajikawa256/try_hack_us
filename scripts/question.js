const Min = document.querySelector("#Min");
const Sec = document.querySelector("#Sec");
// const Hidden = document.querySelector("#js");

//開始時間
var starts = window.localStorage.getItem('start');
if(starts == null){
  //定義されていなければ
  var start = new Date();
  window.localStorage.setItem('start',start);
}else{
  //存在すれば
  var start = new Date(starts);
}

//フラグ
var flag = window.localStorage.getItem('flag');
if(flag == null){
  //定義されていなければ
  window.localStorage.setItem('flag',true);
}

//定数宣言
let minutue = 10;
let second = 60;


setInterval(() => {

  const now = new Date(); //現在の日時を取得
  const target = start; //ターゲット日時を取得
  const remainTime = target - now ; //差分を取る（ミリ秒で返ってくる

  //差分の日・時・分・秒を取得
  var difMin  = Math.floor(remainTime / 1000 / 60) % 60
  var difSec  = Math.floor(remainTime / 1000) % 60

  //表示用の調整
  if(difSec == 0){
    difSec = -60;
  }

  if(difMin < -10){
    difMin = -10;
    difSec = -60;
  }

  //タイマー表示
  Min.innerHTML = minutue + difMin;
  Sec.innerHTML = second + difSec;

  //送信用の値
  // Hidden.innerHTML = minutue + difMin;
  document.getElementById("js").value = minutue + difMin;

  //終了時間
  window.localStorage.setItem('end',now);

},100);

<?php
// データベースの接続情報が書かれているファイルを読み込み
require_once "../db/def.php";

//セッションを使うことを宣言
session_start();

// ログイン情報の受け取り
$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");

// //存在しなければ新規登録に移動
// if(!(isset($username,$password))){
//   header("Location: ../register/sign_up.php");
// }

// 送られてきた情報管理配列
$result = [
  "status" => true,
  "errMsg" => "",
];


if($username == "" || $password == ""){
  $result['errMsg'] = "ユーザー名またはパスワードを入力してください";
  $result["status"] = false;
  // var_dump($result);
}

// 空白削除
$username = trim((String)$username);
$password = trim((String)$password);



//ユーザー名またはパスワードが送信されて来なかった場合
if(empty($username) || empty($password)){
  $result["errMsg"] = "ユーザー名かパスワードが違います";
}
 //ユーザー名とパスワードが送信されたとき
 else{
  //post送信されてきたユーザー名がデータベースにあるか検索
  try{
    $stmt = $db -> prepare('SELECT * FROM users WHERE username=?');
    $stmt -> bindParam(1,$username,PDO::PARAM_STR, 10);
    $stmt -> execute();
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
  }
  catch(PDOExeption $e){
    exit('データベースエラー');
  }

  //検索したユーザー名に対してパスワードが正しいかを検証
  //正しくないとき
  if(!password_verify($username,$result['password'])){
    $result['errMsg'] =$result['errMsg'] + "ユーザー名かパスワードが違います<br>";
    $result['status'] = false;
  }
  //正しいとき
  else{
    session_regenerate_id(TRUE); //セッションidを再発行
    $_SESSION["login"] = $username;//セッションにログイン情報を登録
    header("Location: ../top/index.php");//ログイン後のページにリダイレクト
    exit();
  }
}






// // 存在チェック(username)
// if(!(isset($username))){
//   $result["status"] = false;
//   $result["errMsg"] = "ユーザー名を入力してください";
// }

// // 存在チェック(password)
// if(!(isset($password))){
//   $result["status"] = false;
//   $result["errMsg"] = "パスワードを入力してください";
// }

// 文字数判定
if(strlen($username) > 10 || strlen($password) > 50){
  $result["status"] = false;
  $result["errMsg"] = "文字数が超過しています";
}

// usernameとpasswordが送られてきていた場合のみ
if ($result["status"]) {
  try {
    // データベースに接続
    $dbConnection = new dbConnection();
    $db = $dbConnection->connection();
  } catch (PDOException $e) {
    echo $e;
  } finally {
    // nullにして接続を終了
    $db = null;
  }
}else{
  echo $result["errMsg"];
}

?>

<?php $title = "トップページ"; ?> <!-- headのtitleに反映させる -->
<?php $description = "トップページの説明"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/sign_up.css">



<div class="login-page">
  <div class="form">
    <form action="../register/sign_in.php" method="POST">
      <input type="text" name="username" placeholder="username" />
      <input type="password" name="password" placeholder="password" />
      <button>LOGIN</button>
    </form>
  </div>
</div>


<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
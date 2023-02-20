
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

// 空白削除
$username = trim((String)$username);
$password = trim((String)$password);

if(!empty($_POST)){
  if($username == "" || $password == ""){
    //ユーザー名またはパスワードが送信されて来なかった場合
    $result['errMsg'] = "ユーザー名かパスワードを入力してください";
    $result['status'] = false;
  }else{
    //post送信されてきたユーザー名がデータベースにあるか検索
    try{
      //db初期設定
      $dbConnection = new dbConnection();
      $db = $dbConnection->connection();

      $stmt = $db -> prepare('SELECT * FROM users WHERE username=?');
      $stmt -> bindParam(1,$username,PDO::PARAM_STR, 10);
      $stmt -> execute();
      $dbresult = $stmt -> fetch(PDO::FETCH_ASSOC);
      var_dump($dbresult);
    }
    catch(PDOExeption $e){
      exit('データベースエラー');
    }
    //検索したユーザー名に対してパスワードが正しいかを検証
    if($dbresult){
      //正しくないとき
      if(!password_verify($password,$dbresult['PASSWORD'])){
        $result['errMsg'] = "ユーザー名かパスワードが違います<br>";
        $result['status'] = false;
      }
      //正しいとき
      else{
        session_regenerate_id(TRUE); //セッションidを再発行
        $_SESSION["login"] = $dbresult["ID"];//セッションにログイン情報を登録
        header("Location: ../top/index.php");//ログイン後のページにリダイレクト
        exit();
      }
    }else{
      $result['errMsg'] = "ユーザー名かパスワードが違います<br>";
      $result['status'] = false;
    }
  }
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
      <p><?= !$result['status'] ? $result['errMsg']:"" ?></p>
    </form>
  </div>
</div>


<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
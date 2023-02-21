<?php
// データベースの接続情報が書かれているファイルを読み込み
require_once "../db/def.php";


// セッションを使うことを宣言
session_start();

if (isset($_SESSION["id"])) {
  unset($_SESSION["id"]);
}

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
$username = trim((string)$username);
$password = trim((string)$password);

if (!empty($_POST)) {
  if ($username == "" || $password == "") {
    //ユーザー名またはパスワードが送信されて来なかった場合
    $result['errMsg'] = "ユーザー名かパスワードを入力してください";
    $result['status'] = false;
  } else {
    //post送信されてきたユーザー名がデータベースにあるか検索
    try {
      //db初期設定
      $dbConnection = new dbConnection();
      $db = $dbConnection->connection();

      $stmt = $db->prepare('SELECT * FROM users WHERE username=?');
      $stmt->bindParam(1, $username, PDO::PARAM_STR, 10);
      $stmt->execute();
      $dbresult = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      exit('データベースエラー');
    }
    //検索したユーザー名に対してパスワードが正しいかを検証
    if ($dbresult) {
      //正しくないとき
      if (!password_verify($password, $dbresult['PASSWORD'])) {
        $result['errMsg'] = "ユーザー名かパスワードが違います<br>";
        $result['status'] = false;
      }
      //正しいとき
      else {
        session_regenerate_id(TRUE); //セッションidを再発行
        $_SESSION["id"] = $dbresult["ID"]; //セッションにログイン情報を登録
        $_SESSION["level"] = $dbresult["LEVEL"];
        $_SESSION["name"] = $dbresult["USERNAME"];
        $_SESSION["judge"] = true;

        header("Location: ../top/index.php"); //ログイン後のページにリダイレクト
        exit();
      }
    } else {
      $result['errMsg'] = "ユーザー名かパスワードが違います<br>";
      $result['status'] = false;
    }
  }
}

?>

<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>サインアップ</title> <!-- 各ページのtitleを反映させる -->
  <meta name="description" content="新規登録"> <!-- 各ページのdescriptionを反映させる -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/register.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Babylonica&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

</head>

<body>

  <div class="login-page">
    <div class="form">
      <form action="../register/sign_in.php" method="POST">
        <input type="text" name="username" placeholder="username" />
        <input type="password" name="password" placeholder="password" />
        <button>LOGIN</button>
        <div id="link_msg">
          <a id="link" href="./sign_up.php">アカウントを持っていない方はこちら</a>
        </div>
        <p><?= !$result['status'] ? $result['errMsg'] : "" ?></p>
      </form>
    </div>
  </div>

  <script src="../scripts/register.js"></script>
  <?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
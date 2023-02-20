<?php
// データベースの接続情報が書かれているファイルを読み込み
require_once "../db/def.php";

// 送られてきた値を受け取り
$user = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");
$repeat = filter_input(INPUT_POST, "repeatPassword");

// // 特殊文字処理
// $user = htmlspecialchars((string)$user);
// $password = htmlspecialchars((string)$password);
// $repeat = htmlspecialchars((string)$repeat);

// 送られてきた情報管理配列
$result = [
  "status" => true,
  "errMsg" => "",
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // 空白削除
  $user = trim((string)$user);
  $password = str_replace("( |　)+", "", $password);
  $password = str_replace(" ", "", $password);

  /*
  空白だった場合
  */
  if (empty($user)) {
    $result["status"] = false;
    $result["errMsg"] = $result["errMsg"] . "ユーザー名を入力してください<br>";
  }
  if (empty($password)) {
    $result["status"] = false;
    $result["errMsg"] = $result["errMsg"] . "パスワードを入力してください<br>";
  }
  if (empty($repeat)) {
    $result["status"] = false;
    $result["errMsg"] = $result["errMsg"] . "パスワードをもう一度入力してください<br>";
  }

  /*
  文字数制限を超えていないか
  */
  if ($result["status"]) {
    $count = 10;
    if (mb_strlen($user) > $count) {
      $result["status"] = false;
      $result["errMsg"] = $result["errMsg"] . "ユーザー名は10文字以内にしてください<br>";
    }
    $maxcount = 20;
    $mincount = 8;
    if (mb_strlen($password) > $maxcount || mb_strlen($password) < $mincount) {
      $result["status"] = false;
      $result["errMsg"] = $result["errMsg"] . "パスワードは8文字以上20文字以内にしてください<br>";
    }
  }

  /*
  特殊文字を使っているか
  */
  if (!preg_match("/^[0-9a-zA-Z]*$/", $user)) {
    $result["status"] = false;
    $result["errMsg"] = $result["errMsg"] . "ユーザネームは半角英数字のみ使えます<br>";
  }
  if (!preg_match("/^[0-9a-zA-Z]*$/", $password)) {
    $result["status"] = false;
    $result["errMsg"] = $result["errMsg"] . "記号は使えません<br>";
  }

  /*
  パスワードとリピートが一致しているか
  */
  if ($password !== $repeat) {
    $result["status"] = false;
    $result["errMsg"] = $result["errMsg"] . "リピートパスワードが違います<br>";
  }

  /*
  statusがfalseでなかった場合
  usernameが使われていないかのチェック
  */
  if ($result["status"]) {
    try {
      $dbConnection = new dbConnection();
      $db = $dbConnection->connection();

      // SQL文を設定
      $sql = "SELECT count(username)
              FROM users
              WHERE username = :username";

      // stmtにsql文をセット
      $stmt = $db->prepare($sql);

      // バインドパラムし値を設定
      $stmt->bindParam(':username', $user, PDO::PARAM_STR);

      // 実行
      $stmt->execute();

      //product_noをキーにDBからレコードを取得
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($row["COUNT(USERNAME)"]  == 1) {
        $result["status"] = false;
        $result["errMsg"] = $result["errMsg"] . "このユーザー名はすでに使われています！<br>";
      }
    } catch (PDOException $e) {
      echo $e;
    } finally {
      $db = null;
      $stmt = null;
    }
  }
  /*
  statusがfalseでなかった場合
  user情報の登録
  */
  if ($result["status"]) {
    try {
      $dbConnection = new dbConnection();
      $db = $dbConnection->connection();

      // SQL文を設定
      $sql = "INSERT INTO users(username, password)
              VALUES (:username,:password)";

      // stmtにsql文をセット
      $stmt = $db->prepare($sql);;

      // バインドパラムし値を設定
      $stmt->bindParam(':username', $user, PDO::PARAM_STR);
      $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

      // トランザクション開始
      $db->beginTransaction();

      // 実行
      $stmt->execute();

      // コミット
      $db->commit();

    } catch (PDOException $e) {
      echo $e;
    } finally {
      $stmt = null;
      $db = null;
    }
  }

  if($result["status"]){
    try {
      $dbConnection = new dbConnection();
      $db = $dbConnection->connection();

      // SQL文を設定
      $sql = "SELECT * FROM users WHERE username = '$user'";

      // stmtにsql文をセット
      $stmt = $db->prepare($sql);

      // 実行
      $stmt->execute();

      //値を取得
      $dbresult = $stmt -> fetch(PDO::FETCH_ASSOC);

      // indexに遷移
      session_start();
      // session_regenerate_id(TRUE); //セッションidを再発行
      $_SESSION["id"] = $dbresult["ID"];//セッションにログイン情報を登録
      $_SESSION["level"] = $dbresult["LEVEL"];
      $_SESSION["name"] = $dbresult["USERNAME"];
      header("Location: ../top/index.php");
    } catch (PDOException $e) {
      echo $e;
    } finally {
      $stmt = null;
      $db = null;
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
      <form class="login-form" action="./sign_up.php" method="POST">
        <input type="text" name="username" placeholder="ユーザネーム" value="<?= !$result['status'] ? $user:"" ?>" />
        <input type="password" name="password" placeholder="パスワード" />
        <input type="password" name="repeatPassword" placeholder="パスワード（確認）" />
        <button>新規登録</button>
      </form>
      <p><?= $result["errMsg"] ?></p>
    </div>
  </div>

<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->

</html>
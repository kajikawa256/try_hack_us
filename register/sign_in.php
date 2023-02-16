<?php
// データベースの接続情報が書かれているファイルを読み込み
require_once "../db/def.php";

// ログイン情報の受け取り
$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");

// 送られてきた情報管理配列
$result = [
  "status" => true,
  "errMsg" => "",
];

// usernameとpasswordが送られてきていた場合のみ
if (isset($username) && isset($password)) {
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
}

?>
<?php $title = "トップページ"; ?> <!-- headのtitleに反映させる -->
<?php $description = "トップページの説明"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/sign_up.css">



<div class="login-page">
  <div class="form">
    <form action="./sign_in.php" method="POST">
      <form class="login-form">
        <input type="text" name="username" placeholder="username" />
        <input type="password" name="password" placeholder="password" />
        <button>LOGIN</button>
      </form>
    </form>
  </div>
</div>


<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
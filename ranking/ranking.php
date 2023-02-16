<?php

session_start();
// セッションにユーザーidがなければログイン画面に遷移
if (!isset($_SESSION["user"])) {
  header("Location: ../register/sign_in.php");
}

// データベースの接続情報ファイルを読み込み
require_once "../db/def.php";

$dbConnection = new dbConnection();
$db = $dbConnection->connection();



?>

<?php $title = "ランキング一覧"; ?> <!-- headのtitleに反映させる -->
<?php $description = "Let's hack"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->
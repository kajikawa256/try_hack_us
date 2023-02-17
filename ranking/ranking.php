<?php

// データベースの接続情報ファイルを読み込み
require_once "../db/def.php";

$dbConnection = new dbConnection();
$db = $dbConnection->connection();



?>

<?php $title = "ランキング一覧"; ?> <!-- headのtitleに反映させる -->
<?php $description = "Let's hack"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/ranking.css"> <!-- css読み込み -->
<!-- ▼content▼ -->
<div class="content">
  <h1>ランキングページ</h1>
</div>
<!-- ▲content▲ -->
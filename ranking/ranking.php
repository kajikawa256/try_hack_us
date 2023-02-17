<?php $title = "ランキング一覧"; ?> <!-- headのtitleに反映させる -->
<?php $description = "Let's hack"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->

<?php

// データベースの接続情報ファイルを読み込み
require_once "../db/def.php";

try {
  // DB接続をインスタンス化
  $dbConnection = new dbConnection();
  $db = $dbConnection->connection();

  // SQL文を作成
  $sql = "SELECT username,score
        FROM users;";

  // stmtにsql文をセット
  $stmt = $db->prepare($sql);

  // 実行
  $stmt->execute();

  // 実行結果を取得
  $result = [];
  while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $result[] = $rows;
  }
} catch (PDOException $e) {
  echo $e;
} finally {
  $db = null;
  $stmt = null;
}
?>

<link rel="stylesheet" href="../css/ranking.css"> <!-- css読み込み -->
<!-- ▼content▼ -->
<div class="content">
  <h1>ランキングページ</h1>
</div>
<!-- ▲content▲ -->
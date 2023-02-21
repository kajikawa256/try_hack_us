<?php $title = "ランキング一覧"; ?> <!-- headのtitleに反映させる -->
<?php $description = "Let's hack"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->

<?php

// データベースの接続情報ファイルを読み込み
require_once "../db/def.php";

//変数宣言
$ranking = 0;

try {
  // DB接続をインスタンス化
  $dbConnection = new dbConnection();
  $db = $dbConnection->connection();

  // SQL文を作成
  $sql = "SELECT username,level,score
        FROM users
        ORDER BY score DESC
        LIMIT 30";

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

  <div class="box11">
  <h2>ランキングページ</h2>
        <table class="table table-hover mt-5 form-control-lg">
            <thead class="table-light text-secondary">
              <tr>
                <th>順位</th>
                <th>ユーザネーム</th>
                <th>レベル</th>
                <th>スコア</th>
              </tr>
            </thead>
            <tbody>
              <?php $log = 0;$flag = false;?>
              <?php foreach($result as $recode => $culum):$count=0?>
                <tr id="table_contents">
                <td><?= ++$ranking; ?></td>
                  <?php foreach($culum as $data): ?>
                    <td> <?= $data == 4 ? "完全クリア":$data; ?> </td>
                  <?php endforeach ?>
                </tr>
              <?php endforeach ?>
            </tbody>
        </table>

</div>
<!-- ▲content▲ -->
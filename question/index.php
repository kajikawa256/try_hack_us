<?php $title = "クイズTOPページ"; ?> <!-- headのtitleに反映させる -->
<?php $description = "top page"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->

<?php

// データベースの接続情報が書かれているファイルを読み込み
require_once "../db/def.php";

try {
  // DB接続をインスタンス化
  $dbConnection = new dbConnection();
  $db = $dbConnection->connection();

  // SQL文を作成
  $sql = "SELECT score
        FROM users
        WHERE id = {$_SESSION['id']}";

  // stmtにsql文をセット
  $stmt = $db->prepare($sql);

  // 実行
  $stmt->execute();

  // 実行結果を取得
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo $e;
} finally {
  $db = null;
  $stmt = null;
}

?>

<link rel="stylesheet" href="../css/question_page.css">
<link rel="stylesheet" href="../css/font.css">
<div class="contents">
        <!-- コンテンツ部分 -->
        <h2>Try Hack Us ページへようこそ</h2>
        <h3><?= "{$_SESSION['name']}さんの現在のレベル："?><?=$_SESSION['level'] > 3 ? "完全クリア":$_SESSION['level']; ?></h3>
        <h3><?= "{$_SESSION['name']}さんの現在の得点：{$result['SCORE']}点"; ?></h3>
        <div class="box22">
          <div class="description" >
            <p>
              【採点基準】<br>
                スコアはレベル１クリアで<span id="point">1000点</span>、レベル２クリアで<span id="point">3000点</span>、レベル３クリアで<span id="point">5000点</span>です。<br>
                各設問ごとに１０分のタイマーが設定されており、残り時間１分につき<span id="point">100点</span>の加点が与えられます。（秒は切り捨て）<br><br>
              【サイト説明】<br>
                このページはハッカーの気分になってパスワード認証を突破する腕試しページです。<br>
                現在、レベル1からレベル3まで実装されていて順番に問題を解くことができます。<br>
                ランキング画面を用意しているので他のプレイヤーとスコアを競い合うこともできます。<br>
                レベルごとにタイム測定も行っており、残りタイムに応じて得点が加算されます。<br>
                一度クリアした問題にはチャレンジできないのでご注意ください。<br>
                どうしてもわからない場合は右クリックで「検証」をクリックするかF12を押してソースコードを確認してみましょう。
            </p>
          </div>
        </div>
        <div class="button001">
          <a href="./ques_page_1.php"><?= $_SESSION["level"] != 1 ? "続きから":"問題へ" ?></a>
        </div>
    </div>

<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
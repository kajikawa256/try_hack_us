<!-- 結果表示画面 -->

<!-- データベースの接続情報が書かれているファイルを読み込み -->
<?php require_once "../db/def.php"; ?>

<?php $title = "ミッションクリア!"; ?> <!-- headのtitleに反映させる -->
<?php $description = "congratulation!!!!"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->
<?php
// $_SESSION[level]が2未満だった場合問題レベル1にとばす
if ($_SESSION["level"] != 4) {
        header("Location: ../question/ques_page_" .  $_SESSION["level"] . ".php");
}

//db接続処理
try {
        //db接続設定
        $dbConnection = new dbConnection();
        $db = $dbConnection->connection();

        //
        $stmt = $db->prepare("SELECT score FROM users WHERE id = {$_SESSION["id"]}");

        //クエリを実行
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $poe) {
        echo $poe;
} catch (Exception $poe) {
        $err_msg2 = $poe;
} finally {
        $db = null;
        $stmt = null;
}

?>

<link rel="stylesheet" href="../css/question_page.css">

<link rel="stylesheet" href="../css/question_page.css">

<div class="contents">
        <!-- コンテンツ部分 -->
        <h2>Congratulation!</h2>
        <h3>あなたのスコア<?= $result["SCORE"]; ?>点</h3>
        <div id="sentence">
                <p id="next_message">完全クリアおめでとうございます！</p>
        </div>
        <div id="next_button">
                <form action="../question/ques_page_3.php">
                        <button><a href="../ranking/ranking.php" id="button_text">ランキングへ</a></button>
                </form>
        </div>
</div>

<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
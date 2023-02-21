<!-- 結果表示画面 -->


<?php $title = "ミッションクリア!"; ?> <!-- headのtitleに反映させる -->
<?php $description = "congratulation!!!!"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->
<?php
// $_SESSION[level]が2未満だった場合問題レベル1にとばす
if ($_SESSION["level"] != 4) {
        header("Location: ../question/ques_page_" .  $_SESSION["level"] . ".php");
}
?>

<link rel="stylesheet" href="../css/question_page.css">

<link rel="stylesheet" href="../css/question_page.css">

<div class="contents">
        <!-- コンテンツ部分 -->
        <h2>Congratulation!</h2>
        <h3>あなたのスコア10000点</h3>
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
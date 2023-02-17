<?php $title = "問題レベル3　突破!";?> <!-- headのtitleに反映させる -->
<?php $description = "congratulation";?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?>  <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/question_page.css">

        <div class="contents">
                <!-- コンテンツ部分 -->
                <h2>Congratulation!</h2>
                <h3>あなたのスコア：１００００</h3>
                <div id="sentence">
                        <p>You logging in : Anonymous</p>
                        <br>
                        <p id="next_message">これであなたもアノニマスの一員です！<br>外部からのパラメータでウェブサーバ内のファイル名を直接指定する実装を避けましょう。</p>
                </div>
                <div id="next_button">
                        <form action="../question/ques_page_3.php">
                                <button><a href="../ranking/ranking.php" id="button_text">ランキング画面へ行く</a></button>
                        </form>
                </div>
        </div>

<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
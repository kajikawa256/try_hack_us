<?php
        $_POST["button"] = "";
?>

<?php $title = "問題レベル1　突破!";?> <!-- headのtitleに反映させる -->
<?php $description = "congratulation";?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?>  <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/question_page.css">

       <div class="contents">
                <!-- コンテンツ部分 -->
                <h2>Congratulation!</h2>
                <div id="sentence">
                        <p>You logging in : admin</p>
                        <br>
                        <p id="next_message">ミッションクリア！コメントでログイン情報は書かないように....</p>
                </div>
                <div id="next_button">
                        <button><a href="../question/ques_page_2.php" id="button_text">次へ</a></button>
                </div>
        </div>


<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
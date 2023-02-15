<?php $title = "問題レベル2";?> <!-- headのtitleに反映させる -->
<?php $description = "Please hack me XD";?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?>  <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/question_page.css">

       <div class="contents">
                <!-- コンテンツ部分 -->
                <h2>認証を突破してください。（Lv2）</h2>

                <form action="../answer/ans_page_1.php" method="POST">
                        <div class="contents_elemnt">
                                <input id="input_element" type="text" name="name" placeholder="">
                        </div>

                        <div class="contents_elemnt">
                                <input id="input_element" type="text" name="password" placeholder = "">
                        </div>

                        <div class="contents_elemnt" id="rogin_button">
                                <input type="submit" name = "button" value = "ログイン">
                        </div>
                </form>
        </div>

<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
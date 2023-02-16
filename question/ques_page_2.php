<?php

# ログインしていない人はログインページへ飛ばす
// session_start();
// if(!isset($_SESSION["USER_ID"])){
//         header("Location: ../register/sign_in.php");
// }

$id = filter_input(INPUT_POST,"id");
$pass = filter_input(INPUT_POST,"password");
$flag = filter_input(INPUT_POST,"button");

$err_msg="";

if(isset($flag)){
        //初回以外
        if(true){
                if(false){
                        header("Location: ../answer/ans_page_2.php");
                        echo"a";
                }else{
                        $err_msg = "IDまたはパスワードが正しくありません";
                }
        }
}

?>




<?php $title = "問題レベル2";?> <!-- headのtitleに反映させる -->
<?php $description = "Please hack me XD";?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?>  <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/question_page.css">

       <div class="contents">
                <!-- コンテンツ部分 -->
                <h2>認証を突破してください。（Lv2）</h2>

                <form action="./ques_page_2.php" method="POST">

                        <p id="err_message">　<?= $err_msg ?>　</p>

                        <div class="contents_elemnt">
                                <input id="input_element" type="text" name="name" placeholder=" ユーザID">
                        </div>

                        <div class="contents_elemnt">
                                <input id="input_element" type="text" name="password" placeholder=" パスワード">
                        </div>

                        <div class="contents_elemnt" id="rogin_button">
                                <input type="submit" name = "button" value = "ログイン">
                        </div>
                </form>
        </div>

<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
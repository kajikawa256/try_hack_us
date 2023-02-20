<?php

// データベースの接続情報が書かれているファイルを読み込み
require_once "../db/def.php";

//変数宣言
$id = filter_input(INPUT_POST, "id");
$pass = filter_input(INPUT_POST, "password");
$flag = filter_input(INPUT_POST, "button");
$result = false;

$err_msg = "";
$err_msg2 = "";


if (isset($flag)) {
        //buttonが押された後
        if (!$id == "" || !$pass == "") {
                //idとpassが入力されていた場合
                //db接続処理
                try {

                        $dbConnection = new dbConnection();
                        $db = $dbConnection->connection();

                        // 脆弱性のあるSQL文
                        $stmt = $db->query("SELECT * FROM dummytable WHERE level = 1 and username='$id' and password='$pass'");
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                        echo $poe;
                } catch (Exception $poe) {
                        $err_msg2 = $poe;
                } finally {
                        $db = null;
                        $stmt = null;
                }

                if ($result) {
                        //ユーザが存在するなら
                        header("Location: ../answer/ans_page_1.php");
                        exit();
                } else {
                        //ユーザが存在しないなら
                        $err_msg = "IDまたはパスワードが正しくありません";
                }
        } else {
                //idかpassが入力されていない場合
                $err_msg = "IDまたはパスワードが正しくありません";
        }
}

?>


<?php $title = "問題レベル1"; ?> <!-- headのtitleに反映させる -->
<?php $description = "Let's hack"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/question_page.css">
<link rel="stylesheet" href="../css/font.css">

<div class="contents">
        <!-- コンテンツ部分 -->
        <h2>認証を突破してください。（Lv1）</h2>

        <form action="./ques_page_1.php" method="POST">

                <p id="err_message"> <?php if ($err_msg2 != "") {
                                                echo $err_msg2;
                                        } else {
                                                echo $err_msg;
                                        } ?> </p>

                <div class="contents_elemnt">
                        <input id="input_element" type="text" name="id" placeholder=" ユーザID">
                </div>

                <!--
ログイン情報
ユーザID：admin　パスワード：abc12345
-->

                <div class="contents_elemnt">
                        <input id="input_element" type="text" name="password" placeholder=" パスワード">
                </div>

                <div class="contents_elemnt" id="rogin_button">
                        <form action="../answer/ans_page_1.php" method="POST">
                                <input type="submit" name="button" value="ログイン">
                        </form>
                </div>
        </form>
</div>

<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
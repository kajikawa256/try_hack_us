<?php $title = "問題レベル3"; ?> <!-- headのtitleに反映させる -->
<?php $description = "You are script kidy hahaha"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->
<?php

// $_SESSION[level]が2未満だった場合問題レベル1にとばす
if ($_SESSION["level"] != 3) {
        header("Location: ../question/ques_page_" .  $_SESSION["level"] . ".php");
}

// データベースの接続情報が書かれているファイルを読み込み
require_once "../db/def.php";

//GET形式で接続されていなければGETで再接続
$flag = filter_input(INPUT_GET, "page");
if ($flag != "ques_page_3.php") {
        header("Location: ./login.php?page=ques_page_3.php");
}

//変数宣言
$id = filter_input(INPUT_POST, "id");
$pass = filter_input(INPUT_POST, "password");
$result = false;
$flag2 = filter_input(INPUT_POST, "button");
$hidden = filter_input(INPUT_POST,"hidden");

$err_msg = "";


if (isset($flag2)) {
        //buttonが押された後
        if ($id == "master" && $pass == "finalquestion") {
                $err_msg = "ノリいいね！ヒントは【ディレクトリトラバーサル攻撃】";
        } else if ($id == "' or 1 = 1 -- " || $pass == "' or 1 = 1 -- ") {
                $err_msg = "部長！脆弱性直しときました！ヒントは【シャドウパスワード】";
        } else if (!$id == "" || !$pass == "") {
                //idとpassが入力されていた場合
                //db接続処理
                try {
                        //db接続設定
                        $dbConnection = new dbConnection();
                        $db = $dbConnection->connection();

                        //SQL文（プレースホルダ使用）
                        $stmt = $db->prepare("SELECT * FROM dummytable WHERE level = 3 and username = ? and password = ?");
                        $stmt->bindParam(1, $id, PDO::PARAM_STR);
                        $stmt->bindParam(2, $pass, PDO::PARAM_STR);

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

                if ($result) {
                        //ユーザが存在するなら
                        $_SESSION["judge"] = false;
                        $_SESSION["hidden"] = $hidden;
                        header("Location: ../answer/ans_page_3.php");
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


$db = null;
$stmt = null;


?>


<link rel="stylesheet" href="../css/question_page.css">

<div class="contents">
        <!-- コンテンツ部分 -->
        <h2>認証を突破してください。（Lv3）</h2>
        <p id="timer">残り<span id="Min"></span>分<span id="Sec"></span>秒</p>

        <form action="./login.php?page=ques_page_3.php" method="POST">

                <p id="err_message">　<?= $err_msg ?>　</p>

                <div class="contents_elemnt">
                        <input id="input_element" type="text" name="id" placeholder=" ユーザID">
                </div>

                <!--
ログイン情報
ユーザID：master　パスワード：finalquestion
-->

                <div class="contents_elemnt">
                        <input id="input_element" type="text" name="password" placeholder=" パスワード">
                </div>

                <div class="contents_elemnt" id="rogin_button">
                        <input type="submit" name="button" value="ログイン">
                        <input type="hidden" name="hidden" value="" id="js"/>
                </div>
        </form>
</div>

<script src="../scripts/question.js"></script>
<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
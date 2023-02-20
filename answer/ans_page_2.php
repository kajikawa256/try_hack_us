<?php
$button = filter_input(INPUT_POST, "button");
// $_SESSION[level]が2未満かつ場合問題レベル2にとばす
session_start();
if (!isset($button) || $_SESSION["level"] != 2) {
        header("Location: ../question/ques_page_1.php");
}

// データベースの接続情報が書かれたファイルを読み込み
require_once "../db/def.php";
// dbのlevelカラムを更新する
try {
        $dbConnection = new dbConnection();
        $db = $dbConnection->connection();

        // SQL文を設定
        $sql = "UPDATE users
                set level = 3
                where id = :id";

        // stmtにsql文をセット
        $stmt = $db->prepare($sql);;

        // バインドパラムし値を設定
        $stmt->bindParam(':id', $_SESSION["id"], PDO::PARAM_STR);

        // トランザクション開始
        $db->beginTransaction();

        // 実行
        $stmt->execute();

        // コミット
        $db->commit();
} catch (PDOException $e) {
        echo $e;
} catch (Exception $e) {
        echo $e;
} finally {
        $db = null;
        $stmt = null;
}
$_POST["button"] = "";
?>

<?php $title = "問題レベル2　突破!"; ?> <!-- headのtitleに反映させる -->
<?php $description = "congratulation"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/question_page.css">

<div class="contents">
        <!-- コンテンツ部分 -->
        <h2>Congratulation!</h2>
        <div id="sentence">
                <p>You logging in : root</p>
                <br>
                <p id="next_message">なかなかやりますね！エスケープ処理は必ず行いましょう</p>
        </div>
        <div id="next_button">
                <form action="../question/ques_page_3.php" method="POST">
                        <button><a href="../question/login.php?page='ques_page_3.php'" name="button" id="button_text">次へ</a></button>
                </form>
        </div>
</div>

<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
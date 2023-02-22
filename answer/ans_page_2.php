<?php $title = "問題レベル2突破!"; ?>
<?php $description = "congratulation"; ?>
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->
<?php
if ($_SESSION["judge"]) {
        header("Location: ../question/ques_page_" .  $_SESSION["level"] . ".php");
} else {

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

                //スコア処理
                // SQL文を設定
                $sql = "UPDATE users
                set score = score + 3000
                where id = :id";

                // stmtにsql文をセット
                $stmt = $db->prepare($sql);

                // バインドパラムし値を設定
                $stmt->bindParam(':id', $_SESSION["id"], PDO::PARAM_STR);

                // トランザクション開始
                $db->beginTransaction();

                // 実行
                $stmt->execute();

                // コミット
                $db->commit();

                //スコア加算処理
                // SQL文を設定
                $sql = "UPDATE users
                set score = score + 100 * {$_SESSION["hidden"]}
                where id = :id";

                // stmtにsql文をセット
                $stmt = $db->prepare($sql);

                // バインドパラムし値を設定
                $stmt->bindParam(':id', $_SESSION["id"], PDO::PARAM_STR);

                // トランザクション開始
                $db->beginTransaction();

                // 実行
                $stmt->execute();

                // コミット
                $db->commit();

                //セッション変数更新
                $_SESSION["judge"] = true;
                $_SESSION["level"] = 3;
                $_SESSION["hidden"] = 0;
        } catch (PDOException $e) {
                echo $e;
        } catch (Exception $e) {
                echo $e;
        } finally {
                $db = null;
                $stmt = null;
        }
}
//初期化
$_POST["button"] = "";
?>

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

<script src="../scripts/answer.js"></script>
<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
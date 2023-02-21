<?php $title = "問題レベル1　突破!"; ?> <!-- headのtitleに反映させる -->
<?php $description = "congratulation"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->
<?php

// $_SESSION[level]が1未満だった場合問題レベル1にとばす
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
                set level = 2
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

                //スコア処理
                // SQL文を設定
                $sql = "UPDATE users
                set score = score + 1000
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

                $_SESSION["judge"] = true;
                $_SESSION["level"] = 2;
        } catch (PDOException $e) {
                echo $e;
        } catch (Exception $e) {
                echo $e;
        } finally {
                $db = null;
                $stmt = null;
        }
}

$_POST["button"] = "";
?>

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
                <form action="../question/ques_page_2.php" method="POST">
                        <button><a href="../question/ques_page_2.php" id="button_text" name="button">次へ</a></button>
                </form>
        </div>
</div>


<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
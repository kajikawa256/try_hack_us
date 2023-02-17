<?php

// データベースの接続情報が書かれているファイルを読み込み
require_once "../db/def.php";

# ログインしていない人はログインページへ飛ばす
// session_start();
// if(!isset($_SESSION["USER_ID"])){
//         header("Location: ../register/sign_in.php");
// }

$id = filter_input(INPUT_POST,"id");
$pass = filter_input(INPUT_POST,"password");
$flag = filter_input(INPUT_POST,"button");
$result = false;

$err_msg="";
$err_msg2 = "";


if(isset($flag)){
        //buttonが押された後
        if(!$id == "" || !$pass == ""){
                //idとpassが入力されていた場合
                //db接続処理
                try {
                        // // データソース名を設定
                        // $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
                        // // $dbにPDOのインスタンス生成
                        // $db = new PDO($dsn, DB_USER, DB_PASS);
                
                        // //　PODの動作オプションを指定
                        // $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);                 // ステートメントのエミュレーションをオフ
                        // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);         // エラーを表示する
                        // $db->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);    // 空文字をnullに変換
                        // $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);                   // 小文字を大文字に変換
                        // $db->setAttribute(PDO::ATTR_AUTOCOMMIT, false);                       // autocommitをオフ

                        $dbConnection = new dbConnection();
                        $db = $dbConnection->connection();

                        // 脆弱性のあるSQL文
                        $stmt = $db -> query("SELECT * FROM dummytable WHERE level = 1 and username='$id' and password='$pass'");
                        $stmt -> execute();
                        $result = $stmt -> fetch(PDO::FETCH_ASSOC);        
                          
                }catch (PDOExeption $e) {
                        echo $poe;
                }catch(Exception $poe){
                        $err_msg2 = $poe; 
                }finally{
                        $db = null;
                        $stmt = null;
                }

                if($result){
                        //ユーザが存在するなら
                        header("Location: ../answer/ans_page_1.php");
                        exit();
                }else{
                        //ユーザが存在しないなら
                        $err_msg = "IDまたはパスワードが正しくありません";
                }
        }else{
                //idかpassが入力されていない場合
                $err_msg = "IDまたはパスワードが正しくありません";
        }
}

?>


<?php $title = "問題レベル1";?> <!-- headのtitleに反映させる -->
<?php $description = "Let's hack";?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?>  <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/question_page.css">
<link rel="stylesheet" href="../css/font.css">

       <div class="contents">
                <!-- コンテンツ部分 -->
                <h2>認証を突破してください。（Lv1）</h2>

                <form action="./ques_page_1.php" method="POST">

                        <p id="err_message">　<?php if($err_msg2 != ""){echo $err_msg2;}else{echo $err_msg;} ?>　</p>


                        <div class="contents_elemnt">
                                <input id="input_element" type="text" name="id" placeholder=" ユーザID">
                        </div>

<!--   
ログイン情報
ユーザID：a　パスワード：level1
-->

                        <div class="contents_elemnt">
                                <input id="input_element" type="text" name="password" placeholder=" パスワード">
                        </div>

                        <div class="contents_elemnt" id="rogin_button">
                                <input type="submit" name = "button" value = "ログイン">
                        </div>
                </form>
        </div>

<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
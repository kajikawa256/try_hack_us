<?php

// セッションを使うことを宣言

session_start();

// ログイン状態出ない場合sign_in.phpページにリダイレクト
if(!isset($_SESSION["id"])){
   header("Location: ../register/sign_in.php");
}

?>

<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0">
   <title><?= $title ?></title> <!-- 各ページのtitleを反映させる -->
   <meta name="description" content="<?= $description ?>"> <!-- 各ページのdescriptionを反映させる -->
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/header.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Babylonica&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

</head>

<body>
   <div class="wrapper">
      <header>
         <!-- ヘッダー部分 -->
         <div class = "HeaderStart">
            <div class = "HeaderMenu">
               <h1><a href = "../top/index.php" title = "ホームページへ">Try Hack Us!</a></h1>
               <ul>
                  <li><a href = "../question/index.php" title = "クイズ">クイズ</a></li>
                  <li><a href = "../ranking/ranking.php" title = "ランキング">ランキング</a></li>
                  <li><a href = "../books/index.php" title = "参考書">参考書</a></li>
                  <li><a href = "../register/sign_in.php" title = "ログアウト">ログアウト</a></li>
               </ul>
            </div>
         </div>
      </header>
   </div>
</body>
<?php

// 送られてきた値を受け取り
$user = filter_input(INPUT_POST, "name");
$password = filter_input(INPUT_POST, "password");

// 送られてきた情報管理配列
$result = [
  "status" => true,
  "errMsg" => "",
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
}


?>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>サインアップ</title> <!-- 各ページのtitleを反映させる -->
  <meta name="description" content="新規登録"> <!-- 各ページのdescriptionを反映させる -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/sign_up.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Babylonica&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

</head>

<body>

  <div class="login-page">
    <div class="form">
      <form class="login-form" action="./sign_up.php" method="POST">
        <input type="text" name="username" placeholder="username" />
        <input type="password" name="password" placeholder="password" />
        <button>RESISTER</button>
      </form>
    </div>
  </div>

</body>

<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->

</html>
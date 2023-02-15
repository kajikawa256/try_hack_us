<?php

// 送られてきた情報管理配列
$result = [
  "status" => true,
  "errMsg" => "",
  "Flag" => 0
];
?>
<?php $title = "トップページ"; ?> <!-- headのtitleに反映させる -->
<?php $description = "トップページの説明"; ?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?> <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/sign_up.css">



<div class="login-page">
  <div class="form">
    <form class="login-form">
      <input type="text" placeholder="username" />
      <input type="password" placeholder="password" />
      <button>LOGIN</button>
    </form>
  </div>
</div>


<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
<?php $title = "トップページ";?> <!-- headのtitleに反映させる -->
<?php $description = "トップページの説明";?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?>  <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/sign_up.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Babylonica&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">



<div class="login-page">
  <div class="form">
    <form class="login-form">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <button type = "submit">RESISTER</button>
    </form>
  </div>
</div>


<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->
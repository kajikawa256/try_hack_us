<?php $title = "トップページ";?> <!-- headのtitleに反映させる -->
<?php $description = "トップページの説明";?> <!-- headのdescriptionに反映させる -->
<?php include("../_inc/header.php"); ?>  <!-- ヘッダー共通部分 -->
<link rel="stylesheet" href="../css/sign_up.css">



  <form action="../top/index.php" method="POST">
    <h2>新規登録</h2>
    <div>
      <input id="name" type="text" name="name" placeholder="Username">
    </div>

    <div>
      <input id="e-mail" type="email" name="email" placeholder = "UserEmail">
    </div>

    <div>
      <input type="submit" name = "button" value = "REGISTER">
    </div>

  </form>

<?php include("../_inc/footer.php"); ?> <!-- フッター共通部分 -->